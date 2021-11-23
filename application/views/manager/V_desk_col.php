<style>
    #tabel_desk_col tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Desk Collection</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Desk Collection</li>
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
                    <h4 class="mb-0 text-white">Filter Data</h4></div>
                <form action="<?= base_url("manager/unduh_data_dc/$syariah") ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <!-- <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="mt-2">Periode</label>
                                </div>
                                <div class="col-md-8">
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
                        <div class="col-md-4"></div> -->
                        <div class="form-group col-md-4">
                            <div class="row">
                                <div class="col-md-3  ">
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
                                        <option value="null">No SPK</option>
                                    </select>
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

    <div class="row">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">Data Desk Collection</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_desk_col" width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Deal Reff</th>
                                <th>No Klaim</th>
                                <th>Nama Debitur</th>
                                <th>No Telp</th>
                                <th>Last Call</th>
                                <th>FU</th>
                                <th>Status Tindakan</th>
                                <th>Bank</th>
                                <th>Cabang Bank</th>
                                <th>Capem Bank</th>
                                <th>Kartu Debitur</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- modal tasklist kunjungan -->
<div id="modal_tambah_tl" class="modal fade border-info" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul">Tambah Tasklist Kunjungan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" style="color: white;">×</button>
            </div>
            <form id="form_tambah_tl" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="tanggal_4" class="control-label col-form-label">Tanggal Expired</label>
                                <div class="input-group ">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <span class="ti-calendar"></span>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control pull-right tanggal" name="tanggal" placeholder="Masukkan Tanggal Expired" id="tanggal_exp" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" id="simpan_tl">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<div id="modal_aksi_call" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul">Aksi Call Debitur</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_call_debitur">
                <div class="modal-body">
                    <div class="row justify-content-md-center">
                        <div class="col-md-4">
                            <div class="form-check">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="follow_up" name="aksi_call" value="1">
                                    <label class="custom-control-label" for="follow_up">Follow Up</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="tindakan_hukum" name="aksi_call" value="3">
                                    <label class="custom-control-label" for="tindakan_hukum">Tindakan Hukum</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-check">
                                <div class="custom-control custom-radio">
                                    <input type="radio" class="custom-control-input" id="eksekusi_aset" name="aksi_call" value="2">
                                    <label class="custom-control-label" for="eksekusi_aset">Eksekusi Aset</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" id="simpan">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal follow up -->
