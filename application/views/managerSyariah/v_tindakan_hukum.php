<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tindakan Hukum</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tindakan Hukum</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
      <div class="col-12">
          <div class="card border-info">
              <div class="card-header">
              <a href="<?php echo base_url('managerSyariah/cetak_excel_hukum')?>"><span class="badge badge-md badge-success"><b>Unduh Excel</b></span></a>
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
                                <th>Somasi</th>
                                <th>Tindakan</th>
                                <th>Close</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($record as $r) {?>
                          <tr>
                                <td><?php echo $r['nama_debitur'];?></td>
                                <td><?php echo $r['no_klaim'];?></td>
                                <td><?php echo $r['bank'];?></td>
                                <td><?php echo $r['cabang_bank'];?></td>
                                <td><?php echo $r['capem_bank'];?></td>
                                <td><span class="badge badge-danger"><?php echo $r['tindakan_hukum'];?></span></td>
                                <td><span class="badge badge-success"><?php echo $r['tindakan_hukum'];?></span></td>
                                <td><span class="badge badge-warning"></span></td>
                                <td> <?php if($r['keputusan_manajer']==1){
                                          echo '<span class="badge badge-primary">'.'A Care'.'</span>';
                                        }elseif($r['keputusan_manajer']==2){
                                          echo '<span class="badge badge-danger">'.'Not Potensial'.'</span>';
                                        }elseif($r['keputusan_manajer']==3){
                                          echo '<span class="badge badge-default">'.'No Action Needed'.'</span>';
                                        }else{
                                          echo anchor('manager/act_acare/'.$r['id_tr_ots_p'],'Acare',array('class'=>'badge badge-primary'));
                                          echo anchor('manager/act_noAction/'.$r['id_tr_ots_p'],'No Action Needed',array('class'=>'badge badge-default'));
                                          echo anchor('manager/act_np/'.$r['id_tr_ots_p'],'NP',array('class'=>'badge badge-danger'));
                                        }
                                      ?>
                                </td>
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