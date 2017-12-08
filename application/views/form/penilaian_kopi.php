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
                    </div>
                </div>
            </div>
            <div class='content'>
                <div class="container col-md-8 ">
                    <div class="row">
                        <h2>Proses Penilaian Kopi</h2>
                        <form class="form-horizontal" action="" onsubmit="return confirm('Mulai Penilaian?');">
                            <div class="control-group col-lg-6">
                                <div class="control-group">
                                    <!-- <label class="control-label" >Menahan Diri, Sadar, Berkelakuan Baik : </label> -->
                                    <input type="hidden" class="form-control" name="krit1" id="kkrit1" value="<?php echo $krit1->bobot_kriteria;?>">
                                    <div class='form-group'>
                                            <select name='k1' id='kk1' class='form-control' required>
                                                <option value='' disabled selected>Keberadaan Serangga :</option>
                                                <?php foreach ($sub->result() as $row_bobot) {  ?>
                                                    <option value="<?php echo $row_bobot->bobot_sub ?>"><?php echo $row_bobot->nama_sub ?> - <?php echo $row_bobot->serangga?> </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                <div class="control-group">
                                    <!-- <label class="control-label" >Menahan Diri, Sadar, Berkelakuan Baik : </label> -->
                                    <input type="hidden" class="form-control" name="krit2" id="kkrit2" value="<?php echo $krit2->bobot_kriteria;?>">
                                    <div class='form-group'>
                                        <select name='k2' id='kk2' class='form-control' required>
                                            <option value='' disabled selected>Aroma :</option>
                                            <?php foreach ($sub->result() as $row_bobot) {  ?>
                                                <option value="<?php echo $row_bobot->bobot_sub ?>"><?php echo $row_bobot->nama_sub ?> - <?php echo $row_bobot->aroma?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- <label class="control-label" >Menahan Diri, Sadar, Berkelakuan Baik : </label> -->
                                    <input type="hidden" class="form-control" name="krit3" id="kkrit3" value="<?php echo $krit3->bobot_kriteria;?>">
                                    <div class='form-group'>
                                        <select name='k3' id='kk3' class='form-control' required>
                                            <option value='' disabled selected>Kadar air :</option>
                                            <?php foreach ($sub->result() as $row_bobot) {  ?>
                                                <option value="<?php echo $row_bobot->bobot_sub ?>"><?php echo $row_bobot->nama_sub ?> - <?php echo $row_bobot->kadarair?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- <label class="control-label" >Menahan Diri, Sadar, Berkelakuan Baik : </label> -->
                                    <input type="hidden" class="form-control" name="krit4" id="kkrit4" value="<?php echo $krit4->bobot_kriteria;?>">
                                    <div class='form-group'>
                                        <select name='k4' id='kk4' class='form-control' required>
                                            <option value='' disabled selected>Kadar Kotoran :</option>
                                            <?php foreach ($sub->result() as $row_bobot) {  ?>
                                                <option value="<?php echo $row_bobot->bobot_sub ?>"><?php echo $row_bobot->nama_sub ?> - <?php echo $row_bobot->kadarkotoran?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <!-- <label class="control-label" >Menahan Diri, Sadar, Berkelakuan Baik : </label> -->
                                    <input type="hidden" class="form-control" name="krit5" id="kkrit5" value="<?php echo $krit5->bobot_kriteria;?>">
                                    <div class='form-group'>
                                        <select name='k5' id='kk5' class='form-control' required>
                                            <option value='' disabled selected>Nilai Cacat :</option>
                                            <?php foreach ($sub->result() as $row_bobot) {  ?>
                                                <option value="<?php echo $row_bobot->bobot_sub ?>"><?php echo $row_bobot->nama_sub ?> - <?php echo $row_bobot->cacat?> </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <div class="controls">
                                        <a href="<?php echo site_url('Nilai/view_penilaian');?>" ><button type="button" class="btn">Batal</button></a>
                                        <input type="button" name="btn" value="Check" id="submitBtn" data-toggle="modal" data-target="#confirm-submit" class="btn btn-default" />
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </div>

                        </form>
                        <center>
                            <div id="confirm-submit" class="modal fade" role="dialog">
                                <div class="modal-dialog modal-lg">

                                    <!-- Modal content-->
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            <h4 class="modal-title">Penghitungan</h4>
                                        </div>
                                        <div class="modal-body">
                                            <center>
                                                <table class="table table-stripped">
                                                    <tr>
                                                        <th>bobot sub kriteria</th>
                                                        <th>bobot kriteria</th>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="pk1"></label></td>
                                                        <td><label class="pkrit1"></label></td>
                                                    </tr><tr>
                                                        <td><label class="pk2"></label></td>
                                                        <td><label class="pkrit2"></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="pk3"></label></td>
                                                        <td><label class="pkrit3"></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="pk4"></label></td>
                                                        <td><label class="pkrit4"></label></td>
                                                    </tr>
                                                    <tr>
                                                        <td><label class="pk5"></label></td>
                                                        <td><label class="pkrit5"></label></td>
                                                    </tr>
                                                </table>
                                                <label> (( </label><label class="pk1"></label><label>*</label><label class="pkrit1"></label><label>)</label><label>+</label><label>(</label><label class="pk2"></label><label>*</label><label class="pkrit2"></label><label>)</label><label>+</label><label>(</label><label class="pk3"></label><label>*</label><label class="pkrit3"></label><label>)</label><label>+</label><label>(</label><label class="pk4"></label><label>*</label><label class="pkrit4"></label><label>)</label><label>+</label><label>(</label><label class="pk5"></label><label>*</label><label class="pkrit5"></label><label>))
                                                </label>
                                            </center>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <br />
                        </center>
                        <script>
                            $("#submitBtn").click(function() {
                                /* when the button in the form, display the entered values in the modal */

                                $(".pk1").text($("#kk1").val());
                                $(".pkrit1").text($("#kkrit1").val());
                                $(".pk2").text($("#kk2").val());
                                $(".pkrit2").text($("#kkrit2").val());
                                $(".pk3").text($("#kk3").val());
                                $(".pkrit3").text($("#kkrit3").val());
                                $(".pk4").text($("#kk4").val());
                                $(".pkrit4").text($("#kkrit4").val());
                                $(".pk5").text($("#kk5").val());
                                $(".pkrit5").text($("#kkrit5").val());
                            });

                        </script>
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
