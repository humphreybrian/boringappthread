@extends('layouts.master')
@section('content')
<main id="main-container">
    <div class="content">
        <h6>Support Ticket: &nbsp; {{ $share->support_ticket_no }}</h6>
        <h6>Company: &nbsp; {{ $share->company}}</h6>
        @if($share->priority == 1)
        <h6>Priority: &nbsp; HIGH</h6>
        @elseif($share->priority == 2)
        <h6>Priority: &nbsp; MEDIUM</h6>
        @elseif($share->priority == 3)
        <h6>Priority: &nbsp; LOW</h6>
        @endif
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    @if($share->priority == 1)
                    <div class="card-header bg-danger">Support Ticket for {{ $share->company}}, created by {{ $share->created_by }}, {{ (new Carbon\Carbon($share->created_at))->diffForHumans() }}</div>
                    @elseif($share->priority == 2)
                    <div class="card-header bg-warning">Support Ticket for {{ $share->company}}, created by {{ $share->created_by }}, {{ (new Carbon\Carbon($share->created_at))->diffForHumans() }}</div>
                    @elseif($share->priority == 3)
                    <div class="card-header bg-primary">Support Ticket for {{ $share->company}}, created by {{ $share->created_by }}, {{ (new Carbon\Carbon($share->created_at))->diffForHumans() }}</div>
                    @endif
                    <div class="card-body">
                        <form method="POST" action="{{ route('shares.update', $share->id) }}">
                            @method('PATCH')
                            @csrf
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Support Ticket Number</label>
                                <input type="text" readonly value="{{ $share->support_ticket_no }}" class="form-control" id="support_ticket_no" name="support_ticket_no" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress" class="col-form-label">Contact Email</label>
                                <input type="email" readonly class="form-control" value="{{ $share->contact_email }}" id="inputAddress" name="contact_email" placeholder="1234 Main St">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Application</label>
                                <input type="text" readonly class="form-control" id="inputAddress2" value="{{ $share->application }}" name="application" placeholder="Application">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Support Request Title</label>
                                <input type="text" readonly class="form-control" id="inputAddress2" value="{{ $share->support_category }}" name="support_category" placeholder="Support Category">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Support Issue Description</label>
                                <textarea class="form-control" readonly name="support_description" rows=11 cols=50 maxlength=500 required>{{ $share->support_description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="man_hours" class="col-form-label">Man Hours(Hours taken to work on ticket)</label>
                                <input type="number" required class="form-control" id="man_hours" value="{{ $share->support_category }}" name="man_hours" placeholder="Man Hours">
                            </div>
                            <div class="form-group">
                                <label for="inputAddress2" class="col-form-label">Solution Description (Max Characters 500)</label>
                                <textarea class="form-control" name="solution_status" rows=11 cols=50 maxlength=500 required></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" value="1" readonly class="form-control" hidden id="inputAddress2" name="status" placeholder="Apartment, studio, or floor">
                            </div>
                            <div class="form-group">
                                <input type="text" value="{{Auth::user()->email}}" readonly class="form-control" hidden id="inputAddress2" name="resolved_by" placeholder="Apartment, studio, or floor">
                            </div>
                            @if($share-> status == 1)
                            This Ticket has Already been Responded to
                            @else($share-> status == 0)
                            <button type="submit" class="resolve btn btn-primary">Respond to Service Ticket</button>
                            @endif
                            <a href="{{url('/')}}" class="btn btn-primary">Go Back</a>
                        </form>
                        <script>
                            $(".resolve").on("submit", function() {
                                return confirm("Do you want to delete this item?");
                            });
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="card">
                    @if($share->filename !== null)
                    <div class="card-header">Attachment <a href="{{url('uploads/'.$share->filename)}}" target="_blank"><button class="resolve btn btn-primary">Download attachment</button></a></div>
                    @else
                    <div class="card-header">No Attachment Available</div>
                    @endif
                    <div class="card-body">
                        @if($share->filename !== null)
                        <img class="card-img-top" src="{{url('/uploads/'.$share->filename)}}" alt="{{$share->filename}}">
                        @else
                        <h3>Attachment not available</h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection