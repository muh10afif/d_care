<style>
    #tabel_tambah_prioritas tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<div class="row">
    <div class="col-12">
        <div class="card border-info shadow">
            <div class="card-header bg-info">
                <h4 class="mb-0 text-white">Filter Data</h4></div>
            <div class="card-body">
                <div class="row d-flex justify-content-center">
                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-3 text-right ">
                                <label class="mt-2">Verifikator</label>
                            </div>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" name="verifikator1" id="verifikator1" style="width: 100%; height:36px;">  
                                    <option value="a">-- Pilih Verifikator --</option>
                                    <?php foreach ($d_verifikator as $a): ?>
                                        <option value="<?= $a['id_karyawan'] ?>"><?= $a['nama_lengkap'] ?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="form-group col-md-4">
                        <div class="row">
                            <div class="col-md-3 text-right ">
                                <label class="mt-2">Capem Bank</label>
                            </div>
                            <div class="col-md-9">
                                <select class="select2 form-control custom-select" name="capem_bank" id="capem_bank_2" style="width: 100%; height:36px;">  
                                    <option value="a">-- Pilih Capem Bank --</option>
                                    
                                </select>
                                <div id="loading_capem" style="margin-top: 10px;" align='center'>
                                    <img src="<?= base_url('template/img/loading.gif') ?>" width="18"> <small>Loading...</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <div class="col-md-12" align="right">
                    <button class="btn btn-success" id="filter_2">Tampilkan</button><?= nbs(3) ?>
                    <button class="btn btn-warning" id="reset_2">Reset</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow">
            <form id="simpan_prioritas">
            <div class="card-header bg-info">
                <button type="submit" class="btn btn-warning float-right" id="tambah_prioritas2">Simpan</button>
                <h4 class="mb-2 mt-2 text-white">Data List Prioritas</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered table-hover" id="tabel_tambah_prioritas" width="100%">
                    <thead class="bg-info text-white">
                        <tr>
                            <th>No</th>
                            <th>Pilih</th>
                            <th>Id Care</th>
                            <th>No Klaim</th>
                            <th>Nama Debitur</th>
                            <th>SHS</th>
                            <th>Bank</th>
                            <th>Cabang Bank</th>
                            <th>Capem Bank</th>
                            <th>Tanggal OTS</th>
                            <th>Verifikator</th>
                            <th>Expired</th>
                        </tr>
                    </thead>
                </table>
            </div>
            </form>
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

    function removeA(arr) {
        var what, a = arguments, L = a.length, ax;
        while (L > 1 && arr.length) {
            what = a[--L];
            while ((ax= arr.indexOf(what)) !== -1) {
                arr.splice(ax, 1);
            }
        }
        return arr;
    }

    $(document).ready(function () {

        // var aksi_call     = $('input[name="aksi_call[]"]:checked').map(function () {
        //             return this.value;
        //         }).get();
        
        var tabel_tambah_prioritas = $('#tabel_tambah_prioritas').DataTable({

            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_list_tambah_prioritas/") ?>",
                "type"  : "POST",
                "data"  : function (data) {
                    data.verifikator   = $('#verifikator1').val();
                    data.capem_bank    = $('#capem_bank_2').val();
                }
            },
            "columnDefs"    : [{
                "targets"       : [0,1,11],
                "orderable"     : false
            }]
        })

        // aksi filter data
        $('#filter_2').click(function () {
            tabel_tambah_prioritas.ajax.reload(null, false);            
        })

        // aksi reset data filter
        $('#reset_2').click(function () {
            $('#verifikator1').select2("val", 'a');
            $('#capem_bank_2').select2("val",'a');
            tabel_tambah_prioritas.ajax.reload(null, false);
        })

        $('#loading_capem').hide();

        $('#verifikator1').change(function () {
            var id_verifikator = $('#verifikator1').val();

            $('#capem_bank_2').next('.select2-container').hide();
            $('#loading_capem').show();

            $.ajax({
                url         : "<?= base_url('manager/ambil_capem_ver') ?>",
                type        : "POST",
                beforeSend 	: function (e) {
                    if (e && e.overrideMimeType) {
                        e.overrideMimeType("application/json;charshet=UTF-8");
                    }				
                },
                data        : {id_verifikator:id_verifikator},
                dataType    : "JSON",
                success     : function (data) {
                    $('#loading_capem').hide();
                    $('#capem_bank_2').next('.select2-container').show();
                    $('#capem_bank_2').html(data.capem);
                },
                error 		: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            })
        })

        // $('#tabel_tambah_prioritas').on('change', '#prioritas_1', function () {

        //     if (this.checked) {
        //         $('#tgl_1').prop('disabled', false);
        //     } else {
        //         $('#tgl_1').prop('disabled', true);
        //     }

        // })

        <?php for ($i=1; $i <= $jml_deb; $i++) : ?>
            
            $('#tabel_tambah_prioritas').on('change', '#prioritas_<?= $i ?>', function () {

                // if (this.checked) {
                //     $('#tgl_<?= $i ?>').prop('disabled', false);
                // } else {
                //     $('#tgl_<?= $i ?>').prop('disabled', true);
                // }

                if (this.checked) {
                    $('#tgl_<?= $i ?>').val('<?= $tgl_plus_7 ?>');
                } else {
                    $('#tgl_<?= $i ?>').val('');
                }

                
                
            })

        <?php endfor ?>


        // $('#tambah_prioritas2').click(function () {
        //     var tgl_end2     = $('input[name="tgl_end[]"]').map(function () {
        //         if (this.value != "") {
        //             return $(this).attr('data');
        //         } 
        //     }).get();

        //     var tgl_end     = $('input[name="tgl_end[]"]').map(function () {
        //         return this.value;
        //     }).get();

        //     var hasil_tgl_end = removeA(tgl_end, "");    

        //     // console.log(tgl_end2,hasil_tgl_end);

        //     var tgl_end_3 = $('input[name="tgl_end[]"]').not(':disabled').map(function () {
        //         return this.value;
        //     }).get();  

        //     console.log(tgl_end_3);
        // })

        $('#simpan_prioritas').on('submit', function () {
            var tgl_end     = $('input[name="tgl_end[]"]').map(function () {
                return this.value;
            }).get();

            var id_deb     = $('input[name="tgl_end[]"]').map(function () {
                if (this.value != "") {
                    return $(this).attr('data');
                } 
            }).get();

            console.log(id_deb);

            var pilih_pri     = $('input[name="pilih_pri[]"]:checked').map(function () {
                return this.value;
            }).get();

            var hasil_tgl_end = removeA(tgl_end, "");  

            var tgl_end_2 = $('input[name="tgl_end[]"]').not(':disabled').map(function () {
                return this.value;
            }).get();  

            console.log(tgl_end);

            if (pilih_pri == "") {

                swal({
                    title               : 'Peringatan',
                    text                : 'Harap pilih dahulu debitur',
                    type                : 'warning',
                    buttonsStyling      : false,
                    confirmButtonClass  : "btn btn-info"
                });

                return false;
            } else {
                
                if (jQuery.inArray("", tgl_end_2) !== -1) {

                    swal({
                        title               : 'Peringatan',
                        text                : 'Harap isi tanggal expired',
                        type                : 'warning',
                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info"
                    });

                    return false;
                } else {
                    
                    swal({
                        title       : 'Konfirmasi',
                        text        : 'Yakin akan kirim data',
                        type        : 'warning',

                        buttonsStyling      : false,
                        confirmButtonClass  : "btn btn-info",
                        cancelButtonClass   : "btn btn-danger mr-3",

                        showCancelButton    : true,
                        confirmButtonText   : 'Kirim Data',
                        confirmButtonColor  : '#3085d6',
                        cancelButtonColor   : '#d33',
                        cancelButtonText    : 'Batal',
                        reverseButtons      : true
                    }).then((result) => {
                        if (result.value) {
                            $.ajax({
                                url         : "<?= base_url('manager/proses_tambah_prioritas') ?>",
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
                                data        : {id_debitur:id_deb, tgl_end:tgl_end},
                                success     : function (data) {
                                    tabel_tambah_prioritas.ajax.reload(null, false);

                                    swal({
                                        title               : 'Tambah Prioritas',
                                        text                : 'Data Berhasil Disimpan',
                                        type                : 'success',
                                        showConfirmButton   : false,
                                        timer               : 1000
                                    });

                                    // $('#list_prioritas').show();
                                    // $("#kembali").attr("hidden", true);
                                    // $("#form-tambah-prioritas").attr("hidden", true);

                                    // tabel_prioritas.ajax.reload(null, false); 

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
                                text                : 'Anda membatalkan tambah Prioritas',
                                type                : 'error',
                                showConfirmButton   : false,
                                timer               : 1000
                            });
                        }
                    })

                    return false;

                }

            }

        })


    })


</script>