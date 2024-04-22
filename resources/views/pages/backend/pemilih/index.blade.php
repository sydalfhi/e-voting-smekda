@extends('template.main')
@section('root')
    @if (session('success_message'))
        <div>
            @include('components.fragment.alert')
        </div>
    @endif

    <section class="relative grid xl:grid-cols-10 gap-x-0" x-data="{ bukaSidebar: false }">
        <div class ="absolute inset-0 z-40 transition-all duration-300 xl:left-0 xl:relative xl:col-span-2"
            :class="bukaSidebar ? 'left-0' : '-left-96'">
            @include('components.fragment.sidebar')
        </div>

        <div class="h-screen col-span-10 xl:col-span-8 ">
            <div class="xl:hidden bg-blue-500 w-full h-[50px]  flex items-center justify-end p-5">
                <div class="h-[50px] w-[50px] relative z-50">
                    <label class="hamburger">
                        <input type="checkbox" @click="bukaSidebar = !bukaSidebar">
                        <svg viewBox="0 0 32 32">
                            <path class="line line-top-bottom"
                                d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                            </path>
                            <path class="line" d="M7 16 27 16"></path>
                        </svg>
                    </label>
                </div>
            </div>
            <div class="h-screen p-5 md:p-10 ">
                <h1 class="text-3xl font-semibold">Pemilih</h1>
                <div class="grid w-full grid-cols-1 py-5 bg-red md:gap-x-5">
                    <form action="{{ route('pemilih.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-5">
                            <x-input-label for="pemilih" :value="__('File Pemilih')" />
                            <x-text-input id="pemilih" name="pemilih" type="file"
                                class="block w-full p-2.5 mt-1 uppercase border" placeholder=" " />
                            <x-input-error class="mt-2" :messages="$errors->get('pemilih')" />
                        </div>
                        <div>
                            <x-primary-button class="px-8 py-2 mt-5 mb-10 text-xl"
                                type="submit">{{ __('Simpan') }}</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
