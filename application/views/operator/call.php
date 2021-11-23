<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">OTS</h4>
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
            <div class="card border-info">
                <div class="card-header">
                  <a href="<?php echo base_url('operator/cetak_excel')?>"><span class="badge badge-primary"><b>Unduh Excel</b></span></a>
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
                                    <th>Tindak lanjut</th>
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
                                    <td><button type="button" class="btn btn-outline-info btn-sm" data-toggle="modal" data-target="#r<?php echo $r['id_debitur'];?>">Lihat Kontak</button></td>
                                    <td><?php echo $r['tindakan_fu'];?></td>
                                    <td><?php echo $r['tgl_fu'];?></td>
                                    <td align='center'><?php echo anchor('operator/fu/'.$r['id_tr_ots_p'],'FU',array('class'=>'badge badge-success'));?>&ensp;&ensp;</td>
                                    <!-- modal Star -->
                                      <div class="modal fade" id="r<?php echo $r['id_debitur'];?>" tabindex="-1" role="dialog" aria-labelledby="Telpon" aria-hidden="true">
                                              <div class="modal-dialog">
                                                <div class="modal-content">
                                                  <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel"><span class="fa fa-phone"></span>&nbsp;Telpon</h4>
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                                  </div>
                                                  <div class="modal-body" id="IsiModal">
                                                  <?php 
                                                        $id = $r['id_debitur'];
                                                        $query = "SELECT b.telp_debitur FROM debitur a INNER JOIN telp_debitur b ON(b.id_debitur = a.id_debitur) WHERE b.id_debitur = $id ";
                                                        $hasil = $this->db->query($query)->result_array();
                                                        foreach($hasil as $r){
                                                          echo "<ul>"."<li class='fa fa-phone'>".$r['telp_debitur']."</li>"."</ul>";
                                                        }
                                                    ?>
                                                  </div>
                                                  <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary" data-dismiss="modal"><span class="fa fa-close"></span>Tutup</button>
                                                    </div>
                                                </div>
                                              </div>
                                      </div>
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
