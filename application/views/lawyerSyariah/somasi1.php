<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tindakan Hukum</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/lawyerSyariah') ?>">Tindakan Hukum</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Somasi 1</li>
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
                <div class="panel no-border overflow-hidden">
                      <label>Pilih Jenis Tindakan</label><br/>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#r1">Kredit Konsumtif</button>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#r2">Kredit Produktif Jaminan  Hak Tanggungan</button>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#r3">Kredit Konsumtif Jaminan Fiducia</button>
                      <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#r4">Seluruh Jenis Kredit  Dengan Kondisi</button>
                        <!-- Modal -->
                      <div id="r1" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Kredit Konsumtif</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                            <form method="post" action="<?php echo base_url('lawyerSyariah/act_somasi1');?>">
                              <input type="hidden" value="1" name="id_tr_tindakan_hukum">
                              <div class="form-group">
                                  <label for="usr">Nomor Surat:</label>
                                  <input type="text" name="nomor_surat" class="form-control" id="usr">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jumlah Lampiran:</label>
                                  <input type="text" name="jumlah_lampiran" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Kepada Debitur:</label>
                                  <input type="text"  class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Debitur:</label>
                                  <textarea class="form-control" id="pwd"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jadwal Pertemuan:</label>
                                  <input type="date" name="jadwal_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tempat Pertemuan:</label>
                                  <input type="date" name="tempat_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tanggal Sampai:</label>
                                  <input type="date" name="tanggal_sampai" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 1:</label>
                                  <input type="text" class="form-control" name="cp_1" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 2:</label>
                                  <input type="text" class="form-control" name="cp_2" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Pihak Berkepentingan:</label>
                                  <input type="text" class="form-control" name="pihak_berkepentingan" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Berkepentingan:</label>
                                  <input type="text" class="form-control" name="alamat_berkepentingan" id="pwd">
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Terbitkan Surat</button>
                              </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!-- Modal -->
                        <div id="r2" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Kredit Konsumtif</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                            <form method="post" action="<?php echo base_url('lawyerSyariah/act_somasi1');?>">
                              <input type="hidden" value="2" name="id_tr_tindakan_hukum">
                              <div class="form-group">
                                  <label for="usr">Nomor Surat:</label>
                                  <input type="text" name="nomor_surat" class="form-control" id="usr">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jumlah Lampiran:</label>
                                  <input type="text" name="jumlah_lampiran" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Kepada Debitur:</label>
                                  <input type="text"  class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Debitur:</label>
                                  <textarea class="form-control" id="pwd"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jadwal Pertemuan:</label>
                                  <input type="date" name="jadwal_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tempat Pertemuan:</label>
                                  <input type="date" name="tempat_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tanggal Sampai:</label>
                                  <input type="date" name="tanggal_sampai" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 1:</label>
                                  <input type="text" class="form-control" name="cp_1" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 2:</label>
                                  <input type="text" class="form-control" name="cp_2" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Pihak Berkepentingan:</label>
                                  <input type="text" class="form-control" name="pihak_berkepentingan" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Berkepentingan:</label>
                                  <input type="text" class="form-control" name="alamat_berkepentingan" id="pwd">
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Terbitkan Surat</button>
                              </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!-- Modal -->
                        <div id="r3" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Kredit Konsumtif</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                            <form method="post" action="<?php echo base_url('lawyerSyariah/act_somasi1');?>">
                              <input type="hidden" value="3" name="id_tr_tindakan_hukum">
                              <div class="form-group">
                                  <label for="usr">Nomor Surat:</label>
                                  <input type="text" name="nomor_surat" class="form-control" id="usr">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jumlah Lampiran:</label>
                                  <input type="text" name="jumlah_lampiran" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Kepada Debitur:</label>
                                  <input type="text"  class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Debitur:</label>
                                  <textarea class="form-control" id="pwd"></textarea>
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Jadwal Pertemuan:</label>
                                  <input type="date" name="jadwal_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tempat Pertemuan:</label>
                                  <input type="date" name="tempat_pertemuan" class="form-control" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Tanggal Sampai:</label>
                                  <input type="date" name="tanggal_sampai" class="form-control" >
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 1:</label>
                                  <input type="text" class="form-control" name="cp_1" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Contact Person 2:</label>
                                  <input type="text" class="form-control" name="cp_2" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Pihak Berkepentingan:</label>
                                  <input type="text" class="form-control" name="pihak_berkepentingan" id="pwd">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Alamat Berkepentingan:</label>
                                  <input type="text" class="form-control" name="alamat_berkepentingan" id="pwd">
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Terbitkan Surat</button>
                              </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                        <!-- Modal -->
                        <div id="r4" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-lg">
                          <!-- konten modal-->
                          <div class="modal-content">
                            <!-- heading modal -->
                            <div class="modal-header">
                              <h4 class="modal-title">Kredit Konsumtif</h4>
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- body modal -->
                            <div class="modal-body">
                              <form method="post" action="<?php echo base_url('lawyerSyariah/act_somasi1_4');?>" enctype="multipart/form-data">
                                <input type="hidden" value="4" name="id_tr_tindakan_hukum">
                                <?php foreach ($record as $r){?>
                                  <input name="id_tr_formtindakan" type="hidden" value="<?php echo $r['id_tr_formtindakan']?>">
                                <?php }?>
                                <div class="form-group">
                                  <label for="usr">Lampirkan Surat:</label>
                                  <input type="file" name="userfiles[]" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Lampiran 1:</label>
                                  <input type="file" name="userfiles[]" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">lampiran 2:</label>
                                  <input type="file"  name="userfiles[]" class="form-control">
                                </div>
                                <div class="form-group">
                                  <label for="pwd">Browse:</label>
                                  <input type="file" name="userfiles[]" class="form-control">
                                </div>
                                <button type="submit" class="btn btn-md btn-primary">Upload</button>
                              </form>
                            </div>
                            <!-- footer modal -->
                            <div class="modal-footer">
                              <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    <!--/ Meta -->
                </div>
                </div>
            </div>
        </div>
    </div>
</div>