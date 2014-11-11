<nav class="navbar navbar-default navbar-fixed-top navbar-inverse" role="navigation">
  <div class="container">
      <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="{{ route('home'); }}">Larabook</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav">
                <li>{{ link_to_route('users_path', 'Browse Users') }}</li>
                <li>{{ link_to_route('statuses_path', 'Statuses') }}</li>
              </ul>

              <ul class="nav navbar-nav navbar-right">
                 @if ($currentUser)
                  <li class="dropdown">

                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"> <img class="nav-gravatar" src="{{ $currentUser->present()->gravatar() }}" alt="{{$currentUser->username}}">{{$currentUser->username}} <span class="caret"></span></a>

                    <ul class="dropdown-menu" role="menu">

                      <li>{{ link_to_route('profile_path', 'Your Profile', $currentUser->username) }}</li>
                      <li><a href="/statuses">All statuses</a></li>
                      <li class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                      <li class="divider"></li>
                       <li>{{link_to_route('logout_path', 'Log Out')}}</li>
                      @else
                      <li>{{link_to_route('register_path', 'Sign up');}}</li>
                      <li>{{link_to_route('login_path', 'Log in');}}</li>

                      @endif
                    </ul>
                  </li>
                </ul>
            </div>
  </div>
</nav>