<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div v-if="nueva_admision" class="text-center">
				<h3 class="title-sigehos">Registrar Admision</h3><hr>
			</div>
			<div v-else class="text-center">
				<h3 class="title-sigehos">Modificar Admision</h3><hr>
			</div>

			<form id="form-admision-paciente">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-6">
										<label for="">Numero Ingreso:</label>
										<input type="text" class="form-control" name="numero_ingreso" v-model="numIngreso" @change="buscarDatosIngreso">
									</div>
									<div class="col-md-6">
										<label for="">Fecha:</label>
										<input type="text" class="form-control" readonly name="fecha_actual" :value="fecha">
									</div>					
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group box-border">
							<div class="form-group p-2 text-center">
								<button type="button" @click="registrarAdmision" class="btn boton-espaciado" :class="{'disabled':nueva_admision, 'btn-outline-success':nueva_admision, 'btn-success':!nueva_admision}"><i class="ti-plus"></i></button>
								<button type="button" @click="editarAdmision" class="btn boton-espaciado" :class="{'disabled':!nueva_admision, 'btn-outline-info':!nueva_admision, 'btn-info':nueva_admision}"><i class="ti-pencil"></i></button>
								<button type="button" @click="enviarFormulario" class="btn btn-primary boton-espaciado"><i class="ti-save"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':nueva_admision, 'btn-outline-info':nueva_admision, 'btn-info':!nueva_admision}"><i class="ti-search"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':nueva_admision, 'btn-outline-danger':nueva_admision, 'btn-danger':!nueva_admision}"><i class="ti-minus"></i></button>
								<button @click="Recargar" type="button" class="btn btn-secondary boton-espaciado"><i class="ti-reload"></i></button>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<label>Datos del Paciente:</label>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group p-2">
										<div class="form-row p-2">
											<label for="">Cedula:</label>
											<div class="col-md-2">
												<select name="Tipo_cedula" v-model="tipo_cedula" class="custom-select">
													<option value=""></option>
													<option value="V">V</option>
													<option value="E">E</option>
													<option value="I">I</option>
												</select>
											</div>
											<div class="col-md-8">
												<input type="text" class="form-control" v-model="cedula" name="cedula" placeholder="cedula o pasaporte">
											</div>
										</div>
										<div class="form-row">
											<label for="apellidos">Apellidos:</label>
											<input type="text" class="form-control" id="apellidos" readonly name="apellidos" placeholder="Apellidos" v-model="apellidos">
										</div>
										<div class="form-row">
											<label for="nombres">Nombres:</label>
											<input type="text" class="form-control" id="nombres" readonly name="nombres" placeholder="Nombres" v-model="nombres">
										</div>
									</div>
								</div>
								<div class="col-md-2">
									<button type="button" class="btn btn-outline-success boton-espaciado" @click="paginaRegistro"><i class="ti-user"></i></button>
									<button type="button" class="btn btn-outline-info boton-espaciado" @click="busquedaPaciente"><i class="ti-search"></i></button>
								</div>
								<div class="col-md-4">
									<div class="form-group box-border">
										<label for="">Historia Medica:</label>
										<div class="form-group p-2">
											<div class="form-row">
												<div class="col-md-4">
													<label for="">Numero:</label>
													<input type="text" class="form-control" name="numero_historia" v-model="historia" @change="buscarPacienteHistoria">
												</div>
												<div class="col-md-8">
													<label for="">Fecha:</label>
													<input type="text" class="form-control" readonly name="fecha_historia" v-model="fecha_historia">
												</div>					
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-4">
										<label>Sexo:</label>
										<input type="text" class="form-control" readonly name="sexo" placeholder="Sexo" v-model="sexo">
									</div>
									<div class="col-md-4">
										<label>Fecha de Nacimiento:</label>
										<input type="text" class="form-control" name="fecha_nacimiento" placeholder="Fecha Nacimiento" readonly v-model="fecha_nacimiento">
									</div>
									<div class="col-md-4">
										<label>Estado Civil:</label>
										<input type="text" class="form-control" name="estado_civil" placeholder="Estado Civil" readonly v-model="estado_civil">
									</div>
								</div>
							</div>
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-4">
										<label>Nacionalidad:</label>
										<input type="text" class="form-control" name="nacionalidad" placeholder="Nacionalidad" readonly v-model="nacionalidad">
									</div>
									<div class="col-md-4">
										<label>Zona:</label>
										<input type="text" class="form-control" name="zona" placeholder="Zona" readonly v-model="zona">
									</div>
									<div class="col-md-4">
										<label>Telefono:</label>
										<input type="text" class="form-control" name="telefono" placeholder="Telefono" readonly v-model="telefono">
									</div>
								</div>
							</div>
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-6">
										<label for="">Direccion (Domicilio):</label>
										<textarea class="form-control" rows="4" type="text" name="domicilio" readonly v-model="domicilio"></textarea>
									</div>
									<div class="col-md-6">
										<label>Referido por:</label>
										<select class="custom-select" id="referido" name="referido" v-model="referido">
											<option value="">Referido</option>
											<option v-for="referencia in referencias" :value="referencia.id_referencia">
												{{referencia.descripcion}}
											</option>
										</select>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="text-center">
								<span class="p-2">Datos de :</span>
								<div class="form-check form-check-inline" @click="check_h">
								  	<input class="form-check-input" type="radio" name="tipo_ingreso" id="radio_hospitalizacion" value="HOSP" :checked="radio=='HOSP'">
								  	<label class="form-check-label check-azul" for="radio_hospitalizacion">
										Hospitalizacion
								  	</label>
								</div>
								<div class="form-check form-check-inline" @click="check_e">
								  	<input class="form-check-input" type="radio" name="tipo_ingreso" id="radio_emergencia" value="EMER" :checked="radio=='EMER'">
								  	<label class="form-check-label check-rojo" for="radio_emergencia">
								    	Emergencia
								  	</label>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-7">
									<div class="form-group p-2">
										<div class="form-row">
											Servicio Tratante:
											<select class="custom-select" @change="buscarCamas(servicio_seleccionado)" v-model="servicio_seleccionado" id="servicio_tratante" name="servicio_tratante" :disabled="!nueva_admision">
												<option value="">Servicio</option>
												<option v-for="servicio in servicios" :value="servicio.id_servicio">
													{{servicio.descripcion}}
												</option>
											</select>
										</div>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group p-2">
										<div class="form-row">
											<div class="col-md-6">
												Codigo: {{servicio_codigo}}
											</div>
											<div class="col-md-6">
												Piso: {{servicio_piso}}
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-4">
									<div class="form-group p-2">
										<label>Cama:</label>
										<div class="form-row form-inline">
											<input type="text" name="cama" class="form-control" v-model="codigo_cama" placeholder="codigo cama" readonly>
											<button type="button" @click="MostrarModalCamas" class="btn btn-outline-secondary boton-espaciado" :disabled="!nueva_admision">...</button>
										</div>
										<div class="form-row">
											Total disponibles: {{totalCamas}}
										</div>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group box-border">
										<div class="form-row p-2">
											Tipo Cama Seleccionada: {{tipo_cama}}
										</div>
										<div class="form-row p-2">
											<div class="col-md-6">
												Tipo Hab: {{tipo_habitacion}}
											</div>
											<div class="col-md-6">
												Nro Hab: {{num_habitacion}}
											</div> 
										</div>
										<div class="form-row p-2">
											Servicio Ubicacion: {{servicio_cama}}
										</div>
									</div>
								</div>
							</div>
							<hr>
							<div class="form-row">
								<div class="col-md-6">
									<div class="form-group p-2">
										<label>Causa de Atencion:</label>
										<select class="custom-select" @change="buscarClasificaciones(causa_atencion_seleccionada)" v-model="causa_atencion_seleccionada" name="causa_atencion">
											<option value="">Causa</option>
											<option v-for="causa_atencion in causas_atencion" :value="causa_atencion.id_causa_atencion">
												{{causa_atencion.descripcion}}
											</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group p-2">
										<label>Clasificacion</label>
										<select class="custom-select" name="codigo_clasificacion_causa" v-model="clasif_causa">
											<option value="">Clasificacion</option>
											<option v-for="clasificacion_causa in clasificaciones_causas" :value="clasificacion_causa.cod_clasificacion">
												{{clasificacion_causa.descripcion}}
											</option>
										</select>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-8">
									<div class="form-group p-2">
										<label>Medico:</label>
										<div class="form-inline">
											<input type="text" name="medico" v-model="datos_medico" class="form-control" style="width: 80%" :disabled="!nueva_admision">
											<button type="button" @click="MostrarModalMedicos" class="btn btn-outline-secondary boton-espaciado" :disabled="!nueva_admision">...</button>
										</div>
									</div>
								</div>
							</div>
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group p-2">
										<div class="form-inline">
											Diagnosticos de Admision (CIE-10):
											<div class="align-content-end">
												<button type="button" @click="MostrarModalDiagnosticos" class="btn btn-outline-success boton-espaciado"><i class="ti-plus"></i></button>
												<button type="button" @click="removerDiagnostico" class="btn btn-outline-danger boton-espaciado"><i class="ti-minus"></i></button>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="table-responsive p-2">
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
							<div class="form-row">
								<div class="col-md-12">
									<div class="form-group p-2">
										<div class="form-row">
											<div class="col-md-6">
												<label>Diagnostico (General):</label>
												<input type="text" name="diagnostico_general" class="form-control" placeholder="Diagnostico General">
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
        								<input type="text" class="form-control" v-model="busqueda_cama.tipo_habitacion" @change="busqueda(servicio_seleccionado)">
        							</div>
        							<div class="col-md-2">
        								<label>Nro. Hab.</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.nro_habitacion" @change="busqueda(servicio_seleccionado)">
        							</div>
        							<div class="col-md-2">
        								<label>Cod. Cama</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.cod_cama" @change="busqueda(servicio_seleccionado)">
        							</div>
        							<div class="col-md-3">
        								<label>Tipo Cama</label>
        								<input type="text" class="form-control" v-model="busqueda_cama.tipo_cama" @change="busqueda(servicio_seleccionado)">
        							</div>
        							<div class="col-md-1" style="top: 31px">
        								<button @click="busqueda(servicio_seleccionado)" type="button" class="btn btn-outline-secondary"><i class="ti-angle-double-right"></i></button>
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

			<div id="Modal-medicos" class="modal" tabindex="-1" role="dialog">
  				<div class="modal-dialog modal-lg" role="document">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title">Seleccione un medico</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
        					<!--Aca ira todo el cuadro de las medicos-->
        					<div class="table-responsive p-2">
								<table class="table table-hover table-bordered custom-table">
									<thead class="thead">
										<tr class="text-center ">
											<th scope="col">Apellidos</th>
											<th scope="col">Nombres</th>
											<th scope="col">Servicio</th>
											<th scope="col">Subespecialidad</th>
											<th scope="col">Cargo Medico</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr v-for="medico in medicos" @click="seleccionarMedico(medico.id_medico)">
											<td>{{medico.apellidos}}</td>
											<td>{{medico.nombres}}</td>
											<td>{{medico.servicio}}</td>
											<td>{{medico.subespecialidad}}</td>
											<td>{{medico.cargo}}</td>
										</tr>
									</tbody>
								</table>
							</div>
     	 				</div>
    				</div>
  				</div>
			</div>

			<div id="Modal-diagnosticos" class="modal" tabindex="-1" role="dialog">
  				<div class="modal-dialog modal-lg" role="document">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title">Seleccione el diagnostico</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
        					<div class="form-group p-2">
        						<div class="form-row">
        							<div class="col-md-8">
        								<label>Diagnostico</label>
        								<input type="text" class="form-control" v-model="busqueda_diagnostico.diagnostico" @change="busqueda_diagnosticos">
        							</div>
        							<div class="col-md-3">
        								<label>Codigo</label>
        								<input type="text" class="form-control" v-model="busqueda_diagnostico.codigo" @change="busqueda_diagnosticos">
        							</div>
        							<div class="col-md-1" style="top: 31px">
        								<button @click="busqueda(servicio_seleccionado)" type="button" class="btn btn-outline-secondary"><i class="ti-angle-double-right"></i></button>
        							</div>
        						</div>
        					</div>
        					<div class="table-responsive p-2">
								<table class="table table-hover table-bordered custom-table">
									<thead class="thead">
										<tr class="text-center ">
											<th scope="col">Diagnostico</th>
											<th scope="col">Codigo</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr v-for="diagnostico in diagnosticos" @click="seleccionarDiagnostico(diagnostico.id_diagnostico)">
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

			<div id="Success-1" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
			      		<div class="modal-body">
			        		<p class="text-center modal-mensaje">La admision ha sido registrada con exito.</p>
			      		</div>
			      		<div class="modal-footer">
					        <button @click="Recargar" type="button" class="btn btn-primary">Registrar Nueva Admision</button>
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
				numIngreso: "",
				fecha: "",
				tipo_cedula: "",
				id_paciente:"",
				cedula: "",
				apellidos: "",
				nombres: "",
				sexo: "",
				fecha_nacimiento: "",
				estado_civil: "",
				nacionalidad: "",
				zona: "",
				telefono: "",
				fecha_historia: "",
				historia: "",
				domicilio: "",
				alertas: [],
				servicios: [],
				servicio_seleccionado: "",
				totalCamas: null,
				camas:[],
				cama_seleccionada: "",
				tipo_habitacion: "",
				num_habitacion: "",
				codigo_cama: "",
				tipo_cama: "",
				servicio_cama: "",
				causas_atencion: [],
				causa_atencion_seleccionada: "",
				clasificaciones_causas: "",
				medicos: [],
				medico_seleccionado: "",
				datos_medico: "",
				diagnosticos_paciente: [],
				diagnosticos: [],
				radio: 'HOSP',
				servicio_piso:"",
				servicio_codigo:"",
				referencias: [],
				medico_cedula: "",
				cama_id: "",
				nueva_admision: true,
				busqueda_cama: {
    				tipo_habitacion: "",
    				nro_habitacion: "",
    				cod_cama: "",
    				tipo_cama: "",
    			},
    			busqueda_diagnostico: {
    				diagnostico: "",
    				codigo: ""
    			},
    			referido: "",
    			clasif_causa: "",
			}
		},

		created () {
			axios
    			.get(`${this.baseurl}/admision/numIngreso`)
    			.then(response =>(this.numIngreso= response.data))

    		axios
    			.get(`${this.baseurl}/admision/fecha`)
    			.then(response =>(this.fecha= response.data))

    		axios
    			.get(`${this.baseurl}/admision/causas_atencion`)
    			.then(response =>(this.causas_atencion= response.data))

    		axios
    			.get(`${this.baseurl}/consulta/servicios?tipo=${this.radio}`)
    			.then(response => (this.servicios= response.data))

    		axios
    			.get(`${this.baseurl}/admision/referencias`)
    			.then(response =>(this.referencias= response.data))	
		},

		watch: {
			camas: function(newValue) {
				this.totalCamas= newValue.length;
			},
		},

		mounted () {
    		var baseurl = this.baseurl;
    		$("#Success-1").on('hidden.bs.modal', function () {
		    	window.location = `${baseurl}/admision`;
		    });

    		var busqueda = this.busqueda_cama;
		    $("#Modal-camas").on('hidden.bs.modal', function () {
		    	busqueda.tipo_habitacion= "";
		    	busqueda.nro_habitacion= "";
		    	busqueda.cod_cama= "";
		    	busqueda.tipo_cama= "";
		    });

		    var busqueda_diagnostico = this.busqueda_diagnostico;
		    $("#Modal-diagnosticos").on('hidden.bs.modal', function () {
		    	busqueda_diagnostico.diagnostico= "";
		    	busqueda_diagnostico.codigo= "";
		    });
    	},

		methods: {
			busquedaPaciente: function() {

				if (this.nueva_admision) {
					var formData = new FormData();
					formData.append('tipo_cedula', this.tipo_cedula);
					formData.append('cedula', this.cedula);

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/busquedaPaciente`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				if (data.data.segundo_apellido == null) {
	    					this.apellidos= data.data.primer_apellido;
	    				} else {
	    					this.apellidos= data.data.primer_apellido + " " + data.data.segundo_apellido;
	    				}
	    				
	    				if (data.data.segundo_nombre == null) {
	    					this.nombres = data.data.primer_nombre
	    				} else {
	    					this.nombres = data.data.primer_nombre + " " + data.data.segundo_nombre;
	    				}
	    				
	    				if (data.data.sexo == 'F') {
	    					this.sexo= 'Femenino';
	    				} else {
	    					this.sexo= 'Masculino';
	    				}

	    				this.id_paciente= data.data.id_paciente;
	    				this.fecha_nacimiento= data.data.fecha_nacimiento;
	    				this.estado_civil= data.data.edo_civil;
	    				this.nacionalidad = data.data.nacionalidad;
	    				this.zona = data.data.zona;
	    				this.telefono = data.data.telefono;
	    				this.fecha_historia = data.data.fecha_historia;
	    				this.historia= data.data.historia;
	    				this.domicilio= data.data.direccion;
	    			})
	    			.catch(e => {
	    				this.apellidos= "";
	    				this.nombres="";
	    				this.sexo="";
	    				this.id_paciente= "";
	    				this.fecha_nacimiento= "";
	    				this.estado_civil= "";
	    				this.nacionalidad = "";
	    				this.zona = "";
	    				this.telefono = "";
	    				this.fecha_historia = "";
	    				this.historia= "";
	    				this.domicilio= "";

	    				this.alertas= e.response.data.errors;
	    				$('#Warning-1').modal("show");
	    			})
				} else {
					var formData = new FormData();
					formData.append('tipo_cedula', this.tipo_cedula);
					formData.append('cedula', this.cedula);

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/busquedaIngresoCedula`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				this.numIngreso = data.data.id_ingreso;
	    				this.fecha = data.data.fecha_ingreso;
	    				this.referido = data.data.id_referencia;
	    				this.servicio_seleccionado = data.data.servicio;

	    				if (data.data.id_tipo_servicio == 1) {
	    					this.check_e();
	    				} else if (data.data.id_tipo_servicio == 2) {
	    					this.check_h();
	    				}

						this.buscarCamasModificacion(this.servicio_seleccionado);

						for (var i = 0; i < this.camas.length; i++) {
							if (this.camas[i].id_cama == data.data.id_cama_inicial) {
								this.cama_id= this.camas[i].id_cama;
								this.tipo_habitacion= this.camas[i].tipo_hab;
								this.num_habitacion= this.camas[i].num_hab;
								this.codigo_cama= this.camas[i].cod_cama;
								this.tipo_cama= this.camas[i].tipo_cama;
								this.servicio_cama= this.camas[i].servicio;
							}
						}

						this.causa_atencion_seleccionada= data.data.id_causa_atencion;
						this.datos_medico = data.data.nombre_medico;
						this.diagnosticosPaciente(this.numIngreso);
						this.buscarClasificaciones(this.causa_atencion_seleccionada);

						for (var i = 0; i < this.clasificaciones_causas.length; i++) {
							if (this.clasificaciones_causas[i].cod_clasificacion == data.data.cod_clasf_causa) {
								this.clasif_causa= data.data.cod_clasf_causa;
							}
						}

	    				if (data.data.segundo_apellido == null) {
	    					this.apellidos= data.data.primer_apellido;
	    				} else {
	    					this.apellidos= data.data.primer_apellido + " " + data.data.segundo_apellido;
	    				}
	    				
	    				if (data.data.segundo_nombre == null) {
	    					this.nombres = data.data.primer_nombre
	    				} else {
	    					this.nombres = data.data.primer_nombre + " " + data.data.segundo_nombre;
	    				}
	    				
	    				if (data.data.sexo == 'F') {
	    					this.sexo= 'Femenino';
	    				} else {
	    					this.sexo= 'Masculino';
	    				}

	    				this.id_paciente= data.data.id_paciente;
	    				this.fecha_nacimiento= data.data.fecha_nacimiento;
	    				this.estado_civil= data.data.edo_civil;
	    				this.nacionalidad = data.data.nacionalidad;
	    				this.zona = data.data.zona;
	    				this.telefono = data.data.telefono;
	    				this.fecha_historia = data.data.fecha_historia;
	    				this.historia= data.data.historia;
	    				this.domicilio= data.data.direccion;
	    			})
	    			.catch(e => {
	    				this.numIngreso= "";
	    				this.fecha= "";
	    				this.tipo_cedula = "";
	    				this.cedula= "";
	    				this.apellidos= "";
	    				this.nombres="";
	    				this.sexo="";
	    				this.id_paciente= "";
	    				this.fecha_nacimiento= "";
	    				this.estado_civil= "";
	    				this.nacionalidad = "";
	    				this.zona = "";
	    				this.telefono = "";
	    				this.fecha_historia = "";
	    				this.historia= "";
	    				this.domicilio= "";

	    				this.alertas= e.response.data.errors;
	    				$('#Warning-1').modal("show");
	    			})
				}
			},

			buscarPacienteHistoria: function() {
				if (this.nueva_admision) {
					var formData = new FormData();
					formData.append('num_historia', this.historia);
					
					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/busquedaPacienteHistoria`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				if (data.data.segundo_apellido == null) {
	    					this.apellidos= data.data.primer_apellido;
	    				} else {
	    					this.apellidos= data.data.primer_apellido + " " + data.data.segundo_apellido;
	    				}
	    				
	    				if (data.data.segundo_nombre == null) {
	    					this.nombres = data.data.primer_nombre
	    				} else {
	    					this.nombres = data.data.primer_nombre + " " + data.data.segundo_nombre;
	    				}
	    				
	    				if (data.data.sexo == 'F') {
	    					this.sexo= 'Femenino';
	    				} else {
	    					this.sexo= 'Masculino';
	    				}

						this.tipo_cedula= data.data.tipo_cedula;
						this.cedula= data.data.cedula;
	    				this.id_paciente= data.data.id_paciente;
	    				this.fecha_nacimiento= data.data.fecha_nacimiento;
	    				this.estado_civil= data.data.edo_civil;
	    				this.nacionalidad = data.data.nacionalidad;
	    				this.zona = data.data.zona;
	    				this.telefono = data.data.telefono;
	    				this.fecha_historia = data.data.fecha_historia;
	    				this.historia= data.data.historia;
	    				this.domicilio= data.data.direccion;
	    			})
	    			.catch(e => {
	    				this.apellidos= "";
	    				this.nombres="";
	    				this.sexo="";
	    				this.tipo_cedula= "";
						this.cedula= "";
	    				this.id_paciente= "";
	    				this.fecha_nacimiento= "";
	    				this.estado_civil= "";
	    				this.nacionalidad = "";
	    				this.zona = "";
	    				this.telefono = "";
	    				this.fecha_historia = "";
	    				this.historia= "";
	    				this.domicilio= "";

	    				this.alertas= e.response.data.errors;
	    				$('#Warning-1').modal("show");
	    			})
				} else {
					var formData = new FormData();
					formData.append('num_historia', this.historia);
					
					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/busquedaIngresoHistoria`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				this.numIngreso = data.data.id_ingreso;
	    				this.fecha = data.data.fecha_ingreso;
	    				this.referido = data.data.id_referencia;
	    				this.servicio_seleccionado = data.data.servicio;

	    				if (data.data.id_tipo_servicio == 1) {
	    					this.check_e();
	    				} else if (data.data.id_tipo_servicio == 2) {
	    					this.check_h();
	    				}

						this.buscarCamasModificacion(this.servicio_seleccionado);

						for (var i = 0; i < this.camas.length; i++) {
							if (this.camas[i].id_cama == data.data.id_cama_inicial) {
								this.cama_id= this.camas[i].id_cama;
								this.tipo_habitacion= this.camas[i].tipo_hab;
								this.num_habitacion= this.camas[i].num_hab;
								this.codigo_cama= this.camas[i].cod_cama;
								this.tipo_cama= this.camas[i].tipo_cama;
								this.servicio_cama= this.camas[i].servicio;
							}
						}

						this.causa_atencion_seleccionada= data.data.id_causa_atencion;
						this.datos_medico = data.data.nombre_medico;
						this.diagnosticosPaciente(this.numIngreso);
						this.buscarClasificaciones(this.causa_atencion_seleccionada);

	    				if (data.data.segundo_apellido == null) {
	    					this.apellidos= data.data.primer_apellido;
	    				} else {
	    					this.apellidos= data.data.primer_apellido + " " + data.data.segundo_apellido;
	    				}
	    				
	    				if (data.data.segundo_nombre == null) {
	    					this.nombres = data.data.primer_nombre
	    				} else {
	    					this.nombres = data.data.primer_nombre + " " + data.data.segundo_nombre;
	    				}
	    				
	    				if (data.data.sexo == 'F') {
	    					this.sexo= 'Femenino';
	    				} else {
	    					this.sexo= 'Masculino';
	    				}

						this.tipo_cedula= data.data.tipo_cedula;
						this.cedula= data.data.cedula;
	    				this.id_paciente= data.data.id_paciente;
	    				this.fecha_nacimiento= data.data.fecha_nacimiento;
	    				this.estado_civil= data.data.edo_civil;
	    				this.nacionalidad = data.data.nacionalidad;
	    				this.zona = data.data.zona;
	    				this.telefono = data.data.telefono;
	    				this.fecha_historia = data.data.fecha_historia;
	    				this.historia= data.data.historia;
	    				this.domicilio= data.data.direccion;
	    			})
	    			.catch(e => {
	    				this.numIngreso = "";
	    				this.fecha = "";
	    				this.apellidos= "";
	    				this.nombres="";
	    				this.sexo="";
	    				this.tipo_cedula= "";
						this.cedula= "";
	    				this.id_paciente= "";
	    				this.fecha_nacimiento= "";
	    				this.estado_civil= "";
	    				this.nacionalidad = "";
	    				this.zona = "";
	    				this.telefono = "";
	    				this.fecha_historia = "";
	    				this.historia= "";
	    				this.domicilio= "";

	    				this.alertas= e.response.data.errors;
	    				$('#Warning-1').modal("show");
	    			})
				}
			},

			diagnosticosPaciente: function(id_ingreso) {
				axios
					.get(`${this.baseurl}/traslado/solicitud/diagnosticos?id_ingreso=${id_ingreso}`)
					.then(response => (this.diagnosticos_paciente= response.data))
			},

			paginaRegistro: function () {
				window.location = `${this.baseurl}/paciente`;
			},

			buscarCamas: function(id_servicio) {
				this.cama_seleccionada = "";
				this.tipo_habitacion= "";
				this.num_habitacion= "";
				this.codigo_cama= "";
				this.tipo_cama= "";
				this.servicio_cama= "";
				this.medico_seleccionado= "";
				this.datos_medico= "";

				for (var i = 0; i < this.servicios.length; i++) {
					if (id_servicio == this.servicios[i].id_servicio) {
						this.servicio_piso= this.servicios[i].piso;
						this.servicio_codigo= this.servicios[i].tipo;
					}
				}

				axios
					.get(`${this.baseurl}/admision/camas?servicio_id=${id_servicio}`)
					.then(response =>(this.camas= response.data))

				//adicionalmente se buscaran  los medicos segun el servicio
				axios
					.get(`${this.baseurl}/admision/medicos?servicio_id=${id_servicio}`)
					.then(response => (this.medicos = response.data))
			},

			buscarCamasModificacion: function(id_servicio) {
				this.cama_seleccionada = "";
				this.tipo_habitacion= "";
				this.num_habitacion= "";
				this.codigo_cama= "";
				this.tipo_cama= "";
				this.servicio_cama= "";
				this.medico_seleccionado= "";
				this.datos_medico= "";

				for (var i = 0; i < this.servicios.length; i++) {
					if (id_servicio == this.servicios[i].id_servicio) {
						this.servicio_piso= this.servicios[i].piso;
						this.servicio_codigo= this.servicios[i].tipo;
					}
				}

				axios
					.get(`${this.baseurl}/admision/camas?servicio_id=${id_servicio}`)
					.then(response =>(this.camas= response.data))

				//adicionalmente se buscaran  los medicos segun el servicio
				axios
					.get(`${this.baseurl}/admision/medicos?servicio_id=${id_servicio}`)
					.then(response => (this.medicos = response.data))
			},

			busqueda: function(id_servicio) {
				axios
	    			.get(`${this.baseurl}/admision/camas?servicio_id=${id_servicio}&tipo_habitacion=${this.busqueda_cama.tipo_habitacion}&nro_habitacion=${this.busqueda_cama.nro_habitacion}&codigo_cama=${this.busqueda_cama.cod_cama}&tipo_cama=${this.busqueda_cama.tipo_cama}`)
	    			.then(response =>(this.camas= response.data))
			},

			busqueda_diagnosticos: function() {
				axios
	    			.get(`${this.baseurl}/admision/diagnosticos?diagnostico=${this.busqueda_diagnostico.diagnostico}&codigo=${this.busqueda_diagnostico.codigo}`)
	    			.then(response =>(this.diagnosticos= response.data))
			},

			MostrarModalCamas: function() {
				if (this.servicio_seleccionado == "") {
					this.alertas= 'Debe seleccionar primero el servicio Tratante';
					$('#Warning-1').modal('show');
				} else {

					axios
						.get(`${this.baseurl}/admision/camas?servicio_id=${this.servicio_seleccionado}`)
						.then(response =>(this.camas= response.data))

					$('#Modal-camas').modal('show');
				}
			},

			MostrarModalMedicos: function() {
				if (this.servicio_seleccionado == "") {
					this.alertas= 'Debe seleccionar primero el servicio Tratante';
					$('#Warning-1').modal('show');
				} else {
					$('#Modal-medicos').modal('show');
				}
			},

			MostrarModalDiagnosticos: function() {
				axios
    				.get(`${this.baseurl}/admision/diagnosticos`)
    				.then(response =>(this.diagnosticos= response.data))

				$('#Modal-diagnosticos').modal('show');
			},

			seleccionarCama: function (id_cama) {
				$('#Modal-camas').modal('hide');
				this.cama_seleccionada = id_cama;
				for (var i = 0; i < this.camas.length; i++) {
					if (this.camas[i].id_cama == id_cama) {
						this.cama_id= this.camas[i].id_cama;
						this.tipo_habitacion= this.camas[i].tipo_hab;
						this.num_habitacion= this.camas[i].num_hab;
						this.codigo_cama= this.camas[i].cod_cama;
						this.tipo_cama= this.camas[i].tipo_cama;
						this.servicio_cama= this.camas[i].servicio;
					}
				}
			},

			seleccionarMedico: function(id_medico) {
				$('#Modal-medicos').modal('hide');
				this.medico_seleccionado= id_medico;
				for (var i = 0; i < this.medicos.length; i++) {
					if (this.medicos[i].id_medico == id_medico) {
						this.medico_cedula= this.medicos[i].cedula;
						this.datos_medico= this.medicos[i].apellidos + ' '+ this.medicos[i].nombres;
					}
				}
			},

			seleccionarDiagnostico: function(id_diagnostico) {
				$('#Modal-diagnosticos').modal('hide');
				for (var i = 0; i < this.diagnosticos.length; i++) {
					if (this.diagnosticos[i].id_diagnostico == id_diagnostico) {
						this.diagnosticos_paciente.push(this.diagnosticos[i]);
					}
				}
			},

			buscarClasificaciones: function(id_causa_atencion) {
				this.clasificaciones_causas= "";
				axios
					.get(`${this.baseurl}/admision/clasificaciones_causas?causa_atencion_id=${id_causa_atencion}`)
					.then(response =>(this.clasificaciones_causas= response.data))
			},

			removerDiagnostico: function() {
				this.diagnosticos_paciente.pop();
			},

			check_h: function() {
				this.radio= 'HOSP';

				axios
    				.get(`${this.baseurl}/consulta/servicios?tipo=${this.radio}`)
    				.then(response => (this.servicios= response.data))
			},

			check_e: function() {
				this.radio= 'EMER';
				
				axios
    				.get(`${this.baseurl}/consulta/servicios?tipo=${this.radio}`)
    				.then(response => (this.servicios= response.data))
			},

			enviarFormulario: function() {
				//tengo que ver como valido si es para registrar o para modificar el registro

				if (this.nueva_admision) {
					var formData= new FormData(document.querySelector("form#form-admision-paciente"));
					formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);
					formData.append('id_cama', this.cama_id);
					formData.append('id_paciente', this.id_paciente);
					formData.append('medico_cedula', this.medico_cedula);
					
					for (var i = 0; i < this.diagnosticos_paciente.length; i++) {
	    				formData.append('id_diagnosticos_paciente[]', this.diagnosticos_paciente[i].id_diagnostico);
	    				formData.append('diagnostico_paciente[]', this.diagnosticos_paciente[i].descripcion);
	    			}

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/registrar`,
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
				} else {
					var formData= new FormData(document.querySelector("form#form-admision-paciente"));
					formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);
					formData.append('id_cama', this.cama_id);
					formData.append('id_paciente', this.id_paciente);
					formData.append('medico_cedula', this.medico_cedula);
					
					for (var i = 0; i < this.diagnosticos_paciente.length; i++) {
	    				formData.append('id_diagnosticos_paciente[]', this.diagnosticos_paciente[i].id_diagnostico);
	    				formData.append('diagnostico_paciente[]', this.diagnosticos_paciente[i].descripcion);
	    			}

					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/modificar`,
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
    			window.location = `${this.baseurl}/admision`;
    		},

    		editarAdmision: function() {
    			this.nueva_admision = false;
    			this.numIngreso= "";
    			this.fecha= "";	
    			this.tipo_cedula= "";
				this.id_paciente="";
				this.cedula= "";
				this.apellidos= "";
				this.nombres= "";
				this.sexo= "";
				this.fecha_nacimiento= "";
				this.estado_civil= "";
				this.nacionalidad= "";
				this.zona= "";
				this.telefono= "";
				this.fecha_historia= "";
				this.historia= "";
				this.domicilio= "";
				this.servicio_seleccionado= "";
				this.totalCamas= null;
				this.camas=[];
				this.cama_seleccionada= "";
				this.tipo_habitacion= "";
				this.num_habitacion= "";
				this.codigo_cama= "";
				this.tipo_cama= "";
				this.servicio_cama= "";
				this.causa_atencion_seleccionada= "";
				this.clasificaciones_causas= "";
				this.medicos= [];
				this.medico_seleccionado= "";
				this.datos_medico= "";
				this.diagnosticos_paciente= [];
				this.radio= 'HOSP';
				this.servicio_piso="";
				this.servicio_codigo="";
				this.medico_cedula= "";
				this.cama_id= "";

				axios
					.get(`${this.baseurl}/admision/camas`)
					.then(response =>(this.camas= response.data))

				axios
    				.get(`${this.baseurl}/admision/diagnosticos`)
    				.then(response =>(this.diagnosticos= response.data))
    		},

    		registrarAdmision: function() {
    			this.nueva_admision= true;

    			axios
    			    .get(`${this.baseurl}/admision/numIngreso`)
    			    .then(response =>(this.numIngreso= response.data))

    			axios
    			    .get(`${this.baseurl}/admision/fecha`)
    			    .then(response =>(this.fecha= response.data))

    			axios
    			    .get(`${this.baseurl}/admision/causas_atencion`)
    			    .then(response =>(this.causas_atencion= response.data))

    			axios
    			    .get(`${this.baseurl}/consulta/servicios?tipo=${this.radio}`)
    			    .then(response => (this.servicios= response.data))

    			axios
    			    .get(`${this.baseurl}/admision/diagnosticos`)
    			    .then(response =>(this.diagnosticos= response.data))

    			axios
    			    .get(`${this.baseurl}/admision/referencias`)
    			    .then(response =>(this.referencias= response.data))

    			this.tipo_cedula= "";
				this.id_paciente="";
				this.cedula= "";
				this.apellidos= "";
				this.nombres= "";
				this.sexo= "";
				this.fecha_nacimiento= "";
				this.estado_civil= "";
				this.nacionalidad= "";
				this.zona= "";
				this.telefono= "";
				this.fecha_historia= "";
				this.historia= "";
				this.domicilio= "";
				this.servicio_seleccionado= "";
				this.totalCamas= null;
				this.camas=[];
				this.cama_seleccionada= "";
				this.tipo_habitacion= "";
				this.num_habitacion= "";
				this.codigo_cama= "";
				this.tipo_cama= "";
				this.servicio_cama= "";
				this.causa_atencion_seleccionada= "";
				this.clasificaciones_causas= "";
				this.medicos= [];
				this.medico_seleccionado= "";
				this.datos_medico= "";
				this.diagnosticos_paciente= [];
				this.radio= 'HOSP';
				this.servicio_piso="";
				this.servicio_codigo="";
				this.medico_cedula= "";
				this.cama_id= "";
    		},

    		buscarDatosIngreso: function() {
    			if (!this.nueva_admision) {
    				var formData = new FormData();
					formData.append('num_ingreso', this.numIngreso);
					
					axios({
	    				method:'post',
	    				url: `${this.baseurl}/admision/busquedaIngreso`,
	    				data: formData,
	    				headers: {'Content-Type': 'multipart/form-data'}
	    			})
	    			.then(data => {
	    				this.historia = data.data.historia;
	    				this.fecha = data.data.fecha_ingreso;
	    				this.referido = data.data.id_referencia;
	    				this.servicio_seleccionado = data.data.servicio;

	    				if (data.data.id_tipo_servicio == 1) {
	    					this.check_e();
	    				} else if (data.data.id_tipo_servicio == 2) {
	    					this.check_h();
	    				}

						this.buscarCamasModificacion(this.servicio_seleccionado);

						for (var i = 0; i < this.camas.length; i++) {
							if (this.camas[i].id_cama == data.data.id_cama_inicial) {
								this.cama_id= this.camas[i].id_cama;
								this.tipo_habitacion= this.camas[i].tipo_hab;
								this.num_habitacion= this.camas[i].num_hab;
								this.codigo_cama= this.camas[i].cod_cama;
								this.tipo_cama= this.camas[i].tipo_cama;
								this.servicio_cama= this.camas[i].servicio;
							}
						}

						this.causa_atencion_seleccionada= data.data.id_causa_atencion;
						this.datos_medico = data.data.nombre_medico;
						this.diagnosticosPaciente(this.numIngreso);
						this.buscarClasificaciones(this.causa_atencion_seleccionada);

						this.clasif_causa= data.data.cod_clasf_causa;

	    				if (data.data.segundo_apellido == null) {
	    					this.apellidos= data.data.primer_apellido;
	    				} else {
	    					this.apellidos= data.data.primer_apellido + " " + data.data.segundo_apellido;
	    				}
	    				
	    				if (data.data.segundo_nombre == null) {
	    					this.nombres = data.data.primer_nombre
	    				} else {
	    					this.nombres = data.data.primer_nombre + " " + data.data.segundo_nombre;
	    				}
	    				
	    				if (data.data.sexo == 'F') {
	    					this.sexo= 'Femenino';
	    				} else {
	    					this.sexo= 'Masculino';
	    				}

						this.tipo_cedula= data.data.tipo_cedula;
						this.cedula= data.data.cedula;
	    				this.id_paciente= data.data.id_paciente;
	    				this.fecha_nacimiento= data.data.fecha_nacimiento;
	    				this.estado_civil= data.data.edo_civil;
	    				this.nacionalidad = data.data.nacionalidad;
	    				this.zona = data.data.zona;
	    				this.telefono = data.data.telefono;
	    				this.fecha_historia = data.data.fecha_historia;
	    				this.historia= data.data.historia;
	    				this.domicilio= data.data.direccion;
	    			})
	    			.catch(e => {
	    				this.numIngreso = "";
	    				this.fecha = "";
	    				this.apellidos= "";
	    				this.nombres="";
	    				this.sexo="";
	    				this.tipo_cedula= "";
						this.cedula= "";
	    				this.id_paciente= "";
	    				this.fecha_nacimiento= "";
	    				this.estado_civil= "";
	    				this.nacionalidad = "";
	    				this.zona = "";
	    				this.telefono = "";
	    				this.fecha_historia = "";
	    				this.historia= "";
	    				this.domicilio= "";

	    				this.alertas= e.response.data.errors;
	    				$('#Warning-1').modal("show");
	    			})
    			}
    		},
		},
	}
</script>