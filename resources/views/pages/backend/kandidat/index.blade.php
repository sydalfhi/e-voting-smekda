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
                <h1 class="text-3xl font-semibold">Pasangan Calon</h1>
                <h2 class="font-semibold text-gray-500 text-md">Tambahkan Pasangan Calon ketua Osis</h2>

                <p class="flex justify-end my-3">
                    <a href="{{ route('kandidat.create') }}">
                        <x-primary-button>
                            {{ __('Tambah Data Paslon') }}
                        </x-primary-button>
                    </a>
                </p>



                <div class="grid w-full grid-cols-1 py-5 bg-red md:grid-cols-2 xl:grid-cols-3 md:gap-x-5">


                    @forelse ($data as $item)
                        <div class="w-full border-2 border-dashed border-[#252525]/50 rounded min-h-[600px] p-3">
                            <div class="flex flex-col items-center justify-around">

                                <h1 class="text-3xl font-bold">{{ $item->kandidat->nomer }}</h1>

                                <img src="{{ asset('assets/kandidat/' . $item->kandidat->poster) }}" alt="avatar"
                                    class="rounded object-cover block w-[200px] bg-[#272727] aspect-square">
                                <div class="flex flex-col items-center justify-center mt-2">
                                    <h1 class="font-semibold text-[#272727] uppercase">{{ $item->kandidat->calon_ketua }}
                                    </h1>
                                    <p class="mx-auto font-bold text-center text-gray-500">&</p>
                                    <h1 class="font-semibold text-[#272727] uppercase">{{ $item->kandidat->calon_wakil }}
                                    </h1>
                                </div>
                            </div>

                            <div class="mt-2">
                                <p class="text-xl font-bold uppercase">visi</p>
                                <p class="text-[13px] text-slate-600">{{ $item->visi }}</p>
                                <p class="mt-3 text-xl font-bold uppercase">misi</p>
                                <p>
                                <ul class="pl-5 list-decimal text-[13px] text-slate-600">
                                    @foreach ($item->misi as $misiKandidat)
                                        @if ($misiKandidat == null)
                                        @else
                                            <li>{{ $misiKandidat }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                                </p>

                                <div class="grid grid-cols-2 mt-3 gap-x-3">
                                    <a href="{{ route('kandidat.edit', $item->kandidat->id) }}"
                                        class="block py-2 font-bold text-center text-black bg-yellow-500 rounded">
                                        Edit
                                    </a>

                                    <form class="block py-2 font-bold text-center text-white rounded bg-rose-500"
                                        action="{{ route('kandidat.destroy', $item->kandidat->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <h1
                            class="text-xl text-left capitalize w-full col-span-4  px-5 py-10 rounded-lg bg-gray-200 text-[#272727] ">
                            tidak ada data kandidat</h1>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
