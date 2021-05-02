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
							<div class="stats-counter"><span class="counter">87</span></div>
							<span class="desc">Contributions</span>
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
							<div class="stats-counter">$<span class="counter">1021</span></div>
							<span class="desc">Amount in Account</span>
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
							<div class="stats-counter"><span class="counter">31</span></div>
							<span class="desc">Loan Balance</span>
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
							<div class="stats-counter"><span class="counter">22</span></div>
							<span class="desc">Group Messages</span>
						</div>
					</div><!-- .card -->
					<!-- /End Notifications -->

				</div><!-- .col -->
			</div><!-- .row -->

			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 dev-resource-card">
					
					<!-- Device resource -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Invoice
							</div>

							<table id="mytable" class="table table-striped table-responsive">
							<thead>
								<tr>
									<th>ID</th>
									<th>Company</th>
									<th>Payment Type</th>
									<th>Date</th>
									<th>Progress</th>
									<th>Total</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>#71990</td>
									<td>Carasco Petroloum, Inc</td>
									<td>PayPal</td>
									<td>Nov 11, 13:42</td>
									<td><span class="pie">2/8</span></td>
									<td>$689,999</td>
								</tr>
								<tr>
									<td>#71989</td>
									<td>Orange Association</td>
									<td>PayPal</td>
									<td>Nov 10, 09:00</td>
									<td><span class="pie">5/8</span></td>
									<td>$320,800</td>
								</tr>
								<tr>
									<td>#71988</td>
									<td>Johnson Law & Associates</td>
									<td>Wire Transfer</td>
									<td>Nov 09, 16:10</td>
									<td><span class="pie">6/8</span></td>
									<td>$920,720</td>
								</tr>
								<tr>
									<td>#71987</td>
									<td>Zahra Pte Ltd</td>
									<td>PayPal</td>
									<td>Nov 09, 14:22</td>
									<td><span class="pie">7/8</span></td>
									<td>$632,000</td>
								</tr>
								<tr>
									<td>#71986</td>
									<td>Kirba Brothers & Co.</td>
									<td>Transfer</td>
									<td>Nov 09, 10:12</td>
									<td><span class="pie">7/8</span></td>
									<td>$555,025</td>
								</tr>
								<tr>
									<td>#71985</td>
									<td>SkyNet Construction</td>
									<td>PayPal</td>
									<td>Nov 08, 12:05</td>
									<td><span class="pie">5/8</span></td>
									<td>$1120,360</td>
								</tr>
								<tr>
									<td>#71984</td>
									<td>Damon Industries</td>
									<td>Wire Transfer</td>
									<td>Nov 08, 08:25</td>
									<td><span class="pie">6/8</span></td>
									<td>$677,741</td>
								</tr>
								<tr>
									<td>#71983</td>
									<td>LexCorp</td>
									<td>PayPal</td>
									<td>Nov 07, 09:00</td>
									<td><span class="pie">8/8</span></td>
									<td>$190,000</td>
								</tr>
								<tr>
									<td>#71982</td>
									<td>AsCorp Industries</td>
									<td>Wire Transfer</td>
									<td>Nov 06, 15:30</td>
									<td><span class="pie">7/8</span></td>
									<td>$418,100</td>
								</tr>
								<tr>
									<td>#71981</td>
									<td>Ox Brothers & Co.</td>
									<td>Wire Transfer</td>
									<td>Nov 06, 09:30</td>
									<td><span class="pie">5/8</span></td>
									<td>$988,000</td>
								</tr>
								<tr>
									<td>#71980</td>
									<td>Alex Pte Ltd</td>
									<td>PayPal</td>
									<td>Nov 05, 17:10</td>
									<td><span class="pie">8/8</span></td>
									<td>$500,800</td>
								</tr>
								
							</tbody>
						</table>

						</div><!-- .card-body -->
					</div><!-- .card -->
					<!-- /End Device resource -->

				</div><!-- .col -->
				<div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-3 server-load">
					
					<!-- Server load -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Server Load
							</div>
							<div class="pie-chart-container">
								<canvas id="chart_pie" style="width: 100%;"></canvas>
							</div>

							<table class="table table-server mt-3">
								<thead>
									<tr>
										<th>Server</th>
										<th>Users</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td style="width:45%">Mail</td>
										<td>104,962 <span class="badge badge-success">normal</span></td>
									</tr>
									<tr>
										<td>DNS</td>
										<td>19,023 <span class="badge badge-success">normal</span></td>
									</tr>
									<tr>
										<td>Router</td>
										<td>11,107 <span class="badge badge-info">absolete</span></td>
									</tr>
									<tr>
										<td>Blog</td>
										<td>76,551 <span class="badge badge-warning">critical</span></td>
									</tr>
								</tbody>
							</table>							

						</div><!-- .card-body -->
					</div><!-- .card -->
					<!-- /End Server load -->

				</div><!-- .col -->
			</div><!-- .row -->

@endauth
		</div><!-- .content -->
	</main>
@stop