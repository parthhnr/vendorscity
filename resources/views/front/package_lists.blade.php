@include('front.includes.header')
<section class="breadcumb-section pt-0 container">
    <div
        class="cta-service-v3 cta-banner mx-auto maxw1700 pt120 pb120 bdrs16 position-relative overflow-hidden d-flex align-items-center mx20-lg px30-lg">
        <img class="left-top-img wow zoomIn" src="{{ asset('public/site/images/vector-img/left-top.png') }}"
            alt="">
        <img class="right-bottom-img wow zoomIn" src="{{ asset('public/site/images/vector-img/right-bottom.png') }}"
            alt="">
        <img class="service-v3-vector d-none d-lg-block" src="{{ asset('public/site/images/about/about-4.png') }}"
            alt="">
        <div class="container">
            <div class="row wow fadeInUp">
                <div class="col-xl-5">
                    <div class="position-relative">
                        <h2 class="text-white">Explore the best deals on moving</h2>
                        <!-- <p class="text mb30 text-white">Give your visitor a smooth online experience with a solid UX design</p> -->
                        <div class="d-flex align-items-center">

                            <h6 class="mb-0 text-white">Use Code MoveitMoveit
                            </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Listings All Lists -->
<section class="pt30 pb90">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="list-sidebar-style1 d-none d-lg-block">
                    <div class="accordion" id="accordionExample">

                        <div class="card mb20 pb5">
                            <div class="card-header active" id="heading2">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Sub
                                        Service</button>
                                </h4>
                            </div>
                            <div id="collapse2" class="collapse show" aria-labelledby="heading2"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    @foreach ($subservice_data as $subservices)
                                        <div class="checkbox-style1">
                                            <a href="{{ url('package-lists/' . $subservices->page_url) }}">
                                                <label class="custom_checkbox">{{ $subservices->subservicename }}
                                                </label>
                                            </a>
                                        </div>
                                    @endforeach
                                    <a class="text-thm" href="#">+Show more</a>
                                </div>
                            </div>
                        </div>
                        <form id="search_mini_form" name="search_mini_form" method="get">
                            <div class="card mb20 pb0">
                                <div class="card-header active" id="heading1">
                                    <h4>
                                        <button class="btn btn-link ps-0" type="submit" data-bs-toggle="collapse"
                                            data-bs-target="#collapse1" aria-expanded="true"
                                            aria-controls="collapse1">Budget</button>
                                    </h4>
                                </div>

                                @php
                                    if (isset($_GET['filter_price_start'])) {
                                        $startPrice = $_GET['filter_price_start'];
                                    } else {
                                        $startPrice = '1';
                                    }

                                    if (isset($_GET['filter_price_end'])) {
                                        $endPrice = $_GET['filter_price_end'];
                                    } else {
                                        $endPrice = $max_price;
                                    }
                                @endphp

                                <div id="collapse1" class="collapse show" aria-labelledby="heading1"
                                    data-parent="#accordionExample">
                                    <div class="card-body card-body px-0 pt-0">
                                        <!-- Range Slider Desktop Version -->
                                        <div class="range-slider-style1">
                                            <div class="range-wrapper">
                                                <div class="slider-range mb10 mt15"></div>
                                                <div class="text-center">
                                                    <input type="text" class="amount" id="amount"
                                                        placeholder="${{ $startPrice }}">
                                                    <span class="fa-sharp fa-solid fa-minus mx-2 dark-color"></span>
                                                    <input type="text" class="amount2" id="amount2"
                                                        placeholder="${{ $endPrice }}">


                                                    <input type="hidden" name="max_price" id="max_price"
                                                        value="{{ $max_price }}">
                                                    <input type="hidden" name="filter_price_start"
                                                        id="filter_price_start" value="{{ $filter_price_start }}">
                                                    <input type="hidden" name="filter_price_end" id="filter_price_end"
                                                        value="{{ $filter_price_end }}">
                                                    <input type="hidden" name="sort_by" id="sort_by">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="card mb20 pb5">
                            <div class="card-header active" id="heading2">
                                <h4>
                                    <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse2" aria-expanded="true"
                                        aria-controls="collapse2">Region</button>
                                </h4>
                            </div>
                            <div id="collapse2" class="collapse show" aria-labelledby="heading2"
                                data-parent="#accordionExample">
                                <div class="card-body card-body px-0 pt-0">
                                    <div class="checkbox-style1 mb15">
                                        <label class="custom_checkbox">Dubai
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <!-- <span class="right-tags">(1,945)</span> -->
                                        </label>
                                        <label class="custom_checkbox">Sharjah
                                            <input type="checkbox" checked="checked">
                                            <span class="checkmark"></span>
                                            <!-- <span class="right-tags">(8,136)</span> -->
                                        </label>
                                        <label class="custom_checkbox">Qatar
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <!-- <span class="right-tags">(917)</span> -->
                                        </label>
                                        <label class="custom_checkbox">Saudi Arabia
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <!-- <span class="right-tags">(240)</span> -->
                                        </label>
                                        <label class="custom_checkbox">Jordan
                                            <input type="checkbox">
                                            <span class="checkmark"></span>
                                            <!-- <span class="right-tags">((2,460)</span> -->
                                        </label>
                                    </div>
                                    <a class="text-thm" href="">+Show more</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card mb20 pb5">
                  <div class="card-header active" id="heading3">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse3" aria-expanded="true" aria-controls="collapse3">Location</button>
                    </h4>
                  </div>
                  <div id="collapse3" class="collapse show" aria-labelledby="heading3" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <div class="search_area mb15">
                        <input type="text" class="form-control" placeholder="What are you looking for?">
                        <label><span class="flaticon-loupe"></span></label>
                      </div>
                      <div class="checkbox-style1 mb15">
                        <label class="custom_checkbox">United States
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(1,945)</span>
                        </label>
                        <label class="custom_checkbox">United Kingdom
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                          <span class="right-tags">(8,136)</span>
                        </label>
                        <label class="custom_checkbox">Canada
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(917)</span>
                        </label>
                        <label class="custom_checkbox">Germany
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(240)</span>
                        </label>
                        <label class="custom_checkbox">Turkey
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">((2,460)</span>
                        </label>
                      </div>
                      <a class="text-thm" href="">+20 more</a>
                    </div>
                  </div>
                </div>
                <div class="card mb20 pb5">
                  <div class="card-header active" id="heading4">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse4" aria-expanded="true" aria-controls="collapse4">Speaks</button>
                    </h4>
                  </div>
                  <div id="collapse4" class="collapse show" aria-labelledby="heading4" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <div class="checkbox-style1 mb15">
                        <label class="custom_checkbox">Turkish
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(1,945)</span>
                        </label>
                        <label class="custom_checkbox">English
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                          <span class="right-tags">(8,136)</span>
                        </label>
                        <label class="custom_checkbox">Italian
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(917)</span>
                        </label>
                        <label class="custom_checkbox">Spanish
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(240)</span>
                        </label>
                      </div>
                      <a class="text-thm" href="">+20 more</a>
                    </div>
                  </div>
                </div> -->
                        <!--  <div class="card mb20 pb0">
                  <div class="card-header active" id="heading5">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse5" aria-expanded="true" aria-controls="collapse5">Level</button>
                    </h4>
                  </div>
                  <div id="collapse5" class="collapse show" aria-labelledby="heading5" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <div class="checkbox-style1">
                        <label class="custom_checkbox">Top Rated Seller
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(1,945)</span>
                        </label>
                        <label class="custom_checkbox">Level Two
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                          <span class="right-tags">(8,136)</span>
                        </label>
                        <label class="custom_checkbox">Level One
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(917)</span>
                        </label>
                        <label class="custom_checkbox">New Seller
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <span class="right-tags">(240)</span>
                        </label>
                      </div>
                    </div>
                  </div>
                </div> -->
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row align-items-center mb20">
                    <div class="col-md-6">
                        <div class="text-center text-md-start">
                            <p class="text mb-0 mb10-sm"><span class="fw500">{{-- $package_count --}}</span> services
                                available</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div
                            class="page_control_shorting d-md-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dropdown-lists d-block d-lg-none me-2 mb10-sm">
                                <ul class="p-0 mb-0 text-center text-md-start">
                                    <li>
                                        <!-- Advance Features modal trigger -->
                                        <button type="button" class="open-btn filter-btn-left"> <img class="me-2"
                                                src="{{ asset('public/site/images/icon/all-filter-icon.svg') }}"
                                                alt=""> All Filter</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="pcs_dropdown dark-color pr10 text-center text-md-end"><span>Sort by</span>
                                <select class="selectpicker show-tick">
                                    <option>Best Selling</option>
                                    <option>Recommended</option>
                                    <option>New Arrivals</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @php
                        // echo '<pre>';
                        // print_r($package_data);
                        // echo '</pre>';
                    @endphp

                    @if ($package_data != '' && count($package_data) > 0)

                        @foreach ($package_data as $package_data_new)
                            @php

                                $subservice = DB::table('subservices')
                                    ->where('id', $package_data_new->subservice_id)
                                    ->first();

                            @endphp
                            <div class="col-sm-6 col-xl-4">
                                <div class="listing-style1">
                                    <div class="list-thumb">
                                        @if ($package_data_new->image)
                                            <a href="{{ url('package-detail/' . $package_data_new->page_url) }}">
                                                <img class="w-100"
                                                    src="{{ asset('public/upload/packages/large/' . $package_data_new->image) }}"
                                                    alt="">
                                            </a>
                                        @endif
                                        <a href="" class="listing-fav fz12"><span
                                                class="far fa-heart"></span></a>
                                    </div>
                                    <div class="list-content">
                                        <h5 class="list-title">
                                            <a href="{{ url('package-detail/' . $package_data_new->page_url) }}">{{ $package_data_new->name }}
                                            </a>
                                        </h5>

                                        @if ($package_data_new->short_description)
                                            <div class="review-meta d-flex align-items-center">
                                                <p>{{ $package_data_new->short_description }}</p>
                                            </div>
                                        @endif
                                        <hr class="my-2">
                                        @php
                                            $disc_price = $package_data_new->price; // Set a default value

                                            if ($package_data_new->discount_type != '') {
                                                if ($package_data_new->discount_type == 0) {
                                                    $disc_price_new = ($package_data_new->price * $package_data_new->discount) / 100;
                                                    $disc_price = $package_data_new->price - $disc_price_new;
                                                } elseif ($package_data_new->discount_type == 1) {
                                                    $disc_price = $package_data_new->price - $package_data_new->discount;
                                                } else {
                                                    $package_data_new->price;
                                                }
                                            } else {
                                                $package_data_new->price;
                                            }

                                        @endphp
                                        <div class="list-meta d-flex justify-content-between align-items-center mt15">
                                            <a href="{{ url('package-detail/' . $package_data_new->page_url) }}">
                                                @if ($package_data_new->discount_type != '2')
                                                    <span class="fz14">AED {{ $disc_price }}
                                                        <del>{{ $package_data_new->price }}</del></span>
                                                @else
                                                    <span class="fz14">AED {{ $package_data_new->price }}</span>
                                                @endif

                                            </a>

                                            <div class="budget">
                                                @if (in_array('0', explode(',', $subservice->is_bookable)))
                                                    <a class="ud-btn btn-thm add-joining" href="#">Add
                                                        To Cart</a>
                                                @endif
                                                @if (in_array('1', explode(',', $subservice->is_bookable)))
                                                    <a class="ud-btn btn-thm add-joining"
                                                        href="{{ route('enquiry', ['id' => $package_data_new->id]) }}">Inquiry</a>
                                                @elseif (in_array('0', explode(',', $subservice->is_bookable)) && in_array('1', explode(',', $subservice->is_bookable)))
                                                    <a class="ud-btn btn-thm add-joining"
                                                        href="javascript:void(0)">Add To
                                                        Cart</a>
                                                    <a class="ud-btn btn-thm add-joining"
                                                        href="{{ route('enquiry', ['id' => $package_data_new->id]) }}">Inquiry</a>
                                                @endif
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        No Package Available

                    @endif


                </div>
                {{-- {!! $package_pagination->appends($_GET)->render('pagination::bootstrap-4') !!} --}}
                <!--  <div class="row">
              <div class="mbp_pagination mt30 text-center">
                <ul class="page_navigation">
                  <li class="page-item">
                    <a class="page-link" href="#"> <span class="fas fa-angle-left"></span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item active" aria-current="page">
                    <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">4</a></li>
                  <li class="page-item d-inline-block d-sm-none"><a class="page-link" href="#">...</a></li>
                  <li class="page-item"><a class="page-link" href="#">5</a></li>
                  <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">...</a></li>
                  <li class="page-item d-none d-sm-inline-block"><a class="page-link" href="#">20</a></li>
                  <li class="page-item">
                    <a class="page-link" href="#"><span class="fas fa-angle-right"></span></a>
                  </li>
                </ul>
                <p class="mt10 mb-0 pagination_page_count text-center">1 – 20 of 300+ property available</p>
              </div>
            </div> -->
            </div>
        </div>
    </div>
</section>
@include('front.includes.footer')

<script>
    $(".slider-range").on("slide", function(event, ui) {
        var lowAmount = $("#amount").val();
        var highAmount = $("#amount2").val();
        var max_price = $("#max_price").val();

        $("#filter_price_start").val(lowAmount);
        $("#filter_price_end").val(highAmount);
        $("#max_price").val(max_price);

        // $("#categoryFilter").submit();
        document.search_mini_form.submit();
    });
</script>
