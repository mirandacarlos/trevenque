<x-layout>

    <x-slot:title>Alumnos</x-slot:title>

    <div class="row">
        <div class="col text-center">
            <h2>Alumnos</h2>
            <a href="{{ route('alumnos.create') }}" class="link-primary">Nuevo</a>
        </div>
    </div>

    <div class="row">
        <div class="col-2 fw-bold">Nombre</div>
        <div class="col-3 fw-bold">Apellidos</div>
        <div class="col-2 fw-bold">A&ntilde;o de nacimiento</div>
        <div class="col fw-bold">Acciones</div>
    </div>
    @foreach ($alumnos as $alumno)
    <div class="row">
        <div class="col-2">{{ $alumno->nombre }}</div>
        <div class="col-3">{{ $alumno->apellidos }}</div>
        <div class="col-2">{{ $alumno->nacimiento }}</div>
        <div class="col d-flex">
            <a href="{{ route('alumnos.edit', ['alumno' => $alumno]) }}" class="link-secondary me-2">Actualizar</a>
            <form action="{{ route('alumnos.destroy', ['alumno' => $alumno]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="#" class="link-danger" onclick="if (confirm('Desea borrar el alumno?')){this.closest('form').submit()}">Borrar</a>
            </form>
        </div>
    </div>
    @endforeach

</x-layout>