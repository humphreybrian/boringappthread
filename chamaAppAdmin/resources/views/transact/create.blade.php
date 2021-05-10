@extends('layouts.master')

@section('content')
<main id="main-container">
    <div class="content">
        <h2 class="content-heading">Create a Support Ticket</h2><!-- Page title -->

        <div class="row">
            <div class="col-md-12 col-lg-6">

                <!-- Form row -->
                <div class="card">
                    <div class="card-header">Create a Support Request</div>
                    <div class="card-body">

                        <!--
						The .form-group class is the easiest way to add some structure to forms. Its only purpose is to provide margin-bottom around a label and control pairing. As a bonus, since it's a class you can use it with <fieldset>s, <div>s, or nearly any other element.
						You may also swap .row for .form-row, a variation of our standard grid row that overrides the default column gutters for tighter and more compact layouts.
						-->
                        <form method="post" action="{{ route('shares.store') }}" enctype='multipart/form-data'>
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Support Ticket Number</label>
                                <input type="text" readonly value="<?php echo date("Ymdhms"); ?>" class="form-control" id="support_ticket_no" name="support_ticket_no" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Select Company</label>
                                <select id="inputState" class="form-control" name="company" required>
                                    <option value="">Choose Company</option>
                                    @foreach($project as $p)
                                    <option value="{{$p->company}}">{{$p->company}}</option>
                                    @endforeach
                                    <!--<option value="kenya_airways">Kenya Airways</option>-->
                                    <!--<option value="pwc">Choose</option>-->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Select Application/Project</label>
                                <select id="inputState" class="form-control" name="application" required>
                                    <option value="">Choose Application/Project</option>
                                    @foreach($project as $p)
                                    <option value="{{$p->application}}">{{$p->application}}</option>
                                    @endforeach
                                    <!--<option value="erp">ERP</option>-->
                                    <!--<option value="fams">FAMS</option>-->
                                    <!--<option value="odi">ODI</option>-->
                                    <!-- <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Service Priority</label>
                                <select id="inputState" class="form-control" name="priority" required>
                                    <option value="">Choose Priority</option>
                                    <option value="1">High (System Completely Unavailable | Response: < 2 Hours)</option> <option value="2">Medium (Critical System Functionality Unavailable | Response: 2-6 Hours)</option>
                                    <option value="3">Low (General System Issue | Response: < 24 Hours)</option> <!-- <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option> -->
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Ticket Created by</label>
                                <input type="text" required class="form-control" id="inputAddress2" name="created_by" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Contact Email</label>
                                <input type="email" required class="form-control" id="inputAddress" name="contact_email" placeholder="Enter Your Email Address">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Support Request Title</label>
                                <input type="text" required class="form-control" id="inputAddress2" name="support_category" placeholder="Support Request Title/ Title of Issue">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Attach File <i>(Max upload file size 4MB)</i></label>
                                <input type="file" class="form-control" id="inputAddress2" name="bookcover" placeholder="Attach File (Files max 5Mb)">
                                <!-- <input type="file" class="form-control" value="nofile.png" name="bookcover" /> -->
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Support Request Description</label>
                                <textarea class="form-control" name="support_description" rows=11 cols=50 maxlength=250 required></textarea>
                            </div>

                            <div class="form-group">
                                <!-- <label for="inputAddress2" class="col-form-label">status</label> -->
                                <input type="text" value="0" readonly class="form-control" hidden id="inputAddress2" name="status" placeholder="Apartment, studio, or floor">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit Request</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @include('sweetalert::alert')
    </div>
</main>

@endsection