<x-layouts.layout>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center my-6">Editar Proyecto</h1>

        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
            <form action="{{ route('proyectos.update', $proyecto) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <div>
                    <label class="block text-sm font-medium text-gray-700">Título</label>
                    <input type="text" name="titulo" class="input input-bordered w-full" value="{{ $proyecto->titulo }}" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Horas Previstas</label>
                    <input type="number" name="horas_previstas" class="input input-bordered w-full" value="{{ $proyecto->horas_previstas }}" required>
                </div>

                <div>
                    <label class="block text-sm font-medium text-gray-700">Fecha de Comienzo</label>
                    <input type="date" name="fecha_comienzo" class="input input-bordered w-full" value="{{ $proyecto->fecha_comienzo }}" required>
                </div>

                <div class="flex justify-between mt-4">
                    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</x-layouts.layout>
