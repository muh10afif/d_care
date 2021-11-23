<style>
    #tbl_kunjungan_ver tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }    
</style>

<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">History Kunjungan</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">Desk Care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('kunjungan') ?>">Kunjungan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">History Kunjungan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

    <!-- filter data -->
     <!-- <div class="row form-1">
         <div class="col-12">
             <div class="card">
                 <div class="card-header bg-info">
                     <h4 class="mb-0 text-white">Filter Data</h4>
                 </div>
                 <div class="card-body">
                     <div class="d-flex justify-content-center">
                        <div class="form-group col-md-6">
                            <div class="row">
                                <div class="col-md-2">
                                    <label class="mt-2">Verifikator</label>
                                </div>
                                <div class="col-md-10">
                                    <div class="input-group">
                                        <select class="select2 form-control custom-select" name="verifikator" id="verifikator" style="width: 70%; height:36px;">  
                                            <option value="a">-- Pilih Verifikator --</option>
                                            <?php foreach ($verifikator as $b): ?>
                                                <option value="<?= $b['id_karyawan'] ?>"><?= $b['nama_lengkap'] ?></option>
                                            <?php endforeach;?>
                                        </select>
                                        <div class="input-group-append">
                                            <button class="btn btn-info" type="button" id="cari"><i class="fas fa-search"></i></button>
                                            <button class="btn btn-danger" type="button" id="reset"><i class="fas fa-sync"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                     </div>
                 </div>
             </div>
         </div>
     </div> -->

    <!-- list verifikator -->
    <div class="row form-2">
        <div class="col-12">
            <div class="card shadow">
                <div class="card-header bg-info">
                    <h4 class="mb-0 text-white">List Verifikator</h4>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered table-hover" id="tbl_kunjungan_ver"  width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Verifikator</th>
                                <th>Jumlah Kunjungan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- detail debitur -->
    <div id="list-deb" hidden>

    </div>

    <!-- button kembali -->
    <div class="align-items-center col-md-2" id="kembali" hidden>
        <button class="btn btn-warning btn-round ml-auto">
            <i class="fas fa-arrow-left"></i>
            Kembali
        </button>
    </div>

</div>

<!-- jQuery -->
<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

$(document).ready(function () {

    // load datatables
    var tbl_kunjungan_ver = $('#tbl_kunjungan_ver').DataTable({

        "processing"    : true,
        "serverSide"    : true,
        "order"         : [],
        "ajax"          : {
            "url"   : "<?= base_url("kunjungan/tampil_kj_verifikator") ?>",
            "type"  : "POST",
            // "data"  : function (data) {
            //     data.verifikator    = $('#verifikator').val();
            // }
        },
        "columnDefs"    : [{
            "targets"       : [0, 3],
            "orderable"     : false
        }]
    })

    // aksi filter data
    $('#cari').click(function () {
        tbl_kunjungan_ver.ajax.reload(null, false);            
    })

    // aksi reset data filter
    $('#reset').click(function () {
        // $('#verifikator').select2("val", 'a');
        tbl_kunjungan_ver.ajax.reload(null, false);
    })

    // menampilkan list debitur
    $('#tbl_kunjungan_ver').on('click', '.detail-ver', function () {

        var id_karyawan = $(this).data('id');
            
        $.ajax({
            url         : "<?= base_url('kunjungan/tampil_detail_deb') ?>",
            type        : "POST",
            beforeSend  : function () {
                swal({
                    title   : 'Menunggu',
                    html    : 'Memproses halaman',
                    onOpen  : () => {
                        swal.showLoading();
                    }
                })
            },
            data        : {id_karyawan:id_karyawan},
            success     : function (data) {
                swal.close();

                $('.form-1').hide();
                $('.form-2').hide();

                $('#list-deb').removeAttr('hidden');
                $('#kembali').removeAttr('hidden');
                $('#list-deb').html(data);

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

                tbl_kunjungan_ver.ajax.reload(null, false); 

                $('.form-1').show();
                $('.form-2').show();

                $('#list-deb').attr('hidden', true);
                $('#kembali').attr('hidden', true);
            }
        })

    })

})

</script>