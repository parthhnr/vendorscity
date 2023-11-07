<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">

        @php
            $userId = Auth::id();

            $get_user_data = Helper::get_user_data($userId);

            $get_permission_data = Helper::get_permission_data($get_user_data->role_id);

            $permission1 = [];

            if (is_object($get_permission_data) && property_exists($get_permission_data, 'permission') && $get_permission_data->permission !== '') {
                $permission1 = $get_permission_data->permission;
                $permission1 = explode(',', $permission1);
            } else {
                echo '';
                // Handle the case where $get_permission_data is not an object or 'permission' property is empty.
            }
        @endphp

        <ul>
            <li class="menu-title"><span>Main</span></li>
            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == '' ? 'active' : '' }}">
                @if (Auth::user()->vendor != 1)
                    <a href="{{ url('/admin') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
                @else
                    <a href="{{ url('/vendors') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
                @endif
            </li>
            @if (Auth::user()->vendor != 1)
                @if (in_array('1', $permission1) ||
                        in_array('2', $permission1) ||
                        in_array('3', $permission1) ||
                        in_array('4', $permission1) ||
                        in_array('5', $permission1))
                    <li class="submenu">
                        <a href="#"
                            class="{{ request()->segment(2) == 'country' || request()->segment(2) == 'state' || request()->segment(2) == 'city' || request()->segment(2) == 'service' || request()->segment(2) == 'subservice' ? 'active' : '' }}">
                            <i data-feather="pie-chart"></i> <span> Master</span> <span class="menu-arrow"></span></a>
                        <ul>
                            @if (in_array('1', $permission1))
                                <li><a href="{{ route('country.index') }}"
                                        class="{{ request()->segment(2) == 'country' ? 'active' : '' }}">Country</a>
                                </li>
                            @endif
                            @if (in_array('2', $permission1))
                                <li><a href="{{ route('state.index') }}"
                                        class="{{ request()->segment(2) == 'state' ? 'active' : '' }}">State</a>
                                </li>
                            @endif
                            @if (in_array('3', $permission1))
                                <li><a href="{{ route('city.index') }}"
                                        class="{{ request()->segment(2) == 'city' ? 'active' : '' }}">City</a>
                                </li>
                            @endif
                            @if (in_array('4', $permission1))
                                <li><a href="{{ route('service.index') }}"
                                        class="{{ request()->segment(2) == 'service' ? 'active' : '' }}">Service</a>
                                </li>
                            @endif
                            @if (in_array('5', $permission1))
                                <li><a href="{{ route('subservice.index') }}"
                                        class="{{ request()->segment(2) == 'subservice' ? 'active' : '' }}">Sub
                                        Service</a>
                                </li>
                            @endif

                        </ul>
                    </li>

                @endif
            @endif

            @if (Auth::user()->vendor != 1)

            @if (in_array('8', $permission1))
                    <li class="{{ request()->segment(2) == 'vendors' ? 'active' : '' }}"><a
                            href="{{ route('vendors.index') }}"
                            class="{{ request()->segment(2) == 'vendors' ? 'active' : '' }}">
                            <i class="fa fa-users"></i><span>Vendors</span></a>
                    </li>
                @endif

                 @if (in_array('9', $permission1))
                    <li class="{{ request()->segment(2) == 'price' ? 'active' : '' }}"><a
                            href="{{ route('price.edit', 1) }}"
                            class="{{ request()->segment(2) == 'price' ? 'active' : '' }}">
                            <i data-feather="credit-card"></i><span>price</span></a>
                    </li>
                @endif

                @if (in_array('6', $permission1) || in_array('7', $permission1))
                    <li class="submenu">
                        <a href="#"
                            class="{{ request()->segment(2) == 'userpermission' || request()->segment(2) == 'adminuser' ? 'active' : '' }}"><i
                                data-feather="user"></i> <span> User Management</span> <span class="menu-arrow"></span>
                        </a>
                        <ul>
                            @if (in_array('6', $permission1))
                                <li class="{{ request()->segment(2) == 'userpermission' ? 'active' : '' }}">
                                    <a href="{{ route('userpermission.index') }}">
                                        <i class="fa fa-hand-o-up"></i> User Permission
                                    </a>
                                </li>
                            @endif
                            @if (in_array('7', $permission1))
                                <li class="{{ request()->segment(2) == 'adminuser' ? 'active' : '' }}">
                                    <a href="{{ route('adminuser.index') }}"><i data-feather="lock"></i> Admin User
                                    </a>
                                </li>
                            @endif
                        </ul>
                    </li>
                @endif


                

            @endif

            @if (Auth::user()->vendor == 1)
                <li
                    class="{{ request()->segment(2) == 'subscription' || request()->segment(1) == 'base_on_service_lead' || request()->segment(1) == 'based_on_booking_services' || request()->segment(1) == 'based_on_listing_criteria' ? 'active' : '' }}">
                    <a href="{{ route('subscription.index') }}"
                        class="{{ request()->segment(2) == 'subscription' ? 'active' : '' }}">
                        <i class="fa fa-file"></i><span>Subscription</span></a>
                </li>

                <li class="{{ request()->segment(2) == 'vendorsprofile' ? 'active' : '' }}"><a
                        href="{{ route('vendorsprofile.index') }}"
                        class="{{ request()->segment(2) == 'vendorsprofile' ? 'active' : '' }}">
                        <i class="fa fa-user-plus"></i><span>Profile</span></a>
                </li>
            @endif

        </ul>
    </div>

</div>
