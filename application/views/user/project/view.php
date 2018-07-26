<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">

                <div class="ibox-content">
                    <h2>Project Files</h2>

                    <div class="lightBoxGallery" style="text-align: left;">
                        <?php
                        for ($j = 0; $j < count($projectDetail); $j++) {
                            if (file_exists("uploads/project/" . $projectDetail[$j]->project_image)) {
                                ?>
                                <a href="<?php echo base_url() . "uploads/project/" . $projectDetail[$j]->project_image; ?>" title="Image from Unsplash" data-gallery=""><img style="width:150px !important;" src="<?php echo base_url() . "uploads/project/" . $projectDetail[$j]->project_image; ?>"></a>
                                <a href="javascript:;" data-id="<?php echo $projectDetail[$j]->projectImageID; ?>" class="edit label label-primary">Edit</a>
                                <a data-toggle="tooltip" title="Delete" data-placement="top" data-toggle="modal" data-target="#myModal_autocomplete" data-href="<?= user_url() . 'project/deleteImage' ?>" data-id="<?php echo $projectDetail[$j]->projectImageID; ?>" class="deleteImage label label-danger">
                                    Delete
                                </a>
                                <?php
                            }
                        }
                        ?>
                        <!-- The Gallery as lightbox dialog, should be a child element of the document body -->
                        <div id="blueimp-gallery" class="blueimp-gallery">
                            <div class="slides"></div>
                            <!--<h3 class="title"></h3>-->
                            <!--<a class="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a>-->
                            <!--<a class="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a>-->
                            <a class="close">close</a>
                            <a class="play-pause">pause</a>
                            <ol class="indicator">indicator</ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModal_image" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title">Edit Image</h4>
            </div>
            <form method="post" class="form-horizontal" enctype="multipart/form-data" action="<?= user_url(); ?>project/updateImage" id="updateImage" novalidate="novalidate">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Select Project FIle *</label>
                        <input name="imageId" id="imageId" placeholder="Person full name *" class="form-control imageId" type="hidden">
                        <input name="company_id" id="company_id" placeholder="Person full name *" class="form-control getlatlong" type="hidden">
                        <input name="project_image[]" id="" class=" " type="file">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button  type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="modal inmodal" id="myModal_autocomplete" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content animated bounceInRight">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <i class="fa fa-close modal-icon"></i>
                <h4 class="modal-title">Delete</h4>
            </div>
            <div class="modal-body">
                <h4>Are you sure?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                <button  id='btndelete' data-url="" data-id="" type="button" class="btn btn-primary">Delete</button>
            </div>
        </div>
    </div>
</div>