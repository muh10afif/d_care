<!DOCTYPE html>
<?php
	// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=call_debitur.xls");
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
                                    <table class="table table-bordered" id="dataTables-example">
                                        <thead style="background-color:#1a305b;">
                                            <tr>
                                                <th>Nama Debitur</th>
                                                <th>Nomor Klaim</th>
                                                <th>Bank</th>
                                                <th>Cabang</th>
                                                <th>Capem</th>
                                                <th>Call Number</th>
                                                <th>Komitmen</th>
                                                <th>Tanggal JB</th>
                                                <th>Status Tindakan</th>
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
                                                <td><?php echo $r['telp_debitur'];?></td>
                                                <td></td>
                                                <td><?php echo $r['tgl_fu']; ?></td>
                                                <td><?php 
                                                      if($r['status_tindakan']==1){
                                                        echo '<span class="badge badge-primary">'.'FU'.'</span>';
                                                      }elseif($r['status_tindakan']==2){
                                                            echo '<span class="badge badge-warning">'.'Eksekusi Asset'.'</span>';
                                                      }elseif($r['status_tindakan']==3){
                                                            echo '<span class="badge badge-success">'.'Tindakan Hukum'.'</span>';
                                                      }
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php }?>
                                        </tbody>
                                    </table>
                                </div>
  </body>
  </html>