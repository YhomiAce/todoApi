<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\TodoResource;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth:api', ['except'=> ['getAllTodos', 'store', 'destroy', 'index', 'show', 'update']]);
        $this->user = $this->guard()->user();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todos = TodoResource::collection(Todo::all());
        return response()->json([
        "data" => $todos
        ], 200);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'=>"required",
            'completed' => 'required|boolean'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ], 400);
        }

        $todo = new Todo();
        $todo->title = $request->title;
        $todo->completed = $request->completed;
        $todo->userId = 1;
        if($todo->save()){
            return response()->json([
                'status' => true,
                'todo' => $todo
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return response()->json([
            'status' => true,
            'todo' => $todo
        ]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        if ($todo->update($request->all())) {
            return response()->json([
                "status" => true,
                "message" => "The Todo was updated successfully.",
                "data" => $todo
            ]);
        }else {
            return response()->json([
                "status" => false,
                "message" => "Todo could not be deleted."
            ]);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        if ($todo->delete()) {
            return response()->json([
                "status" => true,
                "message" => "The Todo was deleted successfully."
            ]);
        }else {
            return response()->json([
                "status" => false,
                "message" => "Todo could not be deleted."
            ]);
        }

    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function getAllTodos()
    {
        $todos = TodoResource::collection(Todo::all());
        return response()->json([
            "status" => true,
            "data" => $todos
            ], 200);
    }
}
