<table>
    <thead>
    <tr>
        <th>Cod Cama</th>
        <th>Habitacion</th>
        <th>Tipo Habitacion</th>
        <th>Tipo Cama</th>
        <th>Codigo Tipo Cama</th>
        <th>Servicio</th>
        <th>Estatus</th>
    </tr>
    </thead>
    <tbody>
    @foreach($camas as $cama)
        <tr>
            <td>{{ $cama->codigo_cama }}</td>
            <td>{{ $cama->nro_habitacion }}</td>
            <td>{{ $cama->tipo_habitacion }}</td>
            <td>{{ $cama->tipo_cama }}</td>
            <td>{{ $cama->codigo_tipo_cama }}</td>
            <td>{{ $cama->servicio }}</td>
            <td>{{ $cama->estatus }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
