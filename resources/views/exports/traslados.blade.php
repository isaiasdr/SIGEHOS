<table>
    <thead>
    <tr>
        <th>Num Ingreso</th>
        <th>Num Historia</th>
        <th>Num Renglon</th>
        <th>Tipo de Cedula</th>
        <th>Cedula</th>
        <th>Nombres</th>
        <th>Apellidos</th>
        <th>Sexo</th>
        <th>Servicio Anterior</th>
        <th>Cama Anterior</th>
        <th>Servicio Traslado</th>
        <th>Cama Traslado</th>
    </tr>
    </thead>
    <tbody>
    @foreach($traslados as $traslado)
        <tr>
            <td>{{ $traslado->ingreso }}</td>
            <td>{{ $traslado->historia }}</td>
            <td>{{ $traslado->renglon }}</td>
            <td>{{ $traslado->tipo_cedula }}</td>
            <td>{{ $traslado->cedula }}</td>
            <td>{{ $traslado->nombres }}</td>
            <td>{{ $traslado->apellidos }}</td>
            <td>{{ $traslado->sexo }}</td>
            <td>{{ $traslado->servicio_ante }}</td>
            <td>{{ $traslado->codigo_cama_ante }}</td>
            <td>{{ $traslado->servicio_tras }}</td>
            <td>{{ $traslado->codigo_cama_tras }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
