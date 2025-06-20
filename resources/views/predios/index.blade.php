@extends('layout.app')
@section('contenido')

<h1 class="mb-4">📍 Lista de Predios Registrados</h1>

<a href="{{ route('predios.create') }}" class="btn btn-primary mb-3">➕ Agregar un nuevo predio</a>
<a href="{{ route('clientes.index') }}" class="btn btn-danger mb-3">⬅️ Regresar</a>

<table class="table table-bordered">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Propietario</th>
            <th>Clave</th>
            <th>Coordenadas</th>
            <th>Horas de llegada</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($predios as $predio)
        <tr>
            <td>{{ $predio->id }}</td>
            <td>{{ $predio->propietario }}</td>
            <td>{{ $predio->clave }}</td>
            <td>
                <ul class="mb-0">
                    <li>P1: {{ $predio->latitud1 }}, {{ $predio->longitud1 }}</li>
                    <li>P2: {{ $predio->latitud2 }}, {{ $predio->longitud2 }}</li>
                    <li>P3: {{ $predio->latitud3 }}, {{ $predio->longitud3 }}</li>
                    <li>P4: {{ $predio->latitud4 }}, {{ $predio->longitud4 }}</li>
                </ul>
            </td>
            <td>
                <ul class="mb-0">
                    <li>🕒 P1: {{ $predio->hora_p1 ?? 'No registrada' }}</li>
                    <li>🕒 P2: {{ $predio->hora_p2 ?? 'No registrada' }}</li>
                    <li>🕒 P3: {{ $predio->hora_p3 ?? 'No registrada' }}</li>
                </ul>
            </td>
            <td>
                <a href="{{ route('predios.edit', $predio->id) }}" class="btn btn-warning btn-sm">✏️ Editar</a>
                <form action="{{ route('predios.destroy', $predio->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que deseas eliminar este predio?')">🗑️ Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
