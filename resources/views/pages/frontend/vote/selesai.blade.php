@extends('template.main')
@section('root')
<section>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <div class="  w-[500px]  mx-auto  mt-10 p-5 border border-gray-300 rounded-md min-h-[500px]">
            <div class="w-full h-[325px] bg-gray-400 rounded">
                <img src="{{ asset('assets/thanks.jpg') }}" alt="thanks" class="object-cover w-full h-full rounded-md">
            </div>
            <h1 class="mt-5 text-2xl font-bold text-center capitalize">Terima Kasih Telah MemilihI</h1>
            <p class="mt-3 text-justify capitalize">Gunakan hak pilih Anda dengan bijak! Pilihlah calon ketua OSIS yang
                memiliki visi, misi, dan program kerja yang jelas untuk membawa SMKN 2 Padang Panjang menuju masa depan
                yang gemilang.</p>
            <button class="block px-10 py-2 mx-auto mt-5 text-lg font-bold text-center text-white bg-blue-500 rounded rounded-lg">Klik
                Jika
                Selesai
            </button>
        </div>
    </form>
</section>

<!-- ini yg lama -->
<!-- <script src="https://run.confettipage.com/here.js"
        data-confetticode="U2FsdGVkX19T2ETPxvgIQWPXf9JmRJb3nHoINEoykb0AmcWbGQEhePNsp3SGIBX2bmRy/TCZ7sll2cAaZaAkaMzrteeSP7razB64AZdLX2B2oVVGJ6jyR4PJ2L1Co1r4Irow+VUOYY4Y28eCtdocXEVpnVMYbKt+9Hl+5cxqiaNiq9xeXJCqUeqYwXVIhNMe5qdCd5gQDo/WQ2Zz1UBcfL7+DlgU9OZ2bAsQ3+ZkVIvK3MGqkzKtm0eglYffNkUggMv3Iqy9GfxYBDrh2Fseh/PHFw3m0sf3TgMMtgUGEOcl/UQNIrCI1u9A0LVmt4XkC5xgWm5VziMpYVuOglnnpHUtxspnbQr5EeDfSoaPpzD4/KrIurANkSGPvh04MfxXeL/8rVDapiI8mGYeuuVbPuapC0aMquIQGfuj4IMV32K/6AMedBlK89ojkMCdpF64wNVb8/bZr7Woo413FaR7kX6f7R46/i/mSfz1h4x2FtXAx0jp7qLVd3tdgRhlLYU2Qqk6lseL5aAuoHbGJVz1oJVh+F8niJHKxnknV1j2M2g+gs+NpGKohs0ubMrL4BaEl/l9+W2ff8j8Qn6hQCEwNSPmGpu8ADVUbUvgyXJtnof0oCBIu0KJVA9oBuhwhFEU/ivo71W59yTjA57L4+IadA==">
    </script> -->

<!-- ini yg baru (untuk di hostinglan)-->
<script src="https://run.confettipage.com/here.js" data-confetticode="U2FsdGVkX1/53BxHq3fb/6cHQpZclMKMz7O15NZdjyOObYz5D+AS3PLJ+/8hTzf7a9q3f7zDJkHq5JLRcI+aPSLo9o3veuaAqgQhkoYMIW3U+uEImjlsATn2JnQxsMjn+ALXqyC7nNW8vCuulGWc557/R8b8hRay6/eOMfgKdKFde+ouvbQ7olWORCPO7GiaB+B/VKOWFnS5ZhPQQ3palOVd8EnuDQXgU9TmfA8SQlWE0rkrbmP97pYCV3sdZwXlKbDE8D5j7uyHUqkrB2rV/rRUrzX/ta2oApOhS5R9ufBdTFCjS06niJhE4ReoR3gIuJyy4Igu69m2aHe24UjAsxFP2c/RK6KN2F+XOMWPVDKjUc8i/T09/QYCRRvwC0p5wYrIYO+f23Pt6nkWzl8efNtDcow7e4Isk9DvWU8d5X5Xl38KzKGCFlwge7QvBB3YdYUeYEEgv0k8LZp2+qIfeM3VGYSgVWGRym4MBYB5s3mk2LDPHgZ1gMyWN75vK5gXDlu3hB+KA5sQSLGMq9rk7Y/dmChpiaxg/csFmLLj0+W8EuuJYxeHJEBGah4s8L6HvD6c9g3u0AaMnoD5dkCc0rOUu3ULa9mB6/qx5u+y5kVbs5ojtEPP6ag4iSG7TPsaLcqOX6oM56bndzEEOrq4SNbk6PaDEL/Y/Z20b/tfP03nKww3Aunvta2Z3kl/lcGZuOOE8t7nGmq0U0lO4G4pjg=="></script>
@endsection