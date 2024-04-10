@extends('template.main')

@section('root')
    <section class="grid items-center grid-cols-1 gap-10 mt-10 place-items-center">

        <div class="flex items-center justify-center space-x-10">
            <div class="w-20 h-20 bg-red-500"></div>
            <div class="flex flex-col items-center justify-center space-y-3 text-center">
                <h1 class="text-3xl font-semibold">TEMTUKAN PILIHAN ANDA</h1>
                <p class="">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Dolores, delectus?</p>
            </div>
            <div class="w-20 h-20 bg-blue-500"></div>
        </div>


        <div x-data="{ isOpen1: false, isOpen2: false, isOpen3: false }"
            class="relative grid w-full grid-cols-3 grid-rows-3 gap-4 px-20 mx-auto mt-20 place-items-center">
            {{-- kandidat 1 --}}
            <div @click="handleClick(1)"
                class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <img class="object-cover w-full h-56"
                    src="https://images.unsplash.com/photo-1542156822-6924d1a71ace?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=60"
                    alt="avatar">

                <div class="py-5 text-center">
                    <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0"
                        role="link">John Doe</a>
                    <span class="text-sm text-gray-700 dark:text-gray-200">Software Engineer</span>
                </div>
            </div>
            {{-- kandidat 2 --}}
            <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <img class="object-cover w-full h-56"
                    src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=334&q=80"
                    alt="avatar">

                <div class="py-5 text-center">
                    <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0"
                        role="link">John Doe</a>
                    <span class="text-sm text-gray-700 dark:text-gray-200">Software Engineer</span>
                </div>
            </div>
            {{-- kandidat 3 --}}
            <div class="w-full max-w-xs overflow-hidden bg-white rounded-lg shadow-lg dark:bg-gray-800">
                <img class="object-cover w-full h-56"
                    src="https://images.unsplash.com/photo-1542291026-7eec264c27ff?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=320&q=80"
                    alt="avatar">

                <div class="py-5 text-center">
                    <a href="#" class="block text-xl font-bold text-gray-800 dark:text-white" tabindex="0"
                        role="link">John Doe</a>
                    <span class="text-sm text-gray-700 dark:text-gray-200">Software Engineer</span>
                </div>
            </div>



        </div>


    </section>
@endsection

<script>
    function handleClick(param) {
        alert(param)
    }
</script>
