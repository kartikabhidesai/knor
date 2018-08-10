
<div class="wrapper wrapper-content white-bg m-t">
    <div class=" animated fadeInRightBig">
        <div class="row">
            <div class="col-md-12">
                <div class="ibox-title">
                    <h5>Recent updated project</h5>
                </div>
                 <div class="ibox-content">
                     
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Project Name</th>
                                        <th>Project Desc</th>
                                        <th>Username</th>
                                        <th>Updated At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php for($i=0; $i<count($getProject); $i++) { ?>
                                    <tr>
                                        <td><?= $getProject[$i]->project_name; ?></td>
                                        <td><?= $getProject[$i]->project_desc; ?></td>
                                        <td><?= $getProject[$i]->first_name; ?></td>
                                        <td><?= $getProject[$i]->dt_updated; ?></td>
                                        <td class="tooltip-demo">
<!--                                            <a data-toggle="tooltip" title="Edit project Details" data-placement="top" href="<?= user_url(); ?>project/edit/<?php echo $this->utility->encode($getComany[$i]->projectID);?>">
                                                <i class="fa fa-edit text-navy"></i>
                                            </a>
                                            <a data-toggle="tooltip" title="Delete" data-placement="top" data-toggle="modal" data-target="#myModal_autocomplete" data-href="<?= user_url().'project/projectDelete'?>" data-id="<?php echo $getComany[$i]->projectID;?>" class="deletebutton">
                                                <i class="fa fa-close text-navy"></i>
                                            </a>-->
                                            <a data-toggle="tooltip" title="View" data-placement="top"  href="<?= admin_url().'project/view/' . $this->utility->encode($getProject[$i]->projectID); ?>" data-id="<?php echo $getProject[$i]->projectID;?>" class="">
                                                <i class="fa fa-eye text-navy"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                           </table>
                        </div>
                    </div>
            </div>
          
        </div>
    </div>
</div>
