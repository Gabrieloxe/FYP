@extends('layouts.master')


@push('stylesheets')

<link href="{{ asset('css/normalize.css') }}" rel="stylesheet">
<!-- <link href="{{ asset('css/ion.rangeSlider.css') }}" rel="stylesheet"> -->
<!-- <link href="{{ asset('css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet"> -->
<script src="https://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>

@endpush


@section('content')
      <!-- page content -->
      <div class="right_col" role="main" style="min-height: 873px;">
            <div class="">
              <div class="page-title">
                <div class="title_left">
                  <h3>User Profile</h3>
                </div>


              </div>

              <div class="clearfix"></div>

              <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="x_panel">
                    <div class="x_title">
                      <h2>User Report <small>Activity report</small></h2>
                      <ul class="nav navbar-right panel_toolbox">


                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                      <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                        <div class="profile_img">
                          <div id="crop-avatar">
                            <!-- Current avatar -->
                            <!-- <img class="img-responsive avatar-view" src="images/picture.jpg" alt="Avatar" title="Change the avatar"> -->
                            <img class="img-responsive avatar-view" src="{{ ($user->profile_pic != null ? $user->profile_pic : Gravatar::src(Auth::user()->email)) }}" alt="Avatar" title="Change the avatar">

                          </div>
                        </div>
                        <h3>{{ $user->name }}</h3>

                        <ul class="list-unstyled user_data">
                          <li><i class="fa fa-map-marker user-profile-icon"></i> {{ $user->email }}
                          </li>

                          <li>
                            <i class="fa fa-briefcase user-profile-icon"></i> {{ date("F d, Y", strtotime($user->birth_date)) }}
                          </li>

                          <li class="m-top-xs">
                            <i class="fa fa-external-link user-profile-icon"></i>
                            <a href="http://www.kimlabs.com/profile/" target="_blank">Total of projects in progress: </a>
                          </li>
                        </ul>

                        <a class="edit btn btn-success" id="Edit-modal" href="#edit-modal"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                        <br>


                      </div>
                      <div class="col-md-9 col-sm-9 col-xs-12">
                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                          <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                            <li role="presentation" class=""><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="false">Recent Activity</a>
                            </li>
                            <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Projects Worked on</a>
                            </li>

                          </ul>
                          <div id="myTabContent" class="tab-content">
                            <div role="tabpanel" class="tab-pane fade" id="tab_content1" aria-labelledby="home-tab">

                              <!-- start recent activity -->
                              <ul class="messages">
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-info">24</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Desmond Davison</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1 text-info" aria-hidden="true" data-icon=""></span>
                                      <a href="#"><i class="fa fa-paperclip"></i> User Acceptance Test.doc </a>
                                    </p>
                                  </div>
                                </li>
                                <li>
                                  <img src="images/img.jpg" class="avatar" alt="Avatar">
                                  <div class="message_date">
                                    <h3 class="date text-error">21</h3>
                                    <p class="month">May</p>
                                  </div>
                                  <div class="message_wrapper">
                                    <h4 class="heading">Brian Michaels</h4>
                                    <blockquote class="message">Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua butcher retro keffiyeh dreamcatcher synth.</blockquote>
                                    <br>
                                    <p class="url">
                                      <span class="fs1" aria-hidden="true" data-icon=""></span>
                                      <a href="#" data-original-title="">Download</a>
                                    </p>
                                  </div>
                                </li>

                              </ul>
                              <!-- end recent activity -->

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">

                              <!-- start user projects -->
                              <table class="data table table-striped no-margin">
                                <thead>
                                  <tr>
                                    <th>#</th>
                                    <th>Project Name</th>
                                    <th>Client Company</th>
                                    <th>Contribution</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <td>1</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="35" style="width: 35%;" aria-valuenow="35"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>2</td>
                                    <td>New Partner Contracts Consultanci</td>
                                    <td>Deveint Inc</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-danger" data-transitiongoal="15" style="width: 15%;" aria-valuenow="15"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>3</td>
                                    <td>Partners and Inverstors report</td>
                                    <td>Deveint Inc</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="45" style="width: 45%;" aria-valuenow="45"></div>
                                      </div>
                                    </td>
                                  </tr>
                                  <tr>
                                    <td>4</td>
                                    <td>New Company Takeover Review</td>
                                    <td>Deveint Inc</td>
                                    <td class="vertical-align-mid">
                                      <div class="progress">
                                        <div class="progress-bar progress-bar-success" data-transitiongoal="75" style="width: 75%;" aria-valuenow="75"></div>
                                      </div>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                              <!-- end user projects -->

                            </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="modal fade" tabindex="-1" role="dialog" id="edit-modal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Profile</h4>
                        </div>
                        <div class="modal-body">
                          {{  Form::open(['method'=>'post', 'data-parsley-validate', 'class' => 'form-horizontal form-label-left', 'id'=>'modal_form_id', 'enctype'=>'multipart/form-data']) }}

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input id="email" class="form-control col-md-7 col-xs-12" required="required" type="email" name="email" value="{{ $user->email }}">
                                </div>
                                <br/><br/>

                                    <div class="form-group">
                                        <label for="birthday">Birth Date</label>

                                        <input type="text" class="form-control col-md-7 col-xs-12"  data-date-format="MM/DD/YYYY" required="required" id="birthday" name="birthday" value='{{ date("mm/dd/YYYY", strtotime($user->birth_date)) }}' />

                                      </div>
                                      <br/>
                                      <br/>

                                <div class="form-group">
                                    <label for="photo">Display Picture</label>
                                    <input type="file" name="photo" id="validate_img" required="required" data-parsley-filemaxmegabytes="1" data-parsley-trigger="change" data-parsley-filemimetypes="image/jpeg, image/pipeg, image/png, image/bmp, image/webp">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary"  onclick="submitform();" >Update Profile</button>
                        </div>
                    </div><!-- /.modal-content -->

                </div><!-- /.modal-dialog -->

            </div><!-- /.modal -->
          </div>
      <!-- /page content -->

