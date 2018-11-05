<!-- HEADER MOBILE-->
<header class="header-mobile d-block d-lg-none">
  <div class="header-mobile__bar">
      <div class="container-fluid">
          <div class="header-mobile-inner">
              <a class="logo" href="index.html">
                  <img src="{{asset('images/gili3.jpg')}}"  width="55" height="55" alt="" /><b style="color:white;">Gilly</b>
              </a>
              <button class="hamburger hamburger--slider" type="button">
                  <span class="fa fa-anchor">
                      <span class="hamburger-inner"></span>
                  </span>
              </button>
          </div>
      </div>
  </div>
  <nav class="navbar-mobile">
      <div class="container-fluid">
          <ul class="navbar-mobile__list list-unstyled">
                <li>
                    <a href="{{route('admin')}}">
                    <i class="fa fa-bar-chart" aria-hidden="true"></i>Dashboard</a>
                </li>
                    <li class="has-sub">
                        <a class="js-arrow" href="#">
                              <i class="fa fa-anchor" aria-hidden="true"></i>
                              Category</a>
                              <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                            <li>
                                <a href="{{route('categories.add')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                  Add</a>
                            </li>
                            <li>
                                <a href="{{route('categories.view')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                  View</a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fa fa-user"></i>Candidates</a>
                                <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="{{route('candidate.add')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                      Add</a>
                                </li>
                                <li>
                                    <a href="{{route('candidate.view')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                      View</a>
                                </li>
                            </ul>
                        </li>
                    <li>
                        <a href="form.html">
                            <i class="fa fa-check-square"></i>Forms</a>
                    </li>
          </ul>
      </div>
  </nav>
</header>
<!-- END HEADER MOBILE-->

<!-- MENU SIDEBAR-->
<aside class="menu-sidebar d-none d-lg-block" style="background-color:#1a2226;color:white;">
  <div class="logo" style="background-color:#3c8dbc">
      <a href="#">
          <img src="{{asset('images/gili3.jpg')}}"  width="55" height="55" alt="" /><b style="color:white;">Gilly</b>
      </a>
  </div>
  <div class="menu-sidebar__content js-scrollbar1">
      <nav class="navbar-sidebar">
          <ul class="list-unstyled navbar__list">
              <li>
                  <a href="{{route('admin')}}">
                        <i class="fa fa-bar-chart" aria-hidden="true"></i>Dashboard</a>
              </li>
              <li class="active has-sub">
                  <a class="js-arrow" href="#">
                        <i class="fa fa-anchor" aria-hidden="true"></i>
                        Category</a>
                  <ul class="list-unstyled navbar__sub-list js-sub-list">
                      <li>
                          <a href="{{route('categories.add')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                            Add</a>
                      </li>
                      <li>
                          <a href="{{route('categories.view')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                            View</a>
                      </li>
                  </ul>
              </li>
              <li class="active has-sub">
                      <a class="js-arrow" href="#">
                          <i class="fa fa-user"></i>Candidates</a>
                      <ul class="list-unstyled navbar__sub-list js-sub-list">
                          <li>
                              <a href="{{route('candidate.add')}}"><i class="fa fa-plus" aria-hidden="true"></i>
                                Add</a>
                          </li>
                          <li>
                              <a href="{{route('candidate.view')}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                View</a>
                          </li>
                      </ul>
                  </li>
              <li>
                  <a href="form.html">
                      <i class="fa fa-check-square"></i>Forms</a>
              </li>
          </ul>
      </nav>
  </div>
</aside>
<!-- END MENU SIDEBAR-->