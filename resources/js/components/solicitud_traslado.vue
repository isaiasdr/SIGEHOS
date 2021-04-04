<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div class="text-center">
				<h3 class="title-sigehos">Solicitud de Traslado</h3><hr>
			</div>

			<form id="form-traslado-paciente">
				<div class="form-row">
					<div class="col-md-3">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-8">
										<label>Nro. Cama</label>
										<input type="text" name="numero_cama" class="form-control" :value="cama_seleccionada.codigo_cama" disabled>
									</div>
									<div class="col-md-4 text-center" style="top: 20px">
										<button type="button" @click="MostrarModalCamas" class="btn btn-outline-secondary boton-espaciado">...</button>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<div class="form-row">
									<label>Fecha Solicitud Traslado:</label>
									<input type="text" name="fecha_solicitud" class="form-control" :value="fecha" disabled>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<div class="form-row">
									<label>Nro. Ingreso</label>
									<input type="text" name="numero_ingreso" class="form-control" v-model="id_ingreso" @change="buscarIngreso(id_ingreso)">
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group box-border">
							<div class="form-group p-2 text-center">
								<button type="button" class="btn btn-outline-success boton-espaciado disabled" style="width: 20%;"><i class="ti-plus"></i></button>
								<button type="button" @click="enviarFormulario" class="btn btn-primary boton-espaciado" style="width: 20%;"><i class="ti-save"></i></button>
								<button @click="Recargar" type="button" class="btn btn-secondary boton-espaciado" style="width: 20%;"><i class="ti-reload"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>Datos del Paciente: </b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-3">
											<label>Cedula: </label>
											<input type="text" name="cedula_paciente" class="form-control" :value="datos_paciente == '' ? '' : datos_paciente.tipo_cedula+'-'+datos_paciente.cedula" disabled>
										</div>
										<div class="col-md-3">
											<label>Nro. Historia: </label>
											<input type="text" name="nro_historia" class="form-control" :value="datos_paciente.historia" disabled>
										</div>
										<div class="col-md-3">
											<label>Fecha Nacimiento: </label>
											<input type="text" name="fecha_nacimiento" class="form-control" :value="datos_paciente.fecha_nacimiento" disabled>
										</div>
										<div class="col-md-3">
											<label>Edad: </label>
											<input type="text" name="edad" class="form-control" disabled :value="edad_paciente">
										</div>	
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-5">
											<label>Nombres:</label>
											<input type="text" name="nombres" class="form-control" :value="datos_paciente.nombres" disabled>
										</div>
										<div class="col-md-5">
											<label>Apellidos: </label>
											<input type="text" name="apellidos" class="form-control" :value="datos_paciente.apellidos" disabled>
										</div>
										<div class="col-md-2">
											<label>Sexo: </label>
											<input type="text" name="sexo" class="form-control" :value="datos_paciente.sexo" disabled>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Medico Tratante: </label>
											<div class="form-row">
												<div class="col-md-4">
													<input type="text" name="algo_del_medico" class="form-control" :value="datos_paciente.cedula_medico" disabled>
												</div>
												<div class="col-md-8">
													<input type="text" name="nombre_medico" class="form-control" :value="datos_paciente.nombre_medico" disabled>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Diagnosticos (General):</label>
											<div class="form-row">
												<input type="text" name="diagnostico_general" class="form-control" disabled>
											</div>		
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Diagnosticos Preliminares (CIE-10): </label>
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
						<div class="form-group text-center">
							<div class="form-row">
								<div class="col-md-12">
									<label>Seleccione Tipo Traslado:</label>
									<div>
										<select class="custom-select" style="width: 40%" name="tipo_traslado" v-model="tipo_traslado_seleccionado" @change="tipoTraslado(tipo_traslado_seleccionado)">
											<option value="">Seleccione tipo de traslado</option>
											<option v-for="tipo_traslado in tipos_traslado" :value="tipo_traslado.id_tipo_traslado">
												{{tipo_traslado.descripcion}} - {{tipo_traslado.codigo}}
											</option>
										</select>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Actual: </label>
											<div class="form-group p-2">
												<div class="form-row text-center">
													<div class="col-md-4" style="left: 33%">
														<label>Tipo Servicio:</label>
														{{datos_paciente.tipo_servicio}}
													</div>
												</div>
												<div class="form-row">
													<label>Servicio Tratante:</label>
													<input type="text" name="servicio_actual" class="form-control" :value="datos_paciente.servicio" disabled>
												</div>
												<div class="form-row">
													<label>Servicio Ubicacion:</label>
													<input type="text" name="servicio_ubicacion" class="form-control" :value="datos_paciente.servicio" disabled>
												</div>
												<div class="form-row">
													<label>Tipo Habitacion:</label>
													<input type="text" name="tipo_habitacion" class="form-control" :value="datos_paciente.tipo_habitacion" disabled>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Solicitado:</label>
											<div class="form-group p-2">
												<div class="form-row text-center">
													<div class="col-md-4" style="left: 33%">
														<label>Tipo Servicio:</label>
														{{servicio_solicitado.tipo_servicio}}
													</div>
												</div>
												<div class="form-group p-2">
													<div class="form-row">
														<label>Servicio Tratante:</label>
														<select class="custom-select" name="servicio_solicitado" :disabled="blockSelect" v-model="servicio_solicitado.id_servicio" @change="tipoServicio(servicio_solicitado.id_servicio)">
															<option value="">Seleccione el servicio</option>
															<option v-for="servicio in servicios" :value="servicio.id_servicio">
																{{servicio.descripcion}}
															</option>
														</select>
													</div>
												</div>
												<div class="form-group p-2">
													<div class="form-row">
														<label>Tipo Habitacion:</label>
														<select class="custom-select" name="tipo_habitacion_solicitado">
															<option value="">Seleccione el tipo habitacion</option>
															<option v-for="tipo_habitacion in tipos_habitacion" :value="tipo_habitacion.id_tipo_habitacion">
																{{tipo_habitacion.codigo}} - {{tipo_habitacion.descripcion}}
															</option>
														</select>
													</div>
												</div>
											</div>
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
			        		<p class="text-center modal-mensaje">La solicitud de traslado ha sido registrada con exito.</p>
			      		</div>
			      		<div class="modal-footer">
					        <button @click="Recargar" type="button" class="btn btn-primary">Registrar Nueva Solicitud</button>
					    </div>
			    	</div>
			  	</div>
			</div>

			<div id="Modal-camas" class="modal" tabindex="-1" role="dialog">
  				<div class="modal-dialog modal-lg" role="document">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title">Seleccione una cama</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
        					<div class="form-group p-2">
        						<div class="form-row">
        							<div class="col-md-4">
        								<label>Tipo Hab.</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.tipo_habitacion" @change="busqueda">
        							</div>
        							<div class="col-md-2">
        								<label>Nro. Hab.</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.nro_habitacion" @change="busqueda">
        							</div>
        							<div class="col-md-2">
        								<label>Cod. Cama</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.cod_cama" @change="busqueda">
        							</div>
        							<div class="col-md-3">
        								<label>Tipo Cama</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.tipo_cama" @change="busqueda">
        							</div>
        							<div class="col-md-1" style="top: 31px">
        								<button @click="busqueda" type="button" class="btn btn-outline-secondary"><i class="ti-angle-double-right"></i></button>
        							</div>
        						</div>
        					</div>
        					<div class="table-responsive p-2">
								<table class="table table-hover table-bordered custom-table">
									<thead class="thead">
										<tr class="text-center ">
											<th scope="col">Tipo Hab.</th>
											<th scope="col">Nro. Hab.</th>
											<th scope="col">Cod. Cama</th>
											<th scope="col">Tipo Cama</th>
											<th scope="col">Estatus</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr v-for="cama in camas" @click="seleccionarCama(cama.id_cama)">
											<td>{{cama.tipo_hab}}</td>
											<td>{{cama.num_hab}}</td>
											<td>{{cama.cod_cama}}</td>
											<td>{{cama.tipo_cama}}</td>
											<td>{{cama.estatus}}</td>
										</tr>
									</tbody>
								</table>
							</div>
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
    			nuevo_traslado: true,
    			servicios: [],
    			diagnosticos_paciente: [],
    			camas: [],
    			fecha: "",
    			busqueda_cama: {
    				tipo_habitacion: "",
    				nro_habitacion: "",
    				cod_cama: "",
    				tipo_cama: "",
    			},
    			cama_seleccionada: {
    				id_cama: "",
    				codigo_cama: "",
    			},
    			datos_paciente: "",
    			id_ingreso: "",
    			servicio_actual: {
    				tipo_servicio: "",
    				servicio: "",
    				ubicacion: "",
    				tipo_habitacion: "",
    			},
    			servicio_solicitado: {
    				tipo_servicio: "",
    				id_servicio: "",
    			},
    			tipos_traslado: [],
    			blockSelect: false,
    			tipo_traslado_seleccionado: "",
    			tipos_habitacion: [],
    			edad_paciente: "",
    		}
    	},

    	created () {
    		axios
    			.get(`${this.baseurl}/traslado/solicitud/fecha`)
    			.then(response =>(this.fecha= response.data))

    		axios
    			.get(`${this.baseurl}/consulta/servicios`)
    			.then(response => (this.servicios= response.data))

    		axios
    			.get(`${this.baseurl}/admision/diagnosticos`)
    			.then(response =>(this.diagnosticos= response.data))

    		axios
    			.get(`${this.baseurl}/traslado/solicitud/camas`)
    			.then(response =>(this.camas= response.data))	

    		axios
    			.get(`${this.baseurl}/traslado/solicitud/tipos_traslado`)
    			.then(response => (this.tipos_traslado = response.data))

    		axios
    			.get(`${this.baseurl}/traslado/solicitud/tipos_habitaciones`)
    			.then(response => (this.tipos_habitacion = response.data))
		},

    	mounted () {

    		var busqueda = this.busqueda_cama;
    		$("#Modal-camas").on('hidden.bs.modal', function () {
		    	busqueda.tipo_habitacion= "";
		    	busqueda.nro_habitacion= "";
		    	busqueda.cod_cama= "";
		    	busqueda.tipo_cama= "";
		    });

    		var baseurl= this.baseurl;
		    $("#Success-1").on('hidden.bs.modal', function () {
		    	window.location = `${baseurl}/home`;
		    });
    	},

    	watch: {
    		datos_paciente: function(newData) {
    			//this.datos_paciente= newData;
    			this.id_ingreso= this.datos_paciente.id_ingreso;
    			this.cama_seleccionada.codigo_cama= this.datos_paciente.codigo_cama;

    			if (this.datos_paciente.tipo_servicio == 'HOSP') {
    				this.datos_paciente.tipo_servicio = 'HOSPITALIZACION';
    			} else {
    				this.datos_paciente.tipo_servicio = 'EMERGENCIA';
    			}

    			axios
					.get(`${this.baseurl}/traslado/solicitud/diagnosticos?id_ingreso=${this.id_ingreso}`)
					.then(response => (this.diagnosticos_paciente= response.data))

				var date1= new Date(this.fecha);
				var date2= new Date(this.datos_paciente.fecha_nacimiento);

				let edad = date1.getFullYear() - date2.getFullYear()
				let diferenciaMeses = date1.getMonth() - date2.getMonth()
				if ( diferenciaMeses < 0 || (diferenciaMeses === 0 && date1.getDate() < date2.getDate())) {
				    edad--
				}
				
				this.edad_paciente= edad+' Años';
    		},
    	},

    	methods: {
    		Recargar: function() {
    			window.location = `${this.baseurl}/traslado/solicitud`;
    		},

    		MostrarModalCamas: function() {
    			axios
    				.get(`${this.baseurl}/traslado/solicitud/camas`)
    				.then(response =>(this.camas= response.data))

				$('#Modal-camas').modal('show');
			},

			busqueda: function() {
				axios
	    			.get(`${this.baseurl}/traslado/solicitud/camas?tipo_habitacion=${this.busqueda_cama.tipo_habitacion}&nro_habitacion=${this.busqueda_cama.nro_habitacion}&codigo_cama=${this.busqueda_cama.cod_cama}&tipo_cama=${this.busqueda_cama.tipo_cama}`)
	    			.then(response =>(this.camas= response.data))
			},

			seleccionarCama: function(id_cama) {
				$('#Modal-camas').modal('hide');
				this.cama_seleccionada.id_cama = id_cama;
				for (var i = 0; i < this.camas.length; i++) {
					if (this.camas[i].id_cama == this.cama_seleccionada.id_cama) {
						this.cama_seleccionada.codigo_cama = this.camas[i].cod_cama;
					}
				}
				this.buscarIngresoCama(this.cama_seleccionada.id_cama);
			},

			buscarIngresoCama: function(id_cama) {
				axios
					.get(`${this.baseurl}/traslado/solicitud/ingreso_cama?cama_id=${id_cama}`)
					.then(response => (this.datos_paciente= response.data))
					.catch(e => {
						this.alertas= e.response.data.errors;
						$('#Warning-1').modal("show");

						this.datos_paciente = "";
						this.edad_paciente= "";
						this.diagnosticos_paciente= [];
					})
			},

			buscarIngreso: function(id_ingreso) {
				axios
					.get(`${this.baseurl}/traslado/solicitud/ingreso?ingreso_id=${id_ingreso}`)
					.then(response => (this.datos_paciente= response.data))
					.catch(e => {
						this.alertas= e.response.data.errors;
						$('#Warning-1').modal("show");

						this.datos_paciente = "";
						this.edad_paciente = "";
						this.diagnosticos_paciente= [];
					})
			},

			tipoTraslado: function(id_tipo_traslado) {
				if (id_tipo_traslado == 1) {
					this.servicio_solicitado.id_servicio = this.datos_paciente.id_servicio;
					this.servicio_solicitado.tipo_servicio = this.datos_paciente.tipo_servicio;
					this.blockSelect= true;
				} else {
					this.servicio_solicitado.id_servicio = '';
					this.servicio_solicitado.tipo_servicio = '';
					this.blockSelect= false;
				}
			},

			tipoServicio: function(id_servicio) {
				for (var i = 0; i < this.servicios.length; i++) {
					if (id_servicio == this.servicios[i].id_servicio) {
						if (this.servicios[i].tipo_servicio == 'HOSP') {
							this.servicio_solicitado.tipo_servicio = 'HOSPITALIZACION';
						} else {
							this.servicio_solicitado.tipo_servicio = 'EMERGENCIA';
						}
					}
				}
			},

			enviarFormulario: function() {
				var formData= new FormData(document.querySelector("form#form-traslado-paciente"));
				formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);
					
				if (this.blockSelect) {
					formData.append('servicio_solicitado', this.servicio_solicitado.id_servicio);
				}

				axios({
    				method:'post',
    				url: `${this.baseurl}/traslado/solicitud/registrar`,
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
			},
    	},
	}
</script>