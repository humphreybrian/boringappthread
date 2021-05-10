<div class="form-group">
    <label for="inputAddress" class="col-form-label">Support Ticket Number</label>
    <input type="text" readonly value="<?php echo date("Ymdhms"); ?>" class="form-control" id="support_ticket_no" name="support_ticket_no" placeholder="1234 Main St">
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Select Company</label>
    <select id="inputState" class="form-control" name="company" required>
        <option value="">Choose Company</option>
        <option value="britam">Britam</option>
        <!-- <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option> -->
    </select>
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Select Application/Project</label>
    <select id="inputState" class="form-control" name="application" required>
        <option value="">Choose Application/Project</option>
        <option value="erp">ERP</option>
        <option value="fams">FAMS</option>
        <option value="odi">ODI</option>
        <!-- <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option> -->
    </select>
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Request Priority</label>
    <select id="inputState" class="form-control" name="priority" required>
        <option value="">Choose Priority</option>
        <option value="high">High</option>
        <option value="medium">Medium</option>
        <option value="low">Low</option>
        <!-- <option value="kenya_airways">Kenya Airways</option>
                                    <option value="pwc">Choose</option> -->
    </select>
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Ticket Created by</label>
    <input type="text" class="form-control" id="inputAddress2" name="created_by" placeholder="Enter Your Name">
</div>
<div class="form-group">
    <label for="inputAddress" class="col-form-label">Contact Email</label>
    <input type="email" class="form-control" id="inputAddress" name="contact_email" placeholder="Enter Your Email Address">
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Support Request Title</label>
    <input type="text" class="form-control" id="inputAddress2" name="support_category" placeholder="Support Request Title/ Title of Issue">
</div>
<div class="form-group">
    <label for="inputAddress2" class="col-form-label">Support Request Description</label>
    <textarea id="story" class="form-control" name="support_description" rows="5" cols="33" placeholder="Support Request Description">

                                </textarea>
</div>

<div class="form-group">
    <!-- <label for="inputAddress2" class="col-form-label">status</label> -->
    <input type="text" value="0" readonly class="form-control" hidden id="inputAddress2" name="status" placeholder="Apartment, studio, or floor">
</div>
<button type="submit" class="btn btn-primary">Submit Request</button>