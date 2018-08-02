<style>
    #uploadForm label {margin:2px; font-size:1em; font-weight:bold;}
    .demoInputBox{padding:5px; border:#F0F0F0 1px solid; border-radius:4px; background-color:#FFF;}
    #progress-bar {background-color: #7d959f;height:20px;color: #FFFFFF;width:0%;-webkit-transition: width .3s;-moz-transition: width .3s;transition: width .3s;}
    .btnSubmit{background-color:#09f;border:0;padding:10px 40px;color:#FFF;border:#F0F0F0 1px solid; border-radius:4px;}
    #progress-div {border:#ffffff 1px solid;padding: 5px 0px;margin:30px 0px;border-radius:4px;text-align:center;}
    #targetLayer{width:100%;text-align:center;}
</style>
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">

        <form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= user_url(); ?>project/add" id='uploadForm'>
        <!--<form method="post" class="form-horizontal"  enctype="multipart/form-data"  action="<?= user_url(); ?>project/add" id='clientAdd'>-->
            <div class="form-group headingmain">						
                <h2 class="title" style="margin:10px">Project Add</h2>								
            </div>

            <div class="form-group ">
                <label class="col-sm-3 control-label"></label>
                <div id="progress-div" class="col-sm-7"><div id="progress-bar"></div></div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Name*</label>
                <div class="col-sm-7">
                    <input type="text" placeholder="Enter  Name" name="names" id="name_add" class="form-control">
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label">Description*</label>
                <div class="col-sm-7">
                    <textarea class="form-control" placeholder="Enter Description" id="address"  name="address"></textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-3 control-label">Select Image</label>
                <div class="col-sm-7">
                    <!--<input class="form-control3 userImage" id="userImage" type="file"  name="userImage" >-->
                    <input class="form-control3 userImage" id="userImage" type="file"  name="project_image[]" multiple>
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
