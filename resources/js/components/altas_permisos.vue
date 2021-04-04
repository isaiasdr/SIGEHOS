<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div v-if="nueva_alta" class="text-center">
				<h3 class="title-sigehos">Registrar Alta o Permiso</h3><hr>
			</div>
			<div v-else class="text-center">
				<h3 class="title-sigehos">Modificar Alta o Permiso</h3><hr>
			</div>

			<form id="form-alta-permiso-paciente">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-4">
										<label for="">Codigo Cama:</label>
										<input type="text" class="form-control" v-model="cod_cama" @change="busquedaPaciente">
									</div>
									<div class="col-md-4">
										<label for="">Nro. Admision:</label>
										<input type="text" class="form-control" v-model="num_ingreso" name="num_ingreso" @change="busquedaPaciente">
									</div>
									<div class="col-md-4">
										<label for="">Nro. Historia:</label>
										<input type="text" class="form-control" v-model="num_historia" @change="busquedaPaciente">
									</div>					
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group box-border">
							<div class="form-group p-2 text-center">
								<button type="button" @click="registrarAlta" class="btn boton-espaciado" :class="{'disabled':nueva_alta, 'btn-outline-success':nueva_alta, 'btn-success':!nueva_alta}"><i class="ti-plus"></i></button>
								<button type="button" @click="editarAlta" class="btn boton-espaciado" :class="{'disabled':!nueva_alta, 'btn-outline-info':!nueva_alta, 'btn-info':nueva_alta}"><i class="ti-pencil"></i></button>
								<button type="button" @click="enviarFormulario" class="btn btn-primary boton-espaciado"><i class="ti-save"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':nueva_alta, 'btn-outline-info':nueva_alta, 'btn-info':!nueva_alta}"><i class="ti-search"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':nueva_alta, 'btn-outline-danger':nueva_alta, 'btn-danger':!nueva_alta}"><i class="ti-minus"></i></button>
								<button @click="Recargar" type="button" class="btn btn-secondary boton-espaciado"><i class="ti-reload"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>Datos del Paciente:</b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-2">
											<label>Cedula:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.cedula">
										</div>
										<div class="col-md-4">
											<label>Apellidos:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.apellidos">
										</div>
										<div class="col-md-4">
											<label>Nombres:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.nombres">
										</div>
										<div class="col-md-2">
											<label>Sexo:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.sexo">
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>Datos de Admision:</b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-8">
											<label>Servicio:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.servicio">
										</div>
										<div class="col-md-4">
											<label>Fecha Ingreso:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.fecha_ingreso">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-8">
											<label>Medico:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.nombre_medico">
										</div>
										<div class="col-md-4">
											<label>Status:</label>
											<input type="text" class="form-control" readonly :value="datos_paciente.estatus">
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-inline">
										<label>Diagnosticos Clinicos Finales (CIE-10):</label>
										<div class="align-content-end">
											<button type="button" class="btn btn-outline-success boton-espaciado disabled"><i class="ti-plus"></i></button>
											<button type="button" class="btn btn-outline-danger boton-espaciado disabled"><i class="ti-minus"></i></button>
										</div>
									</div>
									<div class="table-responsive">
										<table class="table table-hover table-bordered custom-table">
											<thead class="thead">
												<tr class="text-center ">
													<th scope="col">Diagnostico</th>
													<th scope="col">Codigo</th>
												</tr>
											</thead>
											<tbody class="text-center">
												<tr v-for="diagnostico in diagnosticos_paciente">
													<td>{{diagnostico.descripcion}}</td>
													<td>{{diagnostico.cod_diagnostico}}</td>
												</tr>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label style="color: blue"><b>Datos del Alta:</b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-3">
											<label>Tipo Alta:</label>
											<input type="text" class="form-control" :value="tipo_alta" readonly :disabled="permiso">
										</div>
										<div class="col-md-5">
											<label for="datepicker_alta">Fecha Salida (alta medica):</label>
											<b-form-datepicker id="datepicker_alta" size="sm" local="es" menu-class="w-100" calendar-width="100%" :max="max_date" :disabled="permiso" v-model="fecha_alta" class="mb-2" placeholder="Seleccione una fecha"></b-form-datepicker>
										</div>
										<div class="col-md-4">
											<label>Motivo de alta:</label>
											<select class="custom-select" v-model="motivo_alta" name="motivo_alta" :disabled="permiso">
												<option value="">Motivo del Alta</option>
												<option v-for="causa_egreso in causas_egreso" :value="causa_egreso.id_causa_egreso">
													{{causa_egreso.descripcion}}
												</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row p-2">
					<div class="form-check form-check-inline">
					  	<input class="form-check-input" id="check_permiso" type="checkbox" v-model="permiso">
					  	<label class="form-check-label" for="check_permiso" @click="check(permiso)">Permiso del paciente</label>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>Datos del Permiso:</b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-2">
											<label>N° Permiso:</label>
											<input type="text" name="num_permiso" class="form-control disabled" :disabled="!permiso" readonly v-model="num_permiso">
										</div>
										<div class="col-md-5">
											<label for="datepicker_permiso">Fecha Permiso:</label>
											<b-form-datepicker id="datepicker_permiso" :disabled="!permiso"	 size="sm" local="es" menu-class="w-100" calendar-width="100%" :max="max_date" v-model="fecha_permiso" class="mb-2" placeholder="Seleccione una fecha"></b-form-datepicker>
										</div>
										<div class="col-md-5">
											<label>Motivo permiso:</label>
											<select name="motivo_permiso" class="custom-select" v-model="motivo_permiso" :disabled="!permiso">
												<option value="">Motivo del permiso</option>
												<option v-for="motivo_permiso in motivos_permiso" :value="motivo_permiso.id_motivo_permiso">
													{{motivo_permiso.descripcion}}
												</option>
											</select>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

			<div id="Warning-1" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
			      		<div class="modal-body">
			        		<p class="text-center modal-mensaje">{{alertas}}</p>
			      		</div>
			    	</div>
			  	</div>
			</div>

			<div id="Warning-2" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
			      		<div class="modal-body">
			        		<p v-for="alerta in alertas" class="text-center modal-mensaje">{{alerta[0]}}</p>
			      		</div>
			    	</div>
			  	</div>
			</div>

			<div id="Success-1" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
			      		<div class="modal-body">
			        		<p class="text-center modal-mensaje">La Alta o Permiso ha sido registrada con exito.</p>
			      		</div>
			      		<div class="modal-footer">
					        <button @click="Recargar" type="button" class="btn btn-primary">Registrar Nueva Alta o Permiso</button>
					    </div>
			    	</div>
			  	</div>
			</div>
		</div>
	</div>
