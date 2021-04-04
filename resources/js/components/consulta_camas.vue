<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div class="text-center">
				<h3 class="title-sigehos">Consulta de Camas</h3><hr>
			</div>

			<div class="form-check form-check-inline">
  				<input class="form-check-input" type="checkbox" v-model="check_h" @change="busqueda" id="camas_hospitalizacion" value="H">
  				<label class="form-check-label check-azul" @click="check(check_h)" for="camas_hospitalizacion">Camas de Hospitalizacion</label>
			</div>
			<div class="form-check form-check-inline">
  				<input class="form-check-input" type="checkbox" v-model="check_e" @change="busqueda" id="camas_emergencia" value="E">
  				<label class="form-check-label check-rojo" @click="check(check_e)" for="camas_emergencia">Camas de Emergencia</label>
			</div>

			<div class="form-row p-2">
				<div class="col-md-2">
					<label for="">Servicio Tratante:</label>
					<select class="custom-select" v-model="servicio" @change="busqueda">
						<option value="">Servicio</option>
						<option v-for="servicio in servicios" :value="servicio.id_servicio">
							{{servicio.descripcion}}
						</option>
					</select>
				</div>

				<div class="col-md-1">
					<label for="">Tipo Hab</label>
					<input type="text" v-model="tipo_habitacion" @change="busqueda" class="form-control">
				</div>

				<div class="col-md-2">
					<label for="">Nro. Hab.:</label>
					<input type="text" v-model="numero_habitacion" @change="busqueda" class="form-control">
				</div>

				<div class="col-md-2">
					<label for="">Cod. Cama:</label>
					<input type="text" v-model="codigo_cama" @change="busqueda" class="form-control">
				</div>

				<div class="col-md-1">
					<label for="">Tipo Cama:</label>
					<input type="text" v-model="tipo_cama" @change="busqueda" class="form-control">
				</div>

				<div class="col-md-2">
					<label for="">Estatus:</label>
					<select class="custom-select" v-model="estado_cama" @change="busqueda">
						<option value="">Estatus</option>
						<option v-for="estado in estatus" :value="estado.estatus">
							{{estado.estatus}}
						</option>	
					</select>
				</div>

				<div class="col-md-2">
					<label for="">Nro. Ingreso:</label>
					<input type="text" v-model="nro_ingreso" @change="busqueda" class="form-control">
				</div>
			</div>

			<div class="table-responsive p-2">
				<table class="table table-hover table-bordered custom-table">
					<thead class="thead">
						<tr class="text-center">
							<th scope="col" width="16%">Servicio Ubicacion</th>
						    <th scope="col" width="10%">Tipo Hab.</th>
						    <th scope="col" width="16%">Nro. Hab</th>
						    <th scope="col" width="16%">Cod. Cama</th>
						    <th scope="col" width="10%">Tipo Cama</th>
						    <th scope="col" width="16%">Estatus</th>
						    <th scope="col" width="16%">Nro. Ingreso</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr v-for="cama in camas">
							<td>{{cama.servicio}}</td>
							<td>{{cama.tipo_hab}}</td>
							<td>{{cama.num_hab}}</td>
							<td :class="cama.estatus == 'DISPONIBLE' ? td_azul : td_red">{{cama.cod_cama}}</td>
							<td>{{cama.tipo_cama}}</td>
							<td>{{cama.estatus}}</td>
							<td>{{cama.num_ingreso}}</td>
						</tr>
					</tbody>
				</table>
			</div>

			<div class="p-2">
				<span><b>Total Registros:</b> {{totalRegistros}}</span>
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
    	},

    	data () {
    		return {
    			check_h: true,
    			check_e: true,
    			servicios: [],
    			estatus: [],
    			servicio: "",
    			tipo_habitacion: "",
    			numero_habitacion: "",
    			codigo_cama: "",
    			tipo_cama: "",
    			estado_cama: "",
    			nro_ingreso: "",
    			camas: [],
    			totalRegistros: null,
    			td_red: {
    				'td-red': true,
    			},
    			td_azul: {
    				'td-azul': true,
    			}
    		}
    	},

    	created () {
    		axios
    			.get(`${this.baseurl}/consulta/cama`)
    			.then(response =>(this.camas= response.data))

    		axios
    			.get(`${this.baseurl}/consulta/servicios`)
    			.then(response => (this.servicios= response.data))

    		axios
    			.get(`${this.baseurl}/consulta/estatus`)
    			.then(response => (this.estatus= response.data))
    	},

    	watch: {
    		camas: function(newValue) {
    			this.totalRegistros= newValue.length;
    		}
    	},

		methods: {
			busqueda: function () {
				//hace falta añadir la busqueda por nro de ingreso
				if (this.check_h && this.check_e) {
					axios
	    				.get(`${this.baseurl}/consulta/cama?servicio_id=${this.servicio}&tipo_habitacion=${this.tipo_habitacion}&num_habitacion=${this.numero_habitacion}&cod_cama=${this.codigo_cama}&tipo_cama=${this.tipo_cama}&estatus=${this.estado_cama}`)
	    				.then(response =>(this.camas= response.data))	
				} else if (this.check_h) {
					axios
	    				.get(`${this.baseurl}/consulta/cama?check_h=H&servicio_id=${this.servicio}&tipo_habitacion=${this.tipo_habitacion}&num_habitacion=${this.numero_habitacion}&cod_cama=${this.codigo_cama}&tipo_cama=${this.tipo_cama}&estatus=${this.estado_cama}`)
	    				.then(response =>(this.camas= response.data))
				} else if (this.check_e) {
					axios
	    				.get(`${this.baseurl}/consulta/cama?check_e=E&servicio_id=${this.servicio}&tipo_habitacion=${this.tipo_habitacion}&num_habitacion=${this.numero_habitacion}&cod_cama=${this.codigo_cama}&tipo_cama=${this.tipo_cama}&estatus=${this.estado_cama}`)
	    				.then(response =>(this.camas= response.data))
				} else {
					this.camas = [];
				}
			},

			check: function(value) {
				value= !value;
			},
		}
	}
</script>