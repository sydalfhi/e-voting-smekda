@extends('template.main')

@section('root')
    <section>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <div class="  w-[500px]  mx-auto  mt-10 p-5 border border-gray-300 rounded-md min-h-[500px]">
                <div class="w-full h-[325px] bg-gray-400 rounded">

                </div>
                <h1 class="mt-5 text-2xl font-bold text-center capitalize">Terima Kasih Telah Memilih</h1>
                <p class="mt-5 text-justify capitalize">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Officiis, cum? acide mamae ota ssd</p>


                <button
                    class="block px-10 py-2 mx-auto mt-5 text-lg font-bold text-center text-white bg-blue-500 rounded">Klik
                    Jika
                    Selesai</=>
            </div>
        </form>

    </section>
    <script src="https://run.confettipage.com/here.js"
        data-confetticode="U2FsdGVkX19T2ETPxvgIQWPXf9JmRJb3nHoINEoykb0AmcWbGQEhePNsp3SGIBX2bmRy/TCZ7sll2cAaZaAkaMzrteeSP7razB64AZdLX2B2oVVGJ6jyR4PJ2L1Co1r4Irow+VUOYY4Y28eCtdocXEVpnVMYbKt+9Hl+5cxqiaNiq9xeXJCqUeqYwXVIhNMe5qdCd5gQDo/WQ2Zz1UBcfL7+DlgU9OZ2bAsQ3+ZkVIvK3MGqkzKtm0eglYffNkUggMv3Iqy9GfxYBDrh2Fseh/PHFw3m0sf3TgMMtgUGEOcl/UQNIrCI1u9A0LVmt4XkC5xgWm5VziMpYVuOglnnpHUtxspnbQr5EeDfSoaPpzD4/KrIurANkSGPvh04MfxXeL/8rVDapiI8mGYeuuVbPuapC0aMquIQGfuj4IMV32K/6AMedBlK89ojkMCdpF64wNVb8/bZr7Woo413FaR7kX6f7R46/i/mSfz1h4x2FtXAx0jp7qLVd3tdgRhlLYU2Qqk6lseL5aAuoHbGJVz1oJVh+F8niJHKxnknV1j2M2g+gs+NpGKohs0ubMrL4BaEl/l9+W2ff8j8Qn6hQCEwNSPmGpu8ADVUbUvgyXJtnof0oCBIu0KJVA9oBuhwhFEU/ivo71W59yTjA57L4+IadA==">
    </script>
@endsection
