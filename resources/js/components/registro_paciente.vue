<template>
	<div class="container-fluid" id="main-container">
		<div class="container" id="secondary-container">
			<form id="form-registrar-paciente">
				<div class="text-center">
					<h3 class="title-sigehos">Registro de Pacientes</h3><hr>
				</div>
				<div class="form-row form-sigehos">
					<div class="col-md-8">
						<div class="form-group p-2">
							<div class="form-row p-2">
								<label for="">Cedula:</label>
								<div class="col-md-2">
									<select name="Tipo_cedula_paciente" class="custom-select" v-model="tipo_cedula" @change="generarIdentificacion(tipo_cedula)">
										<option value=""></option>
										<option value="V">V</option>
										<option value="E">E</option>
										<option value="I">I</option>
									</select>
								</div>
								<div class="col-md-3">
									<input type="number" v-model="cedula" class="form-control" name="cedula_paciente">
								</div>
								<div class="col-md-2">
									<select class="custom-select" name="numero_hijo" v-model="correlativo">
										<option value="0">0</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
									</select>
								</div>
							</div>
							<div class="form-row p-2">
								<div class="col-md-6">
									<label>Apellidos:</label>
									<input type="text" class="form-control" name="Apellidos_paciente" v-model="apellidos">
								</div>
								<div class="col-md-6">
									<label>Nombres:</label>
									<input type="text" class="form-control" name="Nombres_paciente" v-model="nombres">
								</div>
							</div>
							<div class="form-row p-2">
								<div class="col-md-2">
									<label for="">Sexo:</label>
									<select class="custom-select" name="sexo_paciente" v-model="sexo">
										<option value="">Sexo</option>
										<option value="F">F</option>
										<option value="M">M</option>
									</select>
								</div>
								<div class="col-md-3">
									<label for="">Edo Civil:</label>
									<select class="custom-select" name="edo_civil_paciente" v-model="edo_civil">
										<option value="">Estado Civil</option>
										<option v-for="edo_civil in edos_civil" :value="edo_civil.descripcion">
											{{edo_civil.descripcion}}
										</option>
									</select>
								</div>

								<div class="col-md-7 text-center">
									<label for="">Fecha nacimiento:</label>
									<div class="form-row">
										<b-form-datepicker id="datepicker_reportes_desde" size="sm" local="es" menu-class="w-100" calendar-width="100%" :max="max_date" v-model="fecha_nacimiento" class="mb-2" placeholder="Seleccione la fecha de nacimiento"></b-form-datepicker>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group box-border">
							<label for="">Historia Medica:</label>
							<div class="form-group p-2">
								<div class="form-row">
									<div class="col-md-6">
										<label for="">Numero:</label>
										<input type="text" class="form-control" :readonly="readonly" name="numero_historia"	v-model="numHistoria">
									</div>
									<div class="col-md-6">
										<label for="">Fecha:</label>
										<input type="text" class="form-control" readonly name="fecha_actual" :value="fecha">
									</div>					
								</div>
								<div class="form-row p-top">
									<div class="col-sm-7 col-xs-7 col-md-7 col-lg-7">
										<button type="button" @click="editarHistoria()" class="btn btn-outline-secondary">Ingresar No Manual</button>
									</div>
									<div class="col-sm-5 col-xs-5 col-md-5 col-lg-5">
										<button type="button" @click="fijarHistoria()" class="btn btn-outline-danger"><i class="ti-close"></i></button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								<label for="">Nacionalidad:</label>
								<select class="custom-select" name="nacionalidad_paciente" v-model="nacionalidad">
									<option value="">Nacionalidad</option>
									<option v-for="nacionalidad in nacionalidades" :value="nacionalidad.id_nacionalidad">
										{{nacionalidad.descripcion}}
									</option>
								</select>
							</div>

							<div class="col-md-4">
								<label for="">Lugar Nacimiento:</label>
								<input type="text" class="form-control" name="lugar_nacimiento_paciente" v-model="lugar_nacimiento">
							</div>

							<div class="col-md-4">
								<label for="">Zona:</label>
								<select class="custom-select" name="zona_paciente" v-model="zona">
									<option value="">Zona</option>
									<option v-for="zona in zonas" :value="zona.id_zona">
										{{zona.zona}}
									</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								<label for="">Ocupacion:</label>
								<select class="custom-select" name="ocupacion_paciente" v-model="ocupacion">
									<option value="">Ocupacion</option>
									<option v-for="ocupacion in ocupaciones" :value="ocupacion.id_ocupacion">
										{{ocupacion.descripcion}}
									</option>
								</select>
							</div>

							<div class="col-md-4">
								<label for="">Religion:</label>
								<select class="custom-select" name="religion_paciente" v-model="religion">
									<option value="">Religion</option>
									<option v-for="religion in religiones" :value="religion.id_religion">
										{{religion.descripcion}}
									</option>
								</select>
							</div>

							<div class="col-md-4">
								<label for="">Profesion:</label>
								<select class="custom-select" name="profesion_paciente" v-model="profesion">
									<option value="">Profesion</option>
									<option v-for="profesion in profesiones" :value="profesion.id_profesion">
										{{profesion.descripcion}}
									</option>
								</select>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="form-row">
							<div class="col-md-4">
								<label for="">Direccion (Domicilio):</label>
								<textarea class="form-control" rows="4" type="text" name="domicilio_paciente" v-model="domicilio"></textarea>
							</div>
							<div class="col-md-4">
								<label for="">Direccion (Trabajo):</label>
								<textarea class="form-control" rows="4" type="text" name="trabajo_paciente" v-model="direccion_trabajo"></textarea>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<div class="form-row">
										<label for="">Telefono:</label>
										<input type="number" class="form-control" name="telefono_paciente" placeholder="Numero telefonico" v-model="telefono">
									</div>
								</div>
								<div class="form-group">
									<div class="form-row">
										<label for="">Telefono (Trabajo):</label>
										<input type="number" class="form-control" name="telefono_trabajo_paciente" placeholder="Numero telefonico" v-model="telefono_trabajo">
									</div>
								</div>
							</div>
						</div>
					</div>	
				</div>
			</form>

			<div class="form-group box-border">
				<label for="">Datos de contactos y/o acompañantes:</label>
				<div class="form-group">
					<div class="form-row p-2">
						<div class="col-md-3">
							<label>Nombres:</label>
							<input type="text" class="form-control" id="Nombres-ref">
						</div>
						<div class="col-md-3">
							<label>Apellidos:</label>
							<input type="text" class="form-control" id="Apellidos-ref">
						</div>
						<div class="col-md-2">
							<label>Cedula:</label>
							<input type="text" class="form-control" id="Cedula-ref">
						</div>
						<div class="col-md-2">
							<label for="">Parentesco:</label>
							<select class="custom-select" id="Parentesco-ref">
								<option value="">Parentesco</option>
								<option v-for="parentesco in parentescos" :value="parentesco.id_parentesco">
									{{parentesco.descripcion}}
								</option>
							</select>
						</div>
						<div class="col-md-2">
							<label>Telefono:</label>
							<input type="number" class="form-control" id="Telf-ref">
						</div>
					</div>						
				</div>

				<div class="table-responsive p-2">
					<table class="table table-hover table-bordered custom-table">
						<thead class="thead">
							<tr class="text-center ">
								<th scope="col">Nombres</th>
								<th scope="col">Apellidos</th>
								<th scope="col">Cedula</th>
								<th scope="col">Parentesco</th>
								<th scope="col">Telefono</th>
							</tr>
						</thead>
						<tbody class="text-center">
							<tr v-for="acompañante in acompañantes">
								<td >{{acompañante.nombres}}</td>
								<td>{{acompañante.apellidos}}</td>
								<td>{{acompañante.cedula}}</td>
								<td>{{acompañante.parentesco_nombre}}</td>
								<td>{{acompañante.telefono}}</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="form-group">
					<div class="form-row p-top">
						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6 text-right">
							<button @click="añadirRef()" type="button" class="btn btn-outline-success"> <i class="ti-plus"></i> <span>Añadir</span></button>
						</div>
						<div class="col-sm-6 col-xs-6 col-md-6 col-lg-6">
							<button @click="eliminarRef()" type="button" class="btn btn-outline-danger"><i class="ti-minus"></i> <span>Eliminar</span></button>
						</div>
					</div>
				</div>
			</div>

			<div class="form-row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<div class="form-group box-border">
						<div class="form-group p-2 text-center">
							<button type="button" @click="registrarPaciente" class="btn boton-espaciado" :class="{'disabled':nuevo_paciente, 'btn-outline-success':nuevo_paciente, 'btn-success':!nuevo_paciente}"><i class="ti-plus"></i></button>
							<button type="button" @click="editarPaciente" class="btn boton-espaciado" :class="{'disabled':!nuevo_paciente, 'btn-outline-info':!nuevo_paciente, 'btn-info':nuevo_paciente}"><i class="ti-pencil"></i></button>
							<button type="button" @click="enviarForm" class="btn btn-primary boton-espaciado"><i class="ti-save"></i></button>
							<button type="button" @click="buscarPaciente" class="btn boton-espaciado" :class="{'disabled':nuevo_paciente, 'btn-outline-info':nuevo_paciente, 'btn-info':!nuevo_paciente}"><i class="ti-search"></i></button>
							<button type="button" class="btn boton-espaciado" :class="{'disabled':nuevo_paciente, 'btn-outline-danger':nuevo_paciente, 'btn-danger':!nuevo_paciente}"><i class="ti-minus"></i></button>
							<button @click="Recargar" type="button" class="btn btn-secondary boton-espaciado"><i class="ti-reload"></i></button>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
			</div>
		</div>

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
		        		<p class="text-center modal-mensaje">El paciente ha sido registrado con exito.</p>
		      		</div>
		      		<div class="modal-footer">
				        <button @click="paginaPrincipal()" type="button" class="btn btn-primary">ir pagina principal</button>
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
    			profesiones: [],
    			religiones: [],
    			ocupaciones: [],
    			zonas: [],
    			nacionalidades: [],
    			parentescos:[],
    			edos_civil:[],
    			acompañantes: [],
    			alertas: "",
    			fecha: "",
    			numHistoria: "",
    			readonly: true,
    			tipo_cedula: "",
    			cedula: "",
    			fecha_nacimiento: "",
    			max_date: "",
    			nuevo_paciente: true,
    			nombres: "",
    			apellidos: "",
    			correlativo: 0,
    			sexo: "",
    			edo_civil: "",
    			nacionalidad: "",
    			lugar_nacimiento: "",
    			zona: "",
    			ocupacion: "",
    			religion: "",
    			profesion: "",
    			domicilio: "",
    			direccion_trabajo: "",
    			telefono: "",
    			telefono_trabajo: "",
    			data_user: [],
    		}
    	},

    	created () {

    		axios
    			.get(`${this.baseurl}/paciente/profesion`)
    			.then(response =>(this.profesiones= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/religion`)
    			.then(response => (this.religiones = response.data))

    		axios
    			.get(`${this.baseurl}/paciente/ocupacion`)
    			.then(response => (this.ocupaciones= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/zona`)
    			.then(response => (this.zonas= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/nacionalidad`)
    			.then(response => (this.nacionalidades= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/parentesco`)
    			.then(response => (this.parentescos= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/estado_civil`)
    			.then(response => (this.edos_civil= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/date`)
    			.then(response => (this.fecha= response.data))

    		axios
    			.get(`${this.baseurl}/paciente/numHistoria`)
    			.then(response=> (this.numHistoria= response.data))
    	},

    	mounted () {
    		const now= new Date();
      		const today= new Date(now.getFullYear(), now.getMonth(), now.getDate());
      		this.max_date= new Date(today);

    		var baseurl = this.baseurl;
    		$("#Success-1").on('hidden.bs.modal', function () {
		    	window.location = `${baseurl}/home`;
		    });
    	},

    	watch: {
    		data_user: function(newValue) {
    			this.nombres = newValue.primer_nombre + ' ' + newValue.segundo_nombre;
    			this.apellidos = newValue.primer_apellido + ' ' + newValue.segundo_apellido;
    			this.telefono = newValue.telefono;
    			this.lugar_nacimiento = newValue.lugar_nacimiento;
    			this.nacionalidad = newValue.id_nacionalidad;
    			this.ocupacion = newValue.id_ocupacion;
    			this.profesion = newValue.id_profesion;
    			this.religion = newValue.id_religion;
    			this.zona = newValue.id_zona;
    			this.fecha = newValue.fecha_historia;
    			this.domicilio = newValue.direccion;
    			this.fecha_nacimiento= newValue.fecha_nacimiento;
    			this.numHistoria = newValue.historia;
    			this.sexo = newValue.sexo;
    			this.correlativo = newValue.correlativo_ci;
    			this.edo_civil = newValue.edo_civil;

    			this.buscarAcompañantes(newValue.id_paciente);

    		},
    	},

    	methods: {
    		añadirRef: function() {

    			if (document.getElementById('Nombres-ref').value.length== 0) {
    				this.alertas="El nombre de los acompañantes no puede estar vacio";
    				$('#Warning-1').modal("show");
    			} else if (document.getElementById('Apellidos-ref').value.length== 0) {
    				this.alertas="El apellido de los acompañantes no puede estar vacio";
    				$('#Warning-1').modal("show");
    			} else if (document.getElementById('Cedula-ref').value.length== 0) {
    				this.alertas="La cedula de los acompañantes no puede estar vacio";
    				$('#Warning-1').modal("show");
    			} else if (document.getElementById('Parentesco-ref').value.length== 0){
    				this.alertas="El parentesco del acompañante no puede estar vacio";
    				$('#Warning-1').modal("show");
    			} else if (document.getElementById('Telf-ref').value.length== 0) {
    				this.alertas="El telefono del acompañantes no puede estar vacio";
    				$('#Warning-1').modal("show");
    			} else {
    				this.alertas= "";
    				var nombres = document.getElementById('Nombres-ref').value;
	    			var apellidos = document.getElementById('Apellidos-ref').value;
	    			var cedula = document.getElementById('Cedula-ref').value;
	    			var parentesco= document.getElementById('Parentesco-ref').value;
	    			var telefono = document.getElementById('Telf-ref').value;
	    			var parestesco_nombre = null;

	    			for (var i = 0; i < this.parentescos.length; i++) {
	    				if (this.parentescos[i].id_parentesco == parentesco) {
	    					parestesco_nombre= this.parentescos[i].descripcion;
	    				}
	    			}

	    			this.acompañantes.push({'nombres': nombres, 'apellidos': apellidos, 'cedula': cedula, 'parentesco_id': parentesco, 'parentesco_nombre':parestesco_nombre, 'telefono': telefono});

	    			document.getElementById('Nombres-ref').value= "";
	    			document.getElementById('Apellidos-ref').value= "";
	    			document.getElementById('Cedula-ref').value= "";
	    			document.getElementById('Parentesco-ref').value= "";
	    			document.getElementById('Telf-ref').value= "";
    			}
    		},

    		eliminarRef: function() {
    			this.acompañantes.pop();
    		},

    		enviarForm: function() {

    			if (this.tipo_cedula == "I") {
    				var formData= new FormData(document.querySelector("form#form-registrar-paciente"));
    				formData.append('fecha_nacimiento', this.fecha_nacimiento);

    				for (var i = 0; i < this.acompañantes.length; i++) {
    					formData.append('acompañante_nombres[]', this.acompañantes[i].nombres);
    					formData.append('acompañante_apellidos[]', this.acompañantes[i].apellidos);
    					formData.append('acompañante_parentesco_id[]', this.acompañantes[i].parentesco_id);
    					formData.append('acompañante_cedula[]', this.acompañantes[i].cedula);
    					formData.append('acompañante_telefono[]', this.acompañantes[i].telefono);
    				}

    				formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);

    				axios({
    					method:'post',
    					url: `${this.baseurl}/paciente/registrarEmergencia`,
    					data: formData,
    					headers: {'Content-Type': 'multipart/form-data'}
    				})
    				.then(data => {
    					$('#Success-1').modal("show");
    				})
    				.catch(e => {
    					if (e.response.data.errors.length) {
    						this.alertas= e.response.data.error;
    						$('#Warning-1').modal("show");
    					} else {
    						this.alertas= e.response.data.errors;
    						$('#Warning-2').modal("show");
    					}
    				})
    			} else {
    				var formData= new FormData(document.querySelector("form#form-registrar-paciente"));
    				formData.append('fecha_nacimiento', this.fecha_nacimiento);

    				for (var i = 0; i < this.acompañantes.length; i++) {
    					formData.append('acompañante_nombres[]', this.acompañantes[i].nombres);
    					formData.append('acompañante_apellidos[]', this.acompañantes[i].apellidos);
    					formData.append('acompañante_parentesco_id[]', this.acompañantes[i].parentesco_id);
    					formData.append('acompañante_cedula[]', this.acompañantes[i].cedula);
    					formData.append('acompañante_telefono[]', this.acompañantes[i].telefono);
    				}

    				formData.append('_token', document.getElementById('csrf-token').attributes.content.nodeValue);

    				axios({
    					method:'post',
    					url: `${this.baseurl}/paciente/registrar`,
    					data: formData,
    					headers: {'Content-Type': 'multipart/form-data'}
    				})
    				.then(data => {
    					$('#Success-1').modal("show");
    				})
    				.catch(e => {
    					if (e.response.data.errors.length) {
    						this.alertas= e.response.data.error;
    						$('#Warning-1').modal("show");
    					} else {
    						this.alertas= e.response.data.errors;
    						$('#Warning-2').modal("show");
    					}
    				})
    			}
    		},

    		paginaPrincipal: function() {
    			window.location = `${this.baseurl}/home`;
    		},

    		editarHistoria: function() {
    			this.readonly= false;
    		},

    		fijarHistoria: function() {
    			this.readonly= true;
    		},

    		generarIdentificacion: function(tipo_cedula) {
    			if (tipo_cedula== 'I') {
    				axios
    					.get(`${this.baseurl}/paciente/generarIdenticacion`)
    					.then(response=> (this.cedula= response.data))
    			} else {
    				this.cedula= "";
    			}
    		},

    		registrarPaciente: function() {
    			this.nuevo_paciente= true;
    			this.alertas= "";
    			this.fecha= "";
    			this.numHistoria= "";
    			this.readonly= true;
    			this.tipo_cedula= "";
    			this.cedula= "";
    			this.fecha_nacimiento= "";
    			this.sexo= "";
    			this.edo_civil= "";
    			this.nacionalidad= "";
    			this.lugar_nacimiento= "";
    			this.zona= "";
    			this.ocupacion= "";
    			this.religion= "";
    			this.profesion= "";
    			this.domicilio= "";
    			this.direccion_trabajo= "";
    			this.telefono= "";
    			this.telefono_trabajo= "";
    			this.acompañantes= [];
    			this.data_user= [];

    			axios
    				.get(`${this.baseurl}/paciente/profesion`)
    				.then(response =>(this.profesiones= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/religion`)
    				.then(response => (this.religiones = response.data))

    			axios
    				.get(`${this.baseurl}/paciente/ocupacion`)
    				.then(response => (this.ocupaciones= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/zona`)
    				.then(response => (this.zonas= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/nacionalidad`)
    				.then(response => (this.nacionalidades= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/parentesco`)
    				.then(response => (this.parentescos= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/estado_civil`)
    				.then(response => (this.edos_civil= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/date`)
    				.then(response => (this.fecha= response.data))

    			axios
    				.get(`${this.baseurl}/paciente/numHistoria`)
    				.then(response=> (this.numHistoria= response.data))
    		},

    		editarPaciente: function() {
    			this.nuevo_paciente= false;
    			this.alertas= "";
    			this.fecha= "";
    			this.numHistoria= "";
    			this.readonly= true;
    			this.tipo_cedula= "";
    			this.cedula= "";
    			this.fecha_nacimiento= "";
    			this.sexo= "";
    			this.edo_civil= "";
    			this.nacionalidad= "";
    			this.lugar_nacimiento= "";
    			this.zona= "";
    			this.ocupacion= "";
    			this.religion= "";
    			this.profesion= "";
    			this.domicilio= "";
    			this.direccion_trabajo= "";
    			this.telefono= "";
    			this.telefono_trabajo= "";
    			this.acompañantes= [];
    		},

    		Recargar: function() {
    			window.location = `${this.baseurl}/paciente`;
    		},

    		buscarPaciente: function() {
    			axios
    				.get(`${this.baseurl}/paciente/consultar?tipo_cedula=${this.tipo_cedula}&cedula=${this.cedula}`)
    				.then(response=> (this.data_user= response.data))
    				.catch(e => {
    					this.alertas = e.response.data.errors;
    					$('#Warning-1').modal("show");
    				})
    		},

    		buscarAcompañantes: function(id_paciente) {
    			axios
    				.get(`${this.baseurl}/paciente/consultarAcompañantes?id_paciente=${id_paciente}`)
    				.then(response=> (this.acompañantes= response.data))
    		},
    	},
    }
</script>