</template>

<script>
	export default {
		props: {
			baseurl: {
				type: String,
				required: true
			},

			acceso_total: {
				type: Boolean,
				required: true
			},
		},

		data () {
			return {
				alertas: "",
				cod_cama: "",
				num_historia: "",
				num_ingreso: "",
				nueva_alta: true,
				datos_paciente: "",
				diagnosticos_paciente: "",
				fecha_alta: "",
				fecha_permiso: "",
				max_date: "",
				permiso: false,
				causas_egreso: "",
				motivos_permiso: "",
				motivo_alta: "",
				tipo_alta: "",
				num_permiso: "",
				motivo_permiso: "",
			}
		},

		created () {
			axios
				.get(`${this.baseurl}/altas/causas_egreso`)
				.then(response => (this.causas_egreso= response.data))

			axios
				.get(`${this.baseurl}/altas/motivos_permiso`)
				.then(response => (this.motivos_permiso= response.data))
		},

		mounted () {
			const now= new Date();
      		const today= new Date(now.getFullYear(), now.getMonth(), now.getDate());
      		this.max_date= new Date(today);

      		var baseurl = this.baseurl;
    		$("#Success-1").on('hidden.bs.modal', function () {
		    	window.location = `${baseurl}/altas`;
		    });
		},

		watch: {
    		datos_paciente: function(newData) {
    			this.cod_cama= this.datos_paciente.codigo_cama;
    			this.num_historia= this.datos_paciente.numero_historia;
    			this.num_ingreso= this.datos_paciente.numero_ingreso;

    			axios
					.get(`${this.baseurl}/traslado/control/diagnosticos?id_ingreso=${this.num_ingreso}`)
					.then(response => (this.diagnosticos_paciente= response.data))
    		},

    		motivo_alta: function(newData) {
    			for (var i = 0; i < this.causas_egreso.length; i++) {
    				if (newData == this.causas_egreso[i].id_causa_egreso) {
    					this.tipo_alta = this.causas_egreso[i].tipo_alta;
    				}
    			}
    		},

    		permiso: function() {
    			this.tipo_alta = "";
    			this.fecha_alta = "";
    			this.motivo_alta = "";
    			this.fecha_permiso = "";
    			this.num_permiso = "";
    			this.motivo_permiso = "";
    		},
    	},

		methods: {

			registrarAlta: function() {
				this.nueva_alta= true;
			},

			editarAlta: function() {
				this.nueva_alta= false;
			},

			enviarFormulario: function() {

				if (this.permiso) {

					var formData= new FormData(document.querySelector("form#form-alta-permiso-paciente"));
					formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);
					formData.append('permiso', this.permiso);
					formData.append('fecha_permiso', this.fecha_permiso);
					formData.append('id_cama', this.datos_paciente.id_cama);

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/altas/registrarPermiso`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				$('#Success-1').modal("show");
	    			})
	    			.catch(e => {
	    				this.alertas= e.response.data.errors;
	    				$('#Warning-2').modal("show");
	    			})

				} else {
					var formData= new FormData(document.querySelector("form#form-alta-permiso-paciente"));
					formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);
					formData.append('fecha_alta', this.fecha_alta);
					formData.append('id_cama', this.datos_paciente.id_cama);

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/altas/registrarAlta`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				$('#Success-1').modal("show");
	    			})
	    			.catch(e => {
	    				if (e.response.data.errors.length) {
    						this.alertas= e.response.data.errors;
    						$('#Warning-1').modal("show");
    					} else {
    						this.alertas= e.response.data.errors;
    						$('#Warning-2').modal("show");
    					}
	    			})
				}
			},

			Recargar: function() {
    			window.location = `${this.baseurl}/altas`;
    		},

			MostrarModalDiagnosticos: function() {
				$('#Modal-diagnosticos').modal('show');
			},

			removerDiagnostico: function() {
				this.diagnosticos_paciente.pop();
			},

			check: function(value) {
				value= !value;

				if (value) {
					axios
						.get(`${this.baseurl}/altas/numero_permiso?num_ingreso=${this.num_ingreso}`)
						.then(response => (this.num_permiso= response.data))
						.catch(e => {
		    				this.alertas= e.response.data.errors;
		    				$('#Warning-1').modal("show");
		    				this.permiso = false;
		    			})
				}
			},

			busquedaPaciente: function() {
				if (this.num_ingreso != "") {
					axios
	    			    .get(`${this.baseurl}/altas/consulta?num_ingreso=${this.num_ingreso}`)
	    			    .then(response =>(this.datos_paciente= response.data))
		    			.catch(e => {
		    				this.alertas= e.response.data.errors;
		    				$('#Warning-1').modal("show");
		    				this.num_ingreso= "";
		    				this.num_historia= "";
		    				this.cod_cama= "";
		    			})
				} else if (this.num_historia != "") {
					axios
	    			    .get(`${this.baseurl}/altas/consulta?num_historia=${this.num_historia}`)
	    			    .then(response =>(this.datos_paciente= response.data))
		    			.catch(e => {
		    				this.alertas= e.response.data.errors;
		    				$('#Warning-1').modal("show");
		    				this.num_ingreso= "";
		    				this.num_historia= "";
		    				this.cod_cama= "";
		    			})
				} else {
					axios
	    			    .get(`${this.baseurl}/altas/consulta?cod_cama=${this.cod_cama}`)
	    			    .then(response =>(this.datos_paciente= response.data))
		    			.catch(e => {
		    				this.alertas= e.response.data.errors;
		    				$('#Warning-1').modal("show");
		    				this.num_ingreso= "";
		    				this.num_historia= "";
		    				this.cod_cama= "";
		    			})
				}
			},
		}
	}
</script>