@extends('layouts.master')
@section('content')
<main id="main-container">
    <div class="content">
        <h2 class="content-heading">New Withdraw</h2><!-- Page title -->
        <h2 class="content-heading">Actual Balance is {{$actual_deposit_balance}}</h2><!-- Page title -->
      

        <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-9 dev-resource-card">
        
                    
					<!-- Device resource -->
					<div class="card">
						<div class="card-body">
							<div class="card-header-inside">
								Deposit Records
							</div>

							<table id="mytable" class="table table-striped table-responsive">
							<thead>
								<tr>
									<!-- <th>ID</th> -->
									<th>Withdrawal Receipt Number</th>
									<!-- <th>Pay Period</th> -->
									<th>withdrawn Amount</th>
									<!-- <th>Payment Method</th> -->
                                    <th>Reference Number</th>
									<th>Date</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($deposit_amounts as $d_amounts)
								<tr>
									<!-- <td>#71990</td> -->
									<td>{{$d_amounts -> deposit_receipt_number}}</td>
									<!-- <td>{{$d_amounts -> pay_period}}</td> -->
									<td>{{$d_amounts -> deposit_amount}}</td>
									<!-- <td>{{$d_amounts -> payment_method}}</td> -->
                                    <td>{{$d_amounts -> reference_number}}</td>
									<td>{{$d_amounts -> created_at}}</td>
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
                    <div class="card-header">New Withdraw</div>
                   
                    <div class="card-body">

                        <!--
						The .form-group class is the easiest way to add some structure to forms. Its only purpose is to provide margin-bottom around a label and control pairing. As a bonus, since it's a class you can use it with <fieldset>s, <div>s, or nearly any other element.
						You may also swap .row for .form-row, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
						-->
                        <form method="post" action="{{ route('withdraw.store') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="deposit_receipt_number" class="col-form-label">withdraw receipt Number</label>
                                <input type="text" readonly value="<?php echo date("Ymdhms"); ?>" class="form-control" id="deposit_receipt_number" name="deposit_receipt_number" placeholder="Receipt Number">
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
                                <label for="deposit_amount" class="col-form-label">Amount</label>
                                <input type="number" required class="form-control" id="deposit_amount" name="deposit_amount" placeholder="Enter Amount to deposit">
                            </div>
                            
                            <div class="form-group">
                                <!-- <label for="inputAddress2" class="col-form-label">status</label> -->
                                <input type="text" value="0" readonly class="form-control" hidden id="deposit_status" name="deposit_status" placeholder="Deposit status">
                            </div>
                            <button type="submit" class="btn btn-primary">Withdraw Amount</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</main>
@stop