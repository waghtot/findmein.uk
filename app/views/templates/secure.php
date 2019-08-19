<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Find Me in UK</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" type="text/css" href="https://bootswatch.com/4/simplex/bootstrap.css" media="screen">
    <link rel="stylesheet" type="text/css" href="../app/views/css/custom.min.css">
    <link rel="stylesheet" type="text/css" href="../app/views/css/fmu.css">
    <script src="http://findmein.dev.uk/app/views/js/sweetalert.min.js"></script>
    </head>
    <body>

<!-- Top Menu -->
    <?php
        require_once "app/views/pages/partial/topmenu.php";
    ?>


<!-- End Top Menu -->

<!-- Layout drawt-->

    <?php
        View::page($page, $data);
    ?>


<!-- End Layout -->

        <script type="text/javascript" src="https://bootswatch.com/_vendor/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="../app/views/js/jquery.validate.min.js"></script>
        <script type="text/javascript" src="https://bootswatch.com/_vendor/popper.js/dist/umd/popper.min.js"></script>
        <script type="text/javascript" src="https://bootswatch.com/_vendor/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://bootswatch.com/_assets/js/custom.js"></script>

        <?php

            if(!isset($_GET['params'])){
                $index ='';
            }else{
                $index = $_GET['params'];
            }
            switch($index){
                case '';
                case 'home':
                ?>
                    <script type="text/javascript" src="../app/views/js/home/add_ads.js"></script>
                    <script type="text/javascript" src="../app/views/js/home/prev_ads.js"></script>
                <?php
                break;

                case 'edit':
                ?>
                    <script type="text/javascript" src="../app/views/js/edit/ad_access.js"></script>
                    <script type="text/javascript" src="../app/views/js/edit/ad_edit.js"></script>
                    <script type="text/javascript" src="../app/views/js/home/prev_ads.js"></script>
                <?php
                break;

                default:
                ?>
                    <script type="text/javascript" src="../app/views/js/home/add_ads.js"></script>
                <?php
                break;
            }
        ?>
        <script type="text/javascript">
            $.ajaxPrefilter(function( options, original_Options, jqXHR ) {
                options.async = true;
            });
        </script>
        <script type="text/javascript" src="../app/views/js/login.js"></script>
    </body>
</html>