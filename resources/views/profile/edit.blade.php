<script>
    window.onload = () => {
        let bannerNode = document.querySelector('[alt="www.000webhost.com"]').parentNode.parentNode;
        bannerNode.parentNode.removeChild(bannerNode);
    }
</script>
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto space-y-6 max-w-7xl sm:px-6 lg:px-8">
            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>


            <div class="p-4 bg-white shadow sm:p-8 sm:rounded-lg">
                <h1>Developer</h1>
                <ul class="list-disc pl-5">
                    <li><a href="https://www.instagram.com/syalfrhiii_/" class="text-[#272727] capitalize text-lg">syaid alfarishi (UI/UX designer and Frontend web Developer)</a></li>
                    <li><a href="https://www.instagram.com/the_bibiee/" class="text-[#272727] capitalize text-lg">habibie bayezid wildan (DevOps and Backend Developer)</a></li>
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>