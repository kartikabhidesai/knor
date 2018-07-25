
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= admin_url(); ?>project/add" id='clientAdd'>
            
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Project Add</h2>								
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Name" name="names" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Description*</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter Description"  name="address"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Select Image</label>
                <div class="col-sm-7">
                    <input class="form-control3" type="file"  name="project_image[]" multiple>
                </div>
            </div>
    
            <div class="form-group">
                <div class="col-sm-4 col-sm-offset-3">
                    <button class="btn btn-primary" type="submit">Add</button>
                    <button class="btn btn-white" type="reset">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>
