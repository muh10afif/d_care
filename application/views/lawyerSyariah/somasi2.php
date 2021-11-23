<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Tindakan Hukum</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url() ?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/lawyerSyariah') ?>">Tindakan Hukum</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Somasi 2</li>
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
                    <div class="col-sm-4 shuffle" data-groups='Kredit Konsumtif'>
                        <div class="panel no-border overflow-hidden">
                            <form method="post" action="<?php echo base_url('lawyerSyariah/act_somasi2');?>" enctype="multipart/form-data"> 
                            <?php foreach ($record as $r){?>
                              <input name="id_tr_formtindakan" type="hidden" value="<?php echo $r['id_tr_formtindakan']?>">
                            <?php }?>
                              <div class="form-group">
                                <label for="usr">Lampirkan Surat:</label>
                                <input type="file" name="userfiles[]" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Lampiran 1:</label>
                                <input type="file" name="userfiles[]" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="pwd">lampiran 2:</label>
                                <input type="file"  name="userfiles[]" class="form-control">
                              </div>
                              <div class="form-group">
                                <label for="pwd">Browse:</label>
                                <input type="file" name="userfiles[]" class="form-control">
                              </div>
                              <button type="submit" class="btn btn-md btn-primary">Upload</button>
                            </form>
                            <!--/ Meta -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>