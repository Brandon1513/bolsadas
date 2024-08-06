<form class="space-y-5 md:w-1/2" wire:submit.prevent='crearVacante' >

    <!-- Email Address -->
    <div>
        <x-input-label for="titulo" :value="__('Titulo Vacante')" />
        
        <x-text-input id="titulo" class="block w-full mt-1" type="text" wire:model="titulo" :value="old('titulo')" placeholder="Titulo Vacante"/>

        @error('titulo')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
        
    </div>
    <div>
        <x-input-label for="salario" :value="__('Salario Mensual')" />
        <select id="salario" wire:model="salario" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            <option value="">-- Seleccione --</option>
            @foreach ($salarios as $salario )
                <option value="{{$salario->id}}">{{$salario->salario}}</option>
                
            @endforeach

        </select>

        @error('salario')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
        
        
    </div>
    <div>
        <x-input-label for="categoria" :value="__('Categoria')" />
        <select id="categoria" wire:model="categoria" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">

            <option value="">-- Seleccione --</option>
            @foreach ($categorias as $categoria )
                <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                
            @endforeach
        </select>
        @error('categoria')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
        
        
    </div>
    <div>
        <x-input-label for="empresa" :value="__('Empresa')" />
        
        <x-text-input id="empresa" class="block w-full mt-1" type="text" wire:model="empresa" :value="old('empresa')" placeholder="Dasavena"/>

        @error('empresa')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
        
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo día para portularse')" />
        
        <x-text-input id="ultimo_dia" class="block w-full mt-1" type="date" wire:model="ultimo_dia" :value="old('ultimo_dia')"/>
        
        @error('ultimo_dia')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
    </div>
    <div>
        <x-input-label for="ultimo_dia" :value="__('Descripción Puesto')" />
        
    <textarea class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 h-72" wire:model="descripcion" placeholder="Descripción general del puesto, experiencia"/>
    </textarea>
    @error('descripcion')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
    </div>
    <div>
        <x-input-label for="imagen" :value="__('Imagen')" />
        
        <x-text-input id="imagen" class="block w-full mt-1" type="file" wire:model="imagen" accept="image/*" />
        <div class="my-5 w-80">
            @if ($imagen)
                Imagen:
                <img src="{{$imagen->temporaryUrl()}}" alt="">
                
            @endif
        </div>
        
        @error('imagen')
        <livewire:mostrar-alerta :message="$message"/>
           
        @enderror
    </div>
    <x-primary-button>
        Crear Vacante
    </x-primary-button>
</form>