<x-layouts.layout>
    <div class="container mx-auto px-4">
        <h1 class="text-4xl font-bold text-center my-6">Detalles del Proyecto</h1>

        <div class="max-w-lg mx-auto bg-white shadow-lg rounded-lg p-6">
            <div class="mb-4">
                <h2 class="text-2xl font-bold text-gray-700">{{ $proyecto->titulo }}</h2>
                <p class="text-gray-500">Horas Previstas: {{ $proyecto->horas_previstas }}</p>
                <p class="text-gray-500">Fecha de Comienzo: {{ $proyecto->fecha_comienzo }}</p>
            </div>

            <div class="flex justify-between mt-4">
                <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
                <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </div>
        </div>
    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.querySelectorAll('.delete-form').forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();
                    Swal.fire({
                        title: "¿Estás seguro?",
                        text: "Esta acción no se puede deshacer.",
                        icon: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#d33",
                        cancelButtonColor: "#3085d6",
                        confirmButtonText: "Sí, eliminar",
                        cancelButtonText: "Cancelar"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        });
    </script>
</x-layouts.layout>
