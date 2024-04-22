@extends('template.main')

@section('root')
    <section class="relative grid xl:grid-cols-10 gap-x-0" x-data="{ bukaSidebar: false }">
        <div class ="absolute inset-0 z-40 transition-all duration-300 xl:left-0 xl:relative xl:col-span-2"
            :class="bukaSidebar ? 'left-0' : '-left-96'">
            @include('components.fragment.sidebar')
        </div>

        <div class="col-span-10 xl:col-span-8">
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
                <h1 class="text-3xl font-semibold">Edit Data Kandidat </h1>


                <form action="{{ route('kandidat.update', $kandidat->id) }}" enctype="multipart/form-data" method="POST">
                    @csrf
                    @method('PUT')
                    <h1 class="mt-10 text-xl font-semibold text-gray-800 capitalize">Data kandidat
                        Nomer{{ $kandidat->nomer }}</h1>

                    <div class="mt-5">
                        <x-input-label for="nomer" :value="__('Nomer Urut')" />
                        <x-text-input value="{{ $kandidat->nomer }}" id="nomer" name="nomer" type="text"
                            class="block w-full mt-1" placeholder="01" />
                        <x-input-error class="mt-2" :messages="$errors->get('nomer')" />
                    </div>

                    <div class="mt-5">
                        <x-input-label for="calon_ketua" :value="__('Nama Calon Ketua')" />
                        <x-text-input value="{{ $kandidat->calon_ketua }}" id="calon_ketua" name="calon_ketua"
                            type="text" class="block w-full mt-1 uppercase" placeholder="john doe" />
                        <x-input-error class="mt-2" :messages="$errors->get('calon_ketua')" />
                    </div>
                    <div class="mt-5">
                        <x-input-label for="calon_wakil" :value="__('Nama Calon Wakil')" />
                        <x-text-input value="{{ $kandidat->calon_wakil }}" id="calon_ketua" name="calon_wakil"
                            type="text" class="block w-full mt-1 uppercase" placeholder="katrina doe " />
                        <x-input-error class="mt-2" :messages="$errors->get('calon_wakil')" />
                    </div>

                    <div class="mt-5">
                        <x-input-label for="poster" :value="__('Foto Kandidat')" />
                        <img id="output" src="{{ asset('assets/kandidat/' . $kandidat->poster) }}" alt="avatar"
                            class="w-[100px] hover:cursor-pointer">
                        <x-text-input value="{{ $kandidat->poster }}" id="poster" name="poster" type="file"
                            class="block w-full p-2.5 mt-1 uppercase border" placeholder="katrina doe "
                            onchange="document.getElementById('output').src = window.URL.createObjectURL(this.files[0])" />
                        <x-input-error class="mt-2" :messages="$errors->get('poster')" />
                    </div>

                    <h1 class="mt-10 text-xl font-semibold text-gray-800">Visi Misi Kandidat</h1>

                    <div class="mt-5">
                        <x-input-label for="visi" :value="__('Visi')" />
                        <textarea name="visi" id="visi"
                            class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500"
                            rows="2">{{ $kandidat->VisiMisi->visi }}</textarea>
                        <x-input-error class="mt-2" :messages="$errors->get('visi')" />
                    </div>


                    <div class="mt-5">
                        <x-input-label for="calon_ketua" :value="__('Misi')" />

                        <ul class="pl-5 list-disc">
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[0] }}" id="misi_1" name="misi_1"
                                        type="text" class="block w-full mt-1 uppercase" placeholder="misi-1" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[1] }}" id="misi_2" name="misi_2"
                                        type="text" class="block w-full mt-1 uppercase" placeholder="misi-2" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[2] }}" id="misi_3" name="misi_3"
                                        type="text" class="block w-full mt-1 uppercase" placeholder="misi-3" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[3] }}" id="misi_4" name="misi_4"
                                        type="text" class="block w-full mt-1 uppercase" placeholder="misi-4" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[4] }}" id="misi_5"
                                        name="misi_5" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-5" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[5] }}" id="misi_6"
                                        name="misi_6" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-6" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[6] }}" id="misi_7"
                                        name="misi_7" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-7" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[7] }}" id="misi_8"
                                        name="misi_8" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-8" />
                                </div>
                            </li>

                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[8] }}" id="misi_9"
                                        name="misi_9" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-9" />
                                </div>
                            </li>
                            <li>
                                <div class="mt-0">
                                    <x-text-input value="{{ $kandidat->VisiMisi->misi[9] }}" id="misi_10"
                                        name="misi_10" type="text" class="block w-full mt-1 uppercase"
                                        placeholder="misi-10" />
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div>
                        <x-primary-button class="px-8 py-2 mt-5 mb-10 text-xl"
                            type="submit">{{ __('Simpan') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection
