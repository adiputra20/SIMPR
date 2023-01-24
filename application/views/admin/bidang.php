                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/bidang/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Daftar <?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-hover table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Nomor</th>
                                                <th class="text-center">Bidang Pendapatan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($bidang as $bdg): ?>
                                                <tr>
                                                    <td><?php echo $bdg->kode; ?></td>
                                                    <td><?php echo $bdg->bidang; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" href="<?php echo base_url('admin/bidang/editData/'.base64_encode($bdg->kode)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="konfirmasi('Bidang ','<?php echo $bdg->kode; ?>','<?php  echo base_url('admin/bidang/deleteData/'.$bdg->kode); ?>')" class="btn btn-sm btn-circle btn-danger" href="#">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
                                                        </center>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
                
                
            </div>
            <!-- End of Main Content -->

            