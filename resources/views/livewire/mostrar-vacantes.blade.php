<!-- resources/views/livewire/mostrar-vacantes.blade.php -->
<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
        @forelse ($vacantes as $vacante)
            <div class="p-6 text-gray-900 bg-white border-b md:flex md:justify-between md:items-center">
                <div class="space-y-3">
                    <a href="{{route('vacantes.show', $vacante->id)}}" class="text-xl font-bold">
                        {{$vacante->titulo}}
                    </a>
                    <p class="text-sm font-bold text-gray-600">{{$vacante->empresa}}</p>
                    <p class="text-sm text-gray-500">Último día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
                </div>
                <div class="flex flex-col items-stretch gap-3 mt-5 md:flex-row md:mt-0">
                    <a href="{{route('candidatos.index', $vacante)}}" class="px-4 py-2 text-xs font-bold text-center text-white uppercase rounded-lg bg-slate-800">{{$vacante->candidatos->count()}} Candidatos</a>
                    <a href="{{route('vacantes.edit', $vacante->id)}}" class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-blue-800 rounded-lg">Editar</a>
                    <button wire:click="$dispatch('mostrarAlerta',{vacante_id:{{$vacante->id}} })" class="px-4 py-2 text-xs font-bold text-center text-white uppercase bg-red-600 rounded-lg">Eliminar</button>
                </div>
            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay vacantes que mostrar</p>
        @endforelse
    </div>
    <div class="mt-10 ">
        {{$vacantes->links()}}
    </div>
</div>
@push('scripts')
    
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('mostrarAlerta', (vacanteId) => {
                Swal.fire({
                    title: '¿Eliminar Vacante?',
                    text: "Una Vacante eliminada no se puede recuperar:(",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Si, eliminar!',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // ELiminar vacante
                        @this.call('eliminarVacante',vacanteId);
                        Swal.fire(
                            'Se eliminó la Vacante',
                            'Eliminado correctamente',
                            'success'
                        )
                    }
                })
 
            });
        });
    </script> 
@endpush