<style>
    #tabel_ots tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">On The Spot</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">On The Spot</li>
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
                <form action="<?= base_url('manager/unduh_excel_validasi_agunan') ?>" method="post">
                    <div class="card-body">
                        <div class="row">
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
                                    <div class="col-md-3">
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
                            <div class="col-md-4"></div>
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
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="col-md-12" align="right">
                            <button class="btn btn-success mr-2" id="filter" type="button">Tampilkan</button>
                            <button class="btn btn-warning mr-2" id="reset" type="button">Reset</button>
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
                    <h4 class="mb-0 text-white">List Validasi Data Agunan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_ots">
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
                                <th>Tanggal OTS</th>
                                <th>Verifikator</th>
                                <th width="8%">Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $(document).ready(function () {


        var tabel_ots = $('#tabel_ots').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_data_ots_2/") ?>",
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
                "targets"       : [0, 8],
                "orderable"     : false
            }]
        })

        // aksi filter data
        $('#filter').click(function () {
            tabel_ots.ajax.reload(null, false);            
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
            tabel_ots.ajax.reload(null, false);
        })

        ///////////////////////////////// 

        ///////////

        $('#tabel_ots').on('click', '.ubah-kembali', function () {
            var id_tr_p  = $(this).attr('tr_p');
            var id_deb   = $(this).attr('id_deb');

            swal({
                title       : 'Konfirmasi',
                text        : 'Yakin akan kembalikan data?',
                type        : 'warning',

                buttonsStyling      : false,
                confirmButtonClass  : "btn btn-info",
                cancelButtonClass   : "btn btn-danger mr-3",

                showCancelButton    : true,
                confirmButtonText   : 'Ya, kembalikan data',
                confirmButtonColor  : '#3085d6',
                cancelButtonColor   : '#d33',
                cancelButtonText    : 'Tidak',
                reverseButtons      : true
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        url         : "<?= base_url('manager/proses_ubah_kembali') ?>",
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
                        data        : {id_tr_p:id_tr_p, id_deb:id_deb},
                        success     : function (data) {
                            tabel_ots.ajax.reload(null, false);

                            swal({
                                title               : 'Berhasil',
                                text                : 'Data berhasil dikembalikan',
                                type                : 'success',
                                showConfirmButton   : false,
                                timer               : 1000
                            });

                        },
                        error       : function(xhr, status, error) {
                            var err = eval("(" + xhr.responseText + ")");
                            alert(err.Message);
                        }

                    })

                    return false;

                } else if (result.dismiss === swal.DismissReason.cancel) {

                    swal({
                        title               : 'Berhasil',
                        text                : 'Anda membatalkan kembalikan data',
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    });
                    
                }
            })

            return false;

        })
        
        ////////////////////////////////

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