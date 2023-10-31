@include('front.includes.header')
<!-- start page title -->
<section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-xl-8 col-lg-6">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">My
                    account</h1>
            </div>
            <div
                class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                <ul class="xs-text-center">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>My account</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- end page title -->
<!-- start section -->
<section class="wow animate__fadeIn orders_ss">
    <div class="container-fluid">
        <div class="row flex-drc">
            <div class="col-lg-9">
                <!--NSP TITLE SECTION START-->
                <div class="SS_title_section">
                    <h4>Edit Address</h4>
                </div>
                <!--NSP TITLE SECTION START-->
                <!--MY PURCHASES SECTION START-->
                <div class="my_purchases_box_section">
                    <div class="custom-back-g-white">
                        <div class="col-lg-8">
                            <form role="form" id="address_form" method="post" action="{{ route('update_address') }}"
                                id="edit_address">
                                @csrf
                                <input type="hidden" name="address_id" value="{{ $my_editaddress->id }}">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 mb-10">
                                        <div class="form-fields">
                                            <label for="name">First Name</label><br>
                                            <input type="text" name="first_name" id="first_name"
                                                value="{{ $my_editaddress->first_name }}"
                                                placeholder="Enter First Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 mb-10">
                                        <div class="form-fields">
                                            <label for="name">Last Name</label><br>
                                            <input type="text" name="last_name" id="last_name"
                                                value="{{ $my_editaddress->last_name }}" placeholder="Enter Last Name">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-fields">
                                            <label for="name">Address 1</label><br>
                                            <input type="text" name="address1" id="address1"
                                                value="{{ $my_editaddress->address1 }}" placeholder="Address line 1"
                                                maxlength="70">
                                        </div>
                                        <!-- <p class="form-password-sug-text">Block, Building name, Street</p> -->
                                    </div>
                                    <div class="col-lg-12 col-md-12">
                                        <div class="form-fields">
                                            <label for="name">Address 2</label><br>
                                            <input type="text" name="address2" id="address2"
                                                value="{{ $my_editaddress->address2 }}" placeholder="Address line 2"
                                                maxlength="50">
                                        </div>
                                        <!-- <p class="form-password-sug-text">Landmark, Area etc</p> -->
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="name">Phone</label><br>
                                            <input type="text" name="phone" id="phone"
                                                placeholder="Enter Phone Number" value="{{ $my_editaddress->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="name">Email</label><br>
                                            <input type="text" name="email" id="email"
                                                placeholder="Enter Email Address" value="{{ $my_editaddress->email }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="country">Country</label>
                                                <select class="country-options" id="country" name="country" onchange="state_change(this.value);">
                                                <option value="">Select Country</option>
                                                @foreach($country_data as $country)
                                                <option value="{{$country->id}}" {{ $country->id == $my_editaddress->country ? "selected" : "" }}>{{ $country->country }}</option>
                                                @endforeach
                                                </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="state">State</label>
                                            <span id="state_chang">
                                                <select class="country-options" id="state" name="state">
                                                <option value="">Select State</option>
                                                @foreach($state_data as $state)
                                                <option value="{{$state->id}}" {{ $state->id == $my_editaddress->state ? "selected" : "" }}>{{ $state->state }}</option>
                                                @endforeach
                                                </select>
                                            </span>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="name">City</label><br>
                                            <input type="text" name="city" id="city"
                                                value="{{ $my_editaddress->city }}" placeholder="Enter City">
                                        </div>
                                    </div>
                                    
                                    <div class="col-lg-6 col-md-6">
                                        <div class="form-fields">
                                            <label for="name">Pincode</label><br>
                                            <input type="text" name="pincode" id="pincode"
                                                value="{{ $my_editaddress->pincode }}"
                                                placeholder="Enter Post code">
                                        </div>
                                    </div>
                                    <span id="validation_error" class="error alert-message valierror"
                                        style="display: none;"></span>
                                    <!-- <div class="col-box12 mb-0">
              <div class="form-field-radio">
                  <p class="form-fields-text">Delivery address type</p>
                  <label class="custom-radio-button">Home
                      <input type="radio" value="0" name="address_type" id="address_type">
                      <span class="checkmark"></span>
                  </label>
                  <label class="custom-radio-button">Office
                      <input type="radio" name="address_type" id="address_type" value="1" checked="checked">
                      <span class="checkmark"></span>
                  </label>
                  <label class="custom-radio-button">Other
                      <input type="radio" name="address_type" id="address_type" value="2">
                      <span class="checkmark"></span>
                  </label>
              </div>
          </div> -->
                                    <!--  <div class="col-box12">
              <div class="form-field-radio">
                  <label class="custom-checkbox save-address">Make this Default
                      <input type="checkbox" value="1" id="default_address" name="default_address">
                      <span class="checkmark"></span>
                  </label>
              </div>
          </div> -->
                                    <div class="col-box10 mb-20">
                                        <div class="form-fields-button">
                                            <button type="button" class="form-field-button update-btn" onclick="javascript:address_validation()">Update
                                                Address</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!--  -->
                </div>
                <!--MY PURCHASES SECTION CLOSE-->
            </div>
            <div class="col-lg-3">
                @include('front.sidebar')
            </div>
        </div>
    </div>
</section>
<!-- end section -->
@include('front.includes.footer')

<script>
    function address_validation() {
        var first_name = jQuery("#first_name").val();
        if (first_name == '') {
            jQuery('#validation_error').html("Please Enter First Name");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var last_name = jQuery("#last_name").val();
        if (last_name == '') {
            jQuery('#validation_error').html("Please Enter Last Name");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var address1 = jQuery("#address1").val();
        if (address1 == '') {
            jQuery('#validation_error').html("Please Enter Address Line-1");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var phone = jQuery("#phone").val();
        if (phone == '') {
            jQuery('#validation_error').html("Please Enter Phone Number");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var regex = /^[0-9]{10}$/;
        if (!regex.test(phone)) {
            jQuery('#validation_error').html("Please Enter Phone Number proper");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var email = jQuery("#email").val();
        if (email == '') {
            jQuery('#validation_error').html("Please Enter Email");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if (!regex.test(email)) {
            jQuery('#validation_error').html("Please Enter Proper Email");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        
        // var regex = /^[0-5]{6}$/;
        // if (!regex.test(pincode)) {
        //     jQuery('#validation_error').html("Please Enter Proper Pincode");
        //     jQuery('#validation_error').show().delay(0).fadeIn('show');
        //     jQuery('#validation_error').show().delay(2000).fadeOut('show');
        //     return false;
        // }
        
        var country = jQuery("#country").val();
        if (country == '') {
            jQuery('#validation_error').html("Please Select Country");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var state = jQuery("#state").val();
        if (state == '') {
            jQuery('#validation_error').html("Please Select State");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }

        var city = jQuery("#city").val();
        if (city == '') {
            jQuery('#validation_error').html("Please Enter City");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        var pincode = jQuery("#pincode").val();
        if (pincode == '') {
            jQuery('#validation_error').html("Please Enter Pincode");
            jQuery('#validation_error').show().delay(0).fadeIn('show');
            jQuery('#validation_error').show().delay(2000).fadeOut('show');
            return false;
        }
        $('#address_form').submit();
    }
</script>


<script type="text/javascript">
    function state_change(country_id){
        // alert(country_id);
        var url = '{{ url('state_show') }}';
        // alert(url);
        $.ajax({
            url: url,
            type: 'post',
            data: {
                "_token": "{{ csrf_token() }}",
                "country_id": country_id
            },
            success: function(msg) {
                document.getElementById('state_chang').innerHTML = msg;
            }
        });
    }
</script>