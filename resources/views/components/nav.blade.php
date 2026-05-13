<!-- Sidebar Menu -->
<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        {{-- menu-open --}}

        @foreach ($items as $item)
            @php
                $hasItems = isset($item['items']) && count($item['items']) > 0;
            @endphp
            <li class="nav-item {{ $isOpenedMenu($item['active']) }}">
                <a href="{{ $hasItems ? '#' : route($item['route']) }}" class="nav-link {{ $isActive($item['active']) }}">
                    <i class="nav-icon {{ $item['icon'] }}"></i>
                    <p>
                        {{ $item['title'] }}
                        @if ($hasItems)
                            <i class="right fas fa-angle-left"></i>
                        @endif

                    </p>
                </a>
                @if ($hasItems)
                    <ul class="nav nav-treeview">
                        @foreach ($item['items'] as $subItem)
                            <li class="nav-item">
                                <a href="{{ route($subItem['route']) }}"
                                    class="nav-link {{ $isActive($subItem['active']) }}">
                                    <i class="{{ $subItem['icon'] }} nav-icon"></i>
                                    <p>{{ $subItem['title'] }}</p>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                @endif

            </li>
        @endforeach
        <li class="nav-item">
            <a href="{{ route('logout') }}"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
                <i class="nav-icon fas fa-door-open"></i>
                <p>Logout</p>
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</nav>
<!-- /.sidebar-menu -->
