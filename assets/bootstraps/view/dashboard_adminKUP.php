<?php

session_start();

  if(!$_SESSION['loggedin']){
        header("Location: ../login.php");
}

?>
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
    <title>Welcome Admin</title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link href="bootstraps/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
    <link href="bootstraps/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="bootstraps/css/style.css" rel="stylesheet" />
    <!-- Google	Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Nova+Flat' rel='stylesheet' type='text/css' />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
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
                    <a href="index.html">
                    <img src="bootstraps/img/logo.png"  />
                        </a>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 text-center" >
                     <button class="lg-button">
                         
                     </button>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    
                </div>
                
            </div>
        </div>
    </div>    <section>
        <div class="container">
            <div class="row noti-div">
                <div class="col-lg-3 col-md-3 col-sm-3  text-center">
                    <a href="sekretaris-list.php">
                        <div class="alert alert-danger">
                            <i class="fa fa-user fa-4x"></i>
                            <span class="label label-info">Perencanaan</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3  text-center">
                    <a href="admin-open-tickets.html">
                        <div class="alert alert-success">
                            <i class="fa fa-folder-open-o fa-4x"></i>
                            <span class="label label-warning">Pengadaan</span>
                        </div>
                    </a>
                </div>

                
                <div class="col-lg-3 col-md-3 col-sm-3  text-center">
                    <a href="admin-peminjamanS2.php">
                        <div class="alert alert-warning">
                            <i class="fa fa-briefcase fa-4x"></i>
                            <span class="label label-success">Peminjaman</span>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 text-center">
                    <a href="admin-user-list.html">
                        <div class="alert alert-info">
                            <i class="fa fa-recycle fa-4x"></i>

                            <span class="label label-danger">Pemeliharaan</span>
                        </div>
                    </a>
                </div>
            </div>


        </div>

    </section>
    <section id="main">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-9 col-sm-9 alert alert-info">
                <center>
                    <h3>Sarana dan Prasarana Program Studi Sistem Informasi</h3>
                    <p>
                        Merupakan sebuah sistem yang dibangun untuk mempermudah dalam
                        mengelola Sarana dan Prasarana dalam Program Studi Sistem Informasi.
                    </p>
                </center>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3">
                    <a href="index.html" class=" label label-danger"><strong>LOGOUT / SINGOUT</strong> </a>
                    <div class="list-group">
                        <a href="#" class="list-group-item active">Quick Links
                        </a>

                        <a href="admin-dashboard.html" class="list-group-item">My Dashboard</a>
                        <a href="admin-user-list.html" class="list-group-item">Perencanaan</a>
                        <a href="admin-open-tickets.html" class="list-group-item">Pengadaan</a>
                        <a href="admin-peminjaman.html" class="list-group-item">Peminjaman</a>
                         <a href="admin-user-list.html" class="list-group-item">Pemeliharaan</a>
                        <a href="admin-change-password.html" class="list-group-item">Change Password</a>
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
                        <i>Addresss :</i> 125/890 , New York Street,
                        <br />
                        United States of America (USA).
                         <br />
                       &copy; 2014 yourdomian | by <a href="http://www.binarytheme.com/" style="color:#fff;" target="_blank">binarytheme.com</a>
                   
                    </p>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-4"> </div>
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <h3>Get Quick Help</h3>
                    <h4><span>Call: </span>+01-4589-987-567</h4>
                    <h4><span>E-mail: </span>info@domain.com</h4>
                    <h4><span>Skype:</span> sonasup</h4>
                </div>

                

            </div>

        </div>

    </div>
    <!--  Jquery Core Script -->
    <script src="bootstraps/js/jquery-1.10.2.js"></script>
    <!--  Core Bootstrap Script -->
    <script src="bootstraps/js/bootstrap.js"></script>

</body>
</html>
