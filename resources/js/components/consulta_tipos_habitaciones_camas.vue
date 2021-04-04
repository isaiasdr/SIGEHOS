<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<div class="text-center">
				<h3 class="title-sigehos">Consulta Tipos de Habitaciones y Camas</h3><hr>
			</div>

			<div class="text-center">
				<button @click="activarHab" :class="hab_activo ? boton_activo : boton_inactivo">Tipos Habitaciones</button>
				<button @click="activarCamas" :class="camas_activo ? boton_activo : boton_inactivo">Tipos Camas</button>
			</div>

			<div class="form-row p-2">
				<div class="col-md-4">
					<label>Codigo:</label>
					<input type="text" v-model="codigo" class="form-control" id="codigo">
				</div>
				<div class="col-md-7">
					<label>Descripcion:</label>
					<input type="text" v-model="descripcion" class="form-control" id="descripcion">
				</div>
				<div class="col-md-1" style="top: 31px">
					<button @click="busqueda" type="button" class="btn btn-outline-secondary"><i class="ti-angle-double-right"></i></button>
				</div>
			</div>

			<div class="table-responsive p-2">
				<table class="table table-hover table-bordered custom-table">
					<thead class="thead">
						<tr class="text-center ">
							<th scope="col" width="33%">Codigo</th>
							<th scope="col">Descripcion</th>
						</tr>
					</thead>
					<tbody class="text-center">
						<tr v-for="resultado in resultados">
							<td>{{resultado.codigo}}</td>
							<td>{{resultado.descripcion}}</td>
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
    			resultados: [],
    			hab_activo: true,
    			camas_activo: false,
    			totalRegistros: 0,
    			codigo: '',
    			descripcion: '',
    			boton_activo: {
    				'btn': true,
    				'btn-secondary': true,
    				'active': true,
    				'boton-espaciado': true
    			},
    			boton_inactivo: {
    				'btn': true,
    				'btn-outline-secondary': true,
    				'active' : false,
    				'boton-espaciado': true
    			},
    		}
    	},

    	created () {
    		axios
    			.get(`${this.baseurl}/consulta/tipo_hab`)
    			.then(response =>(this.resultados= response.data))
    	},

    	watch: {
    		resultados: function(newValue) {
    			this.totalRegistros= newValue.length;
    		}

    	},

		methods: {
			activarHab: function() {
				this.hab_activo= true;
				this.camas_activo= false;

				this.codigo='';
				this.descripcion='';

				axios
    				.get(`${this.baseurl}/consulta/tipo_hab`)
    				.then(response =>(this.resultados= response.data))
			},

			activarCamas: function() {
				this.camas_activo= true;
				this.hab_activo= false;

				this.codigo='';
				this.descripcion='';

				axios
    				.get(`${this.baseurl}/consulta/tipo_camas`)
    				.then(response =>(this.resultados= response.data))
			},

			busqueda: function() {
				if (this.hab_activo) {
					axios
	    				.get(`${this.baseurl}/consulta/tipo_hab?codigo=${this.codigo}&descripcion=${this.descripcion}`)
	    				.then(response =>(this.resultados= response.data))	
				} else {
					axios
	    				.get(`${this.baseurl}/consulta/tipo_camas?codigo=${this.codigo}&descripcion=${this.descripcion}`)
	    				.then(response =>(this.resultados= response.data))
				}
			},
		}
	}
</script>