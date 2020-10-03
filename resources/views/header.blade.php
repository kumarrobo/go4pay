 <header id="header">
    <div class="container">
      <div class="header-row">
        <div class="header-column justify-content-start"> 
          
          <!-- Logo
          ============================================= -->
             <div class="logos">
            {!!GeneralHelper::getLogo()!!}
            </div>
          <!-- Logo end --> 
          <!-- Logo end --> 
          
        </div>
        <div class="header-column justify-content-end"> 
          
          <!-- Primary Navigation
          ============================================= -->
          <nav class="primary-menu navbar navbar-expand-lg">
            <div id="header-nav" class="collapse navbar-collapse">
              <ul class="navbar-nav">
                {!!GeneralHelper::getMenu()!!}
                <li class="dropdown"> <a class="dropdown-toggle" href="{{route('register')}}">Register<i class="arrow"></i></a></li>
                <li class="dropdown"> <a class="dropdown-toggle" href="{{route('login')}}">DS Login<i class="arrow"></i></a></li>
                <li class="dropdown"> <a class="dropdown-toggle" href="{{route('ro.login')}}">Retailer Login<i class="arrow"></i></a></li>
                <li class="login-signup ml-lg-2"><a class="pl-lg-4 pr-0" data-toggle="modal" data-target="#login-signup" href="#">Welcome, Guest<span class="d-none d-lg-inline-block"><i class="fas fa-user"></i></span></a></li>
              </ul>
            </div>
          </nav>
          <!-- Primary Navigation end --> 
          
        </div>
        
        <!-- Collapse Button
        ============================================= -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#header-nav"> <span></span> <span></span> <span></span> </button>
      </div>
    </div>
  </header>