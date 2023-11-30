@include('front.includes.header')
   <section class="our-about bgc-thm2 container pb0 pt0 mb30">
      <div class="container">
        <div class="row align-items-center">
          
          <div class="col-xl-5 offset-xl-1">
            <div class="position-relative wow fadeInLeft" data-wow-delay="300ms">
              <h2 class=" mb35">Get the best deals
from the best
vendors</h2>
              
            </div>
          </div>
          <div class="col-xl-6">
            <div class="position-relative mb30-lg">
              
              <div class="about-img wow fadeInRight" data-wow-delay="300ms">
                <img class="" src="{{ asset('public/site/images/regasvendor_new.png')}}" alt="">
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
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Category</button>
                    </h4>
                  </div>
                  <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <div class="checkbox-style1 mb15">
                        <label class="custom_checkbox">Category 1
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <!-- <span class="right-tags">(1,945)</span> -->
                        </label>
                        <label class="custom_checkbox">Category 2
                          <input type="checkbox" checked="checked">
                          <span class="checkmark"></span>
                          <!-- <span class="right-tags">(8,136)</span> -->
                        </label>
                        <label class="custom_checkbox">Category 3
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <!-- <span class="right-tags">(917)</span> -->
                        </label>
                        <label class="custom_checkbox">Category 4
                          <input type="checkbox">
                          <span class="checkmark"></span>
                          <!-- <span class="right-tags">(240)</span> -->
                        </label>
                        
                      </div>
                      <a class="text-thm" href="">+Show more</a>
                    </div>
                  </div>
                </div>
                <div class="card mb20 pb0">
                  <div class="card-header active" id="heading1">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse1" aria-expanded="true" aria-controls="collapse1">Budget</button>
                    </h4>
                  </div>
                  <div id="collapse1" class="collapse show" aria-labelledby="heading1" data-parent="#accordionExample">
                    <div class="card-body card-body px-0 pt-0">
                      <!-- Range Slider Desktop Version -->
                      <div class="range-slider-style1">
                        <div class="range-wrapper">
                          <div class="slider-range mb10 mt15"></div>
                          <div class="text-center">
                            <input type="text" class="amount" placeholder="$20"><span class="fa-sharp fa-solid fa-minus mx-2 dark-color"></span>
                            <input type="text" class="amount2" placeholder="$70987">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card mb20 pb5">
                  <div class="card-header active" id="heading2">
                    <h4>
                      <button class="btn btn-link ps-0" type="button" data-bs-toggle="collapse" data-bs-target="#collapse2" aria-expanded="true" aria-controls="collapse2">Region</button>
                    </h4>
                  </div>
                  <div id="collapse2" class="collapse show" aria-labelledby="heading2" data-parent="#accordionExample">
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
                  
                </div>
              </div>
              <div class="col-md-6">
                <div class="page_control_shorting d-md-flex align-items-center justify-content-center justify-content-md-end">
                  <div class="dropdown-lists d-block d-lg-none me-2 mb10-sm">
                    <ul class="p-0 mb-0 text-center text-md-start">
                      <li>
                        <!-- Advance Features modal trigger -->
                        <button type="button" class="open-btn filter-btn-left"> <img class="me-2" src="{{asset('public/site/images/icon/all-filter-icon.svg')}}" alt=""> All Filter</button>
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

              @if ($allvendor != '' && count($allvendor) > 0)

              @php
              //echo"<pre>";print_r($allvendor);echo"</pre>";
              @endphp

              @foreach($allvendor as $allvendor_data)
              <div class="col-md-6 col-lg-12">
                <div class="freelancer-style1 bdr1 hover-box-shadow row ms-0 align-items-lg-center">
                  <div class="col-lg-8 ps-0">
                    <div class="d-lg-flex bdrr1 bdrn-xl pr15 pr0-lg">
                      <div class="thumb w60 position-relative rounded-circle mb15-md">
                          @if ($allvendor_data->image != '')
                            <img class="rounded-circle mx-auto" src="{{ asset('public/upload/vendors/small/' . $allvendor_data->image) }}" alt="" width="60px">
                          @else
                            <img class="rounded-circle mx-auto" src="{{ asset('public/upload/avatar.jpg') }}" alt="Profile Image" width="60px">
                          @endif
                        <span class="online-badge2"></span>
                      </div>
                      <div class="details ml15 ml0-md mb15-md">
                        <h5 class="title mb-3">{{$allvendor_data->name}}</h5>

                        @if ($allvendor_data->city != '')
                            <p class="mb-0 fz14 list-inline-item mb5-sm pe-1"><i class="flaticon-place fz16 vam text-thm2 me-1"></i> {!! Helper::cityname($allvendor_data->city) !!}</p>                       
                                                   
                        @endif
                        
                        @if ($allvendor_data->short_description != '')
                        <p class="text mt10">{{$allvendor_data->short_description}}</p>
                        @endif

                        <div class="skill-tags d-flex align-items-center justify-content-start">
                          <span class="tag">Relocation</span>
                          <span class="tag mx10">Storage</span>
                          <span class="tag">Truck Services</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 ps-0 ps-xl-3 pe-0">
                    
                      <div class="d-grid mt15">
                        <a href="#" class="ud-btn btn-thm2">Get free quote</a>
                      </div>
                    </div>
                  </div>
                </div>

                @endforeach
              @else
                No Vendor Available

              @endif



              </div>
                {!! $allvendor->appends($_GET)->render("pagination::bootstrap-4") !!}
            </div>
            
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
