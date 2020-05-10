<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Member;
use App\Classroom;
use App\Task;
use App\Collect;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.joinclass');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        Member::create($request->all());

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Task::create($request->all());

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id,$id2,Collect $task)
    {
        $class = Classroom::findOrFail($id);
        $task = Task::findOrFail($id2);
        $mmb = Member::all();
        $usertask = Collect::where('user_id',Auth::user()->id)->where('task_id',$task->id)->first();
        $collected = Collect::where('task_id','=',$task->id)->get();
        // $usertask = Auth::user()->collectTask($id2);
        return view('pages.collect',compact('mmb','class','task','usertask','collected'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'task_file' => 'required|image|mimes:jpeg,docx,png,jpg,gif,svg|max:2048',
          ]);
  
          $image = new Collect;
  
          if ($request->file('task_file')) {
            $imagePath = $request->file('task_file');
            $imageName = $imagePath->getClientOriginalName();
  
            $path = $request->file('task_file')->storeAs('uploads', $imageName, 'public');
          }
  
          $image->task_file = '/storage/'.$path;
          $image->user_id = $request->user_id;
          $image->task_id = $request->task_id;
          $image->collected = $request->collected;
          $image->save();

        //   Collect::create([
        //     'task_file' => $request->task_file,
        //     'user_id' => $request->user_id,
        // ]);
  
          return back()->with('success', 'Image uploaded successfully');
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
    public function calendar()
    {
        $task = Task::all();
        return view('pages.calendar',compact('task'));
    }
}
