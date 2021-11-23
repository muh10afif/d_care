<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Call Debitur</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Call Debitur</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-header">
                <a href="<?php echo base_url('managerSyariah/cetak_excel_call');?>"><span class="badge badge-success">Unduh Excel</span></a>
              </div>
              <div class="card-body">

              <div class="table-responsive">
              <table class="table table-striped table-bordered table-hover" id="tabel">
                        <thead class="bg-info text-white">
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
                            <th>Aksi</th>
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
                            <td><button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#r<?php echo $r['id_debitur'];?>">Lihat Kontak</button></td>
                            <td><?php echo $r['tindakan_fu'];?></td>
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
                            <td>
                            <?php
                                  if($r['status_tindakan']==1){
                                    echo '<span class="badge badge-default">'.''.'</span>';
                                  }elseif($r['status_tindakan']==2){
                                    echo '<span class="badge badge-default">'.''.'</span>';
                                  }elseif($r['status_tindakan']==3){
                                    echo '<span class="badge badge-default">'.''.'</span>';
                                  }
                                  else{
                                    echo anchor('manager/FU/'.$r['id_tr_ots_p'],'FU',array('class'=>'badge badge-primary'));
                                    echo anchor('manager/actEksekusi_Asset/'.$r['id_tr_ots_p'],'Eksekusi Asset',array('class'=>'badge badge-warning'));
                                    echo anchor('manager/actTindakanHukum/'.$r['id_tr_ots_p'],'Tindakan Hukum',array('class'=>'badge badge-success'));
                                  }
                            ?>
                            </td>
                            <!-- modal Star -->

                              <div id="r<?php echo $r['id_debitur'];?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Telpon</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                            </div>
                                            <div class="modal-body">
                                              <?php 
                                                $id = $r['id_debitur'];
                                                $query = "SELECT b.telp_debitur FROM debitur a INNER JOIN telp_debitur b ON(b.id_debitur = a.id_debitur) WHERE b.id_debitur = $id ";
                                                $hasil = $this->db->query($query)->result_array();
                                                foreach($hasil as $r){
                                                  echo "<ul>"."<li class='fa fa-phone'>".'&nbsp;'.$r['telp_debitur']."</li>"."</ul>";
                                                }
                                            ?>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-info waves-effect" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
                                <!-- /.modal -->
                            <!-- akhir kode modal dialog -->
                        </tr>
                    <?php }?>
                    </tbody>
                </table>
            </div>

              </div>
          </div>
      </div>
  </div>
</div>

