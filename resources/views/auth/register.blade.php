<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Nama Lengkap')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required
                autofocus autocomplete="name" placeholder="JOHN DOE" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Nis -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('NIS')" />

            <x-text-input id="password" class="block w-full mt-1" type="number" name="password" required
                autocomplete="new-password" placeholder="NIS ANDA" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Sudah Punya Akun?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Mendaftar') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
