<!DOCTYPE html>
<?php
	// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=eksekusi_jaminan.xls");
?>
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

  <body>
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
                              }
                           ?>
                        </td>
                      <td><?php if($r['id_sifat_asset']==1){
                               echo '<span class="badge badge-success">'.'Ya'.'</span>';
                              }elseif($r['id_sifat_asset']==2){
                                echo '<span class="badge badge-success">'.'Tidak'.'</span>';
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
                           ?>
                      </td>
                  </tr>
              <?php }?>
              </tbody>
          </table>
      </div>
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