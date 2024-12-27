<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Tambahkan Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Form to Create Task -->
                    <form action="{{ route('tasks.store') }}" method="POST" class="space-y-6">
                        @csrf
                        
                        <!-- User ID Field -->
                        <div class="form-group">
                            <label for="user_id" class="text-lg font-medium text-gray-700">User ID</label>
                            <input type="text" name="user_id" class="form-input mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Title Field -->
                        <div class="form-group">
                            <label for="title" class="text-lg font-medium text-gray-700">Title</label>
                            <input type="text" name="title" class="form-input mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
                        </div>

                        <!-- Description Field -->
                        <div class="form-group">
                            <label for="description" class="text-lg font-medium text-gray-700">Description</label>
                            <textarea name="description" class="form-textarea mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
                        </div>

                        <!-- Status Field -->
                        <div class="form-group">
                            <label for="status" class="text-lg font-medium text-gray-700">Status</label>
                            <select name="status" class="form-select mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                <option value="pending">Pending</option>
                                <option value="in_progress">In Progress</option>
                                <option value="completed">Completed</option>
                            </select>
                        </div>

                        <!-- Category Field -->
                        <div class="form-group">
                            <label for="category_id" class="text-lg font-medium text-gray-700">Category</label>
                            <select name="category_id" class="form-select mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Due Date Field -->
                        <div class="form-group">
                            <label for="due_date" class="text-lg font-medium text-gray-700">Due Date</label>
                            <input type="date" name="due_date" class="form-input mt-2 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" style="background-color: #896ca0; color: #ffffff;" class="bg-green-500 hover:bg-green-600 text-black rounded-lg px-6 py-3 font-semibold shadow-md focus:outline-none">
                                Create
                            </button>
                        </div>                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')