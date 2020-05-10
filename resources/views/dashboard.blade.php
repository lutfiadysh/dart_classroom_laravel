@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Class list')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        @foreach (Auth::user()->member as $u)
          <div class="col-md-3">
            <a href="{{route('class',$u->class->id)}}" class="card-link">
              <div class="card card-chart">
                <div class="card-header card-header-success centered-text">
                  {{-- isi header --}}
                  <i class="material-icons">domain</i>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{$u->class->class_name}}</h4>
                  <p class="card-category">
                    {{-- card description --}}
                    {{$u->class->class_desc}}
                  </p>
                </div>
                <div class="card-footer">
                  <div class="container">
                    <div class="row">
                      <i class="material-icons col-md-6">folder</i>
                      <i class="material-icons col-md-6">assignment</i>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection
