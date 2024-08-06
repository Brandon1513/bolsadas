<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="mb-10 text-2xl font-bold text-center"> Mis Notificaciones</h1>
                   <div class="divide-y divide-gray-200">
                        @forelse ( $notificaciones as $notificacion )
                            <div class="p-5  lg:justify-between lg:flex lg:items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{$notificacion->data['nombre_vacante']}}</span>
                                    </p>
                                    <p>Hace:
                                        <span class="font-bold">{{$notificacion->created_at->diffForHumans()}}</span>
                                    </p>
                                </div>
                                <div class="mt-5 lg:mt-0">
                                    <a class="p-3 text-sm font-bold uppercase bg-indigo-900 rounded-lg text-white" href="{{route('candidatos.index',$notificacion->data['id_vacante'])}}">Ver Candidatos</a>
                                </div>
                            </div>
                        @empty
                            <p class="text-gray-600 Text-center"> No hay notificaciones Nuevas</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
