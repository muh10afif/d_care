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
            <a href="<?php echo base_url()?>admin">
              <i class="menu-icon fa fa-send-o"></i>
              <span class="menu-text"> Debitur Potensial </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="hover">
            <a href="<?php echo base_url()?>admin/call">
              <i class="menu-icon fa fa-mobile"></i>
              <span class="menu-text"> Call Debitur </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="hover">
            <a href="<?php echo base_url()?>admin/hukum">
              <i class="menu-icon fa fa-legal"></i>
              <span class="menu-text"> Tindakan Hukum </span>
            </a>

            <b class="arrow"></b>
          </li>
          <li class="active open hover">
            <a href="<?php echo base_url()?>admin/eksekusi">
              <i class="menu-icon fa fa-remove"></i>
              <span class="menu-text"> Eksekusi Jaminan </span>
            </a>

            <b class="arrow"></b>
          </li>
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
                <button class="btn btn-md btn-success"><b>Unduh Excel</b></button> <button class="btn btn-md btn-info"><b>Link A Care</b></button> <button class="btn btn-md btn-warning">Print Progress</button>
                <hr />
               <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
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
                                            <tr class="gradeU">
                                                <td>Samin Suhanta</td>
                                                <td>98.00.14.00206.2.23.01.0</td>
                                                <td>BJB</td>
                                                <td>KC Buah Batu</td>
                                                <td>KCU Buah Batu</td>
                                                <td><span class="badge badge-info">Lengkap</span></td>
                                                <td><span class="badge badge-success">Ya</span></td>
                                                <td><span class="badge badge-warning">Proses A-Care</span></td>
                                            </tr>
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
  </body>
</html>