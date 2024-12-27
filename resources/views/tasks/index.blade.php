<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Task') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!-- Button to Create New Task (Positioned on the left) -->
                    <div class="mb-6 flex justify-start">
                        <a href="{{ route('tasks.create') }}" style="background-color: #896ca0; color: #ffffff;" class="px-6 py-3 rounded-md hover:bg-purple-700 focus:outline-none focus:ring-2 focus:ring-purple-500 text-lg">
                            Create New Task
                        </a>
                    </div>
                    

                    <!-- Task Table -->
                    <div class="overflow-x-auto">
                        <!-- Center the table by adding flexbox utilities -->
                        <div class="flex justify-center">
                            <table class="min-w-full table-auto border-collapse text-lg">
                                <thead>
                                    <tr class="bg-gray-200 text-left text-sm font-semibold text-gray-700">
                                        <th class="px-6 py-3 border-b">ID</th>
                                        <th class="px-6 py-3 border-b">User ID</th>
                                        <th class="px-6 py-3 border-b">Title</th>
                                        <th class="px-6 py-3 border-b">Description</th>
                                        <th class="px-6 py-3 border-b">Status</th>
                                        <th class="px-6 py-3 border-b">Due Date</th>
                                        <th class="px-6 py-3 border-b">Category</th>
                                        <th class="px-6 py-3 border-b text-center">Actions</th> <!-- Centered 'Actions' header -->
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($tasks as $task)
                                        <tr class="border-t border-gray-300">
                                            <td class="px-6 py-4 text-sm">{{ $task->id }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->user_id }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->title }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->description }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->status }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->due_date }}</td>
                                            <td class="px-6 py-4 text-sm">{{ $task->category ? $task->category->name : 'No category' }}</td>
                                            <td class="px-6 py-4 text-sm space-x-4 text-center">
                                                <!-- View Button -->
                                                <a href="{{ route('tasks.show', $task) }}" style="background-color: #3677cb; color: #ffffff;" 
                                                class="px-4 py-2 text-black bg-blue-500 hover:bg-blue-600 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 text-lg">View</a>
                                                
                                                <!-- Edit Button -->
                                                <a href="{{ route('tasks.edit', $task) }}" style="background-color: #c6be4e; color: #ffffff;"
                                                class="px-4 py-2 text-black bg-yellow-500 hover:bg-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 text-lg">Edit</a>
                                                
                                                <!-- Delete Button -->
                                                <form action="{{ route('tasks.destroy', $task) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background-color: #d45e5e; color: #ffffff;" class="bg-red-500 hover:bg-red-600 text-black rounded-md px-4 py-2 font-semibold">
                                                        Delete
                                                    </button>
                                                </form>

                                                <!-- Show restore button if the task is trashed (soft deleted) -->
                                                @if ($task->trashed()) 
                                                    <a href="{{ route('tasks.restore', $task->id) }}" class="px-4 py-2 text-black bg-yellow-500 hover:bg-yellow-600 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-500 text-lg">Restore</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
@include('partials.footer')