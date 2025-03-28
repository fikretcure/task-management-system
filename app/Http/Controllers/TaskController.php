<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('tasks.index', ['tasks' => Task::auth()->latest('id')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        Task::create(['user_id' => session()->get('auth')->id] + $request->validated());
        return redirect()->route('tasks.index')->with('success', 'Gorev Basariyle Eklendi');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($task)
    {
        $task = Task::auth()->findOrFail($task);
        return view('tasks.edit', ['task' => $task]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $task)
    {
        $task = Task::auth()->findOrFail($task);
        $task->update($request->validated());
        return redirect()->route('tasks.index')->with('success', 'Gorev Basariyle Duzenlendi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task = Task::auth()->findOrFail($task);
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Gorev Basariyle Silindi');
    }


    public function complete($id)
    {
        Task::auth()->findOrFail($id)->update(['status' => 2]);
        return redirect()->route('tasks.index')->with('success', 'Gorev Basariyle Tamamlandi');
    }
}
