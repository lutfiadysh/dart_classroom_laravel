@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Classroom')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          @if($member == true)
          <div class="card">
            <div class="card-header-success">
              <div class="float-left">
                <h3 class="m-0 card-title">{{$class->class_name}}</h3>
                <p class="category">{{$class->class_desc}}</p>
              </div>
              <div class="float-right">
                @if($class->leader_id == Auth::user()->id)
                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#taskModal">
                  Add Task
                </button>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Add member
                </button>
                @else
                
                @endif
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3  ml-2">
                  <div class="card mb-2">
                    <div class="card-body">
                      <button type="button" class="btn btn-info btn-sm col-12" data-toggle="modal" data-target="#Modal">
                        Class Contributor
                      </button>
                    </div>
                  </div>
                  <div class="col-12 mt-4 mb-4"></div>
                  <div class="card card-nav-tabs mt-9">
                    <div class="card-header card-header-danger">
                      Upcoming  
                    </div>
                    <ul class="list-group list-group-flush">
                      @foreach ($task as $t)
                        <li class="list-group-item">{{$t->task_title}} : {{ \Carbon\Carbon::parse($t->due_task)->format('d/m')}}</li>
                      @endforeach
                    </ul>
                  </div>
                </div>
                <div class="col-8 mr--4">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <input type="text" class="form-control" placeholder="Share something with your class...">
                    </div>
                  </div>
                  @foreach ($task as $s)
                      <a href="{{route('task.collect',['id'=>$class->id,'id2'=>$s->id])}}" class="">
                        <div class="card">
                          <div class="card-body">
                            <h4 class="col-12 mt-0 mr-2 mb-0 card-title font-weight-bold">{{$s->task_title}}</h4>
                            <p class="col-12 mt-2 mr-2 mb-1 card-subtitle text-muted">{{$s->task_body}} </p>
                          </div>
                        </div>
                      </a>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
          @endif
      </div>
    </div>
  </div>
@endsection

{{-- add classroom member modals --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb--2" id="exampleModalLabel">Data Siswa</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
          <div class="modal-body table-responsive">
              <table id="myTable" class="table table-bordered">
                  <thead>
                      <tr>
                          <th>Nama</th>
                          <th>ID</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $s)
                      <tr>
                          <td>{{$s->username}}</td>
                          <td>{{$s->id}}</td>
                          <td class="text-center">
                              <a href="{{route('class.member',['id'=>$class->id,'id2'=>$s->id])}}" class="btn btn-success btn-sm">
                                  ADD
                              </a>
                          </td>
                        </tr>
                        @endforeach    
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>
  
{{-- classroom contributor modals --}}
<div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="Label" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb--2" id="exampleModalLabel">classroom contributor list</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
          <div class="modal-body table-responsive">
              <table id="myTable" class="table table-bordered">
                  <thead>
                      <tr><th>#</th>
                          <th>Name</th>
                          <th>Email</th>
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($member as $s)
                      @if($s->id == $class->leader_id)
                      
                      @else
                      <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$s->user->username}}</td>
                        <td>{{$s->user->email}}</td>
                      </tr>
                      @endif
                      @endforeach    
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div>

{{-- add task modals --}}
<div class="modal fade" id="taskModal" tabindex="-1" role="dialog" aria-labelledby="taskModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">
      <div class="modal-header">
          <h5 class="modal-title mb--2" id="exampleModalLabel">Add Task</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
      </div>
          <div class="modal-body table-responsive">
              <form action="{{route('task.create')}}" method="post">
                @csrf
                <input type="hidden" name="classroom_id" value="{{$class->id}}">
                <div class="form-group">
                  <input type="text" name="task_title" id="" class="form-control" placeholder="Task title...">
                </div>
                <div class="form-group">
                  <input type="text" name="task_body" id="" class="form-control" placeholder="Explain something about this task...">
                </div>
                <div class="form-group">
                  <label for="due_task">Task Due until...</label>
                  <input type="date" name="due_task" id="due_task" class="form-control">
                </div>
                <button type="submit" class="btn btn-sm btn-primary col-12">Add!</button>
              </form>
          </div>
      </div>
  </div>
</div>

@push('js')
 
@endpush