<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreRequest;
use App\Http\Requests\Task\UpdateRequest;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\JsonResponse;
use phpDocumentor\Reflection\Types\Collection;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Task::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = new Task();
        $data = $request->all();
        return Task::create([
            'name' => $data['name'],
            'description' => $data['description'],
            'date' => $data['date'],
        ]);
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
    public function edit(Task $task)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,  $id)
    {
        //Check if Task exists on database
        $existingItem = Task::find($id);  
        
        //If it exsist then change the status of the task and update the colomn updated at
        if($existingItem){
           $existingItem->status = $request->task['status'] ? true : false;
           $existingItem->updated_at = Task::now() ;
           $existingItem->save();
           return $existingItem;
        } 
        return "Task not found";;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //Check if Task exists on the database
        $existingTask = Task::find($id);
        if ($existingTask) {
            $existingTask->delete();
            return "Task deleted";
        }
        return "Task not found";
    }
}
