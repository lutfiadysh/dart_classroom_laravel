@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Classroom')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="card">
            <div class="card-header-success text-center">
              <div class="float-left">
                <h3 class="m-0">{{$class->class_name}}</h3>
                <p>{{$class->class_desc}}</p>
              </div>
              <div class="float-right">
                @if($class->leader_id == Auth::user()->id)
                <a href="" class="btn-sm btn-danger btn">
                  Create Task
                </a>
                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#exampleModal">
                    Add member
                </button>
                @endif
              </div>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-3 card ml-2">
                  <div class="card-body">
                    <a href="{{route('member.index',$class->id)}}" class="btn-info btn btn-sm">
                      Class Contributor
                    </a>
                  </div>
                </div>
                <div class="col-8 mr--4">
                  <div class="card shadow-lg">
                    <div class="card-body">
                      <input type="text" class="form-control" placeholder="Share something with your class...">
                      @foreach ($member as $m)
                          <li>
                            {{$m->user_id}}
                          </li>
                      @endforeach
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
@endsection

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
  
