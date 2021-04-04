<table>
    <thead>
    <tr>
        <th>Codigo Cama</th>
        <th>Num Ingreso</th>
        <th>Tipo de Cedula</th>
        <th>Cedula</th>
        <th>Numero Historia</th>
        <th>Fecha de Nacimiento</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>ID del servicio</th>
        <th>Servicio Inicial</th>
        <th>Tipo de Servicio</th>
        <th>Codigo Tipo de Habitacion</th>
        <th>Tipo Habitacion</th>
        <th>Servicio Actual</th>
        <th>Cedula Medico</th>
        <th>Nombre Medico</th>
    </tr>
    </thead>
    <tbody>
    @foreach($ingresos as $ingreso)
        <tr>
            <td>{{ $ingreso->codigo_cama }}</td>
            <td>{{ $ingreso->ingreso }}</td>
            <td>{{ $ingreso->tipo_cedula }}</td>
            <td>{{ $ingreso->cedula }}</td>
            <td>{{ $ingreso->historia }}</td>
            <td>{{ $ingreso->fecha_nacimiento }}</td>
            <td>{{ $ingreso->nombres }}</td>
            <td>{{ $ingreso->apellidos }}</td>
            <td>{{ $ingreso->sexo }}</td>
            <td>{{ $ingreso->id_servicio }}</td>
            <td>{{ $ingreso->servicio_inicial }}</td>
            <td>{{ $ingreso->tipo_servicio }}</td>
            <td>{{ $ingreso->codigo }}</td>
            <td>{{ $ingreso->tipo_habitacion }}</td>
            <td>{{ $ingreso->servicio_actual }}</td>
            <td>{{ $ingreso->cedula_medico }}</td>
            <td>{{ $ingreso->nombre_medico }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
