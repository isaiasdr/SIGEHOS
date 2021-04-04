<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div class="text-center">
				<h3 class="title-sigehos">Generacion Reportes (Admision)</h3><hr>
			</div>

			<form id="form-reportes">
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>SELECCIONE REPORTE</b></label>
								<select class="custom-select" v-model="opcion_reporte">
									<option value="" selected>Seleccione un reporte</option>
									<option value="1">Pacientes Admitidos</option>
									<option value="2">Traslado de pacientes</option>
									<option value="3">Camas</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="form-row">
					<div class="col-md-12">
						<div class="form-group box-border">
							<div class="form-group p-2">
								<label><b>Opciones</b></label>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-12">
											Tipo de Admision: 
											<div class="form-check form-check-inline">
								  				<input class="form-check-input" type="checkbox" v-model="check_h" id="check_hospitalizacion" value="H">
								  				<label class="form-check-label check-azul" for="check_hospitalizacion">Hospitalizacion</label>
											</div>
											<div class="form-check form-check-inline">
								  				<input class="form-check-input" type="checkbox" v-model="check_e" id="check_emergencia" value="E">
								  				<label class="form-check-label check-rojo" for="check_emergencia">Emergencia</label>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<div class="col-md-12">
											<div class="form-group box-border">
												<div class="form-group p-2">
													<label><b>Fechas</b></label>
													<div class="form-row">
														<div class="col-md-6">
															<label for="datepicker_reportes_desde">Desde:</label>
															<b-form-datepicker id="datepicker_reportes_desde" size="sm" local="es" menu-class="w-100" calendar-width="100%" :max="max_date" v-model="fecha_desde" class="mb-2" placeholder="Seleccione una fecha"></b-form-datepicker> 
														</div>
														<div class="col-md-6">
															<label for="datepicker_reportes_hasta">Hasta:</label>
															<b-form-datepicker id="datepicker_reportes_hasta" size="sm" local="es" menu-class="w-100" calendar-width="100%" :max="max_date" v-model="fecha_hasta" class="mb-2" placeholder="Seleccione una fecha"></b-form-datepicker>
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
				<div class="text-center">
					<!--<button type="button" class="btn btn-outline-secondary" @click="generarReporte">Ver Reporte</button>-->
					<a :href="ruta" class="btn btn-outline-secondary" :class="{'disabled':disabled}">Ver Reporte</a>
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

			<div id="Success-1" class="modal" tabindex="-1" role="dialog">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
			      		<div class="modal-body">
			        		<p class="text-center modal-mensaje">El reporte ha sido generado con exito.</p>
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

    		message: {
    			type: String,
    			required: false
    		}
    	},

    	data () {
    		return {
    			alertas: "",
    			max_date: "",
    			fecha_desde: "",
    			fecha_hasta: "",
    			check_h: true,
    			check_e: true,
    			opcion_reporte: "",
    			ruta: "",
    			disabled: true,
    		}
    	},

    	mounted () {
    		const now= new Date();
      		const today= new Date(now.getFullYear(), now.getMonth(), now.getDate());
      		this.max_date= new Date(today);

      		this.checkMessage();
    	},

    	watch: {
    		opcion_reporte: function(newValue) {
    			if (newValue==1) {
    				this.ruta= `${this.baseurl}/reportes/ingresos?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			} else if (newValue == 2) {
    				this.ruta= `${this.baseurl}/reportes/traslados?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			} else if (newValue == 3) {
    				this.ruta= `${this.baseurl}/reportes/camas?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			}

    			if (this.fecha_desde != "" && this.fecha_hasta != "") {
    				if (this.fecha_desde > this.fecha_hasta) {
	    				this.disabled = true;
	    			} else {
	    				this.disabled = false;
	    			}
    			}
    		},

  			fecha_desde: function() {

  				if (this.opcion_reporte == 1) {
  					this.ruta= `${this.baseurl}/reportes/ingresos?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				} else if (this.opcion_reporte == 2) {
    				this.ruta= `${this.baseurl}/reportes/traslados?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			} else if (this.opcion_reporte == 3) {
    				this.ruta= `${this.baseurl}/reportes/camas?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			}

  				if (this.fecha_desde != "" && this.fecha_hasta != "") {
    				if (this.fecha_desde > this.fecha_hasta) {
	    				this.disabled = true;
	    			} else {
	    				this.disabled = false;
	    			}
    			}
  			},

  			fecha_hasta: function() {

  				if (this.opcion_reporte == 1) {
  					this.ruta= `${this.baseurl}/reportes/ingresos?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				} else if (this.opcion_reporte == 2) {
    				this.ruta= `${this.baseurl}/reportes/traslados?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			} else if (this.opcion_reporte == 3) {
    				this.ruta= `${this.baseurl}/reportes/camas?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
    			}

  				if (this.fecha_desde != "" && this.fecha_hasta != "") {
    				if (this.fecha_desde > this.fecha_hasta) {
	    				this.disabled = true;
	    			} else {
	    				this.disabled = false;
	    			}
    			}
  			},

  			check_h: function() {
  				if (this.opcion_reporte==1) {
  					this.ruta= `${this.baseurl}/reportes/ingresos?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;	
  				} else if (this.opcion_reporte == 2) {
  					this.ruta= `${this.baseurl}/reportes/traslados?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				} else if (this.opcion_reporte == 3) {
  					this.ruta= `${this.baseurl}/reportes/camas?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				}
  			},

  			check_e: function() {
  				if (this.opcion_reporte==1) {
  					this.ruta= `${this.baseurl}/reportes/ingresos?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				} else if (this.opcion_reporte == 2) {
  					this.ruta= `${this.baseurl}/reportes/traslados?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				} else if (this.opcion_reporte == 3) {
  					this.ruta= `${this.baseurl}/reportes/camas?fecha_desde=${this.fecha_desde}&fecha_hasta=${this.fecha_hasta}&check_h=${this.check_h}&check_e=${this.check_e}`;
  				}
  			},
    	},

    	methods: {
    		checkMessage: function() {
    			if (this.message) {
    				this.alertas = this.message;
    				$('#Warning-1').modal("show");
    			}
    		},
    	},
	}
</script>