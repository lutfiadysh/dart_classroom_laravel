<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\User;
use App\Member;
use App\Task;

class ClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $class = Classroom::all();
        $member = Member::all();
        return view('dashboard',compact('class','member'));  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.addclass');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Classroom $model)
    {
        $model->create($request->all());

        return redirect()->route('home.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $class = Classroom::findOrFail($id);
        $users = User::all();
        $member = Member::where('classroom_id','=',$class->id)->get();
        $task = Task::where('classroom_id','=',$class->id)->get();

        return view('pages.class',compact('class','users','user','member','task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$id2)
    {
        $member = Member::all();
        $class = Classroom::findOrFail($id);
        $users = User::all();
        $user = User::findorFail($id2);

        Member::create(
            [
                'classroom_id' => $class->id,
                'user_id' => $user->id
            ]
        );

        return redirect()->route('home.index');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
