<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::header()->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        return Task::create(['user_id' => $request->header('user')] + $request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, $task)
    {
        $task = Task::header()->findOrFail($task);
        return $task->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($task)
    {
        $task = Task::header()->findOrFail($task);
        return $task->delete();
    }


    public function complete($id)
    {
        return Task::header()->findOrFail($id)->update(['status' => 2]);
    }
}
