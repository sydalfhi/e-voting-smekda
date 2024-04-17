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
                <h1 class="text-3xl font-semibold">Halo Admin</h1>


                <div
                    class="flex flex-col items-center justify-center mt-10 space-y-10 md:flex-row md:space-y-0 md:justify-between md:pr-10 xl:pr-16 ">

                    <div>
                        <div class="loader">
                            <div class="box1"></div>
                            <div class="box2"></div>
                            <div class="box3"></div>
                        </div>
                    </div>
                    <div>
                        <div class="loader">
                            <div class="box1"></div>
                            <div class="box2"></div>
                            <div class="box3"></div>
                        </div>
                    </div>
                    <div>
                        <div class="loader">
                            <div class="box1"></div>
                            <div class="box2"></div>
                            <div class="box3"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>
@endsection
