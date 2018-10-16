<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Knor Graphic Design Solutions</title>

        <!-- Bootstrap core CSS -->
        <link href="<?= base_url() ?>public/front/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="<?= base_url() ?>public/front/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Custom styles for this template -->
        <link href="<?= base_url() ?>public/front/css/agency.min.css" rel="stylesheet">
        <?php if ($pages == 'ourwork') { ?>
            <link href="<?= base_url() ?>public/front/css/worknav.css" rel="stylesheet">
        <?php } ?>
        <link rel="stylesheet" href="<?= base_url() ?>public/asset/css/plugins/toastr/toastr.min.css" />

        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">
        <script>
            var baseurl = "<?= base_url() ?>index.php/";
        </script>
        <style>
            .form-group.has-error input {
                border-color: red;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container-fluid">

                <?php if ($pages == 'ourwork') { ?>
                    <a class="navbar-brand js-scroll-trigger" href="<?= base_url(); ?>">
                        <img class="logo" src="<?= base_url() ?>public/front/img/KnorGraphicsLogo_White.png" width="230px" alt="Knor Graphics White Logo" />   </a>
                        <!--<img class="logo" src="<?= base_url() ?>public/front/img/KnorGraphicsLogo_CLR.png" width="230px" alt="Knor Graphics White Logo" />   </a>-->
                <?php } else { ?>
                    <a class="navbar-brand js-scroll-trigger" href="#page-top">
                        <img class="logo" src="<?= base_url() ?>public/front/img/KnorGraphicsLogo_White.png" width="230px" alt="Knor Graphics White Logo" />
                    </a>
                <?php } ?>

                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fa fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="<?= base_url() . 'front/our_work' ?>">Our Work</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>#aboutus">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap" class="nav-link js-scroll-trigger" href="#">File Upload</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href="<?= base_url() ?>#contact">Contact Us</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

