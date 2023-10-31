<div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">


        <ul>
            <li class="menu-title"><span>Main</span></li>
            <li class="{{ request()->segment(1) == 'admin' && request()->segment(2) == '' ? 'active' : '' }}">
                <a href="{{ url('/admin') }}"><i data-feather="home"></i> <span>Dashboard</span></a>
            </li>


            <li class="submenu">
                <a href="#"
                    class="{{ request()->segment(2) == 'category' || request()->segment(2) == 'subcategory' || request()->segment(2) == 'size' || request()->segment(2) == 'banner' || request()->segment(2) == 'collection' || request()->segment(2) == 'colour' || request()->segment(2) == 'material' || request()->segment(2) == 'style_type' ? 'active' : '' }}"><i
                        data-feather="pie-chart"></i> <span> Master</span> <span class="menu-arrow"></span></a>
                <ul>

                    <li><a href="{{ route('group.index') }}"
                            class="{{ request()->segment(2) == 'group' ? 'active' : '' }}">Group</a></li>


                    <li><a href="{{ route('category.index') }}"
                            class="{{ request()->segment(2) == 'category' ? 'active' : '' }}">Category</a></li>



                    <li><a href="{{ route('subcategory.index') }}"
                            class="{{ request()->segment(2) == 'subcategory' ? 'active' : '' }}">Sub Category</a></li>


                    <li><a href="{{ route('banner.index') }}"
                            class="{{ request()->segment(2) == 'banner' ? 'active' : '' }}">Banner</a></li>




                    <li><a href="{{ route('colour.index') }}"
                            class="{{ request()->segment(2) == 'colour' ? 'active' : '' }}">Colour</a></li>



                    <li><a href="{{ route('size.index') }}"
                            class="{{ request()->segment(2) == 'size' ? 'active' : '' }}">Size</a></li>



                    <li><a href="{{ route('material.index') }}"
                            class="{{ request()->segment(2) == 'material' ? 'active' : '' }}">Material</a></li>

                    <li><a href="{{ route('style_type.index') }}"
                            class="{{ request()->segment(2) == 'style_type' ? 'active' : '' }}">Style Type</a></li>
                    {{--
										
					<li><a href="{{ route('collection.index') }}" class="{{ (request()->segment(2) == 'collection') ? 'active' : '' }}">Collection</a></li>

					--}}

                </ul>
            </li>



            <li
                class="{{ request()->segment(2) == 'product' || request()->segment(1) == 'editimage' ? 'active' : '' }}">
                <a href="{{ route('product.index') }}"><i data-feather="book"></i> <span>Product</span></a>
            </li>
            {{--
			<li class="{{ (request()->segment(2) == 'coupan') ? 'active' : '' }}">
				<a href="{{ route('coupan.index') }}"><i data-feather="book"></i> <span>Coupan</span></a>
			</li>
			
			--}}

            <li class="{{ request()->segment(2) == 'blog' ? 'active' : '' }}">
                <a href="{{ route('blog.index') }}"><i data-feather="book"></i> <span>Blog</span></a>
            </li>




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
