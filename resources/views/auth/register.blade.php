<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"  enctype="multipart/form-data">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nome')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Senha')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirmar Senha')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>


        <div class="mt-4">
            <x-input-label for="idade" :value="__('Data de nascimento')" />
            <x-text-input id="idade" class="block mt-1 w-full" type="date" name="idade" :value="old('idade')" />
            <x-input-error :messages="$errors->get('idade')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="telefone" :value="__('Telefone')" />
            <x-text-input id="telefone" class="block mt-1 w-full" type="tel" name="telefone" :value="old('telefone')"  />
            <x-input-error :messages="$errors->get('telefone')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="endereco" :value="__('Endereço')" />
            <x-text-input id="endereco" class="block mt-1 w-full" type="text" name="endereco" :value="old('endereco')" />
            <x-input-error :messages="$errors->get('endereco')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="tp_faixa" :value="__('Faixa')" />
                <select  class=" block mt-1 w-full underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" name="tp_faixas">
                    <option></option>
                    @foreach ($tp_faixas as $tp_faixa)
                        <option value="{{ $tp_faixa->id }}">{{ $tp_faixa->nome }}</option>
                    @endforeach
                </select>
        </div>

        <div class="mt-4">
            <x-input-label for="grau" :value="__('Grau')" />
            <x-text-input id="grau" class="block mt-1 w-full" type="number" name="grau" max="5" :value="old('grau')" value='0' />
            <x-input-error :messages="$errors->get('grau')" class="mt-2" />
        </div>

        <div class="mt-4">
            <x-input-label for="foto" :value="__('Foto')" />
            <input type="file" id="foto" name='foto' class="form-control-file" accept=".jpg, .jpeg, .png"/>
            <x-input-error :messages="$errors->get('foto')" class="mt-2"/>
        </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Já possui registro?') }}
            </a>

            <x-primary-button class="ml-4">
                {{ __('Registrar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
