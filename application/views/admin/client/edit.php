
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  action="<?= admin_url(); ?>client/edit/<?php echo $this->utility->encode($clientData[0]->id)?>" id='clientEdit'>
            
          
          <div class="form-group headingmain" >						
                <h2 class="title" style="margin:10px">Edit User Detail</h2>								
            </div>
  
            <div class="form-group">
                <label class="col-sm-3 control-label">first name </label>
                <div class="col-sm-7">
                    <input type="text" name="person_fname" placeholder="Enter first name" value="<?= $clientData[0]->first_name;?>" class="form-control">
                    <input type="hidden" name="id"  value="<?= $clientData[0]->id;?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">last name</label>
                <div class="col-sm-7">
                    <input type="text" name="person_lname" placeholder="Enter last name" value="<?= $clientData[0]->last_name;?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Email</label>
                <div class="col-sm-7">
                    <input type="text" name="person_email" placeholder="Enter Email" class="form-control" value="<?= $clientData[0]->email;?>" readonly="true">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Phone</label>
                <div class="col-sm-7">
                    <input type="text" name="user_phone" placeholder="Enter Phone" value="<?= $clientData[0]->phone_no;?>" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Address</label>
                <div class="col-sm-7">
                    <textarea class="form-control" name="address"><?= $clientData[0]->address;?></textarea>
                </div>
            </div>
            
            <div class="hr-line-dashed"></div>
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-2">
                    <button class="btn btn-white" type="button">Cancel</button>
                    <button class="btn btn-primary" type="submit">Update Client</button>
                </div>
            </div>
        </form>
    </div>
</div>
