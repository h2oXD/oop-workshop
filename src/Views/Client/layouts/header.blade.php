<header class="navigation fixed-top">
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-white">
            <a class="navbar-brand order-1" href="{{ url('') }}">
                <img class="img-fluid" width="100px" src="{{ assetClient('images/logo.png') }}"
                    alt="Reader | Hugo Personal Blog Template">
            </a>
            <div class="collapse navbar-collapse text-center order-lg-2 order-3" id="navigation">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{ url('') }}" role="button" aria-haspopup="true"
                            aria-expanded="false">
                            Trang chủ
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="{{url('list')}}">
                            Danh sách
                        </a>
                    </li>   
                    @if (!isset($_SESSION['user']))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('login') }}">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('register') }}">Đăng ký</a>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('logout') }}">Đăng xuất</a>
                        </li>
                    @endif
                    @if (isset($_SESSION['user']) && $_SESSION['user']['role'] == 1)
                        <a class="nav-link" href="{{url('admin')}}">Tới trang admin</a>
                    @endif
                </ul>
            </div>

            <div class="order-2 order-lg-3 d-flex align-items-center">
                <!-- search -->
                <form class="search-bar">
                    <input id="search-query" name="s" type="search" placeholder="Type &amp; Hit Enter...">
                </form>

                <button class="navbar-toggler border-0 order-1" type="button" data-toggle="collapse"
                    data-target="#navigation">
                    <i class="ti-menu"></i>
                </button>
            </div>

        </nav>
    </div>
</header>
