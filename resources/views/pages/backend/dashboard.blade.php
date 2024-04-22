@extends('template.main')

@section('root')
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
                <h1 class="text-3xl font-semibold">Dashboard</h1>


                <div
                    class="flex flex-col items-center justify-center mt-10 space-y-10 md:flex-row md:space-y-0 md:justify-between md:pr-10 xl:pr-10 md:space-x-6">


                    <div class="w-full h-[230px] rounded-md bg-[#222831] relative overflow-hidden">
                        <img src="{{ asset('assets/gambar1.svg') }}" alt="gambar"
                            class="absolute h-full left-1 -bottom-10">
                        <img src="{{ asset('assets/gambar3.svg') }}" alt="gambar"
                            class="absolute h-full rotate-180 right-1 -top-10">
                        <h1 class="absolute text-3xl font-bold text-white left-10 top-7 ">Hello Admin</h1>
                        <h1 class="absolute text-xl text-white right-10 bottom-7 ">Welcome To Dashboard</h1>
                    </div>


                    <div
                        class="min-w-[480px] flex items-center justify-center mt-5 py-5 px-2 space-x-10 border rounded-md shadow ">
                        <div>
                            <div class="w-[190px] h-[190px]  grid place-items-center ">
                                <canvas id="semuaDataPemilih"></canvas>
                            </div>
                        </div>

                        <div>
                            <ul class="text-lg list-disc">
                                <li>Data Pemilih : 800</li>
                                <li>Sudah Memilih : 600</li>
                                <li>Belum Memilih : 200</li>
                            </ul>
                        </div>
                    </div>

                </div>


                <h1 class="mt-14">
                    <span class="text-3xl font-bold">Hasil Pemilihan</span>
                </h1>
                <div class="grid grid-cols-1 mt-2 md:grid-cols-12 gap-x-10">
                    <div class="col-span-8 p-2 border rounded-md shadow">
                        <canvas id="bar-paslon"></canvas>
                    </div>
                    <div class="col-span-4 p-2 border rounded-md shadow">
                        <canvas id="donat_paslon"></canvas>
                    </div>
                </div>





            </div>
        </div>

    </section>

    <section class="mt-40">
        @include('components.fragment.footer')
    </section>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let polarPemilih = document.getElementById('semuaDataPemilih').getContext('2d');
        const data_pemmilih = {
            labels: false,
            datasets: [{
                label: ['Data Pemilih', 'Sudah Memilih', 'Belum Memilih'],
                data: [800, 600, 200],
                backgroundColor: [
                    '#fd7014',
                    'rgb(255, 99, 132)',
                    '#252525',
                ]
            }]
        };


        let myChart = new Chart(polarPemilih, {
            type: 'polarArea',
            data: data_pemmilih,
            options: {}
        });



        let dougnut_Paslon = document.getElementById('donat_paslon').getContext('2d');
        const doughnut_paslon = {
            labels: ['Data Pemilih', 'Sudah Memilih', 'Belum Memilih'],
            datasets: [{
                label: ['suara'],
                data: [800, 600, 200],
                backgroundColor: [
                    '#fd7014',
                    'rgb(255, 99, 132)',
                    '#252525',
                ]
            }]
        };


        let myChart_1 = new Chart(dougnut_Paslon, {
            type: 'doughnut',
            data: doughnut_paslon,
        });





        let bar_paslon = document.getElementById('bar-paslon').getContext('2d');
        const bar_paslon_data = {
            labels: [
                'Paslon 01',
                'Paslon 02',
                'Belum Memilih'
            ],
            datasets: [{
                label: 'Data Suara Paslon',
                data: [404, 310, 90],
                backgroundColor: [
                    '#fd7014',
                    'rgb(255, 99, 132)',
                    '#252525',
                ],
                hoverOffset: 4
            }]
        };


        let myChart2 = new Chart(bar_paslon, {
            type: 'bar',
            data: bar_paslon_data,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            },
        });
    </script>
@endsection
