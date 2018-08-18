<nav class="navbar navbar-default">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{ url('/') }}">Bakbakum</a>
        </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a href="#">All ads</a></li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Divisions <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @foreach($divisions_item as $division_item)
                    <li><a href="#">{{ $division_item->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cities <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    @foreach($districts_item as $district_item)
                    <li><a href="#">{{ $district_item->name }}</a></li>
                    @endforeach
                  </ul>
                </li>
            </ul>
          <!-- <form class="navbar-form navbar-left">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Search">
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
          </form> -->
          <ul class="nav navbar-nav navbar-right">
          @if(Auth::check())
            <li class="login"><a  href="{{ route('logout') }}">Logout</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Create <span class="caret"></span></a>
              <ul class="dropdown-menu">
                
                <li><a href="/create/divisions">Create Divisions</a></li>
                <li><a href="/create/district">Create District</a></li>
                <li><a href="/create/thana">Create Thana</a></li>
                <li><a href="/create/cat">Create Categories</a></li>
                <li><a href="/create/division/district">Create District under Divisions</a></li>
                <li><a href="/create/district/thana">Create Thana under Districts</a></li>

               
              </ul>
            </li>
           
          
          @else
            <li class="login"><a href="{{ route('login') }}">Login</a></li>
            <li class="login"><a href="">|</a></li>
            <li class="regster"><a href="{{ route('register') }}">Register</a></li>
          
          @endif
            <li class="nav-button">
                <a href="/create/post">Post your ad</a>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>