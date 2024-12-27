<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Selamat Datang Di Website Sederhana!!') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-xl text-gray-800 leading-tight text-center">
                        {{ __('Aplikasi Manajemen Tugas') }}
                    </h2>
                    <nav class="mt-4">
                        <a href="{{ route('tasks.index') }}" class="text-blue-500 hover:text-blue-700">
                            {{ __('Go to Tasks') }}
                        </a>
                    </nav>
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')