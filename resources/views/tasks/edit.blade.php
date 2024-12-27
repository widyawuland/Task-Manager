<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Edit Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
{{-- 
                    <!-- Card untuk form -->
                    <div class="bg-white p-6 rounded-lg shadow-lg">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Edit Task</h2> --}}

                        <!-- Form untuk mengedit task -->
                        <form action="{{ route('tasks.update', $task) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <!-- Input User ID -->
                            <div class="mb-4">
                                <label for="user_id" class="block text-lg font-medium text-gray-700">User ID</label>
                                <input type="text" name="user_id" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $task->user_id }}" required>
                            </div>

                            <!-- Input Title -->
                            <div class="mb-4">
                                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                                <input type="text" name="title" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ $task->title }}" required>
                            </div>

                            <!-- Input Description -->
                            <div class="mb-4">
                                <label for="description" class="block text-lg font-medium text-gray-700">Description</label>
                                <textarea name="description" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" rows="4" required>{{ $task->description }}</textarea>
                            </div>

                            <!-- Dropdown Status -->
                            <div class="mb-4">
                                <label for="status" class="block text-lg font-medium text-gray-700">Status</label>
                                <select name="status" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                    <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                    <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                                </select>
                            </div>

                            <!-- Input Due Date -->
                            <div class="mb-4">
                                <label for="due_date" class="block text-lg font-medium text-gray-700">Due Date</label>
                                <input type="date" name="due_date" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') }}" required>
                            </div>

                            <!-- Dropdown Category -->
                            <div class="mb-4">
                                <label for="category_id" class="block text-lg font-medium text-gray-700">Category</label>
                                <select name="category_id" class="mt-2 block w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $task->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Tombol Submit -->
                            <div class="mt-6 flex justify-end gap-6 mt-5">
                                <button type="submit" style="background-color: #379152; color: #ffffff;" class="bg-blue-500 hover:bg-blue-600 text-black rounded-lg px-6 py-3 font-semibold shadow-md focus:outline-none">
                                    Update Task
                                </button>                                
                                <a href="{{ route('tasks.index') }}" style="background-color: #57505c; color: #ffffff;" class="bg-gray-500 hover:bg-gray-600 text-white rounded-lg px-6 py-3 font-semibold shadow-md focus:outline-none">
                                    Cancel
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')