@include('front.includes.header')
<!-- start page title -->
<section class="wow animate__fadeIn bg-light-gray padding-25px-tb page-title-small">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 col-xl-8 col-lg-6">
                <h1 class="alt-font text-extra-dark-gray font-weight-500 no-margin-bottom text-center text-lg-start">Edit
                    Profile</h1>
            </div>
            <div
                class="col-12 col-xl-4 col-lg-6 breadcrumb justify-content-center justify-content-lg-end text-small alt-font md-margin-10px-top">
                <ul class="xs-text-center">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>Edit Profile</li>
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
                    <h4>Edit Profile</h4>
                </div>
                <!--NSP TITLE SECTION START-->
                <!--MY PURCHASES SECTION START-->
                <div class="my_purchases_box_section">
                    <div class="custom-back-g-white">
                        <div class="col-lg-10">
                            <form role="form" id="" method="post" action="{{ route('update_profile') }}">
                                @csrf
                                {{-- <input type="hidden" name="action" value="update_profile1">
                                <input type="hidden" name="id" id="id" value="6">
                                <input type="hidden" name="_token" value="3peFe8tn9LUDQbCiWcl6sikEbaiKTglf3YYX0cop"> --}}
                                <div class="row">
                                    <div class="col-lg-12 mb-20">
                                        <div class="custom-inner-form-title">
                                            <h4>Personal Information</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="contact-form-fields">
                                            <input type="text" name="name" id="name"
                                                placeholder="Enter Your Full Name" value="{{ $my_profile_data->name }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="contact-form-fields">
                                            <select name="gender" id="gender">
                                                <option value="">Select Gender</option>
                                                <option value="Female"
                                                    {{ $my_profile_data->gender == 'Female' ? 'selected' : '' }}>Female
                                                </option>
                                                <option value="Male"
                                                    {{ $my_profile_data->gender == 'Male' ? 'selected' : '' }}>Male
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20">
                                        <div class="contact-form-fields">
                                            <input type="date" name="dob" id="dob"
                                                value="{{ $my_profile_data->dob }}"
                                                placeholder="Enter Your Date of Birth">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mb-20">
                                        <div class="custom-inner-form-title">
                                            <h4>Sign In Details</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-20 position-relative verify-sec">
                                        <div class="contact-form-fields">
                                            <input type="text" name="mobile" id="mobile"
                                                value="{{ $my_profile_data->mobile }}"
                                                placeholder="Enter your Phone Number">
                                            <!-- <button type="button" class="btn">Verify</button>
                                        <a class="form-right-button" href="#">Update</a>  -->
                                        </div>
                                        <!-- <div class="col-lg-12 mobile_otp position-relative verify-sec contact-form-fields" style="display: none;">
                                        <input type="text" placeholder="ENTER OTP" name="otp" id="otp">
                                        <button type="button" class="btn">Resend OTP</button>
                                    </div> -->
                                    </div>
                                    <span id="otp_sent_success" style="display: none;" class="text-success"></span>
                                    <div class="col-lg-6 mb-20">
                                        <div class="contact-form-fields">
                                            <input type="text" name="email" id="email"
                                                value="{{ $my_profile_data->email }}" placeholder="Enter your Email Id">
                                            <!-- <a class="form-right-button" href="#">Update</a> -->
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-6 mb-20">
                                        <div class="contact-form-fields">
                                            <input type="password" name="password" id="password"
                                                value="{{ $my_profile_data->password }}"
                                                placeholder="Enter Your Password">
                                            <!-- <a class="form-right-button" href="#">Update</a> -->
                                        </div>
                                        <span id="validation_error" class="error alert-message valierror"
                                            style="display: none;"></span>
                                    </div> --}}
                                    <!-- <div class="col-lg-6 mb-20">
                                    <div class=""> &nbsp; </div>
                                </div> -->
                                    <div class="clearfix"></div>
                                    <div class="col-box6 mb-20">
                                        <div class="form-fields-button">
                                            <button type="submit" class="form-field-button update-btn">Update
                                                Profile</button>
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
