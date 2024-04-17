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
                <h1 class="text-3xl font-semibold">Kandidat</h1>


                <div class="grid w-full grid-cols-1 py-5 bg-red md:grid-cols-2 xl:grid-cols-3 md:gap-x-5">


                    @forelse ($data as $item)
                        <div class="w-full border-2 border-dashed border-[#252525] rounded max-h-[600px] p-2">
                            <div class="flex items-center justify-around">

                                <div class="block w-[120px] bg-[#272727] aspect-square">
                                    <img src="{{ asset('assets/' . $item->kandidat->poster) }}" alt="avatar">
                                </div>
                                <div class="flex flex-col items-start justify-center">
                                    <h1 class="text-2xl font-bold">{{ $item->kandidat->nomer }}</h1>
                                    <h1 class="font-semi-bold text-[#272727] uppercase">{{ $item->kandidat->calon_ketua }}
                                    </h1>
                                    <h1 class="font-semi-bold text-[#272727] uppercase">{{ $item->kandidat->calon_wakil }}
                                    </h1>
                                </div>
                            </div>

                            <div class="mt-2">
                                <p class="text-xl font-bold">visi</p>
                                <p class="text-base text-gray-700">{{ $item->visi }}
                                </p>
                                <p class="mt-3 text-xl font-bold">misi</p>
                                <p>
                                <ul class="pl-5 list-decimal">
                                    @foreach ($item->misi as $misiKandidat)
                                        @if ($misiKandidat == null)
                                        @else
                                            <li>{{ $misiKandidat }}</li>
                                        @endif
                                    @endforeach
                                </ul>
                                </p>
                            </div>
                        </div>
                    @empty
                        <h1
                            class="text-xl text-left capitalize w-full col-span-4  px-5 py-10 rounded-lg bg-gray-200 text-[#272727] ">
                            tidak ada data kandidat</h1>
                    @endforelse
                </div>

                <a href="{{ route('kandidat.create') }}">
                    <div
                        class="cursor-pointer grid place-items-center bg-gray-50 w-full h-[350px] rounded-lg  border-4 border-[#252525] border-dashed">
                        <div
                            class="grid place-items-center bg-gray-50 w-[150px] h-[150px] rounded-lg mt-10 border-4 border-[#252525] border-dashed">
                            <h1 class="text-6xl font-bold">+</h1>
                        </div>

                    </div>
                </a>
            </div>
        </div>
    </section>
@endsection
