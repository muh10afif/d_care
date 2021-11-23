<div class="page-breadcrumb">
    <div class="row">
        <div class="col-5 align-self-center">
            <h4 class="page-title">Task List</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url();?>">D-care</a></li>
                        <li class="breadcrumb-item"><a href="<?php echo base_url('admin/managerSyariah');?>">Debitur Potensial</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Task List</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <a href="<?php echo base_url('managerSyariah/tambah_task');?>"><span class="badge badge-primary" style="float:right">Tambah Tugas</span></a>
                </div>
                <div class="card-body">
                
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabel">
                            <thead class="bg-info text-white">
                                <tr>
                                    <th>Verifikator</th>
                                    <th>Tugas</th>
                                    <th>Keterangan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($record as $r) {?>
                                <tr class="gradeU">
                                    <td><?php echo $r['nama_lengkap'];?></td>
                                    <td><?php echo $r['tugas'];?></td>
                                    <td><?php echo $r['keterangan'];?></td>
                                    <td><?php echo $r['tanggal'];?></td>
                                    <td><?php if($r['status']==NULL){
                                        echo "Sedang Di Proses Verifikator";
                                        } else{
                                            echo $r['status'];
                                        } ?>  
                                    </td>
                                </tr>
                            <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

