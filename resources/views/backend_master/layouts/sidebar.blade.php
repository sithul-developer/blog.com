
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link  @if ($active_class != 'Dashboard') collapsed @endif " href="{{ url('/panel/dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item ">
            <a class="nav-link @if ($active_class != 'User') collapsed @endif "
                href="{{ url('/panel/dashboard/users') }}">
                <i class="bi bi-person-workspace "></i><span>Users</span>
            </a>
        </li>
        <li class="nav-item">
            <a class=" nav-link @if ($active_class != 'Role') collapsed @endif  "
                href="{{ url('/panel/dashboard/role') }}">
                <i class="bi bi-person-badge-fill"></i> <span>Role</span>
            </a>
        </li>
        <li class="nav-item">
            <a class=" nav-link   @if ($active_class != 'Permission') collapsed @endif "
                href="{{ url('/panel/dashboard/permission') }}">
                <i class="bi bi-person-fill-add text-lg"></i><span>Permision </span>
            </a>
        </li>
        {{--  <li class="nav-item">
        <a href="{{url('/panel/dashboard/student')}}" class="nav-link collapsed  {{'panel/dashboard/course_category' == request()->path() ? 'active' : ''}} ">
          <i class="bi bi-person-add "></i>
          <span>Student </span>
        </a>
      </li> --}}
        <li class="nav-item">
            <a href="{{ url('/panel/dashboard/prices') }}"
                class="nav-link @if ($active_class != 'Price') collapsed @endif   ">
                <i class="bi bi-cash-coin"></i>
                <span>Priecs </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/panel/dashboard/category') }}"
                class="nav-link @if ($active_class != 'Category') collapsed @endif    ">
                <i class="bi bi-tags-fill"></i>
                <span>Category </span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/panel/dashboard/promotional') }}"
                class="nav-link @if ($active_class != 'Promotional') collapsed @endif    ">
                <i class="bi bi-megaphone-fill"></i>
                <span>Promotional</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/panel/dashboard/posts') }}"
                class="nav-link  @if ($active_class != 'Post') collapsed @endif ">
                <i class="bi bi-plus-square-fill"></i>
                <span>Posts</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/panel/dashboard/trash') }}"
                class="nav-link    @if ($active_class != 'Trash') collapsed @endif ">
                <i class="bi bi-trash-fill"></i>
                <span>Trash</span>
                <span class="badge bg-danger ms-auto"></span>
            </a>
        </li>
  <li class="nav-item">
        <a href="{{url('/panel/dashboard/setting')}}" class="nav-link @if ($active_class != 'Setting') collapsed @endif ">
          <i class="bi bi-gear "></i>
          <span>Setting</span>
        </a>
      </li>
    </ul>

</aside>
<style>
    .nav-item a :hover {
        background: none;
    }
</style>
