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
          <form action="" method="post">
            <h4>Classroom data</h4>
            <div class="form-group">
              <input type="text" class="form-control form-control-alternative col-md-7" placeholder="classroom name...">
              <small id="emailHelp" class="form-text text-muted">correct your classroom name.</small>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection