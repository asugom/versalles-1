 <header class="navbar navbar-fixed-top navbar-shadow ">
      <div class="navbar-branding">
        <a class="navbar-brand" href="{{url('/')}}">
          <b>Versalles 1 </b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>

      <ul class="nav navbar-nav navbar-right">
        <!--
        <li class="dropdown menu-merge">
          <div class="navbar-btn btn-group">
            <button data-toggle="dropdown" class="btn btn-sm dropdown-toggle hidden">
              <span class="fa fa-bell-o fs14 va-m"></span>
              <span class="badge badge-danger">666</span>
            </button>
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
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Sara</b> Added his store:
                            <a href="#">Notebook</a>
                          </div>
                          <div class="timeline-date">3:05am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Apple</a>
                          </div>
                          <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-success">
                            <span class="fa fa-usd"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Apple</a>
                          </div>
                          <div class="timeline-date">7:45am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Michael</b> Added his store:
                            <a href="#">Ipod</a>
                          </div>
                          <div class="timeline-date">8:25am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-system">
                            <span class="fa fa-fire"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Admin</b> created invoice for:
                            <a href="#">Software</a>
                          </div>
                          <div class="timeline-date">4:15am</div>
                        </li>
                        <li class="timeline-item">
                          <div class="timeline-icon bg-dark light">
                            <span class="fa fa-tags"></span>
                          </div>
                          <div class="timeline-desc">
                            <b>Sara</b> Added to his store:
                            <a href="#">Notebook</a>
                          </div>
                          <div class="timeline-date">3:05am</div>
                        </li>
                      </ol>

                  </div>
                  <div class="panel-footer text-center p7">
                    <a href="#" class="link-unstyled"> View All </a>
                  </div>
              </div>
            </div>
          </div>
        </li>
        -->

        <li class="dropdown menu-merge">
          <a href="#" class="dropdown-toggle fw600 p15" data-toggle="dropdown">
            <img src="{{ URL::asset('assets/img/avatars/avatar.png') }}" alt="avatar" class="mw30 br64">
            <span class="hidden-xs pl15">{{ isset(Auth::user()->name) ? Auth::user()->name : Auth::user()->email }} </span>
            <span class="caret caret-tp hidden-xs"></span>
          </a>
          <ul class="dropdown-menu list-group dropdown-persist w250" role="menu">


            <li class="dropdown-footer">
              <a href="{{ url('/logout') }}" class="">
              <span class="fa fa-power-off pr5"></span> Logout </a>
            </li>
          </ul>
        </li>
      </ul>
    </header>