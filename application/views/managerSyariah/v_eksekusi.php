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
<link rel="stylesheet" href="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.css" />
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
          <a href="<?php echo base_url('admin/manager')?>" class="navbar-brand">
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
          <ul class="nav ace-nav">
            <li class="dropdown-modal user-min">
              <a data-toggle="dropdown" href="#" class="dropdown-toggle">
                <img class="nav-user-photo" src="<?php echo base_url();?>assets/images/avatars/avatar4.png" alt="Jason's Photo" />
                <span class="user-info">
                  <small>Welcome,</small>
                  <?php echo $this->session->userdata('nama');?>
                </span>

                <i class="ace-icon fa fa-caret-down"></i>
              </a>

              <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
                <li>
                  <a href="<?php echo base_url();?>login/logout">
                    <i class="ace-icon fa fa-power-off"></i>
                    Logout
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </div><!-- /.navbar-container -->
    </div>

    <div class="main-container ace-save-state" id="main-container">
      <script type="text/javascript">
        try{ace.settings.loadState('main-container')}catch(e){}
      </script>

       <div id="sidebar" class="sidebar      h-sidebar                navbar-collapse collapse          ace-save-state">
        <ul class="nav nav-list">
          <li class="hover">
            <a href="<?php echo base_url()?>admin/managerSyariah">
              <i class="menu-icon fa fa-send-o"></i>
              <span class="menu-text"> Debitur Potensial </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="hover">
            <a href="<?php echo base_url()?>managerSyariah/callDebitur">
              <i class="menu-icon fa fa-mobile"></i>
              <span class="menu-text"> Call Debitur </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="hover">
            <a href="<?php echo base_url()?>managerSyariah/tindakanHukum">
              <i class="menu-icon fa fa-legal"></i>
              <span class="menu-text"> Tindakan Hukum </span>
            </a>

            <b class="arrow"></b>
          </li>
         <!--  <li class="active open hover">
            <a href="<?php echo base_url()?>managerSyariah/eksekusi">
              <i class="menu-icon fa fa-remove"></i>
              <span class="menu-text"> Eksekusi Jaminan </span>
            </a>

            <b class="arrow"></b>
          </li> -->
        </ul><!-- /.nav-list -->
      </div>


      <div class="main-content">
        <div class="main-content-inner">
          <div class="page-content">
            <div class="page-header">
              <h1>
                Eksekusi Jaminan
                <small>
                  <i class="ace-icon fa fa-angle-double-right"></i>
                  informasi eksekusi jaminan
                </small>
              </h1>
            </div><!-- /.page-header -->

            <div class="row">
              <div class="col-xs-12">
                <!-- PAGE CONTENT BEGINS -->
                <a href="<?php echo base_url('manager/cetak_jaminan');?>"><span class="badge badge-success"><b>Unduh Excel</b></span></a> 
                <a href="http://acare.skdigital.id/login"><span class="badge badge-primary"><b>Link A Care</b></span></a>
                <hr />
               <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="npl_ao">
                                        <thead>
                                            <tr>
                                                <th>Nama Debitur</th>
                                                <th>Nomor Klaim</th>
                                                <th>Bank</th>
                                                <th>Cabang</th>
                                                <th>Capem</th>
                                                <th>Status Info</th>
                                                <th>Marketable</th>
                                                <th>Proses</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($record as $r) {?>
                                            <tr class="gradeU">
                                                <td><?php echo $r['nama_debitur'];?></td>
                                                <td><?php echo $r['no_klaim'];?></td>
                                                <td><?php echo $r['bank'];?></td>
                                                <td><?php echo $r['cabang_bank'];?></td>
                                                <td><?php echo $r['capem_bank'];?></td>
                                                <td><?php if($r['status_info']==1){
                                                          echo '<span class="badge badge-primary">'.'Lengkap'.'</span>';
                                                        }elseif($r['status_info']==2){
                                                          echo '<span class="badge badge-danger">'.'Tidak Lengkap'.'</span>';
                                                        }else{
                                                          echo anchor('managerSyariah/actInfoLengkap/'.$r['id_debitur'],'Lengkap',array('class'=>'badge badge-primary'));
                                                          echo anchor('managerSyariah/actInfoTlengkap/'.$r['id_debitur'],'Tidak Lengkap',array('class'=>'badge badge-danger'));
                                                        }
                                                     ?>
                                                  </td>
                                                <td><?php if($r['id_sifat_asset']==1){
                                                         echo '<span class="badge badge-success">'.'Ya'.'</span>';
                                                        }elseif($r['id_sifat_asset']==2){
                                                          echo '<span class="badge badge-success">'.'Tidak'.'</span>';
                                                        }else{
                                                          echo anchor('managerSyariah/actSifatMarketable/'.$r['id_debitur'],'Ya',array('class'=>'badge badge-success'));
                                                          echo anchor('managerSyariah/actSifatNmarketable/'.$r['id_debitur'],'Tidak',array('class'=>'badge badge-warning'));
                                                        }
                                                     ?>
                                                </td>
                                                <td>
                                                    <?php if($r['status_proses']==1){
                                                         echo '<span class="badge badge-default">'.'Pending'.'</span>';
                                                        }elseif($r['status_proses']==2){
                                                          echo '<span class="badge badge-warning">'.'Negosiasi'.'</span>';
                                                        }elseif($r['status_proses']==3){
                                                          echo '<span class="badge badge-success">'.'Acare'.'</span>';
                                                        }
                                                        else{
                                                          echo anchor('managerSyariah/actPending/'.$r['id_tr_ots_p'],'Pending',array('class'=>'badge badge-default'));
                                                          echo anchor('managerSyariah/actNegosiasi/'.$r['id_tr_ots_p'],'Negosiasi',array('class'=>'badge badge-warning'));
                                                          echo anchor('managerSyariah/actAcare/'.$r['id_tr_ots_p'],'Acare',array('class'=>'badge badge-success'));
                                                        }
                                                     ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
                <!-- PAGE CONTENT ENDS -->
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.page-content -->
        </div>
      </div><!-- /.main-content -->

      <div class="footer">
        <div class="footer-inner">
          <div class="footer-content">
            <span class="bigger-120">
              <span class="blue bolder">Solusi</span>
              Karya Digital &copy; 2019
            </span>

            &nbsp; &nbsp;
            <span class="action-buttons">
              <a href="#">
                <i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
              </a>

              <a href="#">
                <i class="ace-icon fa fa-rss-square orange bigger-150"></i>
              </a>
            </span>
          </div>
        </div>
      </div>

      <a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
        <i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
      </a>
    </div><!-- /.main-container -->

    <!--[if !IE]> -->
    <script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>

    <!-- <![endif]-->

    <!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
    <script type="text/javascript">
      if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url()?>assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
    </script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>

    <!-- page specific plugin scripts -->

    <!-- ace scripts -->
    <script src="<?php echo base_url()?>assets/js/ace-elements.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/ace.min.js"></script>

    <!-- inline scripts related to this page -->
    <script type="text/javascript">
      jQuery(function($) {
       var $sidebar = $('.sidebar').eq(0);
       if( !$sidebar.hasClass('h-sidebar') ) return;
      
       $(document).on('settings.ace.top_menu' , function(ev, event_name, fixed) {
        if( event_name !== 'sidebar_fixed' ) return;
      
        var sidebar = $sidebar.get(0);
        var $window = $(window);
      
        //return if sidebar is not fixed or in mobile view mode
        var sidebar_vars = $sidebar.ace_sidebar('vars');
        if( !fixed || ( sidebar_vars['mobile_view'] || sidebar_vars['collapsible'] ) ) {
          $sidebar.removeClass('lower-highlight');
          //restore original, default marginTop
          sidebar.style.marginTop = '';
      
          $window.off('scroll.ace.top_menu')
          return;
        }
      
      
         var done = false;
         $window.on('scroll.ace.top_menu', function(e) {
      
          var scroll = $window.scrollTop();
          scroll = parseInt(scroll / 4);//move the menu up 1px for every 4px of document scrolling
          if (scroll > 17) scroll = 17;
      
      
          if (scroll > 16) {      
            if(!done) {
              $sidebar.addClass('lower-highlight');
              done = true;
            }
          }
          else {
            if(done) {
              $sidebar.removeClass('lower-highlight');
              done = false;
            }
          }
      
          sidebar.style['marginTop'] = (17-scroll)+'px';
         }).triggerHandler('scroll.ace.top_menu');
      
       }).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
      
       $(window).on('resize.ace.top_menu', function() {
        $(document).triggerHandler('settings.ace.top_menu', ['sidebar_fixed' , $sidebar.hasClass('sidebar-fixed')]);
       });
      
      
      });
    </script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables/dataTables.bootstrap.js"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/dataTables/jquery.dataTables.js"></script>
    <!-- <![endif]-->
<script>
     $(function () {
        $('#npl_ao').DataTable()
    });
</script>
  </body>
</html>