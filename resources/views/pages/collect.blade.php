@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Collect Task')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="float-center row">
        @if(session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
        @endif


        <div class=" col-2"></div>
        <div class="card col-8">
          <div class="card-header-success text-center">
            <h3 class="m-0 card-title">{{$task->task_title}}</h3>
            <p class="card-subtitle">Collect your tasks and relax!</p>
          </div>
          
          <div class="card-body text-center">
            <a href="{{route('class',$class->id)}}" class="m-2"><h4 class="card-title">{{$class->class_name}}</h4></a>
              @if($class->leader_id == Auth::user()->id)

              <button type="button" id="submit" data-toggle="modal" data-target="#Modal" class="btn btn-dark">Check</button>

              @else
              @if ($usertask  != null)

              <div class="alert alert-success">You've collected the Task</div>

              @else

              <form action="{{route('task.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{Auth::user()->id}}" name="user_id">
                <input type="hidden" name="task_id" value="{{$task->id}}">
                <input type="hidden" name="collected" value="{{true}}">
                <input type="file" name="task_file" id="" class="form-control">
                <button type="submit" class="btn btn-primary btn-sm mt-4">Collect!</button>
              </form>

              @endif
              @endif
          </div>
        </div>
        <div class=" col-2"></div>
      </div>
    </div>
  </div>
@endsection

<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb--2" id="exampleModalLabel">Member who has finished the task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
          <div class="modal-body table-responsive">
              <table id="myTable" class="table table-bordered">
                  <thead>
                      <tr><th>#</th>
                          <th>File</th>
                          <th>name</th>
                      </tr>
                  </thead>
                  <tbody> 
                    @foreach ($collected as $u)
                        <tr>
                          <td>{{$loop->iteration}}</td>
                          <td>{{asset($u->task_file)}}</td>
                        </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>


