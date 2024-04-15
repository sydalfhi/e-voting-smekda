{{-- @dd($data[0]) --}}
@extends('template.main')

@section('root')
    <section class="grid items-center grid-cols-1 gap-5 p-10 mt-10 place-items-center">

        <div class="flex items-center justify-center space-x-10">
            <div class="h-20 bg-red-500 min-w-20"></div>
            <div class="flex flex-col items-center justify-center space-y-3 text-center">
                <h1 class="font-semibold md:text-3xl">TEMTUKAN PILIHAN ANDA</h1>
                <p class="text-base">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores, delectus?</p>
            </div>
            <div class="h-20 bg-blue-500 min-w-20"></div>
        </div>


        <div x-data="{ modalOpen: false, nomerKandidat: null }"
            class="relative grid w-full grid-cols-2 px-10 mx-auto mt-20 gap-x-4 gap-y-8 place-items-center">

            {{-- kandidat 1 --}}

            @foreach ($data as $item)
                <div @click="nomerKandidat = '{{ $item->nomer }}'; modalOpen = true"
                    class="cursor-pointer w-full min-w-[150px] max-w-[250px] overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                    <img class="object-cover w-full h-56" src="{{ asset('assets/' . $item->poster) }}" alt="avatar">

                    <div class="py-5 text-center">
                        <a href="#" class="block text-xl font-bold text-gray-800 capitalize dark:text-white"
                            tabindex="0" role="link">Kandidat {{ $item->nomer }}</a>
                        <div class="flex flex-col ">
                            <span
                                class="text-sm text-gray-700 capitalize dark:text-gray-200">{{ $item->calon_ketua }}</span>
                            <span
                                class="text-sm text-gray-700 capitalize dark:text-gray-200">{{ $item->calon_wakil }}</span>
                        </div>
                    </div>
                </div>
            @endforeach



            <!-- Modal -->
            <div x-show="modalOpen" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>
                    {{-- <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span> --}}
                    <form method="POST" action="{{ route('kandidat.vote') }}">
                        @csrf


                        <div
                            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="px-4 pt-5 pb-2 bg-white sm:p-6 sm:pb-2">
                                @foreach ($data as $item)
                                    <template x-if="nomerKandidat === '{{ $item->nomer }}'">
                                        <div>
                                            <h1 class="py-3 text-5xl font-bold text-center">{{ $item->nomer }}</h1>
                                            <div class="flex justify-start space-x-10">
                                                <img src="{{ asset('assets/' . $item->poster) }}" class="max-w-[100px]"
                                                    alt="avatar">
                                                <div
                                                    class="flex flex-col items-start justify-center text-xl font-semibold capitalize">
                                                    <p>{{ $item->calon_ketua }}</p>
                                                    <p>{{ $item->calon_wakil }}</p>
                                                </div>
                                            </div>



                                            <div class="mt-8">
                                                <p class="font-semibold uppercase">visi</p>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio, vitae.
                                                </p>
                                            </div>
                                            <div class="py-3">
                                                <p class="font-semibold uppercase">Misi</p>
                                                <ul class="pl-4 list-decimal">
                                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
                                                        quam.</li>
                                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
                                                        quam.</li>
                                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
                                                        quam.</li>
                                                    <li>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nihil,
                                                        quam.</li>
                                                </ul>
                                            </div>
                                            <input hidden type="number" name="kandidat" value="{{ $item->nomer }}"
                                                class="border-none" />
                                        </div>
                                    </template>
                                @endforeach

                            </div>
                            <div class="grid grid-cols-12 gap-5 px-4 pb-3 bg-gray-50">

                                <div class="grid col-span-8 py-3 font-semibold text-white bg-gray-600 rounded-md cursor-pointer active:bg-red-500 place-items-center"
                                    @click="modalOpen = false">

                                    Close
                                </div>

                                <button type="submit" class="block col-span-4">
                                    <div class="grid py-3 font-semibold text-white bg-blue-600 rounded-md cursor-pointer active:bg-blue-800 place-items-center"
                                        @click="modalOpen = false">
                                        Pilih
                                    </div>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>



        </div>




    </section>
    @include('components.fragment.footer')
@endsection
