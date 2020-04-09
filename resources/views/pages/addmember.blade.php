@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Classroom')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card">
          <div class="card-header-success text-center">
            <h3 class="m-0">Add new member here</h3>
          </div>
          <div class="card-body">
            <form action="" method="post">
              @csrf
              <select name="" id="" class="form-control">
                @foreach ($users as $u)
                    <option value="{{$u->id}}">{{$u->username}}</option>
                @endforeach
              </select>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection


