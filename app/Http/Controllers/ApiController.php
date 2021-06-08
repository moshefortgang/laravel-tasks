<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class ApiController extends Controller {

    public function getAllTasks() {
        $tasks = Task::get()->toJson(JSON_PRETTY_PRINT);
        return response($tasks, 200);
    }

    public function getTask(Request $request) {
        if (Task::where('id', $request->id)->exists()) {
            $task = Task::where('id', $request->id)->get()->toJson();
            var_dump(response($task, 200));
            return response($task, 200);
          } else {
            return response()->json([
              "message" => "task not found"
            ], 404);
          }
    }

    public function createTask(Request $request) {
        $task = new Task;
        $task->name = $request->name;
        $task->completed = $request->completed;
        $task->save();
    
        return response()->json([
            "message" => "task record created"
        ], 201);    }

    public function updateTask(Request $request, $id) {
        if (Task::where('id', $id)->exists()) {
            $task = Task::find($id);
            $task->name = is_null($request->name) ? $task->name : $request->name;
            $task->completed = is_null($request->completed) ? $task->completed : $request->completed;
            $task->save();
    
            return response()->json([
                "message" => "records updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "task not found"
            ], 404);
            
        }    }

    public function deleteTask($id) {
        if(Task::where('id', $id)->exists()) {
            $task = Task::find($id);
            $task->delete();
    
            return response()->json([
              "message" => "records deleted"
            ], 202);
          } else {
            return response()->json([
              "message" => "Task not found"
            ], 404);
          }    }
}
