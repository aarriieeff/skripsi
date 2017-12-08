<html lang="en">
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>SPK KOPI</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="assets/bootstraps/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
    <link href="assets/bootstraps/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="assets/bootstraps/css/style.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nova+Flat' rel='stylesheet' type='text/css'/>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css'/>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="head">
    <div class="container">
        <div class="row">

            <div class="col-lg-4 col-md-4 col-sm-4">
                <a href="index.php">
                    <img style="width: 100%;" src="assets/bootstraps/img/kop11.png"  />
                </a>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 text-center" >
            </div>
        </div>
    </div>
</div>
<section style="padding:100px 0px 0px 0px;" >
    <div class="container">
        <div class="row">

            <div class="col-lg-6 col-lg-offset-3 col-lg-4 col-md-4 col-sm-4 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 ">
                <div id="login" class="alert alert-info">
                    <div class="media">
                        <div class="pull-left">
                            <img src="assets/bootstraps/img/user.png" class="img-responsive" />
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">LOGIN</h3>
                            <form form action="<?php echo site_url('Login/login');?>" method="POST" role="form">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="username" placeholder="Username" value="" required autofocus/>
                                   
                                        <span class="help-block">
                                        <strong></strong>
                                    </span>
                                    
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="password" placeholder="Your Password" required />
                                   
                                        <span class="help-block">
                                        <strong></strong>
                                    </span>
                                   
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="login" id="submit" class="btn btn-success" value = "Click To Login">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div id="footer">
    <div class="container">

        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h3>Physical Location</h3>
                <p>
                    <i>Addresss :</i> Jl. PB. Sudirman No. 90, Nogosari, Rambipuji, Nogosari, Rambipuji, Kabupaten Jember
                    <br />
                    &copy; 2017 SPKKOPI | by <a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank">ARIEF</a>
                </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">

            </div>
            <div class="col-lg-4 col-md-4 col-sm-4">
                <h3>Get Quick Help</h3>
                <h4><span>Call: </span>+62 331 757130</h4>
            </div>


        </div>

    </div>

</div>
<!--  Jquery Core Script -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="assets/js/bootstrap.js"></script>

</body>
</html>
