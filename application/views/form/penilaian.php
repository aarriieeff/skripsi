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
    <title> PERAMALAN KOPI </title>
    <!-- BOOTSTRAP CORE STYLE CSS -->
    <link id="bs-css" href="<?php echo base_url(); ?>assets/bootstraps/css/bootstrap-cerulean.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/css/charisma-app.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/fullcalendar/dist/fullcalendar.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/fullcalendar/dist/fullcalendar.print.css" rel="stylesheet" media="print">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/chosen/chosen.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/colorbox/example3/colorbox.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/responsive-tables/responsive-tables.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/bower_components/bootstrap-tour/build/css/bootstrap-tour.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/jquery.noty.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/noty_theme_default.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/elfinder.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/elfinder.theme.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/jquery.iphone.toggle.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/css/uploadify.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstraps/css/animate.min.css" rel="stylesheet">
    <script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/jquery/jquery.min.js"></script>

    <link href="<?php echo base_url(); ?>assets/bootstraps/css/bootstrap.css" rel="stylesheet" />
    <!-- FONT AWESOME CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstraps/css/font-awesome.min.css" rel="stylesheet" />
    <!-- CUSTOM STYLE CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstraps/css/style.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href='<?php echo base_url(); ?>http://fonts.googleapis.com/css?family=Nova+Flat' rel='stylesheet' type='text/css' />
    <link href='<?php echo base_url(); ?>http://fonts.googleapis.com/css?family=Open+Sans:400,700,300' rel='stylesheet' type='text/css' />
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url(); ?>https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="<?php echo base_url(); ?>https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="head">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-4 col-sm-4">
                <a href="index.html">
                    <img style="width:100%;" src="<?php echo base_url(); ?>assets/bootstraps/img/kop11.png"/>

                </a>
            </div>
            <div  class="col-lg-4 col-md-4 col-sm-4 text-center" >

            </div>
            <div style="margin-top:1%; float:left; margin-left:20%;" >
                <img src="<?php echo base_url(); ?>assets/bootstraps/img/user1.png">
                <b> Hello <?echo $_SESSION['username']; ?> <img src="<?php echo base_url(); ?>assets/bootstraps/img/batas.png">
                    <a href="/auth/logout" class="label label-info"><strong>Logout</strong></a></b>
            </div>
        </div>
    </div>
</div>
<section>
    <div  class="ch-container">
        <div class="row">

            <!-- left menu starts -->
            <div class="col-sm-2 col-lg-2">
                <div class="sidebar-nav">
                    <div class="nav-canvas">
                        <div class="nav-sm nav nav-stacked">

                        </div>
                        <ul class="nav nav-pills nav-stacked main-menu">
                            <ul class="nav nav-pills nav-stacked main-menu">
                                <li class="nav-header">Main</li>
                                <li><a class="ajax-link" href="/index"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                                </li>

                                <li><a class="ajax-link" href="<?php echo site_url('C_data_kopi/view_kopi');?>"><i class="glyphicon glyphicon-bell"></i><span> Data Kopi</span></a>
                                </li>

                                <li><a class="ajax-link" href="<?php echo site_url('User/view_user');?>"><i class="glyphicon glyphicon-book"></i><span> Kriteria Mutu Kopi</span></a>
                                </li>
                                <li><a class="ajax-link" href="<?php echo site_url('Nilai/view_penilaian');?>"><i class="glyphicon glyphicon-check"></i><span> Penilaian Kopi </span></a>
                                </li>


                                <li class="accordion ">
                                    <a href="<?php echo site_url('Nilai/ranking');?>"><i class="glyphicon glyphicon-bell"></i><span> Hasil Penilaian Kopi </span></a>
                                </li>


                            </ul>

                        </ul>
                    </div>
                </div>
            </div>
            <div class='content'>
                <div class="container col-md-10 ">
                    <!-- Main Content -->
                            <center><h1><b> Data Kopi </b></h1></center>
                            <center>
                                <?php
                                $sukses=$this->session->flashdata('sukses');
                                if (!empty($sukses)){
                                    echo "<br><div class='alert alert-success'>
            <strong>Success!</strong> Data berhasil diproses.
            </div>";
                                }
                                ?>
                                <table class="table table-striped table-hover">
                                    <tr>
                                        <th>no</th>
                                        <th>Nama</th>
                                        <th width="170">Action</th>
                                    </tr>
                                    <?php $no=1;
                                    foreach ($dbview_kopi as $kopi) {?>
                                    <fieldset>

                                        <tr class="kolomFoto">
                                            <td><?php echo $no;?></td>
                                            <td><?php echo $kopi->jenis_kopi;?></td>
                                            <td>
                                                <a href="<?php echo site_url('Nilai/penilaian/'.$kopi->id);?>"><input type="button" class="btn btn-info" value="Mulai Peramalan"/></a>
                                                <a href="<?php echo site_url('C_data_anggota/info_jemaat/'.$kopi->id);?>"><input type="button" class="btn btn-warning" value="info"/></a>

                                            </td>
                                        </tr>
                                        <?php $no++; } ?>
                                </table>
                                </fieldset>
                                <br />
                            </center>

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
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery-1.10.2.js"></script>
<!--  Core Bootstrap Script -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/bootstrap.js"></script>

<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- library for cookie management -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.cookie.js"></script>
<!-- calender plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/moment/min/moment.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<!-- data table plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.dataTables.min.js"></script>

<!-- select or dropdown enhancer -->
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/chosen/chosen.jquery.min.js"></script>
<!-- plugin for gallery image view -->
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/colorbox/jquery.colorbox-min.js"></script>
<!-- notification plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.noty.js"></script>
<!-- library for making tables responsive -->
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/responsive-tables/responsive-tables.js"></script>
<!-- tour plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/bower_components/bootstrap-tour/build/js/bootstrap-tour.min.js"></script>
<!-- star rating plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.raty.min.js"></script>
<!-- for iOS style toggle switch -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.iphone.toggle.js"></script>
<!-- autogrowing textarea plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.autogrow-textarea.js"></script>
<!-- multiple file upload plugin -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.uploadify-3.1.min.js"></script>
<!-- history.js for cross-browser state change on ajax -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/jquery.history.js"></script>
<!-- application script for Charisma demo -->
<script src="<?php echo base_url(); ?>assets/bootstraps/js/charisma.js"></script>


</body>
</html>
