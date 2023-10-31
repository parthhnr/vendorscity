<div class="wishlist_left_side">

   <div class="wishlist_account_name">

      <h5>@if(Session::get('userdata') !='')

          {{ Session::get('userdata')['name'] }}

      @endif</h5>

      <p>@if(Session::get('userdata') !='')

         {{ Session::get('userdata')['email'] }}

         @endif

      </p>

   </div>

   <div class="nsp_acc_all_list">

      <div class="purchase_wishlist_help">

         <ul>

            <li><a href="{{url('/my-orders')}}">My Orders <img class="purchase_img" src="{{asset('public/site/images/Vector-left.png')}}"></a></li>

            <li><a href="{{url('/wishlist')}}">My Wishlist <img class="purchase_img" src="{{asset('public/site/images/Vector-left.png')}}"></a></li>

            <li><a href="{{url('/my-profile')}}">My Profile <img class="purchase_img" src="{{asset('public/site/images/Vector-left.png')}}"></a></li>

            <li><a href="{{url('/changepassword')}}">Change Password <img class="purchase_img" src="{{asset('public/site/images/Vector-left.png')}}"></a></li>

            <li>

               <a href="{{ url('signout') }}">Log out <img class="purchase_img"

                  src="{{asset('public/site/images/Vector-left.png')}}"></a>

            </li>

         </ul>

      </div>

   </div>

</div>