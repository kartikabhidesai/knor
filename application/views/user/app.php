<!DOCTYPE html>
<html>
<?php $this->load->view('user/header');?>
<body>

  <!-- Wrapper-->
    <div id="wrapper">

        <!-- Navigation -->
        
        <?php $this->load->view('user/navigation');?>
        <!-- Page wraper -->
        <div id="page-wrapper" class="gray-bg">

            <!-- Page wrapper -->
            <?php $this->load->view('user/topnavbar');?>
            <?php $this->load->view('user/breadcrumb');?>
            
            
            <!-- Main view  -->
            
            <?php $this->load->view($page);?>
            <!-- Footer -->
            
            <?php $this->load->view('user/bodyfooter');?>
        </div>
        <!-- End page wrapper-->

    </div>
    <!-- End wrapper-->
<?php $this->load->view('user/footer');?>
</body>
</html>
