{{-- resources/views/profile/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <h2>Editar Perfil</h2>
    </x-slot>

    <section>
        <header>
            <h2>{{ __('Profile Information') }}</h2>
            <p>{{ __("Actualiza tu nombre y correo.") }}</p>
        </header>

        {{-- Mostrar mensajes de éxito --}}
        @if(session('success'))
            <div class="mb-4 text-green-600">
                {{ session('success') }}
            </div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
            @csrf
            @method('patch')

            {{-- Nombre --}}
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name"
                              name="name"
                              type="text"
                              class="mt-1 block w-full"
                              :value="old('name', $user->name)"
                              required
                              autofocus />
                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            {{-- Email --}}
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email"
                              name="email"
                              type="email"
                              class="mt-1 block w-full"
                              :value="old('email', $user->email)"
                              required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Botón Guardar --}}
            <div class="flex items-center justify-end mt-4">
                <x-primary-button>
                    {{ __('Guardar cambios') }}
                </x-primary-button>
            </div>
        </form>
    </section>
</x-app-layout>