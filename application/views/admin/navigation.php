<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <span>
                        <img class="img-rounded" src="<?php  echo base_url('uploads/logo.png'); ?>" width='180' height="50">
                    </span>
                    <!--<a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear" style='width: 50%'>
                            <span class="block m-t-xs">
                                <strong class="font-bold"><?= $this->session->userdata['valid_login']['firstname'] ?> </strong>
                            </span> <span class="text-muted text-xs block"><?= $this->session->userdata['valid_login']['lastname'] ?> <b class="caret"></b></span>
                        </span>
                    </a>-->
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo base_url(); ?>account/logout/A">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    IN+
                </div>
            </li>
            <li class="<?= $dashboard; ?>">
                <a href="<?= admin_url(); ?>dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?= $project; ?>">
                <a href="<?= admin_url(); ?>project"><i class="fa fa-tasks"></i> <span class="nav-label">Project</span></a>
            </li>
             <li class="<?= $client; ?>">
                <a href="<?= admin_url(); ?>client"><i class="fa fa-users"></i> <span class="nav-label">Client</span></a>
            </li>
        </ul>
    </div>
</nav>
