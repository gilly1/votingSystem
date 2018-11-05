<!-- PAGE CONTAINER-->
<div class="page-container" style="background-color:white">
<!-- HEADER DESKTOP-->
<header class="header-desktop" style="background-color:#3c8dbc">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="header-wrap">
                <form class="form-header" action="" method="POST">
                    <input class="au-input au-input--xl" type="text" name="search" placeholder="Search for datas &amp; reports..." />
                    <button class="au-btn--submit" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </form>

                <div class="header-button">
                    <div class="noti-wrap">
                    </div>
                    @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Admin</a>
                        </li>
                    @else
                        <div class="account-wrap">
                            <div class="account-item clearfix js-item-menu">
                                <div class="image">
                                    <img src="{{asset('images/gili3.jpg')}}" alt="Admin" class="img-circle" />
                                </div>
                                <div class="content">
                                    <a class="js-acc-btn" href="#">{{ Auth::user()->name }}</a>
                                </div>
                                <div class="account-dropdown js-dropdown">
                                    <div class="info clearfix">
                                        <div class="image">
                                            <a href="#">
                                                <img src="{{asset('images/gili3.jpg')}}" alt="John Doe" class="img-circle"/>
                                            </a>
                                        </div>
                                        <div class="content">
                                            <h5 class="name">
                                                <a href="#">{{ Auth::user()->name }}</a>
                                            </h5>
                                            <span class="email">{{ Auth::user()->email }}</span>
                                        </div>
                                    </div>
                                    <div class="account-dropdown__footer">
                                        <a href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out" aria-hidden="true"></i>{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                @csrf
                                            </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endguest



                </div>


            </div>
        </div>
    </div>
</header>

<!-- HEADER DESKTOP-->