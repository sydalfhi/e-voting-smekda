{{-- @dd($data[0]) --}}
@extends('template.main')

@section('root')
    <section class="grid items-center grid-cols-1 gap-5 p-10 mt-10 md:p-5 lg:-10 place-items-center">

        <div class="flex flex-col items-center justify-center space-y-5">
            <div class="flex items-center justify-center space-x-5">
                <img src="{{ asset('assets/osis.png') }}" class="w-24 " />
                <img src="{{ asset('assets/kpo.png') }}" class="w-20 " />
                <img src="{{ asset('assets/smk.png') }}" class="w-20" />
            </div>
            <div class="flex flex-col items-center justify-center space-y-3 text-center">
                <h1 class="font-bold md:text-4xl">TENTUKAN PILIHAN ANDA</h1>
                <p class="text-base capitalize">Klik untuk melihat detail dari pasangan calon ketua osis</p>
            </div>

        </div>


        <div x-data="{ modalOpen: false, nomerKandidat: null }"
            class="relative grid w-full grid-cols-2 px-10 mx-auto mt-10 gap-x-4 gap-y-8 place-items-center xl:px-32">

            {{-- kandidat 1 --}}

            @foreach ($data as $item)
                <div class="cursor-pointer w-full min-w-[150px] max-w-[250px] md:max-w-[290px] overflow-hidden bg-white rounded-lg shadow-lg "
                    @click="nomerKandidat = '{{ $item->nomer }}'; modalOpen = true">

                    <div class="flex flex-col bg-white border shadow-sm rounded-xl ">
                        <img class="object-cover w-full h-60" src="{{ asset('assets/kandidat/' . $item->poster) }}" <h3
                            class="text-lg font-bold text-[222831] " alt="avatar">

                        <h3
                            class=" text-xl font-semibold bg-[#222831] p-2 -mt-11 relative text-white w-[50%] rounded-xl text-center ml-2">
                            Paslon {{ $item->nomer }}
                        </h3>

                        <div class="py-2 ml-3.5">
                            <div
                                class="flex flex-col items-center justify-center py-2 -space-y-1 text-xl font-medium capitalize text-stone-700">
                                <span>{{ $item->calon_ketua }}</span>
                                <span>-</span>
                                <span>{{ $item->calon_wakil }}</span>

                            </div>
                        </div>
                    </div>

                </div>
            @endforeach




            <!-- Modal -->
            <div x-show="modalOpen" class="fixed inset-0 z-10 overflow-y-auto" aria-labelledby="modal-title" role="dialog"
                aria-modal="true">
                <div class="flex items-end justify-center min-h-screen px-4 pt-4 text-center sm:block sm:p-0">
                    <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75" aria-hidden="true"></div>

                    <form method="POST" action="{{ route('kandidat.vote') }}">
                        @csrf


                        <div
                            class="inline-block overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="px-4 pt-5 pb-2 bg-white sm:p-6 sm:pb-2">

                                @foreach ($data as $item)
                                    <template x-if="nomerKandidat === '{{ $item->nomer }}'">
                                        <div>
                                            <h1 class="py-3 text-5xl font-bold text-center">{{ $item->nomer }}</h1>
                                            <div class="flex flex-col justify-start space-y-5">
                                                <div
                                                    class="w-full h-[300px] bg-[#222831] grid place-items-center rounded-md">
                                                    <img src="{{ asset('assets/kandidat/' . $item->poster) }}"
                                                        class="object-cover w-[300px] h-[300px]" alt="avatar">
                                                </div>
                                                <div
                                                    class="flex flex-col items-start justify-center text-2xl font-semibold capitalize">
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
                                                    @foreach ($item->VisiMisi->misi as $misiKandidat)
                                                        @if ($misiKandidat == null)
                                                        @else
                                                            <li>{{ $misiKandidat }}</li>
                                                        @endif
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <input hidden type="number" name="kandidat" value="{{ $item->nomer }}"
                                                class="border-none" />
                                        </div>
                                    </template>
                                @endforeach

                            </div>
                            <div class="grid grid-cols-12 gap-5 px-4 pb-3 bg-gray-50">

                                <div class="grid col-span-7 py-3 font-semibold text-white bg-gray-600 rounded-md cursor-pointer active:bg-red-500 place-items-center"
                                    @click="modalOpen = false">

                                    Batal
                                </div>

                                <button type="submit" class="block col-span-5">
                                    <div class="grid py-3 font-semibold text-white bg-blue-600 rounded-md cursor-pointer active:bg-blue-800 place-items-center"
                                        @click="modalOpen = false">
                                        Pilih Paslon {{ $item->nomer }}
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
