<style>
    .table thead tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<?php if ($status == 1): ?>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 align-self-center">
                <h4 class="page-title">Kunjungan Debitur Potensial</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                            <li class="breadcrumb-item"><a href="#">Kunjungan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Debitur Potensial</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<?php else: ?>

    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-5 align-self-center">
                <h4 class="page-title">Kunjungan Debitur Non Potensial</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                            <li class="breadcrumb-item"><a href="#">Kunjungan</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Debitur NonPotensial</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

<?php endif;?>




<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-info shadow">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Filter Data</h4></div>
                <form action="<?= base_url("c_data/unduh_data/$status/$syariah") ?>" method="POST">
                <div class="card-body">
                    <div class="row m-10">
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mt-2">Periode</label>
                                </div>
                                <div class="col-md-9">
                                    <div class="input-daterange input-group" id="date-range-2">
                                        <input type="text" class="form-control" name="tgl_awal" id="start" placeholder="Awal Periode" readonly/>
                                        <div class="input-group-append">
                                            <span class="input-group-text bg-info b-0 text-white">s / d</span>
                                        </div>
                                        <input type="text" class="form-control" name="tgl_akhir" id="end" placeholder="Akhir Periode" readonly/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">SPK</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="spk" id="spk" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih SPK --</option>
                                        <?php foreach ($spk as $a): ?>
                                            <option value="<?= $a['id_spk'] ?>"><?= $a['no_spk'] ?></option>
                                        <?php endforeach;?>
                                        <option value="null">NO SPK</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4"></div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3">
                                    <label class="mt-2">Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="bank" id="bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Bank --</option>
                                        <?php foreach ($bank as $b): ?>
                                            <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">Cabang Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="cabang_bank" id="cabang_bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Cabang Bank --</option>
                                        
                                    </select>
                                    <div id="loading_cab_bank" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">Capem Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="capem_bank" id="capem_bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Capem Bank --</option>
                                        
                                    </select>
                                    <div id="loading_cap_bank" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">Asuransi</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="asuransi" id="asuransi" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Asuransi --</option>
                                        <?php foreach ($asuransi as $a): ?>
                                            <option value="<?= $a['id_asuransi'] ?>"><?= $a['asuransi'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">Cabang Asuransi</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="cabang_asuransi" id="cabang_asuransi" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Cabang Asuransi --</option>
                                        
                                    </select>
                                    <div id="loading_cab_as" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
                                    <label class="mt-2">Verifikator</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="verifikator" id="verifikator" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Verfikator --</option>
                                        <?php foreach ($verifikator as $b): ?>
                                            <option value="<?= $b['id_karyawan'] ?>"><?= $b['nama_lengkap'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <div id="loading_ver" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                <div class="col-md-12" align="right">
						<button class="btn btn-success" onclick="b()" id="filter" type="button">Tampilkan</button><?= nbs(3) ?>
                        <button class="btn btn-warning" onclick="b()" id="reset" type="button">Reset</button><?= nbs(3) ?>
                        <button class="btn btn-info" id="unduh" type="submit">Unduh Excel</button>
					</div>
                </div>
            </form>
            </div>
        </div>
    </div>

    <?php if ($status == 1): ?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Data Kunjungan Debitur Potensial</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover" id="tabel_potensial" width="100%">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Deal Reff</th>
                                    <th>No Klaim</th>
                                    <th>Nama Debitur</th>
                                    <th>SHS</th>
                                    <th>Bank</th>
                                    <th>Cabang Bank</th>
                                    <th>Capem Bank</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Tanggal Prioritas</th>
                                    <th>Keterangan</th>
                                    <th>Verifikator</th>
                                    <th>Status</th>
                                    <th width="12%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php else: ?>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-header bg-info">
                        <h4 class="mb-0 text-white">Data Kunjungan Debitur Non Potensial</h4>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-bordered table-hover" id="tabel_non_potensial" width="100%">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>No</th>
                                    <th>Deal Reff</th>
                                    <th>No Klaim</th>
                                    <th>Nama Debitur</th>
                                    <th>SHS</th>
                                    <th>Bank</th>
                                    <th>Cabang Bank</th>
                                    <th>Capem Bank</th>
                                    <th>Tanggal Kunjungan</th>
                                    <th>Tanggal Prioritas</th>
                                    <th>Keterangan</th>
                                    <th>Verifikator</th>
                                    <th width="8%">Aksi</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    <?php endif; ?>

    <div id="modal_det_aset" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content" id="isi_dok_aset">
                
            </div>
        </div>
    </div>

</div>


<!-- modal ubah ke potensial -->
<div id="modal_ubah_potensial" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="vcenter">Tambah Debitur Potensial</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
                <div class="modal-body">
                    <div class="d-flex justify-content-center mb-3">
                        <input type="hidden" id="id_debitur">
                        <input type="hidden" id="id_tr_np">
                        <div class="form-group col-md-8">
                            <div class="row mt-3" id="list_periode">
                                <div class="col-md-4 ">
                                    <label class="mt-2">Jenis Komitmen</label>
                                </div>
                                <div class="col-md-8">
                                    <select class="select2 form-control custom-select" name="komitmen" id="komitmen" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Jenis Komitmen --</option>
                                        <?php foreach ($komitmen as $a): ?>
                                            <option value="<?= $a['id_jenis_komitmen'] ?>"><?= $a['jenis_komitmen'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <label class="mt-2">Tanggal</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="tgl" value="<?= date('d-F-Y') ?>" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4 ">
                                    <label class="mt-2">Nominal</label>
                                </div>
                                <div class="col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">Rp. </span>
                                        </div> 
                                        <input type="text" class="form-control separator" name="nominal" id="nominal" placeholder="Masukkan Nominal">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button class="btn btn-secondary btn-sm float-right mr-2" type="button" data-dismiss="modal">Batal</button>
                <button class="btn btn-success btn-sm float-right" type="button" id="buat_potensial">Simpan</button>
            </div>
        </div>
    </div>
</div>


<!-- <script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script> -->

<script>

    $(document).ready(function () {

        var tabel_potensial = $('#tabel_potensial').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("c_data/tampil_data_potensial/$syariah") ?>",
                "type"  : "POST",
                "data"  : function (data) {
                    data.asuransi           = $('#asuransi').val();
                    data.cabang_asuransi    = $('#cabang_asuransi').val();
                    data.bank               = $('#bank').val();
                    data.cabang_bank        = $('#cabang_bank').val();
                    data.capem_bank         = $('#capem_bank').val();
                    data.tanggal_awal       = $('#start').val();
                    data.tanggal_akhir      = $('#end').val();
                    data.verifikator        = $('#verifikator').val();
                    data.spk                = $('#spk').val();
                }
            },
            "columnDefs"    : [{
                "targets"       : [0,13],
                "orderable"     : false
            }]
        })

        var tabel_non_potensial = $('#tabel_non_potensial').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("c_data/tampil_data_non_potensial/$syariah") ?>",
                "type"  : "POST",
                "data"  : function (data) {
                    data.asuransi           = $('#asuransi').val();
                    data.cabang_asuransi    = $('#cabang_asuransi').val();
                    data.bank               = $('#bank').val();
                    data.cabang_bank        = $('#cabang_bank').val();
                    data.capem_bank         = $('#capem_bank').val();
                    data.tanggal_awal       = $('#start').val();
                    data.tanggal_akhir      = $('#end').val();
                    data.verifikator        = $('#verifikator').val();
                    data.spk                = $('#spk').val();
                }
            },
            "columnDefs"    : [{
                "targets"       : [0,12],
                "orderable"     : false
            }]
        })

        // aksi filter data
        $('#filter').click(function () {
            tabel_potensial.ajax.reload(null, false);            
            tabel_non_potensial.ajax.reload(null, false);            
        })

        // aksi reset data filter
        $('#reset').click(function () {
            $('#asuransi').select2("val", 'a');
            $('#cabang_asuransi').select2("val",'a');
            $('#bank').select2("val",'a');
            $('#cabang_bank').select2("val",'a');
            $('#capem_bank').select2("val",'a');
            $('#verifikator').select2("val",'a');
            $('#spk').select2("val",'a');
            $('#date-range-2 input').datepicker('setDate', null);
            tabel_potensial.ajax.reload(null, false);
            tabel_non_potensial.ajax.reload(null, false);
        })

        // untuk unduh excel 
        // $('#unduh_data').on('submit',function () {

        //     var asuransi           = $('#asuransi').val();
        //     var cabang_asuransi    = $('#cabang_asuransi').val();
        //     var bank               = $('#bank').val();
        //     var cabang_bank        = $('#cabang_bank').val();
        //     var capem_bank         = $('#capem_bank').val();
        //     var tanggal_awal       = $('#tanggal').val();
        //     var tanggal_akhir      = $('#tanggal2').val();

        //     $.ajax({

        //         url     : "<?= base_url("c_data/unduh_data/$status/$syariah") ?>",
        //         type    : "POST",
        //         beforeSend  : function () {
        //             swal({
        //                 title   : 'Menunggu',
        //                 html    : 'Memproses data',
        //                 onOpen  : () => {
        //                     swal.showLoading();
        //                 }
        //             })
        //         },
        //         data        : {asuransi:asuransi, cabang_asuransi:cabang_asuransi, bank:bank, cabang_bank:cabang_bank, capem_bank:capem_bank, tanggal_awal:tanggal_awal, tanggal_akhir:tanggal_akhir},
        //         success     : function (data) {
        //             swal.close();
                   
        //            $('#print').html(data);

        //         //    location.reload();
        //         }

        //     }) 
            
        // })

        // menampilkan modal detail dokumen aset
        $('#tabel_potensial').on('click', '.det-aset', function () {

            var id_debitur      = $(this).data('id');
            var id_tr_pot       = $(this).attr('id_tr_pot');

            console.log(id_tr_pot);

            $.ajax({
                url         : "<?= base_url('c_data/form_detail_dok_aset') ?>",
                type        : "POST",
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses Data',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                data        : {id_debitur:id_debitur, id_tr_pot:id_tr_pot},
                success     : function (data) {
                    swal.close();

                    $('#modal_det_aset').modal('show');
                    $('#isi_dok_aset').html(data);

                }
            })

            return false;

        })

        $('#tambah_lagi').on('click', function () {

            $('#modal_det_aset_2').modal('show');

        })

        $('#tabel_non_potensial').on('click', '.ubah-potensial', function () {
            
            $('#modal_ubah_potensial').modal('show');

            var id_deb   = $(this).attr('id_deb');

            var id_tr_np = $(this).attr('tr_np');

            $('#id_debitur').val(id_deb);
            $('#id_tr_np').val(id_tr_np);

        })

        $('#buat_potensial').on('click', function () {
            
            var komitmen    = $('#komitmen').val();
            var tgl         = $('#tgl').val();
            var nominal     = $('#nominal').val();
            var id_debitur  = $('#id_debitur').val();
            var id_tr_np    = $('#id_tr_np').val();

            if (komitmen == 'a') {
                
                swal(
                    'Peringatan',
                    'Komitmen Harus Terisi',
                    'warning'
                )

                return false;

            } else if (nominal == '') {
                
                swal(
                    'Peringatan',
                    'Nominal Harus Terisi',
                    'warning'
                )

                return false;

            } else {

                swal({
                    title       : 'Konfirmasi',
                    text        : 'Ubah debitur menjadi debitur potensial?',
                    type        : 'warning',

                    showCancelButton    : true,
                    confirmButtonText   : 'Ya',
                    confirmButtonColor  : '#3085d6',
                    cancelButtonColor   : '#d33',
                    cancelButtonText    : 'Batal',
                    reverseButtons      : true
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            url         : "<?= base_url('c_data/proses_ubah_kembali') ?>",
                            method      : "POST",
                            beforeSend  : function () {
                                swal({
                                    title   : 'Menunggu',
                                    html    : 'Memproses Data',
                                    onOpen  : () => {
                                        swal.showLoading();
                                    }
                                })
                            },
                            data        : {komitmen:komitmen, nominal:nominal, tgl:tgl, id_deb:id_debitur, id_tr_np:id_tr_np},
                            success     : function (data) {
                                tabel_potensial.ajax.reload(null, false);
                                tabel_non_potensial.ajax.reload(null, false);

                                $('#modal_ubah_potensial').modal('hide');

                                swal(
                                    'Ubah Debitur Potensial',
                                    'Data Berhasil Disimpan',
                                    'success'
                                )

                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;

                    } else if (result.dismiss === swal.DismissReason.cancel) {
                        swal(
                            'Batal',
                            'Anda membatalkan ubah debitur potensial',
                            'error'
                        )
                    }
                })

                return false;

            }

        })

        $('#tabel_potensial').on('click', '.ubah-kembali1', function () {
            var id_tr_np = $(this).attr('tr_np');
            var id_deb   = $(this).attr('id_deb');

            swal({
                title       : 'Konfirmasi',
                text        : 'Ubah debitur menjadi debitur potensial?',
                type        : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Ya',
                confirmButtonColor  : '#3085d6',
                cancelButtonColor   : '#d33',
                cancelButtonText    : 'Batal',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('c_data/proses_ubah_kembali') ?>",
                        method      : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses Data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                        },
                        data        : {id_tr_np:id_tr_np, id_deb:id_deb},
                        success     : function (data) {
                            tabel_potensial.ajax.reload(null, false);
                            tabel_non_potensial.ajax.reload(null, false);

                            swal(
                                'Ubah Kembali Data',
                                'Data Berhasil Disimpan',
                                'success'
                            )

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;

                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan ubah status kembali data',
                        'error'
                    )
                }
            })

            return false;

        })

        $('#tabel_potensial').on('click', '.ubah-ots', function () {

            var id_tr_potensial = $(this).data('id');
            var id_debitur      = $(this).attr('id_deb');

            swal({
                title       : 'Konfirmasi',
                text        : 'Yakin akan kirim data',
                type        : 'warning',

                showCancelButton    : true,
                confirmButtonText   : 'Kirim Data',
                confirmButtonColor  : '#3085d6',
                cancelButtonColor   : '#d33',
                cancelButtonText    : 'Batal',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('c_data/proses_ubah_ots') ?>",
                        method      : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses Data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                        },
                        data        : {id_tr_potensial:id_tr_potensial, id_debitur:id_debitur},
                        success     : function (data) {
                            tabel_potensial.ajax.reload(null, false);
                            tabel_non_potensial.ajax.reload(null, false);

                            swal(
                                'Ubah Status OTS',
                                'Data Berhasil Disimpan',
                                'success'
                            )

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;

                } else if (result.dismiss === swal.DismissReason.cancel) {
                    swal(
                        'Batal',
                        'Anda membatalkan ubah OTS',
                        'error'
                    )
                }
            })

            return false;
            
        })

        //////////

        $('#loading_cab_as').hide();
        $('#loading_cab_bank').hide();
        $('#loading_cap_bank').hide();

        $('#asuransi').on('change', function () {
            var id_asuransi = $("#asuransi").val();

            $('#cabang_asuransi').next('.select2-container').hide();
            $('#loading_cab_as').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_cabang_asuransi') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_asuransi:id_asuransi},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cab_as').hide();
                    $('#cabang_asuransi').next('.select2-container').show();
                    $('#cabang_asuransi').html(data.cabang_as);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        $('#bank').change(function () {
            var id_bank = $(this).find('option:selected').val();

            $('#cabang_bank').next('.select2-container').hide();
            $('#loading_cab_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_cabang_bank') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_bank:id_bank},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cab_bank').hide();
                    $('#cabang_bank').next('.select2-container').show();
                    $('#cabang_bank').html(data.cabang_bank);

                    $('#capem_bank').html(data.option1);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        // mencari capem bank
        $('#cabang_bank').change(function () {
            var id_cabang_bank = $(this).find('option:selected').val();

            $('#capem_bank').next('.select2-container').hide();
            $('#loading_cap_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_capem_bank') ?>",
                type        : "POST",
                beforeSend  : function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }
                },
                data        : {id_cabang_bank:id_cabang_bank},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cap_bank').hide();
                    $('#capem_bank').next('.select2-container').show();
                    $('#capem_bank').html(data.capem_bank);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        $('#loading_ver').hide();

        // mencari verfikator
        $('#capem_bank').change(function () {
            var id_capem_bank = $(this).find('option:selected').val();

            $('#verifikator').next('.select2-container').hide();
            $('#loading_ver').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_verifikator') ?>",
                type        : "POST",
                beforeSend  : function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }
                },
                data        : {id_capem_bank:id_capem_bank},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_ver').hide();
                    $('#verifikator').next('.select2-container').show();
                    $('#verifikator').html(data.ver);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
            
        })
        
    })
    
</script>