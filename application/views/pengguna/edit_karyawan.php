<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>D-Care</title>

    <meta name="description" content="top menu &amp; navigation" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

    <!-- bootstrap & fontawesome -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />

    <!-- page specific plugin styles -->

    <!-- text fonts -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.googleapis.com.css" />

    <!-- ace styles -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
    <![endif]-->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />

    <!--[if lte IE 9]>
      <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
    <![endif]-->

    <!-- inline styles related to this page -->

    <!-- ace settings handler -->
    <script src="<?php echo base_url()?>assets/js/ace-extra.min.js"></script>

    <!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

    <!--[if lte IE 8]>
    <script src="assets/js/html5shiv.min.js"></script>
    <script src="assets/js/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-1">
    <div id="navbar" class="navbar navbar-default    navbar-collapse       h-navbar ace-save-state">
      <div class="navbar-container ace-save-state" id="navbar-container">
        <div class="navbar-header pull-left">
          <a href="index.html" class="navbar-brand">
            <small>
              <i class="fa fa-leaf"></i>
              D-Care
            </small>
          </a>

          <button class="pull-right navbar-toggle navbar-toggle-img collapsed" type="button" data-toggle="collapse" data-target=".navbar-buttons,.navbar-menu">
            <span class="sr-only">Toggle user menu</span>

            <img src="<?php echo base_url()?>assets/images/avatars/user.jpg" alt="Jason's Photo" />
          </button>

          <button class="pull-right navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#sidebar">
            <span class="sr-only">Toggle sidebar</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>
          </button>
        </div>

        <div class="navbar-buttons navbar-header pull-right  collapse navbar-collapse" role="navigation">
        </div>
      </div><!-- /.navbar-container -->
    </div>
     <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>
            <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            D-Care <small>Tambah Pengguna</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form class="form-horizontal" action="<?php echo site_url('Pengguna/buat_pengguna');?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Kode Karyawan</label>
                                    <input type="text" class="form-control" name="id_karyawan" value="<?php echo $get['id_karyawan']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $get['nama_lengkap']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Nik</label>
                                    <input type="text" class="form-control"  name="nik" value="<?php echo $get['nik']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Telpon</label>
                                    <input type="text" class="form-control"  name="telfon" value="<?php echo $get['telfon']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tempat Lahir</label>
                                    <input type="text" class="form-control"  name="tempat_lahir" value="<?php echo $get['tempat_lahir']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control"  name="tanggal_lahir" value="<?php echo $get['tanggal_lahir']; ?>">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea class="form-control" name="alamat"><?php echo $get['alamat']; ?></textarea>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>  | 
                                <?php echo anchor('pengguna/buat_karyawan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                    <div class="col-md-12">
                         <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" >
                                <thead>
                                    <tr style="background-color: #1a305b;">
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Telpon</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Foto</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php foreach ($record as $r) {?>
                                        <tr class="gradeU">
                                            <td><?php echo $r['nama_lengkap'];?></td>
                                            <td><?php echo $r['nik'];?></td>
                                            <td><?php echo $r['telfon'];?></td>
                                            <td><?php echo $r['tempat_lahir'];?></td>
                                            <td><?php echo $r['tanggal_lahir'];?></td>
                                            <td><?php echo $r['alamat'];?></td>
                                            <td><img src="data:image/jpeg;base64,<?php echo $r['file_foto']?>" style="width:100px; height:100px";></td>
                                            <td><?php echo anchor('pengguna/edit_karyawan/'.$r['id_karyawan'],'Edit',array('class'=>'badge badge-primary'));
                                            ?></td>
                                            </tr>
                                        <?php }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="footer">
                <div class="footer-inner">
                  <div class="footer-content">
                    <span class="bigger-120">
                      <span class="blue bolder">Solusi</span>
                      Karya Digital &copy; 2019
                    </span>
                  </div>
                </div>
              </div>

              <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
                <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
              </a>
            </div><!-- /.main-container -->
            <script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

        <!-- page specific plugin scripts -->
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/buttons.flash.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/buttons.html5.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/buttons.print.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/buttons.colVis.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/dataTables.select.min.js"></script>

        <!-- ace scripts -->
        <script src="<?php echo base_url()?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/ace.min.js"></script>
    </body>
</html>