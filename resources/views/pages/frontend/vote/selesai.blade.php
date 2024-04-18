@extends('template.main')

@section('root')
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="  w-[500px]  mx-auto  mt-10 p-5 border border-gray-300 rounded-md min-h-[500px]">
            <div class="w-full h-[325px] bg-gray-400 rounded">

            </div>
            <h1 class="mt-5 text-2xl font-bold text-center capitalize">Terima Kasih Telah Memilih</h1>
            <p class="mt-5 text-justify capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                Officiis, cum? acide mamae ota ssd</p>


            <button class="block px-10 py-2 mx-auto mt-5 text-lg font-bold text-center text-white bg-blue-500 rounded">Klik
                Jika
                Selesai</=>
        </div>
    </form>
@endsection
