@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Add new Classroom')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="container-fluid">
      <div class="card">
        <div class="card-header-info mb-0 text-center">
          <h3 class="m-0">Add your new class!</h3>
        </div>
        <div class="card-body">
          <form action="{{route('createclass')}}" method="post" class="ml-6">
            @csrf
            <h4>Classroom data</h4>
            <input type="hidden" name="leader_id" value="{{Auth::user()->id}}">
            <div class="form-group">
              <input type="text" name="class_name" class="form-control form-control-alternative col-md-7" placeholder="classroom name...">
              <small id="emailHelp" class="form-text text-muted">correct your classroom name.</small>
            </div>
            <div class="form-group">
              <input type="text" name="class_desc" class="form-control col-md-7" placeholder="Classroom Desription">
              <small id="emailHelp" class="form-text text-muted">correct your classroom description.</small>
            </div>
            <input type="file" name="class_pict" multiple="" class="inputFileHidden">
            <small id="emailHelp" class="form-text text-muted">Choose your classroom pictures.</small>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-success">Create!</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection