 <header class="navbar navbar-fixed-top navbar-shadow ">
      <div class="navbar-branding">
        <a class="navbar-brand" href="{{url('/')}}">
          <b>Versalles 1 </b>
        </a>
        <span id="toggle_sidemenu_l" class="ad ad-lines"></span>
      </div>

      <ul class="nav navbar-nav navbar-right">
        @if(Auth::user()->inquilino==0)
          <li class="dropdown menu-merge">
            <div class="navbar-btn btn-group">
              <button class="btn btn-sm">
                <span style="font-size:14px;color:red">Saldo en cuenta: 0.00 $</span>
              </button>
            </div>
          </li>
        @endif
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