<nav class="sidebar vertical-scroll  ps-container ps-theme-default ps-active-y">
    <div class="logo d-flex justify-content-between">
        <a href="{{url('admin')}}"><img src="{{asset('assets/admin/img/lgo.jpg')}}" alt></a>
        <div class="sidebar_close_icon d-lg-none">
            <i class="ti-close"></i>
        </div>
    </div>
    <ul id="sidebar_menu">
        <li class="mm-active">
            <a href="{{url('admin')}}" aria-expanded="false">
                <div class="icon_menu">
                    <i style="color: #20c997" class="ti-home"></i>
                </div>
                <span>Dashboard</span>
            </a>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i style="color: #20c997" class="ti-book" ></i>
                </div>
                <span>QL Bài viết</span>
            </a>
            <ul>
                <li><a href="{{url('admin/posts')}}">- Danh sách bài viết</a></li>
                <li><a href="{{url('admin/categories')}}">- QL danh mục</a></li>
                <li><a href="{{url('admin/tags')}}">- QL thẻ (tag)</a></li>
                <li><a href="{{url('admin/authors')}}">- QL tác giả (author)</a></li>
            </ul>
        </li>
        <li class>
            <a class="has-arrow" href="#" aria-expanded="false">
                <div class="icon_menu">
                    <i style="color: #20c997" class="ti-user" ></i>
                </div>
                <span>QL Người dùng</span>
            </a>
            <ul>
                <li><a href="{{url('admin/users')}}">Danh sách</a></li>
            </ul>
        </li>
    </ul>
</nav>