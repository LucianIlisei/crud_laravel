<x-layouts.layout>
    <div class="flex flex-row justify-center items-center min-h-full bg-gray-300">
        <div class="bg-white p-3 rounded-2xl">

            <div class="grid grid-cols-2 gap-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <x-input-label for="nombre" value="Nombre"/>
                        <span class="block mt-1 w-full">{{$alumno->nombre}}</span>
                    </div>
                    <div>
                        <x-input-label for="email" value="Email"/>
                        <span class="block mt-1 w-full">{{$alumno->email}}</span>
                    </div>
                    <div>
                        <x-input-label for="edad" value="Edad"/>
                        <span class="block mt-1 w-full">{{$alumno->edad}}</span>
                    </div>
                    
                    <!-- Nueva sección para mostrar el Proyecto -->
                    <div>
                        <x-input-label for="proyecto" value="Proyecto"/>
                        <span class="block mt-1 w-full">
                            @if($alumno->proyecto)
                                {{ $alumno->proyecto->titulo }}
                            @else
                                <span class="text-gray-600">No asignado</span>
                            @endif
                        </span>
                    </div>

                </div> {{--end div datos alumno--}}
                
                <div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>{{__("Idioma")}}</th>
                            <th>{{__("Nivel")}}</th>
                            <th>{{__("Título")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($alumno->idiomas as $idioma)
                            <tr class="hover:bg-gray-200">
                                <td>{{$idioma->idioma}}</td>
                                <td>{{$idioma->nivel}}</td>
                                <td>{{$idioma->titulo}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="flex flex-row justify-between p-3">
                <a href="{{ route('alumnos.index') }}" class="btn btn-primary">Volver</a>
            </div>

        </div>
    </div>
</x-layouts.layout>
