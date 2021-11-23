<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<?php
	// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=call_debiturOperator.xls");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />
    <title>D-Care | Operator</title>
    <meta name="description" content="top menu &amp; navigation" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/font-awesome/4.5.0/css/font-awesome.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/fonts.googleapis.com.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/ace-rtl.min.css" />
    <script src="<?php echo base_url()?>assets/js/ace-extra.min.js"></script>
  </head>
  <body>
  <div class="main-content">
        <div class="row">
              <div class="col-xs-12">
                    <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Nama Debitur</th>
                                                <th>Nomor Klaim</th>
                                                <th>Bank</th>
                                                <th>Cabang</th>
                                                <th>Capem</th>
                                                <th>Komitmen</th>
                                                <th>Tanggal JB</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($record as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $r['nama_debitur'];?></td>
                                                <td><?php echo $r['no_klaim'];?></td>
                                                <td><?php echo $r['bank'];?></td>
                                                <td><?php echo $r['cabang_bank'];?></td>
                                                <td><?php echo $r['capem_bank'];?></td>
                                                <td><?php echo $r['nama_proses'];?></td>
                                                <td><?php echo $r['tgl_fu'];?></td>
                                            </tr>
                                          <?php }?>
                                        </tbody>
                                    </table>
                    </div>
                </div>
        </div>
    </div>
  <script src="<?php echo base_url()?>assets/js/jquery-2.1.4.min.js"></script>
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