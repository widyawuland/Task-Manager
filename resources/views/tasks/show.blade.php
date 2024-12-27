<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Show Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="container mt-4">
                        <div class="card shadow-lg rounded-lg border border-gray-200">
                            <div class="card-body p-6">
                                <!-- Data tugas dan informasi berada dalam satu box abu-abu -->
                                <div class="bg-gray-100 p-6 rounded-lg shadow-sm mb-4">
                                    <div class="grid grid-cols-2 gap-1 border border-gray-800">
                                        <div class="flex justify-start border-b border-gray-800 py-1 px-2">
                                            <strong class="text-lg">Title :</strong>
                                        </div>
                                        <div class="text-lg border-b border-gray-800 py-1 px-2">{{ $task->title }}</div>
                                
                                        <div class="flex justify-start border-b border-gray-800 py-1 px-2">
                                            <strong class="text-lg">User ID :</strong>
                                        </div>
                                        <div class="text-lg border-b border-gray-800 py-1 px-2">{{ $task->user_id }}</div>
                                
                                        <div class="flex justify-start border-b border-gray-800 py-1 px-2">
                                            <strong class="text-lg">Description :</strong>
                                        </div>
                                        <div class="text-lg border-b border-gray-800 py-1 px-2">{{ $task->description }}</div>
                                
                                        <div class="flex justify-start border-b border-gray-800 py-1 px-2">
                                            <strong class="text-lg">Status :</strong>
                                        </div>
                                        <div class="text-lg border-b border-gray-800 py-1 px-2">{{ $task->status }}</div>
                                
                                        <div class="flex justify-start border-b border-gray-800 py-1 px-2">
                                            <strong class="text-lg">Due Date :</strong>
                                        </div>
                                        <div class="text-lg border-b border-gray-800 py-1 px-2">{{ \Carbon\Carbon::parse($task->due_date)->format('l, j F Y') }}</div>
                                
                                        <div class="flex justify-start py-1 px-2">
                                            <strong class="text-lg">Category :</strong>
                                        </div>
                                        <div class="text-lg py-1 px-2">{{ $task->category ? $task->category->name : 'No category' }}</div>
                                    </div>
                                </div>                                
                                <!-- Tombol berada di kanan bawah card -->
                                <div class="flex justify-end gap-6 mt-6">
                                    <a href="{{ route('tasks.edit', $task) }}" style="background-color: #c6be4e; color: #ffffff;" class="bg-yellow-500 hover:bg-yellow-600 text-black rounded-md px-4 py-2 font-semibold">
                                        Edit
                                    </a>
                                    <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" style="background-color: #d45e5e; color: #ffffff;" class="bg-red-500 hover:bg-red-600 text-black rounded-md px-4 py-2 font-semibold">
                                            Delete
                                        </button>
                                    </form>
                                    <a href="{{ route('tasks.index') }}" style="background-color: #57505c; color: #ffffff;"class="bg-gray-500 hover:bg-gray-600 text-black rounded-md px-4 py-2 font-semibold">
                                        Back to Tasks
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')