<style>
    #tabel_tindakan_hukum tr th {
        text-align: center;
        vertical-align: middle;
        font-weight: bold;
    }  
    .ubah-tindakan-hukum {
        cursor: pointer;
    }
</style>
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center">
            <h4 class="page-title">Tindakan Hukum</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tindakan Hukum</li>
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
                 <a href="<?= base_url("manager/unduh_data_th/$syariah") ?>"><button type="button" class="btn btn-sm btn-warning float-right">Unduh Excel</button></a>
              </div>
              <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover" id="tabel_tindakan_hukum" width="100%">
                        <thead class="bg-info text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama Debitur</th>
                                <th>Nomor Klaim</th>
                                <th>Bank</th>
                                <th>Cabang</th>
                                <th>Capem</th>
                                <th>Somasi</th>
                                <th>Tindakan</th>
                                <th>Close</th>
                                <th>Keputusan Manajer</th>
                            </tr>
                        </thead>
                    </table>
                </div>
              </div>
          </div>
      </div>
  </div>

</div>

<!-- Modal untuk aksi keputusan manajer -->

<div id="modal_aksi_kep" class="modal fade" role="dialog" aria-labelledby="vcenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h4 class="modal-title text-white" id="judul_k">Aksi Keputusan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-body"> 
                <input type="hidden" id="id_tr_pot">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 ">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="acare" name="aksi_kep" class="custom-control-input" value="1">
                            <label class="custom-control-label" for="acare"><h4><span class="badge badge-success">Acare</span></h4></label>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-6 ">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="np" name="aksi_kep" class="custom-control-input" value="2">
                            <label class="custom-control-label" for="np"><h4><span class="badge badge-danger">Not Potensial</span></h4></label>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center mt-2">
                    <div class="col-md-6 ">
                        <div class="custom-control custom-radio">
                            <input type="radio" id="noaction" name="aksi_kep" class="custom-control-input" value="3">
                            <label class="custom-control-label" for="noaction"><h4><span class="badge badge-primary">No Action Needed</span></h4></label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info waves-effect" id="simpan_kep">Simpan</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal untuk aksi keputusan manajer -->

<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>

<script>

$(document).ready(function () {
    
    var tabel_tindakan_hukum = $('#tabel_tindakan_hukum').DataTable({

        "processing"    : true,
        "ajax"          : {
                "url"   : "<?= base_url("manager/tampil_tindakan_hukum/$syariah") ?>",
                "type"  : "POST"
            },
        stateSave       : true,
        "order"         : []

    })

    $('#tabel_tindakan_hukum').on('click', '.ubah-tindakan-hukum', function () {
        var id_tr_potensial = $(this).data('id');
        var angka           = $(this).attr('angka');

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
                    url         : "<?= base_url('manager/ubah_keputusan') ?>",
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
                    data        : {id_tr_pot:id_tr_potensial, angka:angka},
                    success     : function (data) {
                        tabel_tindakan_hukum.ajax.reload(null, false);

                        swal(
                            'Ubah Data',
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
                    'Anda membatalkan ubah data',
                    'error'
                )
            }
        })

        return false;

        // $('#id_tr_pot').val(id_tr_potensial);

        // $('#modal_aksi_kep').modal('show');

        // if (angka == 1) {
        //     $('#acare').attr( 'checked', true );
        // } else if(angka == 2) {
        //     $('#np').attr( 'checked', true );
        // } else if(angka == 3) {
        //     $('#noaction').attr( 'checked', true );
        // }

    })

    $('#simpan_kep').on('click', function () {
        var angka_kep       = $("input[name=aksi_kep]:checked").val();
        var id_tr_potensial = $('#id_tr_pot').val();

        console.log(angka_kep);

        if (angka_kep) {
            $.ajax({
                url         : "<?= base_url('manager/ubah_keputusan') ?>",
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
                data        : {angka:angka_kep, id_tr_pot:id_tr_potensial},
                success     : function (data) {
                    tabel_tindakan_hukum.ajax.reload(null, false);

                    swal(
                        'Berhasil',
                        'Keputusan manager berhasil diubah',
                        'success'
                    )

                    $('#modal_aksi_kep').modal('hide');

                    $('#acare').attr( 'checked', false );
                    $('#np').attr( 'checked', false );
                    $('#noaction').attr( 'checked', false );
                }
            })

            return false;
        } else {
            swal(
                'Peringatan',
                'Harap pilih dahulu aksi keputusan',
                'warning'
            )
        }

        
        
    })

})

</script>