@endsection



@section('bottom_content')

@endsection

@push('scripts')

<!-- Parsley -->
<script src="{{ asset('js/parsley.min.js') }}"></script>

<script>
}


  //for modal
    var token = '{{ Session::token() }}';
    var urlEdit = '{{ route('edit.profile') }}';
    var postData = new FormData($("#modal_form_id")[0]);
    var postId = 0;

    function submitform()
    {
      $('#modal_form_id').submit();
    }

    $(document).ready(function () {
      $(".edit").click(function () {
          id = $(this).data('id');
          $('#edit-modal').modal('show');
        });

        //Pending for a more modern way to solve this
        $("#modal_form_id").submit(function () {
          var saveData = $.ajax({
          type: 'POST',
          url: urlEdit,
          processData: false,
          contentType: false,
          data : postData,
          success: function(resultData) {
              window.location.reload();
               }
            });
          });
      });

      $(function() {
        $('input[name="birthday"]').daterangepicker({
          singleDatePicker: true,
          showDropdowns: true,
          minYear: 1940,
          maxYear: parseInt(moment().format('YYYY'),10)
        })
      });



      var app = app || {};

      // Utils
      (function ($, app) {
          'use strict';

          app.utils = {};

          app.utils.formDataSuppoerted = (function () {
              return !!('FormData' in window);
          }());

      }(jQuery, app));

      // Parsley validators
      (function ($, app) {
          'use strict';

          window.Parsley.addValidator('filemaxmegabytes', {
                  requirementType: 'string',
                  validateString: function (value, requirement, parsleyInstance) {

                      if (!app.utils.formDataSuppoerted) {
                          return true;
                      }

                      var file = parsleyInstance.$element[0].files;
                      var maxBytes = requirement * 1048576;

                      if (file.length == 0) {
                          return true;
                      }

                      return file.length === 1 && file[0].size <= maxBytes;

                  },
                  messages: {
                      en: 'File is to big'
                  }
              })
              .addValidator('filemimetypes', {
                  requirementType: 'string',
                  validateString: function (value, requirement, parsleyInstance) {

                      if (!app.utils.formDataSuppoerted) {
                          return true;
                      }

                      var file = parsleyInstance.$element[0].files;

                      if (file.length == 0) {
                          return true;
                      }

                      var allowedMimeTypes = requirement.replace(/\s/g, "").split(',');
                      return allowedMimeTypes.indexOf(file[0].type) !== -1;

                  },
                  messages: {
                      en: 'File mime type not allowed'
                  }
              });

      }(jQuery, app));


      // Parsley Init
      (function ($, app) {
          'use strict';

          $('#validate_img').parsley();

      }(jQuery, app));
</script>

<!-- morris js -->
<!-- <script src="{{ asset('js/raphael.min.js') }}"></script> -->
<!-- <script src="{{ asset('js/morris.min.js') }}"></script> -->

<!-- jquery.inputmask -->
<!-- <script src="{{ asset('js/jquery.inputmask.bundle.min.js') }}"></script> -->
<!-- jQuery Knob -->
<!-- <script src="{{ asset('js/jquery.knob.min.js') }}"></script> -->
@endpush