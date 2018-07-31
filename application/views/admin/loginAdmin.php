<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Ranov Bakery</title>
        <!-- Meta tags -->
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <script>
            addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); }
        </script>
        <!-- Meta tags -->
        <!-- font-awesome icons -->
        <link rel="stylesheet" href="<?php echo base_url('') ?>assets/css/font-awesome.min.css" />
        <!-- //font-awesome icons -->
        <!--stylesheets-->
        <link href="<?php echo base_url('') ?>assets/css/style.css" rel='stylesheet' type='text/css' media="all">
        <!--//style sheet end here-->
        <link href="//fonts.googleapis.com/css?family=Merienda+One" rel="stylesheet">
        <link href="//fonts.googleapis.com/css?family=Open+Sans:300,400,600" rel="stylesheet">
    </head>
    <body>
        <h1 class="header-w3ls">
            Ranov Bakery
        </h1>
        <div class="mid-cls">
            <div class="swm-right-w3ls">
                <?php echo form_open('LoginAdmin/ceklogin'); ?>
                <!-- <form action="Login/cekLogin" method="post"> -->
                    <div class="main">
                        <div class="icon-head">
                            <h2>Login Admin</h2>
                        </div>
                        <div class="form-left-w3l">
                            <input type="email" name="email" placeholder="Username" required="">
                            <div class="clear"></div>
                        </div>
                        <div class="form-right-w3ls ">
                            <input type="password" name="pwd_adm" placeholder="Password" required="">
                            <div class="clear"></div>
                        </div>
                        <div class="btnn">
                            <button type="submit">Login</button>
                            <br>
                            <a href="<?php echo site_url('Login') ?>" class="for" >Login as User</a>
                        </div>
                    </div>
                <!-- </form> -->
            </div>
        </div>

    </body>
</html>