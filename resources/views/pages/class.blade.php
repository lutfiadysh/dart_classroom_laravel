@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Classroom')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="card">
          <div class="card-header-success text-center">
            <h3 class="m-0">{{$class->class_name}}</h3>
            <p>{{$class->class_desc}}</p>
          </div>
          <div class="card-body">
            <div class="card shadow-lg">
              <div class="card-body">
                <input type="text" class="form-control" placeholder="Share something with your class...">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush