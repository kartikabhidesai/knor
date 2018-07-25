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
                                <strong class="font-bold"><?= $this->session->userdata['user_login']['firstname'] ?> </strong>
                            </span> <span class="text-muted text-xs block"><?= $this->session->userdata['user_login']['lastname'] ?> <b class="caret"></b></span>
                        </span>
                    </a>-->
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="<?php echo base_url();?>account/logout/C">Logout</a></li>
                    </ul>
                </div>
            </li>
            <li class="">
                <a href="<?= user_url(); ?>dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span></a>
            </li>
            <li class="<?= $user; ?>">
                <a href="<?= user_url(); ?>Project"><i class="fa fa-tasks"></i> <span class="nav-label">Project</span></a>
            </li>
        </ul>
    </div>
</nav>
