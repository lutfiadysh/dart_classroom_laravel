@extends('layouts.app', ['activePage' => 'table', 'titlePage' => __('Table List')])

@section('content')
<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Calendar</h4>
            <p class="card-category"> Complete your task!</p>
          </div>
          <div class="card-body">
            <div id='calendar'></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')
<link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css' />
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js'></script>
<script>
    $(document).ready(function() {
        // page is now ready, initialize the calendar...
        $('#calendar').fullCalendar({
            // put your options and callbacks here
            events : [
                @foreach($task as $task)
                {
                    title : '{{ $task->task_title }}',
                    start : '{{ $task->due_task }}',
                    url : ''
                },
                @endforeach
            ]
        })
    });
</script>
@endpush