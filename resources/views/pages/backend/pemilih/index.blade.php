@extends('template.main')
@section('root')
@if (session('success_message'))
<div>
    @include('components.fragment.alert')
</div>
@endif

<section class="relative grid xl:grid-cols-10 gap-x-0" x-data="{ bukaSidebar: false }">
    <div class="absolute inset-0 z-40 transition-all duration-300 xl:left-0 xl:relative xl:col-span-2" :class="bukaSidebar ? 'left-0' : '-left-96'">
        @include('components.fragment.sidebar')
    </div>

    <div class="h-screen col-span-10 xl:col-span-8 ">
        <div class="xl:hidden bg-blue-500 w-full h-[50px]  flex items-center justify-end p-5">
            <div class="h-[50px] w-[50px] relative z-50">
                <label class="hamburger">
                    <input type="checkbox" @click="bukaSidebar = !bukaSidebar">
                    <svg viewBox="0 0 32 32">
                        <path class="line line-top-bottom" d="M27 10 13 10C10.8 10 9 8.2 9 6 9 3.5 10.8 2 13 2 15.2 2 17 3.8 17 6L17 26C17 28.2 18.8 30 21 30 23.2 30 25 28.2 25 26 25 23.8 23.2 22 21 22L7 22">
                        </path>
                        <path class="line" d="M7 16 27 16"></path>
                    </svg>
                </label>
            </div>
        </div>

        <div class="p-5 md:p-10">
            <h1 class="text-3xl font-semibold">Pemilih</h1>
            <div class="grid items-center w-full grid-cols-5 py-5 justify-items-start md:gap-x-10">
                <form action="{{ route('pemilih.store') }}" method="POST" enctype="multipart/form-data" class="w-full col-span-4">
                    @csrf
                    <div class="mt-5">
                        <x-input-label for="pemilih" :value="__('File Pemilih')" />
                        <x-text-input id="pemilih" name="pemilih" type="file" class="block w-full p-2.5 mt-1 uppercase border" placeholder=" " />
                        <x-input-error class="mt-2" :messages="$errors->get('pemilih')" />
                    </div>
                    <div>
                        <x-primary-button class="px-8 py-2 mt-5 mb-10 text-xl" type="submit">{{ __('Simpan Data ') }}</x-primary-button>
                    </div>
                </form>
                <form action="{{ route('pemilih.destroy') }}" method="POST" class="col-span-1">
                    @csrf
                    @method('DELETE')
                    <div>
                        <x-primary-button class="px-8 py-2 mt-5 mb-10 text-xl -translate-y-5 bg-red-500" type="submit">{{ __('Hapus Semua Data Pemilih') }}</x-primary-button>
                    </div>
                </form>

            </div>
        </div>


        <div class="p-5 md:px-10">
            <h1 class="text-3xl font-semibold">Tutorial</h1>

            <ul class="pl-5 mt-5 list-decimal">
                <li>Mintalah data nama Siswa dan Guru (NAMA SAJA TANPA GELAR), tidak masalah jika nama terdapat huruf besar / kecil</li>
                <li class="mt-5">Untuk data guru pada bagian nis , isi dengan angka random sebanyak 6 huruf contoh (323244) ,dan jangan dimulai dari angka 0 </li>
                <li class="mt-5">
                    <div>
                        <span class="capitalize">Masukan data nama ke Microsoft Exel, Buat Data Pada Microsoft Exel sesuai dengan format yang benar</span>
                        <div class="relative flex items-center justify-start mt-2 space-x-10">
                            <img src="{{ asset('assets/step/step_1_false.png') }}" alt="step1" class="border-4 border-[#272727] relative z-10">
                            <img src="{{ asset('assets/step/step_1_true.png') }}" alt="step2" class="border-4 border-[#272727] relative z-10">

                            <img src="{{ asset('assets/benar.svg') }}" alt="step2" class="absolute z-20 w-7 right-[28.5rem] top-[5rem]">

                            <img src="{{ asset('assets/salah.svg') }}" alt="step2" class="absolute z-20 w-9 left-44 top-24">

                        </div>
                    </div>
                </li>


                <li class="mt-5">
                    <div class="flex flex-col space-y-2">
                        <span class="capitalize">jangan lupa untuk menyimpan nama dan nis (password) guru, print lalu berikan akun guru kepada guru bersangkutan agar mereka dapat masuk dan melaukukan pemilihan, contoh (username : NASRIAL , password : 212055)</span>

                    </div>
                </li>


                <li class="mt-5">
                    <div>
                        <span class="capitalize">Pada Bagian Kiri Bawah Exel , pastikan anda menghapus Sheet2 & Sheet3,
                            Klik Kanan Pada Sheet2 & Sheet3 untuk menampilan menu Delete</span>
                        <div class="relative flex items-center justify-start mt-2 space-x-10">
                            <img src="{{ asset('assets/step/step_2_false.png') }}" alt="step1" class="border-4 border-[#272727] relative z-10">
                            <img src="{{ asset('assets/step/step_2_true.png') }}" alt="step2" class="border-4 border-[#272727] relative z-10">

                            <img src="{{ asset('assets/benar.svg') }}" alt="step2" class="absolute z-20 w-7 left-[22rem] top-10">

                            <img src="{{ asset('assets/salah.svg') }}" alt="step2" class="absolute z-20 w-9 left-[11rem] top-10">

                        </div>
                    </div>
                </li>


                <li class="mt-10">
                    <div>
                        <span class="capitalize">Jika Sudah Selesai Anda Dapat Melakukan Save , pastikan format file
                            <span class="font-bold text-green-500 lowercase">.xlsx</span></span>
                        <div class="relative flex items-center justify-start mt-2 space-x-10">
                            <img src="{{ asset('assets/step/step_3_true.png') }}" alt="step2" class="border-4 border-[#272727] relative z-10">
                            <img src="{{ asset('assets/benar.svg') }}" alt="ste32" class="absolute z-20 w-7 left-44 top-14">
                        </div>
                    </div>
                </li>

                <li class="mt-10">
                    <span class="capitalize">Kemudian click Tombol <span class="px-5 py-2 text-white bg-red-500 rounded">hapus semua data pemilih</span> Di atas
                        untuk
                        Melakukan Penghapusan data
                        Pemilih sebelumnya</span>
                </li>

                <li class="mt-10">
                    <span>KeMudian Anda Dapat Melakukan Upload Data Pemilih Yang baru</span>
                </li>
                <li class="mt-10">
                    <span>melakukan reset total suara dari kandidat calon , dapat dilakukan dengan menghapus data kandidat </span>
                </li>
            </ul>
        </div>

    </div>
</section>
@endsection