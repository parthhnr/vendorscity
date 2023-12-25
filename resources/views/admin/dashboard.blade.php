   @extends('admin.includes.Template')

   @section('content')



       <div class="content container-fluid">

           <div class="success">

               @if ($message = Session::get('login_success'))
                   <div class="alert alert-success alert-dismissible fade show" style="text-align: center;">

                       {{ $message }}

                       <button type="button" class="btn-close" data-bs-dismiss="alert"></button>

                   </div>
               @endif

           </div>

           <!-- Page Header -->

           <div class="page-header">

               <div class="row align-items-center">

                   <div class="col">

                       <h2 class="page-title">Admin Dashboard</h2>

                   </div>

               </div>

           </div>
            <div class="row">
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-1">
											<i class="fas fa-dollar-sign"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Services</div>
											<div class="dash-counts">
												<p>1,642</p>
											</div>
										</div>
									</div>
									<div class="progress progress-sm mt-3">
										<div class="progress-bar bg-5" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>1.15%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-2">
											<i class="fas fa-users"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Vendors</div>
											<div class="dash-counts">
												<p>3,642</p>
											</div>
										</div>
									</div>
									<div class="progress progress-sm mt-3">
										<div class="progress-bar bg-6" role="progressbar" style="width: 65%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>2.37%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-3">
											<i class="fas fa-file-alt"></i>
										</span>
										<div class="dash-count">
											<div class="dash-title">Customers</div>
											<div class="dash-counts">
												<p>1,041</p>
											</div>
										</div>
									</div>
									<div class="progress progress-sm mt-3">
										<div class="progress-bar bg-7" role="progressbar" style="width: 85%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<!--<p class="text-muted mt-3 mb-0"><span class="text-success me-1"><i class="fas fa-arrow-up me-1"></i>3.77%</span> since last week</p>-->
								</div>
							</div>
						</div>
						<div class="col-xl-3 col-sm-6 col-12">
							<div class="card">
								<div class="card-body">
									<div class="dash-widget-header">
										<span class="dash-widget-icon bg-4">
											<i class="far fa-file"></i>
										</span> 
										<div class="dash-count">
											<div class="dash-title">Total Leads
											<div class="dash-counts">
												<p>2,150</p>
											</div>
										</div>
									</div>
									<div class="progress progress-sm mt-3">
										<div class="progress-bar bg-8" role="progressbar" style="width: 45%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
									</div>
									<!--<p class="text-muted mt-3 mb-0"><span class="text-danger me-1"><i class="fas fa-arrow-down me-1"></i>8.68%</span> since last week</p>-->
								</div>
							</div>
						</div>
					</div>

       </div>

   @stop
