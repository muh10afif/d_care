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
                            D-Care <small>Atur Kelolaan</small>
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-5">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <form class="form-horizontal" action="<?php echo site_url('Kelolaan/act_edit');?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Pilih Karyawan</label>
                                    <select class="form-control" name="id_karyawan">
                                        <option value="<?php echo $get['id_karyawan']; ?>"><?php echo $get['nama_lengkap']; ?></option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Unit Bank</label>
                                    <select class="form-control" name="id_capem_bank">
                                    <option value="<?php echo $get['id_capem_bank']; ?>"><?php echo $get['capem_bank']; ?></option>
                                        <?php foreach ($unit as $u) {?>
                                            <option value="<?php echo $u['id_capem_bank']; ?>"><?php echo $u['capem_bank']; ?></option>
                                        <?php }?>
                                    </select>
                                </div>
                                <br>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                    <div class="col-md-12">
                         <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover" id="example1">
                                <thead>
                                    <tr style="background-color: #1a305b;">
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Capem</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $no=1; foreach ($record as $r) {?>
                                        <tr class="gradeU">
                                            <td><?php echo $no; ?></td>
                                            <td><?php echo $r['nama_lengkap'];?></td>
                                            <td><?php echo $r['capem_bank'];?></td>
                                            <td><?php echo anchor('Kelolaan/Edit_kelolaan/'.$r['id_penempatan'],'Edit',array('class'=>'badge badge-primary'));
                                            ?></td>
                                            </tr>
                                        <?php $no++; }?>
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
        <script>
          $(function () {
            $('#example1').DataTable()
            $('#example2').DataTable({
              'paging'      : true,
              'lengthChange': false,
              'searching'   : false,
              'ordering'    : true,
              'info'        : true,
              'autoWidth'   : false
            })
          })
        </script>
        <!-- ace scripts -->
        <script src="<?php echo base_url()?>assets/js/ace-elements.min.js"></script>
        <script src="<?php echo base_url()?>assets/js/ace.min.js"></script>
    </body>
</html>