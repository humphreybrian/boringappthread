@extends('layouts.master')
@section('content')
<main id="main-container">
    <div class="content">
        <h2 class="content-heading">Repay Loan</h2><!-- Page title -->

        <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 dev-resource-card">
        
                    
					<!-- Device resource -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Loan Records
							</div>

							<table id="mytable" class="table table-striped table-responsive">
							<thead>
								<tr>
									<!-- <th>ID</th> -->
									<th>Loan Receipt Number</th>
									<th>Loan Type</th>
									<th>Loan Amount</th>
									<th>Loan Request Date</th>
									<th>Loan status</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($loan_amounts as $d_amounts)
								<tr>
									<!-- <td>#71990</td> -->
									<td>{{$d_amounts -> loan_receipt_number}}</td>
									<td>{{$d_amounts -> loan_type_id}}</td>
									<td>{{$d_amounts -> loan_amount}}</td>
									<td>{{$d_amounts -> loan_request_date}}</td>
									<td>{{$d_amounts -> loan_status}}</td>
								</tr>
                                @endforeach
								
								
							</tbody>
						</table>

						</div><!-- .card-body -->
					</div><!-- .card -->
					<!-- /End Device resource -->

				</div>
            <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-3 server-load">

                <!-- Form row -->
                <div class="card">
                    <div class="card-header">Repay Loan</div>
                    <div class="card-body">

                        <!--
						The .form-group class is the easiest way to add some structure to forms. Its only purpose is to provide margin-bottom around a label and control pairing. As a bonus, since it's a class you can use it with <fieldset>s, <div>s, or nearly any other element.
						You may also swap .row for .form-row, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
						-->
                        <form method="post" action="{{ route('loan.store') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="loan_receipt_number" class="col-form-label">Loan repayment receipt Number</label>
                                <input type="text" readonly value="<?php echo date("Ymdhms"); ?>" class="form-control" id="loan_receipt_number" name="loan_receipt_number" placeholder="Receipt Number">
                            </div>
                            <!-- <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Select Group</label>
                                <select id="inputState" class="form-control" name="company" required>
                                   
                                    <option value="">Choose Group</option>
                                    <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option>
                                </select>
                            </div> -->
                            <div class="form-group">
                                <label for="loan_type_id" class="col-form-label">Select Loan Type</label>
                                <select id="loan_type_id" class="form-control" name="loan_type_id" required>
                                   
                                    <option value="">Choose Pay Period</option>
                                    <option value="1">Jenga Loan</option>
                                    <option value="2">Emmergency Loan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="loan_amount" class="col-form-label">Loan Amount</label>
                                <input type="number" required class="form-control" id="loan_amount" name="loan_amount" placeholder="Enter Amount to deposit">
                            </div>
                            <div class="form-group">
                                <label for="loan_request_date" class="col-form-label">Request Date</label>
                                <input type="text" readonly value="<?php echo date("Y-m-d"); ?>" required class="form-control" id="loan_request_date" name="loan_request_date" placeholder="Enter Deposit Note">
                            </div>
                            <button type="submit" class="btn btn-primary">Request Loan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</main>
@stop