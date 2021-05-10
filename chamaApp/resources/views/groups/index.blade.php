@extends('layouts.master')
@section('content')
<main id="main-container">
    <div class="content">
        <h2 class="content-heading">New Group</h2><!-- Page title -->

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
									<th>Group ID</th>
									<th>Group Name</th>
								</tr>
							</thead>
							<tbody>
                            @foreach($chama_groups as $d_amounts)
								<tr>
									<!-- <td>#71990</td> -->
									<td>{{$d_amounts -> id}}</td>
									<td>{{$d_amounts -> group_name}}</td>
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
                    <div class="card-header">Add New Group</div>
                    <div class="card-body">

                        <!--
						The .form-group class is the easiest way to add some structure to forms. Its only purpose is to provide margin-bottom around a label and control pairing. As a bonus, since it's a class you can use it with <fieldset>s, <div>s, or nearly any other element.
						You may also swap .row for .form-row, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
						-->
                        <form method="post" action="{{ route('groups.store') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="group_name" class="col-form-label">Group Name</label>
                                <input type="text" required class="form-control" id="group_name" name="group_name" placeholder="Enter Group Name">
                            </div>
                            <button type="submit" class="btn btn-primary">Add group Name</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</main>
@stop