<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Project List</h5>
                        <div class="ibox-tools">
                            <a href="<?= admin_url(); ?>project/add" class="btn btn-primary">
                                <i class="fa fa-plus"></i> Add New
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Project Desc</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($getComany); $i++) { ?>
                                    <tr>
                                        <td><?= $getComany[$i]->project_name; ?></td>
                                        <td><?= $getComany[$i]->project_desc; ?></td>
                                        <td class="tooltip-demo">
                                            <a data-toggle="tooltip" title="Edit project Details" data-placement="top" href="<?= admin_url(); ?>project/edit/<?php echo $this->utility->encode($getComany[$i]->projectID);?>">
                                                <i class="fa fa-edit text-navy"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Delete" data-placement="top" data-toggle="modal" data-target="#myModal_autocomplete" data-href="<?= admin_url().'project/projectDelete'?>" data-id="<?php echo $getComany[$i]->projectID;?>" class="deletebutton">
                                                <i class="fa fa-close text-navy"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                           </table>
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
                </div>
            </div>
        </div>
    </div>
</div>
