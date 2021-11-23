<style>
    #tbl_debitur_ver tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }     
</style>

<!-- filter -->
<div class="row">
    <div class="col-12">
        <div class="card border-info shadow">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Filter Data</h4></div>
            <form action="<?= base_url("kunjungan/unduh_excel") ?>" method="POST">
            <div class="card-body">
                <input type="hidden" id="id_karyawan" name="verifikator" value="<?= $id_karyawan ?>">
                <div class="row">
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
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12" align="right">
                    <button class="btn btn-success" id="cari_det" type="button">Tampilkan</button><?= nbs(3) ?>
                    <button class="btn btn-warning" id="reset_det" type="button">Reset</button><?= nbs(3) ?>
                    <button class="btn btn-info" id="unduh" type="submit">Unduh Excel</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>

<!-- tabel debitur -->
<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">List Kunjungan</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="tbl_debitur_ver" width="100%">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Deal Reff</th>
                            <th>Debitur</th>
                            <th>Capem Bank</th>
                            <th>Cabang Asuransi</th>
                            <th>SHS</th>
                            <th>PIC</th>
                            <th>Status Hubungan</th>
                            <th>Status Potensial</th>
                            <th>Status OTS</th>
                            <th>Keterangan</th>
                            <th>Tanggal OTS</th>
                            <th>Tanggal Prioritas</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Select2 -->
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.full.min.js"></script>
<script src="<?= base_url() ?>template/assets/libs/select2/dist/js/select2.min.js"></script>
<script src="<?= base_url() ?>template/dist/js/pages/forms/select2/select2.init.js"></script>
<!-- sweet alert -->
<script src="<?= base_url() ?>template/assets/swa/sweetalert2.all.min.js"></script>

<script>

    jQuery('#date-range-2').datepicker({
        toggleActive: true,
        orientation : "bottom",
        autoclose   : true,
        format      : "dd-MM-yyyy"
    });

$(document).ready(function () {

    // load datatables
    var tbl_debitur_ver = $('#tbl_debitur_ver').DataTable({

        "processing"    : true,
        "serverSide"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("kunjungan/tampil_debitur_ver") ?>",
            "type"  : "POST",
            "data"  : function (data) {
                data.asuransi           = $('#asuransi').val();
                data.cabang_asuransi    = $('#cabang_asuransi').val();
                data.bank               = $('#bank').val();
                data.cabang_bank        = $('#cabang_bank').val();
                data.capem_bank         = $('#capem_bank').val();
                data.tanggal_awal       = $('#start').val();
                data.tanggal_akhir      = $('#end').val();
                data.verifikator        = $('#id_karyawan').val();
                data.spk                = $('#spk').val();
            }
        },
        "columnDefs"    : [{
            "targets"       : [0,5,6,7,10],
            "orderable"     : false
        }]
    })

    // aksi filter data
    $('#cari_det').click(function () {
        tbl_debitur_ver.ajax.reload(null, false);            
    })

    // aksi reset data filter
    $('#reset_det').click(function () {

        $('#asuransi').select2("val", 'a');
        $('#cabang_asuransi').select2("val",'a');
        $('#bank').select2("val",'a');
        $('#cabang_bank').select2("val",'a');
        $('#capem_bank').select2("val",'a');
        $('#verifikator').select2("val",'a');
        $('#spk').select2("val",'a');
        $('#date-range-2 input').datepicker('setDate', null);

        tbl_debitur_ver.ajax.reload(null, false);
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

    // $('#loading_deb').hide();

    // // mencari verfikator
    // $('#capem_bank').change(function () {
    //     var id_capem_bank   = $(this).find('option:selected').val();
    //     var id_karyawan     = $('#id_karyawan').val();

    //     $('#debitur').next('.select2-container').hide();
    //     $('#loading_deb').show();

    //     $.ajax({
    //         url         : "<?= base_url('kunjungan/ambil_deb') ?>",
    //         type        : "POST",
    //         beforeSend  : function (e) {
    //             if (e && e.overrideMimeType) {
    //                 e.overrideMimeType("application/json;charshet=UTF-8");
    //             }
    //         },
    //         data        : {id_capem_bank:id_capem_bank, id_karyawan:id_karyawan},
    //         dataType    : "JSON",
    //         success     : function (data) {
    //             $('#loading_deb').hide();
    //             $('#debitur').next('.select2-container').show();
    //             $('#debitur').html(data.deb);
    //         },
    //         error 		: function (xhr, ajaxOptions, thrownError) {
    //             alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
    //         }
    //     })
        
    // })
    
})

</script>