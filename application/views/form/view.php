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
                            <li class="nav-header">Main</li>
                            <li><a class="ajax-link" href="#"><i class="glyphicon glyphicon-home"></i><span> Dashboard</span></a>
                            </li>

                            <li><a class="ajax-link" href="<?php echo site_url('C_data_kopi/view_kopi');?>"><i class="glyphicon glyphicon-bell"></i><span> Data Kopi</span></a>
                            </li>

                            <li><a class="ajax-link" href="<?php echo site_url('User/view_user');?>"><i class="glyphicon glyphicon-book"></i><span> Data User</span></a>
                            </li>

                            <li class="accordion ">
                                <a href="#"><i class="glyphicon glyphicon-tasks"></i><span> Kriteria Kopi</span></a>
                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="<?php echo site_url('C_halaman_admin/view_bobot_kriteria');?>">Kelola Kriteria Bobot</a></li>
                                    <li><a href="<?php echo site_url('C_halaman_admin/view_bobot_sub');?>">Kelola Subkriteria Bobot</a></li>

                                </ul>
                            </li>


                        </ul>
                    </div>
                </div>
            </div>
            <div class='content'>
                <div class="container col-md-8 ">
                    <div class="row">
                <center><h1><b> BOBOT KRITERIA </b></h1></center>

                        <br>
                        <a href="<?php echo base_url().'index.php/C_halaman_admin/edit_bobot';?>"><button type="button" class="btn btn-primary">EDIT</button></a>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <?php
                                foreach($kriteria as $row)
                                {
                                    echo "<th>".$row."</th>";
                                }
                                echo "<th>Priority</th>";
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i=0;$i<count($kriteria);$i++)
                            {
                                echo "<tr>";
                                echo "<td>".$kriteria[$i]."</td>";
                                for($j=0;$j<count($kriteria);$j++)
                                {
                                    foreach($dataset as $key => $value)
                                    {
                                        if(substr($key,0,2) == $kriteria[$i] && substr($key,2,2) == $kriteria[$j]  )
                                        {
                                            echo "<td>".$value."</td>";
                                        }
                                    }
                                }
                                echo "<td><b>".$priority[$i]."</b></td>";
                                echo "</tr>";
                            }
                            echo "<tr>";
                            echo "<td><b>Total</b></td>";
                            foreach($jumlah as $row)
                            {
                                echo "<td><b>".$row."</b></td>";
                            }
                            echo "<td><b>".array_sum($priority)."</b></td>";
                            echo "</tr>";
                            ?>
                            </tbody>
                        </table>

                        <table class="table">
                            <tr>
                                <td><p><b>Principle Eigen value(max)</b></p></td><td><p><b style="float:right;">
                                            <?php echo $pev; ?>
                                        </b></p></td>
                            </tr>
                            <tr>
                                <td><p><b>Consistency index(CI)</b></p></td><td><p><b style="float:right;">
                                            <?php echo $ci; ?>
                                        </b></p></td>
                            </tr>
                            <tr>
                                <td><p><b>Consistency Ratio(CR)</b></p></td><td><p><b style="float:right;">
                                            <?php echo $cr; ?>%
                                        </b></p></td>
                            </tr>
                        </table>

                        <center><h3><b>Tabel Fuzzy</b></h3></center><br>
                        <table class="table table-striped table-bordered table-hover table-responsive fill-head">
                            <thead>
                            <tr>
                                <th rowspan = "2">#</th>
                                <?php
                                foreach($kriteria as $row)
                                {
                                    echo "<th colspan = '3'>".$row."</th>";
                                }
                                echo "<th colspan = '3'>Total</th>";
                                ?>
                            </tr>
                            <tr>
                                <?php
                                foreach($kriteria as $row)
                                {
                                    echo "<th>l</th>";
                                    echo "<th>m</th>";
                                    echo "<th>u</th>";
                                }
                                echo "<th>l</th>";
                                echo "<th>m</th>";
                                echo "<th>u</th>";
                                ?>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i=0;$i<count($kriteria);$i++)
                            {
                                echo "<tr>";
                                echo "<td>".$kriteria[$i]."</td>";
                                for($j=0;$j<count($kriteria);$j++)
                                {
                                    echo "<td>".$fuzzy[$kriteria[$i].$kriteria[$j]][0]."</td>";
                                    echo "<td>".$fuzzy[$kriteria[$i].$kriteria[$j]][1]."</td>";
                                    echo "<td>".$fuzzy[$kriteria[$i].$kriteria[$j]][2]."</td>";
                                }
                                echo "<td>".$total[$i]['l']."</td>";
                                echo "<td>".$total[$i]['m']."</td>";
                                echo "<td>".$total[$i]['u']."</td>";
                                echo "</tr>";
                            }
                            echo "<tr>";
                            echo "<td colspan='16'>Jumlah</td>";
                            echo "<td>".$total_lmu['l']."</td>";
                            echo "<td>".$total_lmu['m']."</td>";
                            echo "<td>".$total_lmu['u']."</td>";
                            echo "</tr>";
                            ?>

                            </tbody>
                        </table>
                        <center><h3><b>Nilai Sintesis Fuzzy (Si) Kriteria</b></h3></center><br>
                        <table class="table table-striped table-bordered table-hover table-responsive fill-head" style="width: 40%; margin: auto;">
                            <thead>
                            <tr>
                                <th rowspan="2">#</th>
                                <th colspan="3"><center>Si</center></th>
                            </tr>
                            <tr>
                                <th>l</th>
                                <th>m</th>
                                <th>u</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            for($i=0;$i<count($sintesis);$i++)
                            {
                                echo "<tr>";
                                echo "<td>".$kriteria[$i]."</td>";
                                echo "<td>".$sintesis[$i]['l']."</td>";
                                echo "<td>".$sintesis[$i]['m']."</td>";
                                echo "<td>".$sintesis[$i]['u']."</td>";
                                echo "</tr>";
                            }
                            ?>
                            </tbody>
                        </table>

                        <center><h3><b>Nilai Bobot Kriteria</b></h3></center>
                        <table class="table table-striped table-bordered table-hover table-responsive fill-head" style="width: 30%; margin: auto;">
                            <tr>
                                <th><center>Kriteria</center></th>
                                <th><center>Bobot</center></th>
                            </tr>

                            <?php
                            for($i=0;$i<count($normalisasi);$i++)
                            {?>
                            <fieldset>
                                <tr>
                                    <td><b><?php echo $kriteria[$i];?></b></td>
                                    <td><?php echo $normalisasi[$i];?></td>
                                    <?php

                                    } ?>
                                </tr>
                        </table>
                        <br>



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
