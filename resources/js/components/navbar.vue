<template>
	<b-navbar toggleable="lg" type="light" class="nav-color">
    	<b-navbar-brand href="/home">SIGEHOS</b-navbar-brand> 
      	<b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      	<b-collapse id="nav-collapse" is-nav>
      		<b-navbar-nav>
      			<b-nav-item href="#">Mantenimiento</b-nav-item>
      			<b-nav-item href="#">Consulta Externa</b-nav-item>
      			<b-nav-item href="#">Triaje</b-nav-item>
      			<b-nav-item-dropdown text="Admisiones">
      				<b-dropdown-item href="/admision">Admisiones</b-dropdown-item>
      				<b-dropdown-item href="/traslado/solicitud">Solicitud de Traslado</b-dropdown-item>
                              <b-dropdown-item href="/traslado/control">Control de Traslado</b-dropdown-item>
      				<b-dropdown-item href="/altas">Altas y Permisos</b-dropdown-item>    
      				<b-dropdown-item href="/reportes">Reportes</b-dropdown-item>
                              <b-dropdown-divider></b-dropdown-divider>
                              <b-dropdown-group id="dropdown-group-1" header="Consultas">
                                    <b-dropdown-item href="/consulta/tipo_hab_camas">Tipos Habitaciones y Camas</b-dropdown-item>
                                    <b-dropdown-item href="/consulta/camas">Camas</b-dropdown-item>
                                    <b-dropdown-item href="#">Pacientes admitidos</b-dropdown-item>    
                                    <b-dropdown-item href="#">Traslado de pacientes</b-dropdown-item>
                                    <b-dropdown-item href="#">Bitacoras de camas(Opcional)</b-dropdown-item>
                                    <b-dropdown-item href="#">Movimientos de hospitalizacion</b-dropdown-item>
                              </b-dropdown-group>
      			</b-nav-item-dropdown>
      			<b-nav-item href="/paciente">Pacientes</b-nav-item>
      			<b-nav-item href="#">Historias Clinicas</b-nav-item>
      			<b-nav-item href="/logout">Salir</b-nav-item>
      		</b-navbar-nav>
      	</b-collapse>
 	</b-navbar>
</template>

<script>
	export default {
            props: {
                  acceso_total: {
                        type: Boolean,
                        required: true
                  },
            },
	}
</script>