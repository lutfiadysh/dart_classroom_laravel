@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Collect Task')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="float-center row">
        <div class=" col-2"></div>
        <div class="card col-8">
          <div class="card-header-success text-center">
            <h3 class="m-0 card-title">{{$task->task_title}}</h3>
            <p class="card-subtitle">Collect your tasks and relax!</p>
          </div>
          <div class="card-body text-center">
              <a href="{{route('class',$class->id)}}" class="m-2"><h4 class="card-title">{{$class->class_name}}</h4></a>
            @foreach ($taskcollect as $col)
                @if($task->id == $col->task_id && $col->user_id == Auth::user()->id)
                    <div class="alert alert-info">You've collected the task!</div>
                @else
                <form action="{{route('task.store')}}" method="post">
                    @csrf
                    <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                    <input type="hidden" name="task_id" value="{{$task->id}}">
                    <input type="file" name="task_file" id="" class="form-control">
                    <button type="submit" class="btn btn-primary btn-sm mt-4">Collect!</button>
                </form>
                @endif
            @endforeach
          </div>
        </div>
        <div class=" col-2"></div>
      </div>
    </div>
  </div>
@endsection


