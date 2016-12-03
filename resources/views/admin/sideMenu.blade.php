<div class="col-sm-2 admin_menu">
    <ul class="nav nav-stacked">
    @if(Auth::user()->role==1)
        <li><a href="{{ url('/admin/all-media') }}">Videos</a></li>
        <li><a href="{{ url('/admin/categories') }}">Categories</a></li>
        <li><a href="{{ url('/admin/users') }}">Users</a></li>
        <li><a href="{{ url('/user/subscribe') }}">Subscriber</a></li>
        <li><a href="{{ url('admin/demands') }}">Demands</a></li>
    @else
        <li><a href="{{ url('user/profile') }}">Profile</a></li>
        <li><a href="{{ url('user/demands') }}">Demands</a></li>
    @endif
    </ul>
</div>