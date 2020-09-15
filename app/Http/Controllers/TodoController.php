<?php

namespace App\Http\Controllers;

use App\todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Todo::all();
        return response()->json($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('home');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$todo = Todo::create($request->all());

        // dd($request->title);
        $todo = new Todo;
        $todo->title = $request->title;
        $todo->checkbox = 0;
        $todo->save();
        return response()->json($todo);

    }

    /**
     * Display the specified resource.
     *
     * @param \App\todo $todo
     * @return \Illuminate\Http\Response
     */
    public function show(todo $todo)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\todo $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(todo $todo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\todo $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id )
    {
        //dd($request);
        $todo = Todo::find($id);
        $todo->title = $request->title;
        $todo->checkbox = 0;
        $todo->save();
        return response()->json($todo);


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\todo $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $res=Todo::where('id',$id)->delete();
        return response()->json('successfully deleted');

    }
}
