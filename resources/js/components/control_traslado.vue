<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div class="text-center">
				<h3 class="title-sigehos">Control de Traslados</h3><hr>
			</div>

			<form id="form-control-traslado">
				<div class="form-row">
					<div class="col-md-6">
						<div class="form-group p-2">
							<div class="form-row">
								<div class="col-md-4">
									<label for="">Numero Ingreso:</label>
									<input type="text" class="form-control" v-model="id_ingreso" @change="buscarIngreso(id_ingreso)">
								</div>
								<div class="col-md-2" style="top: 31px">
									<button type="button" @click="MostrarModalTraslados" class="btn btn-outline-secondary">...</button>
								</div>
								<div class="col-md-6">
									<div class="form-row form-inline">
										<label style="margin-right: 10px">Nro Renglon: </label>
										<input type="text" class="form-control" readonly :value="datos_traslado.nro_renglon" style="width: 50%">
									</div>
									<div class="form-row" style="margin-top: 10px">
										<input type="text" class="form-control" :value="datos_traslado.estatus" style="width: 87%" readonly>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group box-border">
							<div class="form-group p-2 text-center">
								<button type="button" @click="procesarTraslado" class="btn boton-espaciado" :class="{'disabled':!modificar, 'btn-outline-success':!modificar, 'btn-success':modificar}"><i class="ti-plus"></i></button>
								<button type="button" @click="modificarTraslado" class="btn boton-espaciado" :class="{'disabled':modificar, 'btn-outline-info':modificar, 'btn-info':!modificar}"><i class="ti-pencil"></i></button>
								<button type="button" @click="enviarFormulario" class="btn btn-primary boton-espaciado"><i class="ti-save"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':!modificar, 'btn-outline-info':!modificar, 'btn-info':modificar}"><i class="ti-search"></i></button>
								<button type="button" class="btn boton-espaciado" :class="{'disabled':!modificar, 'btn-outline-danger':!modificar, 'btn-danger':modificar}"><i class="ti-minus"></i></button>
								<button @click="Recargar" type="button" class="btn btn-secondary boton-espaciado"><i class="ti-reload"></i></button>
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
											<input type="text" name="edad" class="form-control" :value="edad_paciente" disabled>
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
								<div class="col-md-12">
									<div class="form-group p-2">
										<div class="form-row">
											<div class="col-md-6">
												<label>Diagnosticos (General): </label>
												<input type="text" class="form-control" disabled>
											</div>
										</div>
									</div>
									<div class="form-group box-border">
										<div class="form-group p-2">
											<label>Diagnosticos de Admision (CIE-10): </label>
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
									<div class="form-group p-2">
										<div class="form-row">
											<div class="col-md-6 form-inline">
												<label style="margin-right: 10px">Fecha Solicitud: </label>
												<input type="text" class="form-control" style="width: 70%" :value="datos_traslado.fecha_solicitud" disabled>
											</div>
											<div class="col-md-6 form-inline">
												<label style="margin-right: 10px">Tipo Traslado: </label>
												<input type="text" class="form-control" :value="datos_traslado.tipo_traslado" style="width: 70%" disabled>
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
											<label><b>Actual</b></label>
											<div class="form-group">
												<div class="form-row">
													<div class="col-md-4">
														<label>Servicio Tratante: </label>
														<input type="text" class="form-control" :value="datos_paciente.servicio" disabled>
													</div>
													<div class="col-md-4">
														<label>Tipo Habitacion: </label>
														<input type="text" class="form-control" :value="datos_paciente.tipo_habitacion" disabled>
													</div>
													<div class="col-md-4">
														<label>Cama: </label>
														<input type="text" class="form-control" :value="cama_actual" disabled>
													</div>
												</div>
											</div>
											<div class="form-group">
												<div class="form-row">
													<div class="col-md-4">
														<label>Servicio Ubicacion: </label>
														<input type="text" class="form-control" :value="datos_paciente.servicio" disabled>
													</div>
													<div class="col-md-4">
														
													</div>
													<div class="col-md-4">
														<div class="form-check form-check-inline">
														  	<label class="form-check-label" style="margin-right: 10px" for="reservar_cama">Reservar cama actual</label>
														  	<input class="form-check-input" v-model="reservar_cama_actual" @click="check(reservar_cama_actual)" type="checkbox" id="reservar_cama" value=false>
														</div>
													</div>
												</div>
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
										<div class="form-group">
											<label><b>Solicitado</b></label>
											<div class="form-group">
												<div class="form-row">
													<div class="col-md-8">
														<div class="form-group">
															<div class="form-row">
																<div class="col-md-6">
																	<label>Servicio Tratante: </label>
																	<input type="text" class="form-control" :value="datos_traslado.servicio" disabled>
																</div>
																<div class="col-md-6">
																	<label>Tipo Habitacion: </label>
																	<input type="text" class="form-control" :value="datos_traslado.tipo_habitacion" disabled>
																</div>
															</div>
														</div>
														<div class="form-group">
															<div class="form-row">
																<div class="col-md-6">
																	<label>Servicio Ubicacion: </label>
																	<input type="text" class="form-control" :value="datos_traslado.servicio" disabled>
																</div>
															</div>
														</div>
													</div>
													<div class="col-md-4">
														<div class="form-group box-border">
															<div class="form-group p-2">
																<div class="form-group">
																	<div class="form-row">
																		<div class="col-md-8">
																			<label class="check-azul">Cama: </label>
																			<input type="text" class="form-control" :value="cama_seleccionada.codigo_cama" disabled>
																		</div>
																		<div class="col-md-4" style="top: 31px">
																			<button type="button" @click="MostrarModalCamas" class="btn btn-outline-secondary">...</button>
																		</div>
																	</div>
																</div>
																<div class="form-group">
																	<div class="form-row">
																		<div class="col-md-12">
																			<div class="form-check form-check-inline">
																			  	<label class="form-check-label" style="margin-right: 10px" for="reservar_cama">Paciente posee cama reservada</label>
																			  	<input class="form-check-input" type="checkbox" v-model="posee_cama_reservada" @click="check(posee_cama_reservada)" id="reservar_cama" value=false>
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
			        		<p class="text-center modal-mensaje">El control de traslado ha sido procesado con exito.</p>
			      		</div>
			      		<div class="modal-footer">
					        <button @click="Recargar" type="button" class="btn btn-primary">Registrar Nueva Solicitud</button>
					    </div>
			    	</div>
			  	</div>
			</div>

			<div id="Modal-traslados" class="modal" tabindex="-1" role="dialog">
  				<div class="modal-dialog modal-lg" role="document">
    				<div class="modal-content">
      					<div class="modal-header">
        					<h5 class="modal-title">Seleccione un Traslado</h5>
        					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          						<span aria-hidden="true">&times;</span>
        					</button>
      					</div>
      					<div class="modal-body">
        					<div class="table-responsive p-2">
								<table class="table table-hover table-bordered custom-table">
									<thead class="thead">
										<tr class="text-center ">
											<th scope="col">Fecha Solicitud</th>
											<th scope="col">Nro Ingreso</th>
											<th scope="col">Nro Renglon</th>
											<th scope="col">Nombre Paciente</th>
											<th scope="col">Sexo</th>
										</tr>
									</thead>
									<tbody class="text-center">
										<tr v-for="traslado_pendiente in traslados_pendientes" @click="seleccionarTraslado(traslado_pendiente.id_ingreso)">
											<td>{{traslado_pendiente.fecha}}</td>
											<td>{{traslado_pendiente.id_ingreso}}</td>
											<td>{{traslado_pendiente.nro_renglon}}</td>
											<td>{{traslado_pendiente.nombres}} {{traslado_pendiente.apellidos}}</td>
											<td>{{traslado_pendiente.sexo}}</td>
										</tr>
									</tbody>
								</table>
							</div>
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
				modificar: false,
				id_ingreso: "",
				datos_paciente: "",
				edad_paciente: "",
				diagnosticos_paciente: [],
				busqueda_cama: {
    				tipo_habitacion: "",
    				nro_habitacion: "",
    				cod_cama: "",
    				tipo_cama: "",
    			},
    			camas: [],
    			cama_seleccionada: {
    				id_cama: "",
    				codigo_cama: "",
    			},
    			alertas: "",
    			datos_traslado: "",
    			fecha: "",
    			cama_actual: "",
    			posee_cama_reservada: false,
    			reservar_cama_actual: false,
    			traslados_pendientes: [],
			}
		},

		created () {
			axios
    			.get(`${this.baseurl}/traslado/control/fecha`)
    			.then(response =>(this.fecha= response.data))
		},

		mounted () {
			var baseurl= this.baseurl;
		    $("#Success-1").on('hidden.bs.modal', function () {
		    	window.location = `${baseurl}/home`;
		    });
		},

		watch: {
    		datos_paciente: function(newData) {
    			//this.datos_paciente= newData;
    			this.cama_actual= this.datos_paciente.codigo_cama;

    			axios
					.get(`${this.baseurl}/traslado/control/diagnosticos?id_ingreso=${this.id_ingreso}`)
					.then(response => (this.diagnosticos_paciente= response.data))

				var date1= new Date(this.fecha);
				var date2= new Date(this.datos_paciente.fecha_nacimiento);

				let edad = date1.getFullYear() - date2.getFullYear()
				let diferenciaMeses = date1.getMonth() - date2.getMonth()
				if ( diferenciaMeses < 0 || (diferenciaMeses === 0 && date1.getDate() < date2.getDate())) {
				    edad--
				}
				
				this.edad_paciente= edad+' Años';

				axios
					.get(`${this.baseurl}/traslado/control/traslado?id_traslado=${this.datos_paciente.id_traslado}`)
					.then(response => (this.datos_traslado= response.data))

    		},
    	},

		methods: {
			buscarIngreso: function(id_ingreso) {
				axios
					.get(`${this.baseurl}/traslado/control/ingreso?ingreso_id=${id_ingreso}`)
					.then(response => (this.datos_paciente= response.data))
					.catch(e => {
						this.alertas= e.response.data.errors;
						$('#Warning-1').modal("show");

						this.datos_paciente = "";
						this.edad_paciente = "";
						this.diagnosticos_paciente= [];
					})
			},

			busqueda: function() {
				axios
	    			.get(`${this.baseurl}/traslado/control/camas?id_servicio=${this.datos_traslado.id_servicio}&tipo_habitacion=${this.busqueda_cama.tipo_habitacion}&nro_habitacion=${this.busqueda_cama.nro_habitacion}&codigo_cama=${this.busqueda_cama.cod_cama}&tipo_cama=${this.busqueda_cama.tipo_cama}`)
	    			.then(response =>(this.camas= response.data))
			},

			procesarTraslado: function() {
				this.modificar= false;
			},

			modificarTraslado: function() {
				this.modificar= true;
			},

			Recargar: function() {
				window.location = `${this.baseurl}/traslado/control`;
			},

			enviarFormulario: function() {
				var formData= new FormData(document.querySelector("form#form-control-traslado"));
				formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);

				formData.append('id_traslado', this.datos_paciente.id_traslado);
				formData.append('cama_solic', this.cama_seleccionada.id_cama);
				formData.append('servicio_solic', this.datos_traslado.id_servicio);

				axios({
    				method:'post',
    				url: `${this.baseurl}/traslado/control/procesar`,
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
			},

			MostrarModalCamas: function() {
    			if (this.datos_traslado== "") {
    				this.alertas="Atencion: Primero debe seleccionar un traslado";
    				$('#Warning-1').modal("show");
    			} else {
    				axios
    					.get(`${this.baseurl}/traslado/control/camas?id_servicio=${this.datos_traslado.id_servicio}`)
    					.then(response =>(this.camas= response.data))

					$('#Modal-camas').modal('show');
    			}
			},

			seleccionarCama: function(id_cama) {
				$('#Modal-camas').modal('hide');
				this.cama_seleccionada.id_cama = id_cama;
				for (var i = 0; i < this.camas.length; i++) {
					if (this.camas[i].id_cama == this.cama_seleccionada.id_cama) {
						this.cama_seleccionada.codigo_cama = this.camas[i].cod_cama;
					}
				}

				this.busqueda_cama.tipo_habitacion= "";
    			this.busqueda_cama.nro_habitacion= "";
    			this.busqueda_cama.cod_cama= "";
    			this.busqueda_cama.tipo_cama= "";
			},

			seleccionarTraslado: function(id_ingreso) {
				$('#Modal-traslados').modal('hide');
				this.id_ingreso= id_ingreso;
				this.buscarIngreso(id_ingreso);
			},

			check: function(value) {
				value= !value;
			},

			MostrarModalTraslados: function() {
				axios
    				.get(`${this.baseurl}/traslado/control/traslados`)
    				.then(response =>(this.traslados_pendientes= response.data))

				$('#Modal-traslados').modal('show');
			},
		},	
	}
</script>