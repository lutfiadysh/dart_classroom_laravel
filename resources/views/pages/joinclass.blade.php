@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Collect Task')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="float-center row">
        <div class=" col-2"></div>
        <div class="card col-8">
          <div class="card-header-primary text-center">
              <h3 class="m-0">
                  Join Class
              </h3>
              <p class="card-subtitle">
                join some class and share something!
              </p>
          </div>
          <div class="card-body">
            <form action="{{route('join.store')}}" method="post">
                @csrf
                <div class="form-group mt-4">
                    <label for="class">Input your classroom id here</label>
                    <input type="number" id="class" class="form-control" name="classroom_id" placeholder="Classroom id">
                </div>
                <input type="hidden" name="include" value="1">
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                <button type="submit" class="btn btn-lg btn-warning col-12">Join!</button>
            </form>
          </div>
        </div>
        <div class=" col-2"></div>
      </div>
    </div>
  </div>
@endsection


