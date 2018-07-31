
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>client/add" id='clientAdd'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Client Detail</h2>								
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">first name </label>
                <div class="col-sm-7">
                    <input type="text" name="person_fname" placeholder="Enter first name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">last name</label>
                <div class="col-sm-7">
                    <input type="text" name="person_lname" placeholder="Enter last name" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" name="person_email" placeholder="Enter Email" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Password</label>
                <div class="col-sm-7">
                    <input type="password" name="company_password" id="password" placeholder="Enter Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Confirm Password</label>
                <div class="col-sm-7">
                    <input type="password" name="company_confirm_password" id="confirm_password" placeholder="Enter Confirm Password" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-7">
                    <input type="text" name="company_user_phone" placeholder="Enter Phone" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="address"></textarea>
                </div>
            </div>
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create Client</button>
                </div>
            </div>
        </form>
    </div>
</div>
