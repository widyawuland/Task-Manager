<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Category;

class TaskController extends Controller
{
    public function index()
    {
        // $tasks = Task::all();
        $tasks = Task::with('category', 'user')->get();
        return view('tasks.index', compact('tasks'));
        // $task = Task::find(1);
        // $task->load('category', 'user');
    }

    public function create()
    {
        // Mengambil semua kategori untuk dikirim ke view
        $categories = Category::all();
        return view('tasks.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        // Menyimpan data tugas baru
        Task::create($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task berhasil dibuat.');
    }

    public function show(Task $task)
    {
        return view('tasks.show', compact('task'));

    }

    public function edit(Task $task)
    {
    $categories = Category::all();

    // Kirim data task dan kategori ke view
    return view('tasks.edit', compact('task', 'categories'));
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'nullable',
            'status' => 'in:pending,in_progress,completed',
            'due_date' => 'nullable|date',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }

    public function destroy(Task $task)
    {
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    // public function showOverdueTasks()
    // {
    //     $overdueTasks = Task::overdue()->get();
    //     return view('tasks.overdue', compact('overdueTasks'));
    // }
}
