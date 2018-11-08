
<div class="col-md-3 left_col">
    <div class="left_col scroll-view">
        <div class="parent navbar nav_title" style="border: 0;">
            <a href="{{ url('/') }}" >
              <img  src="{{  asset('/images/jobplus.png') }}"/>
            </a>
        </div>
        <div class="clearfix"></div>

        <!-- menu profile quick info -->
        <div class="profile">
            <div class="profile_pic">
                <!-- <img src="{{ Gravatar::src(Auth::user()->email) }}" alt="Avatar of {{ Auth::user()->name }}" class="img-circle profile_img"> -->
                @php
                $url = parse_url(Auth::user()->profile_pic);
                @endphp
                @if(!empty($url['scheme']))
                <img src="{{ Auth::user()->profile_pic }}" alt="Avatar" class="img-circle profile_img">
                @else
                <img src="{{ 'https://s3.' . env('AWS_DEFAULT_REGION') . '.amazonaws.com/' . env('AWS_BUCKET') . Auth::user()->profile_pic }}" alt="Avatar" class="img-circle profile_img">
                @endif
            </div>

            <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
            </div>
        </div>
        <!-- /menu profile quick info -->

        <br />

        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
          <div class="menu_section">
          <span>.</span>
            <ul class="nav side-menu">
              <li>
                <span></span>
                <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home </a>
              </li>

               @if(Auth::user()->admin == 1)
              <!-- <li><a href="{{ route('index.register') }}"><i class="fa fa-users"></i>Manage Admin</a>
              </li> -->

              <li>
                <a><i class="fa fa-users"></i> Manage Admin <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('admin.list') }}"></i>User List</a>
                  <li><a href="{{ route('index.register') }}">Add User/Admin</a></li>
                    </ul>
              </li>
              @endif


            <li>
              <a><i class="fa fa-edit"></i> Companies <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <!-- <li><a href="">Full List</a></li> -->
                <li><a href="{{ route('companies.clients') }}">Clients</a></li>
                <li><a href="{{ route('companies.leads') }}">Leads</a></li>
                <li><a href="{{ route('companies.new') }}">Add Client/Lead</a></li>
                </ul>
            </li>

              <li><a><i class="fa fa-desktop"></i> Candidates <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                  <li><a href="{{ route('candidates.fulllist') }}">Full list</a></li>
                  <li><a href="{{ route('candidates.new') }}">Add Candidate</a></li>
                </ul>
              </li>

            <li>
              <a><i class="fa fa-binoculars"></i>Jobs<span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('jobs.list') }}">List</a></li>
                <li><a href="{{ route('jobs.new') }}">Add Job</a></li>
              </ul>
            </li>
            <li>
            <a href="{{ route('index.tasks') }}"><i class="fa fa-clock-o"></i>Tasks</a>
            </li>
            <li>
              <a href="{{ route('social.wall') }}"><i class="fa fa-comments-o"></i>Announcements </a>
            </li>

          </ul>
          </div>


        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
  <a data-toggle="tooltip" data-placement="top" title="Lock">
            <!-- <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> -->
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <!-- <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> -->
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Lock">
            <!-- <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span> -->
          </a>
          <a data-toggle="tooltip" data-placement="top" title="Logout" href="{{ route('logout') }}">
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
          </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
