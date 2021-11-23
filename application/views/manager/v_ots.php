<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">OTS</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item active" aria-current="page">OTS</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">

  <div class="row">
      <div class="col-12">
          <div class="card border-info">
              <div class="card-body">
                <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover" id="tabel_s">
                        <thead class="bg-info text-white">
                          <tr>
                            <th>No</th>
                            <th>Nomor Klaim</th>
                            <th>Nama Debitur</th>
                            <th>Bank</th>
                            <th>Cabang</th>
                            <th>Subrogasi</th>
                            <th>SHS(Rp.)</th>
                            <th>Follow Up</th>
                          </tr>
                      </thead>
                      
                  </table>
                </div>
              </div>
          </div>
      </div>
  </div>

</div>


<script src="<?= base_url() ?>template/assets/libs/jquery/dist/jquery.min.js"></script>
<script>

    $(document).ready(function () {
        var tabel_ots = $('#tabel_s').DataTable({
            "processing"    : true,
            "serverSide"    : true,
            "order"         : [],
            "ajax"          : {
                "url"   : "<?= base_url('manager/tampil_data_ots') ?>",
                "type"  : "POST"
            },
            "columnDefs"     :[{
                "targets"   : [0,7],
                "orderable" : false
            }]
        })
    })

</script>
