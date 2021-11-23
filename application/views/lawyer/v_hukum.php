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
                                <th>No</th>
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
                          <?php $no=1; foreach ($record as $r) : $id_tr_hukum = $r['id_tr_tindakan_hukum']; ?>
                            <tr class="gradeU">
                                <td align="center"><?= $no++ ?></td>
                              <td><?php echo $r['nama_debitur'];?></td>
                              <td><?php echo $r['no_klaim'];?></td>
                              <td><?php echo $r['bank'];?></td>
                              <td><?php echo $r['cabang_bank'];?></td>
                              <td><?php echo $r['capem_bank'];?></td>

                              <?php $cek = $this->Model_lawyer->cari_tindakan_hukum($id_tr_hukum)->row_array(); ?>

                                <td align='center'>
                                    <a class="btn btn-info btn-sm" href="<?= base_url("lawyer/somasi1/$id_tr_hukum") ?>" role="button">Somasi 1</a>
                                </td>
                                <td align='center'>
                                    <a class="btn btn-info btn-sm" href="<?= base_url("lawyer/somasi2/$id_tr_hukum") ?>" role="button">Somasi 2</a>
                                </td>
                              <td align="center"><?php 
                                      if($r['id_tindakan_hukum']==1){
                                        echo '<span class="badge badge-primary">'.'LO'.'</span>';
                                      }elseif($r['id_tindakan_hukum']==2){
                                        echo '<span class="badge badge-danger">'.'MEDIASI'.'</span>';
                                      }elseif($r['id_tindakan_hukum']==6){
                                        echo '<span class="badge badge-warning">'.'LITIGASI'.'</span>';
                                      }else{
                                        echo anchor('lawyer/act_LO/'.$r['id_tr_ots_p'],'LO',array('class'=>'badge badge-primary'));
                                        echo anchor('lawyer/act_Mediasi/'.$r['id_tr_ots_p'],'MEDIASI',array('class'=>'badge badge-danger'));
                                        echo anchor('lawyer/act_Litigasi/'.$r['id_tr_ots_p'],' LITIGASI',array('class'=>'badge badge-warning'));
                                      }
                                  ?></td>
                              <td align="center"><a href="<?php ?>"><span class="badge badge-success">CLOSE</span></a></td>
                              </tr>
                          <?php endforeach ?>
                          </tbody>
                      </table>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>