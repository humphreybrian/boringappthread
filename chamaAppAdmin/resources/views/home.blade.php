@extends('layouts.master')
@section('content')
<main id="main-container">
		<div class="content">

        @auth

			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					
					<!-- Item sold -->
					<div class="card stats-card">
						<div class="stats-icon">
							<span class="ti-bag"></span>
						</div>
						<div class="stats-ctn">
							<div class="stats-counter"><span class="counter">{{$total_users}}</span></div>
							<span class="desc">Total Users</span>
						</div>
					</div><!-- .card -->
					<!-- /End Item sold -->

				</div><!-- .col -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					
					<!-- Earnings -->
					<div class="card stats-card">
						<div class="stats-icon">
							<span class="ti-wallet"></span>
						</div>
						<div class="stats-ctn">
							<div class="stats-counter">Ksh <span class="counter">{{$actual_deposit_balance}}</span></div>
							<span class="desc">Total deposits</span>
						</div>
					</div><!-- .card -->
					<!-- /End Earnings -->

				</div><!-- .col -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					
					<!-- Messages -->
					<div class="card stats-card">
						<div class="stats-icon">
							<span class="ti-email"></span>
						</div>
						<div class="stats-ctn">
							<div class="stats-counter">Ksh <span class="counter">{{$loan_balance}}</span></div>
							<span class="desc">Total Unpaid Loans</span>
						</div>
					</div><!-- .card -->
					<!-- /End Messages -->

				</div><!-- .col -->
				<div class="col-lg-3 col-md-6 col-sm-6">
					
					<!-- Notifications -->
					<div class="card stats-card">
						<div class="stats-icon">
							<span class="ti-bell"></span>
						</div>
						<div class="stats-ctn">
							<div class="stats-counter">Ksh <span class="counter">{{$amount_withdrawn}}</span></div>
							<span class="desc">Total Withdrawals</span>
						</div>
					</div><!-- .card -->
					<!-- /End Notifications -->

				</div><!-- .col -->
			</div><!-- .row -->

			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dev-resource-card">
					
					<!-- Device resource -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Deposists
							</div>

							<table id="mytable" class="table table-striped table-responsive">
							<thead>
								<tr>
									<!-- <th>ID</th> -->
									<th>Deposit Receipt Number</th>
									<th>Pay Period</th>
									<th>Deposit Amount</th>
									<th>Payment Method</th>
                                    <th>Reference Number</th>
									<!-- <th>Deposit status</th> -->
								</tr>
							</thead>
							<tbody>
                            @foreach($deposit_amounts as $d_amounts)
								<tr>
									<!-- <td>#71990</td> -->
									<td>{{$d_amounts -> deposit_receipt_number}}</td>
									<td>{{$d_amounts -> pay_period}}</td>
									<td>{{$d_amounts -> deposit_amount}}</td>
									<td>{{$d_amounts -> payment_method}}</td>
                                    <td>{{$d_amounts -> reference_number}}</td>
									<!-- <td>{{$d_amounts -> deposit_status}}</td> -->
								</tr>
                                @endforeach
								
								
							</tbody>
						</table>

						</div><!-- .card-body -->
					</div><!-- .card -->
					<!-- /End Device resource -->
                   
				</div><!-- .col -->
				
			</div><!-- .row -->
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 dev-resource-card">
					
					<!-- Device resource -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Users
							</div>

							<table id="mytable" class="table table-striped table-responsive">
							<thead>
								<tr>
									<!-- <th>ID</th> -->
									<th>Name</th>
									<th>Email</th>
									<th>Phone</th>
									<th>Group</th>
                                    <th>Date Created</th>
									<!-- <th>Deposit status</th> -->
								</tr>
							</thead>
							<tbody>
                            @foreach($list_users as $d_amounts)
								<tr>
									<!-- <td>#71990</td> -->
									<td>{{$d_amounts -> name}}</td>
									<td>{{$d_amounts -> email}}</td>
									<td>{{$d_amounts -> phone}}</td>
									<td>{{$d_amounts -> group_id}}</td>
                                    <td>{{$d_amounts -> created_at}}</td>
									<!-- <td>{{$d_amounts -> deposit_status}}</td> -->
								</tr>
                                @endforeach
								
								
							</tbody>
						</table>

						</div><!-- .card-body -->
					</div><!-- .card -->
					<!-- /End Device resource -->
                   
				</div><!-- .col -->
				
			</div><!-- .row -->

@endauth
		</div><!-- .content -->
	</main>
@stop