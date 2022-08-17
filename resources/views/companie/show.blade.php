<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companie Show') }}
        </h2>
    </x-slot>


    <div class="flex justify-center mt-12">
        <div class="rounded-lg shadow-lg bg-white max-w-sm">
            <a href="#!" data-mdb-ripple="true" data-mdb-ripple-color="light">
                <img class="rounded-t-lg" src="{{ Storage::url($companie->logo) }}" alt="" />
            </a>
            <div class="p-6">
                <h5 class="text-gray-900 text-xl font-medium mb-2"> {{ $companie->name }}</h5>
                <p class="text-gray-700 text-base mb-4">
                    {{ $companie->email }}
                </p>

                <a href="http://{{ $companie->website }}" target="_blank" rel="noopener noreferrer"
                    class=" inline-block px-6 py-2.5 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out">{{ $companie->website }}</a>
            </div>
        </div>
    </div>

</x-app-layout>
