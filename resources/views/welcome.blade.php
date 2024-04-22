@extends('template.main')

@section('root')
    @include('components.fragment.navbar')

    @if (session('success_message'))
        <div>
            @include('components.fragment.alert')
        </div>
    @endif


    <section class="relative px-2 bg-white py-14 md:px-0">
        <div class="container items-center max-w-6xl px-8 mx-auto xl:px-5">
            <div class="flex flex-wrap items-center space-x-5 md:flex-nowrap sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="font-extrabold tracking-tight text-gray-900 text-3 xl sm:text-5xl md:text-4xl lg:text-5xl xl:text-6xl">
                            <span class="block xl:inline">Aplikasi E-voting</span>
                            <span class="block text-[#fd7014] xl:inline" data-primary="indigo-600">Osis SMKN 2 Padang
                                Panjang</span>
                        </h1>
                        <p class="mx-auto text-base text-[#393e46]/70 sm:max-w-md lg:text-xl md:max-w-3xl">
                            Ayo! berpartisipasi melakukan voting untuk menentukan SMKN 2 Padang Panjang Kedepannya karena
                            pilihan anda menentukan masa depan smk
                        </p>
                        <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                            <a href="/login"
                                class="flex items-center w-full px-20 py-3 mb-3 text-lg text-white bg-[#fd7014] rounded-md sm:mb-0 hover:bg-[#fd7014] sm:w-auto"
                                data-primary="indigo-600" data-rounded="rounded-md">
                                Ayo Vote
                                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-1" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                    <polyline points="12 5 19 12 12 19"></polyline>
                                </svg>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div>
                        <img src="{{ asset('assets/hero.jpg') }}" alt="hero"
                            class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl">
                    </div>
                </div>
            </div>
        </div>
    </section>









    {{-- cta --}}
    <section class="">
        <div class="container flex flex-col items-center px-4 py-12 mx-auto text-center">
            <h2 class="text-2xl font-bold tracking-tight text-[#222831] xl:text-3xl dark:text-white">
                Aplikasi E-Voting SMKN 2 Padang Panjang
            </h2>

            <p class="block max-w-4xl mt-4 text-gray-500 dark:text-gray-300">
                Aplikasi inovatif untuk pemilihan ketua OSIS SMKN 2 Padang Panjang yang mudah, aman, dan transparan.
            </p>

            <div class="grid items-center grid-cols-1 gap-4 mt-10 md:items-start md:grid-cols-3 justify-items-stretch">
                <div class="flex flex-col items-center justify-center space-y-3">
                    <div class="w-[100px] h-[100px] bg-[#fd7014] rounded-sm">
                    </div>
                    <p class="text-base font-bold lg:text-xl">Pemungutan suara secara elektronik</p>
                    <p>Siswa dapat memilih ketua OSIS mereka secara online dengan mudah dan aman.</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-3">
                    <div class="w-[100px] h-[100px] bg-[#fd7014] rounded-sm">
                    </div>
                    <p class="text-base font-bold lg:text-xl">Hasil Pimilihan yang real-time</p>
                    <p>Hasil pemilihan dapat dilihat secara real-time, sehingga prosesnya transparan dan akuntabel</p>
                </div>
                <div class="flex flex-col items-center justify-center space-y-3">
                    <div class="w-[100px] h-[100px] bg-[#fd7014] rounded-sm">
                    </div>
                    <p class="text-base font-bold lg:text-xl">Meningkatkan partisipasi pemilih</p>
                    <p>Aplikasi ini diharapkan dapat meningkatkan partisipasi siswa dalam pemilihan ketua OSIS.</p>
                </div>
            </div>
        </div>
    </section>
    {{-- end cta --}}



    @include('components.fragment.footer')
@endsection
