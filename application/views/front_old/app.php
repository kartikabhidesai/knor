<!DOCTYPE html>
<html>
    <?php $this->load->view('front/header'); ?>
    <body class="home_body">
        <!-- Main view  -->
        <?php $this->load->view($page); ?>
        <!-- Footer -->
        <?php 
        $this->load->view('front/bodyfooter');?>
        <!-- End wrapper-->
        <?php $this->load->view('front/footer'); ?>
    </body>
</html>
