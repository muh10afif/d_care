<style type="text/css">
    img{
        cursor: pointer;
    }
</style>
<div class="modal-header bg-info text-white">
    <h4 class="modal-title" id="myLargeModalLabel">Detail Dokumen Asset Debitur <?= ucwords(strtolower($nama_debitur)) ?></h4>
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
</div>
<div class="modal-body">

    <input type="hidden" id="id_debitur2" value="<?= $id_debitur2 ?>">
    <input type="hidden" id="id_tr_pot" value="<?= $id_tr_pot ?>">

    <ul class="nav nav-tabs" role="tablist">
        <?php $i=1; foreach ($dt_detail as $detail): ?>
            <li class="nav-item"> <a class="nav-link <?= ($i == 1) ? 'active' : '' ?>" data-toggle="tab" href="#asset<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab"><?= $detail['jenis_asset'] ?></a> </li>
        <?php $i++; endforeach; ?>
    </ul>
    
    <div class="tab-content tabcontent-border">
        <?php $i=2; $k=1; foreach ($dt_detail as $detail):  $id_jenis_asset = $detail['id_jenis_asset']; $id_debitur = $detail['id_debitur']; $id_dok_asset = $detail['id_dokumen_asset'] ?>
            <div class="tab-pane <?= ($k == 1) ? 'active' : '' ?>" id="asset<?=$detail['id_jenis_asset'] ?>-<?= $k ?>" role="tabpanel">
                <div class="p-20">
                <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7 || $id_jenis_asset == 9): ?>
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#info<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Informasi</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lingkungan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Lingkungan</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#analisa_lingkungan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Analisa Lingkungan</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#kawasan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Kawasan</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#lokasi_site<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Lokasi Site</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#topografi<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Topografi</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#data_tanah<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Data Tanah</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#catatan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Catatan</a> </li>
                        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>
                
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#bangunan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Bangunan</a> </li>
                
                        <?php endif; ?>
                
                        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#spek_bangunan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Spesifikasi Bangunan</a> </li>
                        <?php endif; ?>
                        
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#fasilitas<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Fasilitas</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#ket_tambahan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Keterangan Tambahan</a> </li>
                        <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Foto</a> </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabcontent-border"> 
                        <div class="tab-pane active" id="info<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="p-20">
                            <?php if ($id_debitur != 0): ?>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Alamat Agunan</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3" disabled><?= $detail['alamat'] ?></textarea>
                                </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Yang Dijumpai</label>
                                    <textarea name="yang_dijumpai" id="yang_dijumpai" class="form-control" rows="3" disabled><?= $detail['bertemu'] ?></textarea>
                                </div>
                                </div>
                                <!--/span-->
                            </div>
                            <?php else: ?>
                            <div class="row pt-3">
                                <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Atas Nama</label>
                                    <input type="text" name="atas_nama" class="form-control" value="<?= $detail['atas_nama'] ?>" disabled>
                                </div>
                                </div>
                            </div>
                            <?php endif; ?>
                            
                            <!--/row-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Status PIC</label>
                                <select class="form-control custom-select" name="status_pic" disabled>
                                    <option value="">-- Pilih Status PIC --</option>
                                    <option value="Debitur" <?= ($detail['status_pic'] == 'Debitur') ? 'selected' : '' ?>>Debitur</option>
                                    <option value="Keluarga" <?= ($detail['status_pic'] == 'Keluarga') ? 'selected' : '' ?>>Keluarga</option>
                                    <option value="Pihak Lain" <?= ($detail['status_pic'] == 'Pihak Lain') ? 'selected' : '' ?>>Pihak Lain</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Status Agunan</label>
                                <select class="form-control custom-select" name="status_agunan" disabled>
                                    <option value="">-- Pilih Status Agunan --</option>
                                    <?php foreach ($status_milik as $s): ?>
                                    <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
                                    <?php endforeach; ?>
                                </select></div>
                            </div>
                            <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Batas Utara</label>
                                <select class="form-control custom-select" name="batas_utara" disabled>
                                    <option value="">-- Pilih Batas Utara --</option>
                                    <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                                    <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                                    <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Batas Selatan</label>
                                <select class="form-control custom-select" name="batas_selatan" disabled>
                                    <option value="">-- Pilih Batas Selatan --</option>
                                    <option value="Rumah" <?= ($detail['batas_selatan'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                                    <option value="Tanah Kosong" <?= ($detail['batas_selatan'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                                    <option value="Jalan" <?= ($detail['batas_selatan'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Batas Barat</label>
                                <select class="form-control custom-select" name="batas_barat" disabled>
                                    <option value="">-- Pilih Batas Utara --</option>
                                    <option value="Rumah" <?= ($detail['batas_utara'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                                    <option value="Tanah Kosong" <?= ($detail['batas_utara'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                                    <option value="Jalan" <?= ($detail['batas_utara'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Batas Timur</label>
                                <select class="form-control custom-select" name="batas_timur" disabled>
                                    <option value="">-- Pilih Batas Timur --</option>
                                    <option value="Rumah" <?= ($detail['batas_timur'] == 'Rumah') ? 'selected' : '' ?>>Rumah</option>
                                    <option value="Tanah Kosong" <?= ($detail['batas_timur'] == 'Tanah Kosong') ? 'selected' : '' ?>>Tanah Kosong</option>
                                    <option value="Jalan" <?= ($detail['batas_timur'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Status Dokumen</label>
                                <select class="form-control custom-select" name="dokumen" disabled>
                                    <option value="">-- Pilih Status Dokumen --</option>
                                    <option value="SHM/SHGB" <?= ($detail['jenis_dok'] == 'SHM/SHGB') ? 'selected' : '' ?>>SHM/SHGB</option>
                                    <option value="SHRSS" <?= ($detail['jenis_dok'] == 'SHRSS') ? 'selected' : '' ?>>SHRSS</option>
                                    <option value="Girik" <?= ($detail['jenis_dok'] == 'Girik') ? 'selected' : '' ?>>Girik</option>
                                    <option value="AJB" <?= ($detail['jenis_dok'] == 'AJB') ? 'selected' : '' ?>>AJB</option>
                                    <option value="Akta Hibah" <?= ($detail['jenis_dok'] == 'Akta Hibah') ? 'selected' : '' ?>>Akta Hibah</option>
                                </select></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?= number_format($detail['total_harga'],0,'.','.') ?>" disabled>
                
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane  p-20" id="lingkungan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lokasi</label>
                                <select class="form-control custom-select" name="lokasi" disabled>
                                <option value="">-- Pilih Lokasi --</option>
                                <option value="Pusat kota" <?= ($detail['lokasi'] == 'Pusat kota') ? 'selected' : '' ?>>Pusat Kota</option>
                                <option value="Pinggiran kota" <?= ($detail['lokasi'] == 'Pinggiran kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Kepadatan Bangunan</label>
                                <select class="form-control custom-select" name="kepadatan_bangunan" disabled>
                                <option value="">-- Pilih Kepadatan Bangunan --</option>
                                <option value="> 75%" <?= ($detail['kepadatan_bangunan'] == '> 75%') ? 'selected' : '' ?>>> 75%</option>
                                <option value="25% - 75%" <?= ($detail['kepadatan_bangunan'] == '25% - 75%') ? 'selected' : '' ?>>25% - 75%</option>
                                <option value="< 25%" <?= ($detail['kepadatan_bangunan'] == '< 25%') ? 'selected' : '' ?>>< 25%</option>
                                </select></div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Pertumbuhan Bangunan</label>
                                <select class="form-control custom-select" name="pertumbuhan_bangunan" disabled>
                                <option value="">-- Pilih Pertumbuhan Bangunan --</option>
                                <option value="Cepat" <?= ($detail['pertumbuhan_bangunan'] == 'Cepat') ? 'selected' : '' ?>>Cepat</option>
                                <option value="Stabil" <?= ($detail['pertumbuhan_bangunan'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                                <option value="Lambat" <?= ($detail['pertumbuhan_bangunan'] == 'Lambat') ? 'selected' : '' ?>>Lambat</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Harga Tanah</label>
                                <select class="form-control custom-select" name="harga_tanah" disabled>
                                <option value="">-- Pilih Harga Tanah --</option>
                                <option value="Naik Cepat" <?= ($detail['h_tanah'] == 'Naik Cepat') ? 'selected' : '' ?>>Naik Cepat</option>
                                <option value="Stabil" <?= ($detail['h_tanah'] == 'Stabil') ? 'selected' : '' ?>>Stabil</option>
                                <option value="Gejala Turun" <?= ($detail['h_tanah'] == 'Gejala Turun') ? 'selected' : '' ?>>Gejala Turun</option>
                                </select></div>
                            </div>
                            <!--/span-->
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="analisa_lingkungan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        
                        <?php if ($id_jenis_asset == 9) : ?>
                
                            <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Aksesbilitas</label>
                                <select class="form-control custom-select" name="aksesbilitas" disabled>
                                    <option value="">-- Pilih Aksesbilitas --</option>
                                    <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                    <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                    <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                </select></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Transportasi</label>
                                <select class="form-control custom-select" name="transportasi" disabled>
                                    <option value="">-- Pilih Transportasi --</option>
                                    <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                    <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                    <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                </select>
                                </div>
                            </div>
                            </div>
                
                        <?php else : ?>
                
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Aksesbilitas</label>
                                <select class="form-control custom-select" name="aksesbilitas" disabled>
                                <option value="">-- Pilih Aksesbilitas --</option>
                                <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                </select></div>
                            </div>
                            <!--/span-->
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Pusat Perbelanjaan</label>
                                <select class="form-control custom-select" name="pusat_belanja" disabled>
                                <option value="">-- Pilih Perbelanjaan --</option>
                                <option value="Dekat" <?= ($detail['pusat_belanja'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
                                <option value="Jauh" <?= ($detail['pusat_belanja'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                                </select></div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <?php if ($id_jenis_asset != 7) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Sekolah</label>
                                <select class="form-control custom-select" name="sekolah" disabled>
                                <option value="">-- Pilih Sekolah --</option>
                                <option value="Ada" <?= ($detail['sekolah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Jauh" <?= ($detail['sekolah'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                            <!--/span-->
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Transportasi</label>
                                <select class="form-control custom-select" name="transportasi" disabled>
                                <option value="">-- Pilih Transportasi --</option>
                                <option value="Baik" <?= ($detail['aksesbilitas'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                <option value="Cukup" <?= ($detail['aksesbilitas'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                <option value="Kurang" <?= ($detail['aksesbilitas'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                </select>
                                </div>
                            </div>
                            <!--/span-->
                        </div>
                        <div class="row">
                            <?php if ($id_jenis_asset != 7) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Rekreasi</label>
                                <select class="form-control custom-select" name="rekreasi" disabled>
                                <option value="">-- Pilih Rekreasi --</option>
                                <option value="Ada" <?= ($detail['rekreasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['rekreasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                        </div>
                
                        <?php endif; ?>
                        </div>
                        <div class="tab-pane p-20" id="kawasan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="d-flex justify-content-center pt-3">
                            <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Mayaoritas Data Hunian</label>
                                <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                                <option value="Niaga" <?= ($detail['data_hunian'] == 'Niaga') ? 'selected' : '' ?>>Niaga</option>
                                <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                                <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                                <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                                <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 2) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Mayaoritas Data Hunian</label>
                                <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                                <option value="Pemilikan" <?= ($detail['data_hunian'] == 'Pemilikan') ? 'selected' : '' ?>>Pemilikan</option>
                                <option value="Penyewaan" <?= ($detail['data_hunian'] == 'Penyewaan') ? 'selected' : '' ?>>Penyewaan</option>
                                <option value="Rumah Dinas" <?= ($detail['data_hunian'] == 'Rumah Dinas') ? 'selected' : '' ?>>Rumah Dinas</option>
                                <option value="Kosong" <?= ($detail['data_hunian'] == 'Kosong') ? 'selected' : '' ?>>Kosong</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($id_jenis_asset == 9) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Mayaoritas Data Hunian</label>
                                <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                                <option value="Pabrik" <?= ($detail['data_hunian'] == 'Pabrik') ? 'selected' : '' ?>>Pabrik</option>
                                <option value="Pergudangan" <?= ($detail['data_hunian'] == 'Pergudangan') ? 'selected' : '' ?>>Pergudangan</option>
                                <option value="Hunian/Pemukiman" <?= ($detail['data_hunian'] == 'Hunian/Pemukiman') ? 'selected' : '' ?>>Hunian/Pemukiman</option>
                                <option value="Sawah" <?= ($detail['data_hunian'] == 'Sawah') ? 'selected' : '' ?>>Sawah</option>
                                <option value="Lahan Kosong" <?= ($detail['data_hunian'] == 'Lahan Kosong') ? 'selected' : '' ?>>Lahan Kosong</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                            <?php if ($id_jenis_asset == 7) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Mayaoritas Data Hunian</label>
                                <select class="form-control custom-select" name="mayor_data_hunian" disabled>
                                <option value="">-- Pilih Mayaoritas Data Hunian --</option>
                                <option value="Perkantoran"  <?= ($detail['data_hunian'] == 'Perkantoran') ? 'selected' : '' ?>>Perkantoran</option>
                                <option value="Sekolah"  <?= ($detail['data_hunian'] == 'Sekolah') ? 'selected' : '' ?>>Sekolah</option>
                                <option value="Komplek Perumahan"  <?= ($detail['data_hunian'] == 'Komplek Perumahan') ? 'selected' : '' ?>>Komplek Perumahan</option>
                                <option value="Pasar"  <?= ($detail['data_hunian'] == 'Pasar') ? 'selected' : '' ?>>Pasar</option>
                                <option value="Hunian"  <?= ($detail['data_hunian'] == 'Hunian') ? 'selected' : '' ?>>Hunian</option>
                                <option value="Jalan"  <?= ($detail['data_hunian'] == 'Jalan') ? 'selected' : '' ?>>Jalan</option>
                                </select></div>
                            </div>
                            <?php endif; ?>
                
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="lokasi_site<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jaringan Listrik</label>
                                <select class="form-control custom-select" name="jaringan_listrik" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jaringan_listrik'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jaringan_listrik'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jaringan Air Bersih</label>
                                <select class="form-control custom-select" name="jaringan_air_bersih" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jaringan_air_bersih'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jaringan_air_bersih'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jaringan Telepon</label>
                                <select class="form-control custom-select" name="jaringan_telepon" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jaringan_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jaringan_telepon'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jaringan Gas</label>
                                <select class="form-control custom-select" name="jaringan_gas" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jaringan_gas'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jaringan_gas'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Penampungan Sampah</label>
                                <select class="form-control custom-select" name="penampungan_sampah" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['penampungan_sampah'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['penampungan_sampah'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jalan Masuk</label>
                                <select class="form-control custom-select" name="jalan_masuk" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jalan_masuk'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jalan_masuk'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jalan Depan Objek</label>
                                <select class="form-control custom-select" name="jalan_depan_objek" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['jalan_depan_objek'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['jalan_depan_objek'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Saluran Air</label>
                                <select class="form-control custom-select" name="saluran_air" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['saluran_air'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['saluran_air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Trotoar</label>
                                <select class="form-control custom-select" name="trotoar" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['trotoar'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['trotoar'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="topografi<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                            <?php if ($id_jenis_asset != 7) : ?>
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Penghijauan</label>
                                <select class="form-control custom-select" name="penghijauan" disabled>
                                <option value="">-- Pilih Penghijauan --</option>
                                <option value="Rimbun" <?= ($detail['penghijauan'] == 'Rimbun') ? 'selected' : '' ?>>Rimbun</option>
                                <option value="Gersang" <?= ($detail['penghijauan'] == 'Gersang') ? 'selected' : '' ?>>Gersang</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Penataan Lingkungan</label>
                                <select class="form-control custom-select" name="penataan_lingkungan" disabled>
                                <option value="">-- Pilih Penataan Lingkungan --</option>
                                <option value="Baik" <?= ($detail['penataan_lingkungan'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                <option value="Kurang" <?= ($detail['penataan_lingkungan'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <?php endif; ?>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Resiko Banjir</label>
                                <select class="form-control custom-select" name="resiko_banjir" disabled>
                                <option value="">-- Pilih Resiko Banjir --</option>
                                <option value="Aman" <?= ($detail['resiko_banjir'] == 'Aman') ? 'selected' : '' ?>>Aman</option>
                                <option value="Rentan" <?= ($detail['resiko_banjir'] == 'Rentan') ? 'selected' : '' ?>>Rentan</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Tinggi Tanah Dari Jalan</label>
                                <select class="form-control custom-select" name="tinggi_tanah" disabled>
                                <option value="">-- Pilih Tinggi Tanah Dari Jalan --</option>
                                <option value="Rendah" <?= ($detail['tinggi_tanah'] == 'Rendah') ? 'selected' : '' ?>>Rendah</option>
                                <option value="Tinggi" <?= ($detail['tinggi_tanah'] == 'Tinggi') ? 'selected' : '' ?>>Tinggi</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2) : ?>
                        
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Tusuk Sate</label>
                                <select class="form-control custom-select" name="tusuk_sate" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Sutet</label>
                                <select class="form-control custom-select" name="sutet" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['tusuk_sate'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['tusuk_sate'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jenis Tanah</label>
                                <select class="form-control custom-select" name="jenis_tanah" disabled>
                                <option value="">-- Pilih Jenis Tanah --</option>
                                <option value="Subur" <?= ($detail['jenis_tanah'] == 'Subur') ? 'selected' : '' ?>>Subur</option>
                                <option value="Tandus" <?= ($detail['jenis_tanah'] == 'Tandus') ? 'selected' : '' ?>>Tandus</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lampu Jalan</label>
                                <select class="form-control custom-select" name="lampu_jalan" disabled>
                                <option value="">-- Pilih Lampu Jalan --</option>
                                <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <?php endif; ?>
                
                        <?php if ($id_jenis_asset == 8 || $id_jenis_asset == 7) : ?>
                
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lampu Jalan</label>
                                <select class="form-control custom-select" name="lampu_jalan" disabled>
                                <option value="">-- Pilih Lampu Jalan --</option>
                                <option value="Ada" <?= ($detail['lampu_jalan'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['lampu_jalan'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <?php endif; ?>
                
                        </div>
                        <div class="tab-pane p-20" id="data_tanah<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Nilai Taksiran</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1">Rp.</span>
                                </div>
                                <input type="number" name="nilai_taksiran" class="form-control" id="rupiah" value="<?= number_format($detail['nilai_taksiran']) ?>" disabled>
                
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Bentuk Tanah</label>
                                <select class="form-control custom-select" name="bentuk_tanah" disabled>
                                <option value="">-- Pilih Bentuk Tanah --</option>
                                <option value="Datar" <?= ($detail['bentuk_tanah'] == 'Datar') ? 'selected' : '' ?>>Datar</option>
                                <option value="Miring" <?= ($detail['bentuk_tanah'] == 'Miring') ? 'selected' : '' ?>>Miring</option>
                                <option value="Tidak Rata" <?= ($detail['bentuk_tanah'] == 'Tidak Rata') ? 'selected' : '' ?>>Tidak Rata</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Letak Tanah</label>
                                <select class="form-control custom-select" name="letak_tanah" disabled>
                                <option value="">-- Pilih Letak Tanah --</option>
                                <option value="Strategis" <?= ($detail['letak_tanah'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                                <option value="Biasa" <?= ($detail['letak_tanah'] == 'Biasa') ? 'selected' : '' ?>>Biasa</option>
                                <option value="Tidak Strategis" <?= ($detail['letak_tanah'] == 'Tidak Strategis') ? 'selected' : '' ?>>Tidak Strategis</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Luas Tanah</label>
                                <div class="input-group mb-3">
                                <input type="number" name="luas_tanah" class="form-control" value="<?= $detail['l_tanah'] ?>" disabled>
                
                                <div class="input-group-prepend">
                                <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="catatan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                            <?php if ($id_jenis_asset != 9) : ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lokasi</label>
                                <select class="form-control custom-select" name="lokasi_cat" disabled>
                                <option value="">-- Pilih Lokasi --</option>
                                <?php if ($id_jenis_asset == 8) : ?>
                                    <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                                    <option value="Pinggiran Kota" <?= ($detail['lokasi_cat'] == 'Pinggiran Kota') ? 'selected' : '' ?>>Pinggiran Kota</option>
                                <?php elseif ($id_jenis_asset == 6 || $id_jenis_asset == 1 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>
                                    <option value="Dekat Pusat Kota" <?= ($detail['lokasi_cat'] == 'Dekat Pusat Kota') ? 'selected' : '' ?>>Dekat Pusat Kota</option>
                                    <option value="Strategis" <?= ($detail['lokasi_cat'] == 'Strategis') ? 'selected' : '' ?>>Strategis</option>
                                    <option value="Terpencil" <?= ($detail['lokasi_cat'] == 'Terpencil') ? 'selected' : '' ?>>Terpencil</option>
                                <?php endif ?>
                                
                                </select>
                            </div>
                            </div>
                            <?php endif ?>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Marketability</label>
                                <select class="form-control custom-select" name="marketability" disabled>
                                <option value="">-- Pilih Marketability --</option>
                                <?php foreach ($sifat_asset as $s): ?>
                                    <option value="<?= $s['id_sifat_asset'] ?>" <?= $detail['id_sifat_asset'] == $s['id_sifat_asset'] ? 'selected' : '' ?>><?= $s['sifat_asset'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Kawasan Properti</label>
                                <select class="form-control custom-select" name="kawasan_properti" disabled>
                                <option value="">-- Pilih Kawasan Properti --</option>
                                <option value="Jauh" <?= ($detail['kawasan_property'] == 'Jauh') ? 'selected' : '' ?>>Jauh</option>
                                <option value="Dekat" <?= ($detail['kawasan_property'] == 'Dekat') ? 'selected' : '' ?>>Dekat</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lebar Jalan</label>
                                <select class="form-control custom-select" name="lebar_jalan" disabled>
                                <option value="">-- Pilih Lebar Jalan --</option>
                                <option value="2 mtr" <?= ($detail['lebar_jalan'] == '2 mtr') ? 'selected' : '' ?>>2 mtr</option>
                                <option value="6 mtr" <?= ($detail['lebar_jalan'] == '6 mtr') ? 'selected' : '' ?>>6 mtr</option>
                                <option value="10 mtr" <?= ($detail['lebar_jalan'] == '10 mtr') ? 'selected' : '' ?>>10 mtr</option>
                                <option value="> 10 mtr" <?= ($detail['lebar_jalan'] == '> 10 mtr') ? 'selected' : '' ?>>> 10 mtr</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        
                        <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 2 || $id_jenis_asset == 7) : ?>
                
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Wilayah</label>
                                <select class="form-control custom-select" name="wilayah" disabled>
                                <option value="">-- Pilih Wilayah --</option>
                                <option value="Perkotaan" <?= ($detail['wilayah'] == 'Perkotaan') ? 'selected' : '' ?>>Perkotaan</option>
                                <option value="Pedesaan" <?= ($detail['wilayah'] == 'Pedesaan') ? 'selected' : '' ?>>Pedesaan</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <?php endif; ?>
                
                        </div>
                
                        <div class="tab-pane p-20" id="bangunan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="d-flex justify-content-center pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jumlah Lantai</label>
                                <input type="number" class="form-control" name="jumlah_lantai" value="<?= $detail['jml_lantai'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        </div>
                
                        <div class="tab-pane p-20" id="spek_bangunan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                
                            <?php if ($id_jenis_asset == 1 || $id_jenis_asset == 6 || $id_jenis_asset == 7) : ?>
                
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Konstruksi</label>
                                <select class="form-control custom-select" name="konstruksi" disabled>
                                    <option value="">-- Pilih Konstruksi --</option>
                                    <option value="Kayu" <?= ($detail['konstruksi'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                                    <option value="Semi" <?= ($detail['konstruksi'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                                    <option value="Permanen" <?= ($detail['konstruksi'] == 'Permanen') ? 'selected' : '' ?>>Permanen</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Pondasi</label>
                                <select class="form-control custom-select" name="pondasi" disabled>
                                    <option value="">-- Pilih Pondasi --</option>
                                    <option value="Semen Batu" <?= ($detail['pondasi'] == 'Semen Batu') ? 'selected' : '' ?>>Semen Batu</option>
                                    <option value="Beton" <?= ($detail['pondasi'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                                </select>
                                </div>
                            </div>
                
                            <?php endif; ?>
                
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Dinding</label>
                                <select class="form-control custom-select" name="dinding" disabled>
                                    <option value="">-- Pilih Dinding --</option>
                                    <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                                    <option value="Semi" <?= ($detail['dinding'] == 'Semi') ? 'selected' : '' ?>>Semi</option>
                                    <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                                </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group has-success">
                                <label class="control-label">Partisi</label>
                                <select class="form-control custom-select" name="partisi" disabled>
                                    <option value="">-- Pilih Partisi --</option>
                                    <option value="Kayu" <?= ($detail['dinding'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                                    <option value="Gipsum" <?= ($detail['dinding'] == 'Gipsum') ? 'selected' : '' ?>>Semi</option>
                                    <option value="Tembok" <?= ($detail['dinding'] == 'Tembok') ? 'selected' : '' ?>>Tembok</option>
                                </select>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Lantai</label>
                                <select class="form-control custom-select" name="lantai" disabled>
                                <option value="">-- Pilih Lantai --</option>
                                <option value="Granit" <?= ($detail['lantai'] == 'Granit') ? 'selected' : '' ?>>Granit</option>
                                <option value="Keramik" <?= ($detail['lantai'] == 'Keramik') ? 'selected' : '' ?>>Keramik</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Langit - langit</label>
                                <select class="form-control custom-select" name="langit_langit" disabled>
                                <option value="">-- Pilih Langit - langit --</option>
                                <option value="Gipsum/GRC" <?= ($detail['langit'] == 'Gipsum/GRC') ? 'selected' : '' ?>>Gipsum/GRC</option>
                                <option value="Beton" <?= ($detail['langit'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Jendela</label>
                                <select class="form-control custom-select" name="jendela" disabled>
                                <option value="">-- Pilih Jendela --</option>
                                <option value="Kayu" <?= ($detail['jendela'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                                <option value="Beton" <?= ($detail['jendela'] == 'Beton') ? 'selected' : '' ?>>Beton</option>
                                <option value="Alumunium" <?= ($detail['jendela'] == 'Alumunium') ? 'selected' : '' ?>>Alumunium</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Pintu</label>
                                <select class="form-control custom-select" name="pintu" disabled>
                                <option value="">-- Pilih Pintu --</option>
                                <option value="Kayu" <?= ($detail['pintu'] == 'Kayu') ? 'selected' : '' ?>>Kayu</option>
                                <option value="Asbes" <?= ($detail['pintu'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                                <option value="Triplek" <?= ($detail['pintu'] == 'Triplek') ? 'selected' : '' ?>>Triplek</option>
                                </select>
                            </div>
                            </div>
                        </div>
                                        
                        <?php if ($id_jenis_asset == 7) : ?>
                
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Luas Bangunan</label>
                                <div class="input-group mb-3">
                                <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" disabled>
                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Atap</label>
                                <select class="form-control custom-select" name="atap" disabled>
                                <option value="">-- Pilih Atap --</option>
                                <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                                <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                                <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                                <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Kamar Tidur</label>
                                <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Toilet</label>
                                <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                
                        <?php else : ?>
                
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Luas Bangunan</label>
                                <div class="input-group mb-3">
                                <input type="number" name="luas_bangunan" class="form-control" value="<?= $detail['l_bangunan'] ?>" disabled>
                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">m<sup>2</sup></span>
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Ruang Tamu</label>
                                <input type="number" class="form-control" name="ruang_tamu" value="<?= $detail['r_tamu'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Ruang Keluarga</label>
                                <input type="number" class="form-control" name="ruang_keluarga" value="<?= $detail['r_keluarga'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Kamar Tidur</label>
                                <input type="number" class="form-control" name="kamar_tidur" value="<?= $detail['k_tidur'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Toilet</label>
                                <input type="number" class="form-control" name="toilet" value="<?= $detail['toilet'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Dapur</label>
                                <input type="number" class="form-control" name="dapur" value="<?= $detail['dapur'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Garasi</label>
                                <select class="form-control custom-select" name="garasi" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['garasi'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['garasi'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Bangunan Lain</label>
                                <select class="form-control custom-select" name="bangunan_lain" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['b_lain'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['b_lain'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                <option value="Tempat Usaha" <?= ($detail['b_lain'] == 'Tempat Usaha') ? 'selected' : '' ?>>Tempat Usaha</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Atap</label>
                                <select class="form-control custom-select" name="atap" disabled>
                                <option value="">-- Pilih Atap --</option>
                                <option value="Genteng" <?= ($detail['atap'] == 'Genteng') ? 'selected' : '' ?>>Genteng</option>
                                <option value="Seng" <?= ($detail['atap'] == 'Seng') ? 'selected' : '' ?>>Seng</option>
                                <option value="Asbes" <?= ($detail['atap'] == 'Asbes') ? 'selected' : '' ?>>Asbes</option>
                                <option value="Tradisional" <?= ($detail['atap'] == 'Tradisional') ? 'selected' : '' ?>>Tradisional</option>
                                </select>
                            </div>
                            </div>
                        </div>
                
                        <?php endif; ?>
                        </div>
                        <div class="tab-pane p-20" id="fasilitas<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Air</label>
                                <select class="form-control custom-select" name="air" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Cukup" <?= ($detail['air'] == 'Cukup') ? 'selected' : '' ?>>Cukup</option>
                                <option value="Kurang" <?= ($detail['air'] == 'Kurang') ? 'selected' : '' ?>>Kurang</option>
                                <option value="Tidak Ada" <?= ($detail['air'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Listrik</label>
                                <div class="input-group mb-3">
                                <input type="number" name="listrik" class="form-control" value="<?= $detail['listrik'] ?>" disabled>
                
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Watt</span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Telepon</label>
                                <select class="form-control custom-select" name="telepon" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['no_telepon'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak" <?= ($detail['no_telepon'] == 'Tidak') ? 'selected' : '' ?>>Tidak</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Pagar</label>
                                <select class="form-control custom-select" name="pagar" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Kayu" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Kayu</option>
                                <option value="Tembok" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tembok</option>
                                <option value="Besi" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Besi</option>
                                <option value="Tidak Ada" <?= ($detail['pagar'] == 'Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Saluran Air</label>
                                <select class="form-control custom-select" name="saluran_air" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="PDAM" <?= ($detail['saluran_air'] == 'PDAM') ? 'selected' : '' ?>>PDAM</option>
                                <option value="Sumur/Pompa" <?= ($detail['saluran_air'] == 'Sumur/Pompa') ? 'selected' : '' ?>>Sumur/Pompa</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="ket_tambahan<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="d-flex justify-content-center pt-3">
                            <div class="col-md-6">
                            <div class="form-group has-success">
                                <label class="control-label">Keterangan Tambahan</label>
                                <textarea name="ket_tambahan" rows="4" class="form-control" disabled><?= $detail['keterangan'] ?></textarea>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="tab-pane p-20" id="foto<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                        <div class="row gbr">

                        <?php

                        $foto = $this->M_data->get_data_foto_dok_asset($id_debitur, $id_dok_asset);
                        
                        $no=0; foreach ($foto as $f): $no++; ?>
                        <div class="col-lg-4 col-md-8">
                            <!-- Card -->
                            <div class="card shadow card-hover">
                                <div class="card-header bg-info">
                                    <h4 class="card-title text-center text-white">Tampak <?= $f['tampak_asset'] ?></h4>
                                </div>
                                <img class="card-img-top img-responsive" style="height: 250px; width: 100%;" src="http://localhost/vcare_new/images/<?php echo $f['foto'];?>" alt="Tampak <?= $f['tampak_asset'] ?>">

                                <!-- <img class="card-img-top img-responsive" style="height: 250px; width: 100%;" src="http://vcare-new.skdigital.id/images/<?php echo $f['foto'];?>" alt="Tampak <?= $f['tampak_asset'] ?>"> -->

                            </div>
                            <!-- Card -->
                        </div>
                        <?php endforeach ?>

                        </div>
                        </div>
                    </div>
                    
                
                    <?php elseif ($id_jenis_asset == 3 || $id_jenis_asset == 4 || $id_jenis_asset == 5) : ?>
                
                        <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#data<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tab">Data</a> </li>
                        <!-- <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#foto_lainnya" role="tab">Foto</a> </li> -->
                        </ul>
                        
                        <div class="tab-content tabcontent-border"> 
                        <div class="tab-pane p-20 active" id="data<?=$detail['id_jenis_asset'] ?>-<?= $i ?>" role="tabpanel">
                
                        <?php if ($id_jenis_asset == 3): ?>
                
                        <div class="row pt-3">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nomor Polisi</label>
                                <input type="text" class="form-control" name="nomor_polisi" value="<?= $detail['nomor_polisi'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label class="control-label">Nama Pemilik STNK</label>
                                <input name="nama_pemilik_stnk" class="form-control" rows="3" value="<?= $detail['nama_stnk'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat Agunan</label>
                                <textarea class="form-control" name="alamat" id="alamat" rows="2" disabled><?= $detail['alamat'] ?></textarea>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_rangka">Nomor Rangka</label>
                                <input type="text" name="no_rangka" class="form-control" id="no_rangka" value="<?= $detail['nomor_rangka'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="no_mesin">Nomor Mesin</label>
                                <input type="text" name="no_mesin" class="form-control" id="no_mesin" value="<?= $detail['nomor_mesin'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="warna_kdr">Warna Kendaraan</label>
                                <input type="text" name="warna_kdr" class="form-control" id="warna_kdr" value="<?= $detail['warna_kendaraan'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_kendaraan">Jenis Kendaraan</label>
                                <input type="text" name="jenis_kendaraan" class="form-control" id="jenis_kendaraan" value="<?= $detail['jenis_kendaraan'] ?>" disabled> 
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="merk">Merk</label>
                                <input type="text" name="merk" class="form-control" id="merk" value="<?= $detail['merek'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="type_kdr">Type</label>
                                <input type="text" name="type_kdr" class="form-control" id="type_kdr" value="<?= $detail['type_kendaraan'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="thn_buat">Tahun Pembuatan</label>
                                <input type="text" name="thn_buat" class="form-control" id="thn_buat" value="<?= $detail['tahun_pembuatan'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="cc">Silinder/CC</label>
                                <input type="text" name="cc" class="form-control" id="cc" value="<?= $detail['cc'] ?>" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="bahan_bakar">Bahan Bakar</label>
                                <input type="text" name="bahan_bakar" class="form-control" id="bahan_bakar" value="<?= $detail['bahan_bakar'] ?>" disabled>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="warna_tnkb">Warna TNKB</label>
                                <select name="warna_tnkb" class="form-control custom-select" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Plat Hitam" <?= ($detail['warna_tnkb'] == 'Plat Hitam') ? 'selected' : '' ?>>Plat Hitam</option>
                                <option value="Plat Kuning" <?= ($detail['warna_tnkb'] == 'Plat Kuning') ? 'selected' : '' ?>>Plat Kuning</option>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="pajak_berlaku">Pajak Berlaku s/d</label>
                                <div class="input-group">
                                <input type="text" class="form-control mdate" name="pajak_berlaku" value="<?= $detail['pajak_berlaku'] ?>" readonly>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="icon-calender"></i></span>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="status_milik">Status Kepemilikan</label>
                                <select name="status_milik" class="form-control custom-select" disabled>
                                <option value="">-- Pilih --</option>
                                <?php foreach ($status_milik as $s): ?>
                                    <option value="<?= $s['id'] ?>" <?= ($detail['status_milik'] == $s['id']) ? 'selected' : '' ?>><?= $s['status_milik'] ?></option>
                                <?php endforeach; ?>
                                </select>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="bpkb">BPKB</label>
                                <select name="bpkb" class="form-control custom-select" disabled>
                                <option value="">-- Pilih --</option>
                                <option value="Ada" <?= ($detail['bpkb'] == 'Ada') ? 'selected' : '' ?>>Ada</option>
                                <option value="Tidak Ada" <?= ($detail['bpkb'] == 'Tidak Ada') ? 'selected' : '' ?>>Tidak Ada</option>
                                </select>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label>Nomor BPKB</label>
                                <input type="text" name="nomor_bpkb" value="<?= $detail['nomor_bpkb'] ?>" class="form-control" disabled>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                                </div>
                                <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" disabled>
                
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            <div class="form-group">
                                <label for="informasi">Informasi Tambahan</label>
                                <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
                            </div>
                            </div>
                        </div>
                
                        <?php elseif ($id_jenis_asset == 4): ?>
                            <div class="row pt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label>Dokumen</label>
                                <input type="text" name="dokumen" value="<?= $detail['jenis_dok'] ?>" class="form-control" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="harga">Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                    </div>
                                    <input type="text" name="total_harga" class="form-control" id="rupiah" value="<?=  number_format($detail['total_harga'],0,'.','.') ?>" disabled>
                
                                </div>
                                </div>
                            </div>
                            </div>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="informasi">Alamat</label>
                                <textarea class="form-control" name="alamat" disabled><?= $detail['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="informasi">Informasi Tambahan</label>
                                <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
                                </div>
                            </div>
                            </div>
                        <?php elseif ($id_jenis_asset == 5): ?>
                            <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="informasi">Alamat</label>
                                <textarea class="form-control" name="alamat" disabled><?= $detail['alamat'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                <label for="informasi">Keterangan</label>
                                <textarea class="form-control" name="ket_tambahan" disabled><?= $detail['keterangan'] ?></textarea>
                                </div>
                            </div>
                            </div>
                        <?php endif; ?>
                        </div>
                
                        </div>
                        
                    <?php endif; ?>
                
                    <!-- batas akhir detail form asset -->
                </div>
            </div>
        <?php $i++; $k++; endforeach; ?>
        
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary waves-effect mr-3" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-info waves-effect" id="validasi_agunan">Data Valid</button>
</div>

<link rel="stylesheet" href="<?= base_url() ?>template/viewer/css/viewer.css">

<script src="<?= base_url() ?>template/viewer/js/viewer.js"></script>

<script type="text/javascript">

  $('.gbr').viewer();
  $('.sbl').viewer();

  $(document).ready(function () {
        $('#validasi_agunan').on('click', function () {
            var id_deb      = $('#id_debitur2').val();
            var id_tr_pot   = $('#id_tr_pot').val();

            swal({
                title       : 'Konfirmasi',
                text        : 'Yakin data akan masuk validasi agunan?',
                type        : 'warning',

                buttonsStyling      : false,
                confirmButtonClass  : "btn btn-info",
                cancelButtonClass   : "btn btn-danger mr-3",

                showCancelButton    : true,
                confirmButtonText   : 'Ya, kirim data',
                confirmButtonColor  : '#d33',
                cancelButtonColor   : '#3085d6',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('c_data/proses_ubah_ots') ?>",
                        method      : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses halaman',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                        },
                        data            : {id_debitur:id_deb, id_tr_potensial:id_tr_pot},
                        dataType        : "JSON",
                        success         : function (data) {
                            
                            $('#modal_det_aset').modal('hide');

                            swal({
                                title               : 'Berhasil',
                                text                : 'Data berhasil disimpan',
                                type                : 'success',
                                showConfirmButton   : false,
                                timer               : 1000
                            });

                            location.reload();

                        }

                    })

                    return false;
                } else if (result.dismiss === swal.DismissReason.cancel) {

                    swal({
                            title               : 'Batal',
                            text                : 'Anda membatalkan kirim validasi agunan',
                            type                : 'error',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 
                }
            })
        })
  })

</script>