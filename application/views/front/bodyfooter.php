<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <span class="text-left">COPYRIGHT © 2018 KNOR GRAPHIC DESIGN SOLUTIONS. ALL RIGHTS RESERVED.</span>
            </div>
            <div class="col-md-4">
                <span class="text-right">DESIGNED BY KNOR GRAPHIC DESIGN SOLUTIONS.</span>

            </div>
            <div class="col-md-1">
                <a class="footer-top js-scroll-trigger" href="#page-top"> </a>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <form method="post" id="userLogin" class="form-horizontal" action="<?= base_url(); ?>front/index"  name="userLogin" action="#">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter Email" id="user_email">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password" id="user_pass">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary userLoginBtn">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?= base_url() ?>public/front/vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>public/front/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Plugin JavaScript -->
<script src="<?= base_url() ?>public/front/vendor/jquery-easing/jquery.easing.min.js"></script>
<!-- Contact form JavaScript -->
<script src="<?= base_url() ?>public/front/js/jqBootstrapValidation.js"></script>
<script src="<?= base_url() ?>public/front/js/contact_me.js"></script>
<!-- Custom scripts for this template -->
<script src="<?= base_url() ?>public/front/js/agency.min.js"></script>
</body>
</html>
