<style>
    #tabel_kelolaan tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
    #tabel_tambah_kelolaan tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
    input[type=checkbox] {
        transform: scale(1.4);
    }
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">List Kelolaan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('manager/list_kelolaan') ?>">Kelolaan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List Kelolaan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row filter">
        <div class="col-12">
            <div class="card border-info shadow">
                <div class="card-header bg-info">
					<h4 class="mb-0 text-white">Filter Data</h4></div>
                <div class="card-body">
                    <div class="row">

                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                    <label class="mt-2">Verifikator</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="verifikator1" id="verifikator1" style="width: 100%; height:36px;">  
                                        <option value="a">-- Semua --</option>
                                        <?php foreach ($verifikator as $b): ?>
                                            <option value="<?= $b['id_karyawan'] ?>"><?= $b['nama_lengkap'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                    <label class="mt-2">Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="bank" id="bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Semua --</option>
                                        <?php foreach ($bank as $b): ?>
                                            <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                    <div id="loading_bank" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                    <label class="mt-2">Cabang Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="cabang_bank" id="cabang_bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Semua --</option>
                                        <?php foreach ($cabang_bank as $b): ?>
                                            <option value="<?= $b['id_cabang_bank'] ?>"><?= $b['cabang_bank'] ?></option>
                                        <?php endforeach;?>

                                    </select>
                                    <div id="loading_cab_bank" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                    <label class="mt-2">Capem Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="capem_bank" id="capem_bank" style="width: 100%; height:36px;">  
                                        <option value="a">-- Semua --</option>
                                        <?php foreach ($capem_bank as $b): ?>
                                            <option value="<?= $b['id_capem_bank'] ?>"><?= $b['capem_bank'] ?></option>
                                        <?php endforeach;?>

                                    </select>
                                    <div id="loading_cap_bank" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="card-footer">
                <div class="col-md-12" align="right">
						<button class="btn btn-success" id="filter">Tampilkan</button><?= nbs(3) ?>
						<button class="btn btn-warning" id="reset">Reset</button>
					</div>
                </div>
            </div>
        </div>
    </div>

    <div class="row list">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <button type="button" class="btn btn-warning float-right" id="tambah_kelolaan">Tambah Data</button>
                    <h4 class="mb-0 text-white">Data List Kelolaan</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_kelolaan"  width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Bank</th>
                                <th>Cabang Bank</th>
                                <th>Capem Bank</th>
                                <th>Verifikator</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row" id="form_tambah_kel" hidden>
        <div class="col-12">
            <div class="card border-info shadow">
                <div class="card-header bg-info">
					<h4 class="mb-0 text-white">Tambah Kelolaan</h4></div>
                <div class="card-body table-responsive">
                    
                    <div class="form-group row">
                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                    <label class="mt-2">Verifikator</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="verifikator" id="verifikator" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Verifikator --</option>
                                        <?php foreach ($verifikator as $b): ?>
                                            <option value="<?= $b['id_karyawan'] ?>"><?= $b['nama_lengkap'] ?></option>
                                        <?php endforeach;?>
                                        
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                <label class="mt-2">Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="bank2" id="bank2" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Bank --</option>
                                        <?php foreach ($bank as $b): ?>
                                            <option value="<?= $b['id_bank'] ?>"><?= $b['bank'] ?></option>
                                        <?php endforeach;?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3">
                            <div class="row">
                                <div class="col-md-3 text-right ">
                                <label class="mt-2">Cabang Bank</label>
                                </div>
                                <div class="col-md-9">
                                    <select class="select2 form-control custom-select" name="cabang_bank2" id="cabang_bank2" style="width: 100%; height:36px;">  
                                        <option value="a">-- Pilih Cabang Bank --</option>
                                        
                                    </select>
                                    <div id="loading_cab_bank2" style="margin-top: 10px;" align='center'>
                                        <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-3" align='center'>
                                <button class="btn btn-warning mb-4" id="reset2">Reset</button>
                        </div>
                        
                    </div> 
                    
                </div>

            </div>

            <div class="card shadow">
                <div class="card-body">
                    <table class="table table-bordered table-hover mt-4" id="tabel_tambah_kelolaan" width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Check</th>
                                <th>Cabang Bank</th>
                                <th>Capem Bank</th>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="col-md-12" align="right">
						<button class="btn btn-success" id="simpan_pilih_kelolaan" type="button">Simpan</button>
					</div>
                </div>
            </div>
        </div>

    </div>

    <div class="align-items-center col-md-2" id="kembali" hidden>
        <button class="btn btn-warning btn-round ml-auto">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </button>
    </div>
    
</div>


<!-- modal detail kelolaan -->
<div id="modal_deb_kelolaan_ver" class="modal fade border-info" tabindex="-1" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content" id="detail_deb">
            
        </div>
        <!-- /.modal-content -->
    </div>
</div>

<!-- modal edit kelolaan -->
<div id="modal_edit_kelolaan_ver" class="modal fade border-info" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content" id="edit_kel">
            
        </div>
        <!-- /.modal-content -->
    </div>
</div>


<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

    $(document).ready(function () {

        var tabel_kelolaan = $('#tabel_kelolaan').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_list_kelolaan/") ?>",
                "type"  : "POST",
                "data"  : function (data) {
                    // data.asuransi           = $('#asuransi').val();
                    // data.cabang_asuransi    = $('#cabang_asuransi').val();
                    // data.bank               = $('#bank').val();
                    // data.cabang_bank        = $('#cabang_bank').val();
                    // data.capem_bank         = $('#capem_bank').val();
                    // data.tanggal_awal       = $('#tanggal').val();
                    // data.tanggal_akhir      = $('#tanggal2').val();
                    data.bank               = $('#bank').val();
                    data.cabang_bank        = $('#cabang_bank').val();
                    data.capem_bank         = $('#capem_bank').val();
                    data.verifikator        = $('#verifikator1').val();
                }
            },
            "columnDefs"    : [{
                    "targets"       : [0],
                    "orderable"     : false
                }]
        })

        // aksi filter data
        $('#filter').click(function () {
            tabel_kelolaan.ajax.reload(null, false);            
        })

        // aksi reset data filter
        $('#reset').click(function () {
            // $('#asuransi').select2("val", 'a');
            // $('#cabang_asuransi').select2("val",'a');
            $('#bank').select2("val",'a');
            $('#cabang_bank').select2("val",'a');
            $('#capem_bank').select2("val",'a');
            $('#verifikator1').select2("val",'a');
            // $('#tanggal').val('');
            // $('#tanggal2').val('');
            tabel_kelolaan.ajax.reload(null, false);
        })

        var tabel_tambah_kelolaan = $('#tabel_tambah_kelolaan').DataTable({
            "processing"    : true,
            stateSave       : true,
            "ajax"          : {
                "url"   : "<?= base_url('manager/tampil_capem_bank') ?>",
                "type"  : "POST",
                "data"  : function (data) {
                    data.cabang_bank = $('#cabang_bank2').val();
                }
            },
            "order"         : [],
            "columnDefs"    : [{
                "targets"       : [0],
                "orderable"     : false
            }]
        })

        // aksi filter data
        $('#cabang_bank2').on('change', function () {
            tabel_tambah_kelolaan.ajax.reload(null, false);            
        })

        $('#reset2').click(function () {
            $('#bank2').select2("val",'a');
            $('#cabang_bank2').select2("val",'a');
            $('#verifikator').select2("val",'a')
            tabel_tambah_kelolaan.ajax.reload(null, false); 
        })

        // edit kelolaan verifikator
        $('#tabel_kelolaan').on('click', '.edit-kelolaan', function () {
            var id_karyawan     = $(this).attr('id_kar');
            var id_capem        = $(this).attr('id_capem');
            var id_penempatan   = $(this).attr('id_penempatan');

            $.ajax({
                url         : "<?= base_url('manager/form_edit_kelolaan_ver') ?>",
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
                data        : {id_karyawan:id_karyawan, id_capem_bank:id_capem, id_penempatan:id_penempatan},
                success     : function (data) {
                    swal.close();

                    $('#modal_edit_kelolaan_ver').modal('show');
                    $('#edit_kel').html(data);

                    // proses edit perubahan kelolaan verfikator
                    $('#simpan_kel_ver').on('click', function () {

                        var id_penempatan   = $('#id_penempatan_ver').val();
                        var id_bank         = $('#bank_ver').val();
                        var id_cabang       = $('#cabang_bank_ver').val();
                        var id_capem        = $('#capem_bank_ver').val();

                        console.log(id_penempatan);

                        if (id_bank == 'a') {
                            swal(
                                'Peringatan',
                                'Data Bank Harus Terisi Dahulu',
                                'warning'
                            )

                            return false;

                        } else if(id_cabang == 'a') {
                            swal(
                                'Peringatan',
                                'Data Cabang Harus Terisi Dahulu',
                                'warning'
                            )

                            return false;

                        } else if(id_capem == 'a') {
                            swal(
                                'Peringatan',
                                'Data Capem Harus Terisi Dahulu',
                                'warning'
                            )

                            return false;

                        } else if(id_capem == 'b') {
                            swal(
                                'Peringatan',
                                'Data Capem sama dengan sebelumnya',
                                'warning'
                            )

                            return false;

                        } else {

                            $.ajax({
                                url         : "<?= base_url('manager/proses_edit_kelolaan') ?>",
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
                                data        : {id_penempatan:id_penempatan, id_bank:id_bank, id_cabang:id_cabang, id_capem:id_capem},
                                success     : function (data) {
                                    tabel_kelolaan.ajax.reload(null, false);

                                    swal(
                                        'Berhasil',
                                        'Anda berhasil melakukan perubahan data',
                                        'success'
                                    )

                                    $('#modal_edit_kelolaan_ver').modal('hide');
                                }
                            })

                            return false;

                        }

                        
                    })
                }
            })

        })

        $('#tabel_kelolaan').on('click', '.detail-kelolaan', function () {
            var id_karyawan = $(this).attr('id_kar');
            var id_capem    = $(this).attr('id_capem');

            // console.log(id_karyawan);
            // console.log(id_capem);

            $.ajax({
                url         : "<?= base_url('manager/form_detail_kelolaan_ver') ?>",
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
                data        : {id_karyawan:id_karyawan, id_capem_bank:id_capem},
                success     : function (data) {
                    swal.close();

                    $('#modal_deb_kelolaan_ver').modal('show');
                    $('#detail_deb').html(data);
                }
            })
        })

        // aksi hapus kelolaan
        $('#tabel_kelolaan').on('click', '.hapus-kelolaan', function () {
            var id_karyawan = $(this).attr('id_kar');
            var id_capem    = $(this).attr('id_capem');

            console.log(id_karyawan);

            swal({
              title       : 'Konfirmasi',
              text        : 'Yakin akan hapus data?',
              type        : 'warning',

              buttonsStyling      : false,
              confirmButtonClass  : "btn btn-danger",
              cancelButtonClass   : "btn btn-info mr-3",

              showCancelButton    : true,
              confirmButtonText   : 'Ya, hapus',
              confirmButtonColor  : '#d33',
              cancelButtonColor   : '#3085d6',
              cancelButtonText    : 'Batal',
              reverseButtons      : true
          }).then((result) => {
              if (result.value) {
                  $.ajax({
                      url         : "<?= base_url('Manager/hapus_kelolaan') ?>",
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
                      data        : {id_karyawan:id_karyawan, id_capem:id_capem},
                      dataType    : "JSON",
                      success     : function (data) {

                          tabel_kelolaan.ajax.reload(null, false);

                            swal({
                                title               : 'Hapus Kelolaan',
                                text                : 'Data Berhasil Dihapus',
                                buttonsStyling      : false,
                                confirmButtonClass  : "btn btn-success",
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
                        title               : 'Batal',
                        text                : 'Anda membatalkan hapus kelolaan',
                        type                : 'error',
                        showConfirmButton   : false,
                        timer               : 1000
                    }); 
              }
          })
        })

        $('#tambah_kelolaan').on('click', function () {
            
            $.ajax({
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses halaman',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                success     : function (data) {
                    swal.close();

                    $('.filter').hide();
                    $('.list').hide();

                    $('#form_tambah_kel').removeAttr('hidden');
                    $('#kembali').removeAttr('hidden');

                }
            })

        })

        // kembali
        $('#kembali').on('click', function () {

            $.ajax({
                beforeSend  : function () {
                    swal({
                        title   : 'Menunggu',
                        html    : 'Memproses halaman',
                        onOpen  : () => {
                            swal.showLoading();
                        }
                    })
                },
                success     : function () {
                    swal.close();

                    tabel_kelolaan.ajax.reload(null, false); 

                    $('.filter').show();
                    $('.list').show();

                    $('#form_tambah_kel').attr('hidden', true);
                    $('#kembali').attr('hidden', true);
                }
            })

        })

        // aksi simpan pilih capem
        $('#simpan_pilih_kelolaan').on('click', function () {
            var id_karyawan = $('#verifikator').val();
            var id_bank     = $('#bank2').val();
            var id_cb_bank  = $('#cabang_bank2').val();
            var id_capem    = $('input[name="pilih_capem[]"]:checked').map(function () {
                return this.value;
            }).get();

            if (id_karyawan == 'a' || id_bank == 'a' || id_cb_bank == 'a') {
                swal(
                    'Peringatan',
                    'Semua data harus terisi dahulu',
                    'warning'
                )

                return false;
            } else if (id_capem == "") {
                swal(
                    'Peringatan',
                    'Harap pilih capem dahulu sebelum simpan data',
                    'warning'
                )

                return false;
            } else {
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
                            url         : "<?= base_url('manager/proses_tambah_kelolaan') ?>",
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
                            data        : {id_karyawan:id_karyawan, id_capem:id_capem},
                            success     : function (data) {
                                tabel_tambah_kelolaan.ajax.reload(null, false);

                                swal({
                                    title               : 'Tambah Kelolaan',
                                    text                : 'Data Berhasil Disimpan',
                                    type                : 'success',
                                    showConfirmButton   : false,
                                    timer               : 1000
                                }); 

                                $('#bank2').select2("val",'a');
                                $('#cabang_bank2').select2("val",'a');
                                $('#verifikator').select2("val",'a')
                                tabel_tambah_kelolaan.ajax.reload(null, false); 

                                $('.filter').show();
                                $('.list').show();

                                $('#form_tambah_kel').attr('hidden', true);
                                $('#kembali').attr('hidden', true);
                                tabel_kelolaan.ajax.reload(null, false); 

                            },
                            error       : function(xhr, status, error) {
                                var err = eval("(" + xhr.responseText + ")");
                                alert(err.Message);
                            }

                        })

                        return false;
                    } else if (result.dismiss === swal.DismissReason.cancel) {

                        swal({
                            title               : 'Batal',
                            text                : 'Anda membatalkan tambah kelolaan',
                            type                : 'error',
                            showConfirmButton   : false,
                            timer               : 1000
                        }); 
                    }
                })
            }


            
        })

        $('#loading_cab_as').hide();
        $('#loading_bank').hide();
        $('#loading_cab_bank').hide();
        $('#loading_cap_bank').hide();

        // mencari bank dari verifikator
        $('#verifikator1').on('change', function () {
            var id_karyawan = $(this).val();

            $('#bank').next('.select2-container').hide();
            $('#loading_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_bank_ver') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_karyawan:id_karyawan},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_bank').hide();
                    $('#bank').next('.select2-container').show();
                    $('#bank').html(data.bank);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })


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
            var id_bank     = $(this).find('option:selected').val();
            var id_karyawan = $('#verifikator1').val();

            $('#cabang_bank').next('.select2-container').hide();
            $('#loading_cab_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_cabang_bank_ver') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_bank:id_bank, id_karyawan:id_karyawan},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_cab_bank').hide();
                    $('#cabang_bank').next('.select2-container').show();
                    $('#cabang_bank').html(data.cabang_bank);

                    // $('#capem_bank').html(data.option1);
                    console.log(data.status);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        // mencari capem bank
        $('#cabang_bank').change(function () {
            var id_cabang_bank  = $(this).find('option:selected').val();
            var id_karyawan     = $('#verifikator1').val();

            $('#capem_bank').next('.select2-container').hide();
            $('#loading_cap_bank').show();

            $.ajax({
                url         : "<?= base_url('c_data/ambil_capem_bank_ver') ?>",
                type        : "POST",
                beforeSend  : function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }
                },
                data        : {id_cabang_bank:id_cabang_bank, id_karyawan:id_karyawan},
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

        $('#loading_cab_bank2').hide();

        $('#bank2').change(function () {
            var id_bank = $(this).find('option:selected').val();

            $('#cabang_bank2').next('.select2-container').hide();
            $('#loading_cab_bank2').show();

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
                    $('#loading_cab_bank2').hide();
                    $('#cabang_bank2').next('.select2-container').show();
                    $('#cabang_bank2').html(data.cabang_bank);

                    $('#capem_bank2').html(data.option1);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })
        
    })

</script>