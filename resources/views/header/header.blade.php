 <header class="navbar navbar-fixed-top navbar-shadow ">
      <div class="navbar-branding">
        <a class="navbar-brand" href="{{url('/')}}">
          <b>Versalles 1 </b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>

      <ul class="nav navbar-nav navbar-right">
        @if(Auth::user()->inquilino==0)
          <li class="dropdown menu-merge hidden">
            <div class="navbar-btn btn-group">
              <button class="btn btn-sm">
                <span style="font-size:14px;color:red">Saldo en cuenta: 0.00 $</span>
              </button>
            </div>
          </li>
        @endif
        <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle">
              <span class="fa fa-bell-o fs14 va-m"></span>
              <span class="badge badge-danger">{{ Auth::user()->getUserNotifCount() }}</span>
            </button>
          </div>
          <div class="dropdown-menu dropdown-persist w350 animated animated-shorter fadeIn" role="menu">  
              <div class="panel mbn">
                  <div class="panel-menu">
                     <span class="panel-icon"><i class="fa fa-clock-o"></i></span>
                     <span class="panel-title fw600"> Recent Activity</span>
                     <button class="btn btn-default light btn-xs pull-right" type="button"><i class="fa fa-refresh"></i></button>
                  </div>
                  <div class="panel-body panel-scroller scroller-navbar scroller-overlay scroller-pn pn">
                      <ol class="timeline-list">
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Michael</b> Added to his store:
                            <a href="#">Ipod</a>
                          </div>
                          <div class="timeline-date">1:25am</div>

                        </li>
                      </ol>
                  </div>
              </div>
          </div>
        </li>
        <li class="dropdown menu-merge">

          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">

            <img src="{{ URL::asset('assets/img/avatars/avatar.png') }}" alt="avatar" class="mw30 br64">
            <span class="hidden-xs pl15">{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }} </span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">
            <li class="dropdown-footer">
              <a href="#" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">


            <li class="dropdown-footer">
              <a href="{{ url('/logout') }}" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
        <li id="toggle_sidemenu_t">  
            <span class="fa fa-caret-up"></span>
        </li>
      </ul>
    </header>
     