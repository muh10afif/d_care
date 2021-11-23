<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <a href="<?= base_url('manager/desk_col') ?>"><button class="btn btn-success float-right">Kembali</button></a>
            <h4 class="page-title">Desk Collection</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('manager/desk_col') ?>">Desk Collection</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kartu Debitur</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
  <div class="row">
        <div class="col-12">
            <div class="card border-info shadow">
                <div class="card-header bg-info">
                    <a href="<?= base_url() ?>manager/unduh_excel_deb/<?= $d_debitur['id_debitur'] ?>"><button type="button" class="btn btn-warning float-right">Unduh Excel</button></a>
					<h4 class="mb-0 text-white">Kartu Debitur <?= $d_debitur['nama_debitur'] ?></h4></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="id_care" class="col-sm-3 control-label col-form-label">No Reff</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="id_care" value="<?= $d_debitur['no_reff'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="no_klaim" class="col-sm-3 control-label col-form-label">No Klaim</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="no_klaim" value="<?= $d_debitur['no_klaim'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="nama_debitur" class="col-sm-3 control-label col-form-label">Nama Debitur</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nama_debitur" value="<?= $d_debitur['nama_debitur'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="no_telp" class="col-sm-3 control-label col-form-label">No Telp</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" id="no_telp" value="<?= $d_debitur['telp_pic'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="alamat" class="col-sm-3 ontrol-label col-form-label">Alamat</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="alamat" value="<?= $d_debitur['alamat_awal'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="jenis_kredit" class="col-sm-3 control-label col-form-label">Jenis Kredit</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jenis_kredit" value="<?= $d_debitur['jenis_kredit'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="bank" class="col-sm-3 control-label col-form-label">Bank</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bank" value="<?= $d_debitur['bank'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="cabang_bank" class="col-sm-3 control-label col-form-label">Cabang Bank</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="cabang_bank" value="<?= $d_debitur['cabang_bank'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="capem_bank" class="col-sm-3 control-label col-form-label">Capem Bank</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="capem_bank" value="<?= $d_debitur['capem_bank'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <?php $shs = $d_debitur['subrogasi'] - $d_debitur['recoveries'] ?>
                                <label for="shs" class="col-sm-3 control-label col-form-label">SHS</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="shs" value="<?= number_format($shs, '0', '.', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="kewajiban" class="col-sm-3 control-label col-form-label">Kewajiban</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kewajiban" value="<?php $kw = $d_debitur['bunga'] + $d_debitur['subrogasi'] + $d_debitur['nominal_denda']; echo number_format($kw,'0','.','.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="pokok" class="col-sm-3 control-label col-form-label">Pokok</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="pokok" value="<?= number_format($d_debitur['subrogasi'], '0', '.', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="bunga" class="col-sm-3 control-label col-form-label">Bunga</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="bunga" value="<?= number_format($d_debitur['bunga'], '0', '.', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="denda" class="col-sm-3 control-label col-form-label">Denda</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="denda" value="<?= number_format($d_debitur['nominal_denda'], '0', '.', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="klaim_as" class="col-sm-3 control-label col-form-label">Besar Klaim</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="klaim_as" value="<?= number_format($d_debitur['besar_klaim'], '0', '.', '.') ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="jenis_agunan" class="col-sm-3 control-label col-form-label">Jenis Agunan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="jenis_agunan" value="<?= $d_debitur['jenis_asset'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="legal_agunan" class="col-sm-3 control-label col-form-label">Legalitas Agunan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="legal_agunan" value="<?= $d_debitur['legalitas_asset'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="nilai_taksiran" class="col-sm-3 control-label col-form-label">Nilai Taksiran</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nilai_taksiran" value="<?= $d_debitur['nilai_taksiran'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 col-lg-4">
                            <div class="form-group row">
                                <label for="nilai_taksiran" class="col-sm-3 control-label col-form-label">Nomor SPK</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nilai_taksiran" value="<?= $d_debitur['no_spk'] ?>" readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="text-white">List Bayar</h4>
                </div>
                <div class="card-body">
                    <table class="table table-hover table-bordered table-striped" id="tabel">
                        <thead class="bg-info text-white">
                            <tr>
                                <th width="10%">No</th>
                                <th>Tanggal Bayar</th>
                                <th>Pembayaran</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no=1; foreach ($d_recov as $r) : ?>
                                <tr>
                                    <td align="center"><?= $no++ ?>.</td>
                                    <td><?= tgl_indo($r['tgl_bayar']) ?></td>
                                    <td>Rp.     <?= number_format($r['nominal'],2,',','.') ?></td>
                                </tr> 
                            <?php endforeach ?>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>