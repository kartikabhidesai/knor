
<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>
          <img class="img-rounded" src="<?php  echo base_url('uploads/logo.png'); ?>" width='180' height="50">
        </div>
        <h3>Welcome to Knor</h3>
        <!--<p>Login in. To see it in action.</p>-->
        <form class="m-t" role="form" id="login" action="<?= base_url_index().'account/login'?>" method="post">

            <div class="form-group">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="form-group">
                <input type="password" name="password" class="form-control" placeholder="Password">
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b">Login</button>

            <a href="#"><small>Forgot password?</small></a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="register">Create an account</a>
        </form>
        <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
    </div>
</div>