<div id="modal_follow_up" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="vcenter">Follow Up</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form id="form_follow_up" autocomplete="off">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <label for="tindakan">Tindakan</label>
                            <select class="select2 form-control custom-select" name="tindakan" id="tindakan" style="width: 100%; height:36px;">  
                                <option value="a">-- Pilih Tindakan --</option>
                                <?php foreach ($tindakan as $a): ?>
                                    <option value="<?= $a['id_tindakan_fu'] ?>"><?= $a['tindakan_fu'] ?></option>
                                <?php endforeach;?>
                            </select>
                        </div>
                        <div class="col-md-12 mt-3">
                            <label for="proses">Proses</label>
                            <select class="select2 form-control custom-select" name="proses" id="proses" style="width: 100%; height:36px;">  
                                <option value="a">-- Pilih Proses --</option>
                                
                            </select>
                            <div id="loading_proses" style="margin-top: 10px;" align='center'>
                                <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                            </div>
                            <input type="hidden" id="id_tr_pot">
                            <input type="hidden" id="id_deb">
                            <input type="hidden" id="jenis">
                        </div>

                        <hr>

                        <div id="loading_form" style="margin-top: 10px;" align='center'>
                            <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                        </div>
                        
                        <div class="col-md-12 mt-3" id="form_1">

                            <div class="row">
                                <div class="col-12">
                                    <label for="">Tanggal Janji Bayar</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="ti-calendar"></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control pull-right tgl_janji_byr1" name="tgl_janji_byr" placeholder="Tanggal Janji bayar" id="tanggal_3">
                                    </div>
                                </div>
                                <div class="col-12 mt-3">
                                    <label>Nominal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                                        </div>
                                        <input type="text" id="nominal1" class="form-control separator nominal" placeholder="Masukkan Nominal">
                                    </div>
                                </div>
                            </div>
                        
                            
                        </div>

                        <div class="col-md-12 mt-3" id="form_2">

                            <div class="row">
                                <div class="col-12">
                                    <label>Tanggal Janji Bayar</label>
                                    <div class="input-group ">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <span class="ti-calendar"></span>
                                            </span>
                                        </div>
                                        <input type="text" class="form-control pull-right tgl_janji_byr2" name="tgl_janji_byr2" placeholder="Tanggal Janji bayar" id="tanggal_4">
                                    </div>
                                </div>
                            </div>
                        
                            <div class="row mt-3">
                                <div class="col-12">
                                    <label>Nominal</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">Rp. </span>
                                        </div>
                                        <input type="text" id="nominal2" class="form-control separator" placeholder="Masukkan Nominal">
                                    </div>
                                </div>
                            </div>

                            <div class="row mt-3">
                                <div class="col-12">
                                    <label>Termin</label>
                                    <div class="input-group">
                                        <input type="number" id="termin" class="form-control" placeholder="Masukkan Termin">
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info waves-effect" id="simpan_fu">Simpan</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

    $(document).ready(function () {

        $('.separator').divide({
        delimiter: '.',
        divideThousand: true, // 1,000..9,999
        delimiterRegExp: /[\.\,\s]/g
        });

        $('.separator').keypress(function(event) {
        if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
            event.preventDefault();
        }
        });

        var tabel_desk_col = $('#tabel_desk_col').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_desk_col/$syariah") ?>",
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
                "targets"       : [0,5,6,7,11,12],
                "orderable"     : false
            }]

        })
        
        // aksi filter data
        $('#filter').click(function () {
            tabel_desk_col.ajax.reload(null, false);            
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
            tabel_desk_col.ajax.reload(null, false);
        })

        // aksi menampilkan tasklist kunjungan
        $('#tabel_desk_col').on('click', '.tl_kunjungan', function () {

            var id_debitur  = $(this).data('id');

            $('#tanggal_exp').val('');
            
            $('#modal_tambah_tl').modal('show');

            $('#simpan_tl').on('click', function () {
                var tanggal_exp = $('#tanggal_exp').val();

                $.ajax({
                    url         : "<?= base_url('manager/simpan_tl_kunjungan') ?>",
                    type        : "POST",
                    beforeSend  : function () {
                        swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                    },
                    data       : {id_debitur:id_debitur, tanggal_exp:tanggal_exp},
                    success    : function (data) {
                        tabel_desk_col.ajax.reload(null, false);

                        swal(
                            'Tambah Tasklist Kunjungan',
                            'Menambahkan tasklist kunjungan berhasil',
                            'success'
                        )
                        
                        $('#modal_tambah_tl').modal('hide');
                    }
                })
            })

        })

        $('#simpan_fu').on('click', function () {

            var id_proses_fu    = $('#proses').val();
            var id_tindakan     = $('#tindakan').val();
            var tgl_janji_byr1  = $('.tgl_janji_byr1').val();
            var tgl_janji_byr2  = $('.tgl_janji_byr2').val();
            var nominal1        = $('#nominal1').val();
            var nominal2        = $('#nominal2').val();
            var termin          = $('#termin').val();
            var id_debitur      = $('#id_deb').val();
            var id_tr_p         = $('#id_tr_pot').val();
            var jenis           = $('#jenis').val();

            $.ajax({
                url     : "<?= base_url('manager/input_fu/1') ?>",
                type    : "POST",
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses data',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                data    : {id_tr_p:id_tr_p, id_debitur:id_debitur, tgl_janji_byr1:tgl_janji_byr1, tgl_janji_byr2:tgl_janji_byr2, id_tindakan:id_tindakan, id_proses:id_proses_fu, nominal1:nominal1, nominal2:nominal2, termin:termin, jenis:jenis},
                success : function (data) {
                    tabel_desk_col.ajax.reload(null, false);
                    
                    swal(
                        'Tambah FU',
                        'Berhasil tambah FU',
                        'success'
                    )

                    $('#modal_follow_up').modal('hide');
                }
            })
            
            return false;                                    

        })

        //////

        $('#form_1').hide();
        $('#form_2').hide();
        $('#loading_form').hide();
        $('#simpan_fu').hide();
        
        // modal aksi call debitur
        $('#tabel_desk_col').on('click', '.aksi-call-debitur', function () {
            var id_debitur  = $(this).attr('id_deb');
            var id_tr_p     = $(this).attr('id_tr_p');

            $('#id_deb').val(id_debitur);
            $('#id_tr_pot').val(id_tr_p);

            $('input[name="aksi_call"]').prop('checked', false);

            $('#modal_aksi_call').modal('show');

        })

        $('#simpan').on('click', function () {
            var aksi_call       = $("input[name=aksi_call]:checked").val();
            var id_debitur      = $('#id_deb').val();
            var id_tr_p         = $('#id_tr_pot').val();
            
            console.log(aksi_call);

            if (aksi_call == null) {
                swal(
                    'Peringatan',
                    'Isi dahulu aksi call',
                    'warning'
                )

                return false;
            } else {

                if (aksi_call == 1) {
                    $('#modal_aksi_call').modal('hide');
                    $('#modal_follow_up').modal('show');
                    
                    $('#proses').on('change', function () {

                        var id_proses_fu    = $(this).val();
                        var nama_proses     = $(this).find('option:selected').attr("data");
                        var id_tindakan     = $('#tindakan').val();
                        var tgl_janji_byr1  = $('.tgl_janji_byr1').val();
                        var tgl_janji_byr2  = $('.tgl_janji_byr2').val();
                        var nominal1        = $('#nominal1').val();
                        var nominal2        = $('#nominal2').val();
                        var termin          = $('#termin').val();
                        var id_debitur      = $('#id_deb').val();
                        var id_tr_p         = $('#id_tr_pot').val();

                        //$('#loading_form').show();
                        
                        if (nama_proses == 'Penagihan Rutin' || nama_proses == 'Pembayaran Insidentil' || nama_proses == 'Pelunasan') {
                            
                            $('#form_1').show();
                            $('#form_2').hide();
                            $('#simpan_fu').show();
                            $('#jenis').val(1);

                            return false;
                            
                        } else if (nama_proses == 'Angsuran' && id_tindakan == 2) {
                            
                                $('#form_1').hide();
                                $('#form_2').show();
                                $('#simpan_fu').show();
                                $('#jenis').val(2);

                                return false;

                        } else {
                            $('#form_1').hide();
                            $('#form_2').hide();
                            $('#simpan_fu').show();
                            $('#jenis').val(3);

                            return false;
                            
                        }
            
                    })

                } else {

                    $.ajax({
                        url     : "<?= base_url('manager/ubah_aksi_call/') ?>",
                        type    : "POST",
                        beforeSend  : function () {
                            swal({
                                title   : 'Menunggu',
                                html    : 'Memproses data',
                                onOpen  : () => {
                                    swal.showLoading();
                                }
                            })
                        },
                        data    : {id_debitur:id_debitur,id_tr_p:id_tr_p,aksi_call:aksi_call},
                        success : function (data) {
                            swal.close();

                            tabel_desk_col.ajax.reload(null, false);

                            swal(
                                'Ubah Aksi Call',
                                'Data Berhasil Disimpan',
                                'success'
                            )

                            $('#modal_aksi_call').modal('hide');
                        }
                    })

                    return false;
                }

            }

        })

        $('#loading_proses').hide(); 
        

        $('#tindakan').on('change', function () {
            var id_tindakan = $("#tindakan").val();

            $('#form_1').hide();
            $('#form_2').hide();
            $('#simpan_fu').hide();

            $('#proses').next('.select2-container').hide();
            $('#loading_proses').show();

            $.ajax({
                url         : "<?= base_url('manager/ambil_proses_fu') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_tindakan:id_tindakan},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_proses').hide();
                    $('#proses').next('.select2-container').show();
                    $('#proses').html(data.proses_fu);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })


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