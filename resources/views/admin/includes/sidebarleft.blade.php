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

                <a href="{{ url('/admin') }}"><i data-feather="home"></i> <span>Dashboard</span></a>

            </li>

            @if (in_array('1', $permission1) ||

                    in_array('2', $permission1) ||

                    in_array('4', $permission1) ||

                    in_array('5', $permission1) ||

                    in_array('6', $permission1) ||

                    in_array('7', $permission1) ||

                    in_array('8', $permission1) ||

                    in_array('9', $permission1) ||

                    in_array('16', $permission1) ||

                    in_array('19', $permission1) ||

                    in_array('20', $permission1) ||

                    in_array('10', $permission1))



                <li class="submenu">

                    <a href="#"

                        class="{{ request()->segment(2) == 'category' || request()->segment(2) == 'subcategory' || request()->segment(2) == 'size' || request()->segment(2) == 'banner' || request()->segment(2) == 'collection' || request()->segment(2) == 'colour' || request()->segment(2) == 'material' || request()->segment(2) == 'style_type' ? 'active' : '' }}"><i

                            data-feather="pie-chart"></i> <span> Master</span> <span class="menu-arrow"></span></a>

                    <ul>

                        {{--

                        @if (in_array('4', $permission1))

                            <li><a href="{{ route('group.index') }}"

                                    class="{{ request()->segment(2) == 'group' ? 'active' : '' }}">Group</a></li>

                        @endif

                        @if (in_array('1', $permission1))

                            <li><a href="{{ route('category.index') }}"

                                    class="{{ request()->segment(2) == 'category' ? 'active' : '' }}">Category</a></li>

                        @endif

                        @if (in_array('2', $permission1))

                            <li><a href="{{ route('subcategory.index') }}"

                                    class="{{ request()->segment(2) == 'subcategory' ? 'active' : '' }}">Sub

                                    Category</a>

                            </li>

                        @endif



                        @if (in_array('5', $permission1))

                            <li><a href="{{ route('banner.index') }}"

                                    class="{{ request()->segment(2) == 'banner' ? 'active' : '' }}">Banner</a></li>

                        @endif





                        @if (in_array('6', $permission1))

                            <li><a href="{{ route('colour.index') }}"

                                    class="{{ request()->segment(2) == 'colour' ? 'active' : '' }}">Colour</a></li>

                        @endif



                        @if (in_array('7', $permission1))

                            <li><a href="{{ route('size.index') }}"

                                    class="{{ request()->segment(2) == 'size' ? 'active' : '' }}">Size</a></li>

                        @endif

                        @if (in_array('8', $permission1))

                            <li><a href="{{ route('material.index') }}"

                                    class="{{ request()->segment(2) == 'material' ? 'active' : '' }}">Material</a></li>

                        @endif

                        @if (in_array('9', $permission1))

                            <li><a href="{{ route('style_type.index') }}"

                                    class="{{ request()->segment(2) == 'style_type' ? 'active' : '' }}">Style Type</a>

                            </li>

                        @endif

                        @if (in_array('10', $permission1))

                            <li><a href="{{ route('subbanner.index') }}"

                                    class="{{ request()->segment(2) == 'subbanner' ? 'active' : '' }}">Sub Banner</a>

                            </li>

                        @endif



                        @if (in_array('16', $permission1))

                            <li><a href="{{ route('collection.index') }}"

                                    class="{{ request()->segment(2) == 'collection' ? 'active' : '' }}">Collection</a>

                            </li>

                        @endif

                        --}}

                        @if (in_array('19', $permission1))

                            <li><a href="{{ route('country.index') }}"

                                    class="{{ request()->segment(2) == 'country' ? 'active' : '' }}">Country</a>

                            </li>

                        @endif

                        @if (in_array('20', $permission1))

                            <li><a href="{{ route('state.index') }}"

                                    class="{{ request()->segment(2) == 'state' ? 'active' : '' }}">State</a>

                            </li>

                        @endif


                        @if (in_array('20', $permission1))

                            <li><a href="{{ route('city.index') }}"

                                    class="{{ request()->segment(2) == 'city' ? 'active' : '' }}">City</a>

                            </li>

                        @endif







                    </ul>

                </li>

            @endif



            {{--

            @if (in_array('3', $permission1))

                <li

                    class="{{ request()->segment(2) == 'product' || request()->segment(1) == 'editimage' ? 'active' : '' }}">

                    <a href="{{ route('product.index') }}"><i data-feather="book"></i> <span>Product</span></a>

                </li>

            @endif

            @if (in_array('15', $permission1))

                <li class="{{ request()->segment(2) == 'coupan' ? 'active' : '' }}">

                    <a href="{{ route('coupan.index') }}"><i data-feather="book"></i> <span>Coupon</span></a>

                </li>

            @endif





            @if (in_array('11', $permission1))

                <li class="{{ request()->segment(2) == 'blog' ? 'active' : '' }}">

                    <a href="{{ route('blog.index') }}"><i data-feather="book"></i> <span>Blog</span></a>

                </li>

            @endif

            @if (in_array('12', $permission1))

                <li class="{{ request()->segment(2) == 'cms' ? 'active' : '' }}">

                    <a href="{{ route('cms.index') }}"><i data-feather="book"></i> <span>CMS</span></a>

                </li>

            @endif



            @if (in_array('17', $permission1))

                <li class="{{ request()->segment(2) == 'customer' ? 'active' : '' }}">

                    <a href="{{ route('customer.index') }}"><i class="fa fa-users" aria-hidden="true"></i>

                        <span>Customers</span></a>

                </li>

            @endif

            @if (in_array('18', $permission1))

                <li class="{{ request()->segment(2) == 'subscribe' ? 'active' : '' }}">

                    <a href="{{ route('subscribe.index') }}"><i class="fa fa-bell" aria-hidden="true"></i>

                        <span>Subscribe</span></a>

                </li>

            @endif

            @if (in_array('21', $permission1))

                <li class="{{ request()->segment(2) == 'order' ? 'active' : '' }}">

                    <a href="{{ route('order.index') }}"><i data-feather="clipboard"></i><span>Order</span></a>

                </li>

            @endif

            @if (in_array('22', $permission1))

                <li class="{{ request()->segment(2) == 'review' ? 'active' : '' }}">

                    <a href="{{ route('review.index') }}"><i class="fa fa-star" aria-hidden="true"></i>

                        <span>Review</span></a>

                </li>

            @endif





            @if (in_array('13', $permission1) || in_array('14', $permission1))

                <li class="submenu">

                    <a href="#"

                        class="{{ request()->segment(2) == 'userpermission' || request()->segment(2) == 'adminuser' ? 'active' : '' }}"><i

                            data-feather="user"></i> <span> User Management</span> <span class="menu-arrow"></span>

                    </a>

                    <ul>

                        @if (in_array('13', $permission1))

                            <li class="{{ request()->segment(2) == 'userpermission' ? 'active' : '' }}">

                                <a href="{{ route('userpermission.index') }}">

                                    <i class="fa fa-hand-o-up"></i> User Permission

                                </a>

                            </li>

                        @endif

                        @if (in_array('14', $permission1))

                            <li class="{{ request()->segment(2) == 'adminuser' ? 'active' : '' }}">

                                <a href="{{ route('adminuser.index') }}"><i data-feather="lock"></i> Admin User </a>

                            </li>

                        @endif

                    </ul>

                </li>

            @endif

            --}}









            {{--

			<li class="{{ (request()->segment(2) == 'testimonial') ? 'active' : '' }}">

				<a href="{{ route('testimonial.index') }}"><i data-feather="book"></i> <span>Testimonial</span></a>

			</li>

			

			<li class="{{ (request()->segment(2) == 'cms') ? 'active' : '' }}">

				<a href="{{ route('cms.index') }}"><i data-feather="book"></i> <span>Cms</span></a>

			</li>

			

			<li class="{{ (request()->segment(2) == 'faq') ? 'active' : '' }}">

				<a href="{{ route('faq.index') }}"><i data-feather="book"></i> <span>Faq</span></a>

			</li>

			



			--}}





        </ul>

    </div>

</div>

