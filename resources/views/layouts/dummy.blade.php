@extends('layouts.master')


@push('stylesheets')
<!-- pnotify -->
<link href="{{ asset('css/pnotify.css') }}" rel="stylesheet">
<link href="{{ asset('css/pnotify.buttons.css') }}" rel="stylesheet">
<link href="{{ asset('css/pnotify.nonblock.css') }}" rel="stylesheet">
<!-- Datatables -->
<link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/scroller.bootstrap.min.css') }}" rel="stylesheet">
@endpush


@section('content')
<div class="right_col" role="main" >
   <div class="">
      <div class="clearfix"></div>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
               <div class="x_title">
                  <h2>Dummy Task</h2>
              <div class="clearfix"></div>
               </div>

               {{  Form::open(['route' => 'get.dummy','method'=>'post', 'data-parsley-validate', 'class' => 'form-horizontal form-label-left', 'id'=>'modal_form_id', 'enctype'=>'multipart/form-data']) }}

                <div class="form-group">
                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="from">From
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                      <input type="date" class="form-control col-md-2 col-xs-12" id="from" name="from"/>
                  </div>

                  <label class="control-label col-md-1 col-sm-1 col-xs-12" for="to">To
                  </label>
                  <div class="col-md-2 col-sm-2 col-xs-12">
                      <input type="date" class="form-control col-md-2 col-xs-12" id="to" name="to"/>
                  </div>

                  <div class="col-md-2 col-sm-2 col-xs-12">
                    <button type="button" class="btn btn-primary"  onclick="submitform();" >Search</button>
                  </div>
                </div>

                
                {!! Form::close() !!}

               <div class="x_content">
                  <div class="table-responsive">
                     <table id="datatable" class="table table-striped table-bordered dataTables"  >
                       <thead>
                         <tr>
                           <th>Task</th>
                           <th>Due Date</th>
                           <th>Creator</th>
                           <th>Collaborator</th>
                           <th style="width: 25%;">Action</th>
                         </tr>
                        </thead>
                        <tbody>
                          @foreach ($tasksOpen as $task)
                          <tr role="row" class="{{ $task->id}}">
                            <td>{{$task->title}}</td>
                            <td>{{substr($task->date_reminder,0,10)}}</td>
                            <td>{{$task->creator}}</td>
                            <td>{{$task->company}}</td>     
                          </tr>
                          @endforeach
                        </tbody>
                     </table>
                   </div>
               </div>
            </div>
         </div>
      </div>
   </div>



</div>

@endsection

@section('bottom_content')

@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#datatable').DataTable();
    $('.ui-pnotify').remove();
      loadNotification();
} );

<<<<<<< HEAD
=======
function submitform()
{
  $('#modal_form_id').submit();
}
>>>>>>> 00dc579b65519915fb34b69989be9615f5df651f




</script>
<!-- Datatables -->
<script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('js/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('js/buttons.flash.min.js') }}"></script>
<script src="{{ asset('js/buttons.html5.min.js') }}"></script>
<script src="{{ asset('js/buttons.print.min.js') }}"></script>
<script src="{{ asset('js/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('js/dataTables.keyTable.min.js') }}"></script>
<script src="{{ asset('js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('js/responsive.bootstrap.js') }}"></script>
<script src="{{ asset('js/dataTables.scroller.min.js') }}"></script>
<script src="{{ asset('js/pnotify.js') }}"></script>
<script src="{{ asset('js/pnotify.buttons.js') }}"></script>
<script src="{{ asset('js/pnotify.nonblock.js') }}"></script>


@endpush
