<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tindakan Hukum</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
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
                                <th>Somasi 1</th>
                                <th>Somasi 2</th>
                                <th>Tindakan</th>
                                <th>Close</th>
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
                              <td><?php echo anchor('lawyerSyariah/somasi1/'.$r['id_tr_tindakan_hukum'],'Somasi 1',array('class'=>'badge badge-primary'));?></td>
                              <td><?php echo anchor('lawyerSyariah/somasi2/'.$r['id_tr_tindakan_hukum'],'Somasi 2',array('class'=>'badge badge-primary'));?></td>
                              <td><?php 
                                      if($r['id_tindakan_hukum']==1){
                                        echo '<span class="badge badge-primary">'.'LO'.'</span>';
                                      }elseif($r['id_tindakan_hukum']==2){
                                        echo '<span class="badge badge-danger">'.'MEDIASI'.'</span>';
                                      }elseif($r['id_tindakan_hukum']==6){
                                        echo '<span class="badge badge-warning">'.'LITIGASI'.'</span>';
                                      }else{
                                        echo anchor('lawyerSyariah/act_LO/'.$r['id_tr_ots_p'],'LO',array('class'=>'badge badge-primary'));
                                        echo anchor('lawyerSyariah/act_Mediasi/'.$r['id_tr_ots_p'],'MEDIASI',array('class'=>'badge badge-danger'));
                                        echo anchor('lawyerSyariah/act_Litigasi/'.$r['id_tr_ots_p'],' LITIGASI',array('class'=>'badge badge-warning'));
                                      }
                                  ?></td>
                              <td><a href="<?php ?>"><span class="badge badge-success">CLOSE</span></a></td>
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