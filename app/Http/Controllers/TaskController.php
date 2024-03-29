<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use Carbon\Carbon;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($date)
    {
        //Retrieve all records from the Task model in the database on a specific date.
        $tasks = Task::whereDate('date', new Carbon($date))->get();
        return $tasks;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        Task::create($request->validated());
        return['message' => 'Task Created'];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, $id)
    {
        // Find the task by its ID
        $task = Task::find($id);

        // If the task doesn't exist, return an error message
        if (!$task) {
            return response()->json(['error' => 'Task not found'], 404);
        }

        // Update the task with the fields provided in the request
        $status = $task->update($request->only(['name', 'description', 'date', 'status']));

        // Return a response based on the update status
        return response()->json([
            'status' => $status,
            'message' => $status ? 'Task Updated!' : 'Error Updating Task'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Find the task by its ID
        $existingTask = Task::find($id);
        // If the task exists, delete it and return a success message
        if ($existingTask) {
            $existingTask->delete();
            return response()->json(['message' => 'Task deleted'], 200);
        }
       // If the task doesn't exist, return a not found error message
        return response()->json(['error' => 'Task not found'], 404);
    }
}
