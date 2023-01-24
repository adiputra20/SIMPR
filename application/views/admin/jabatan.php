                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/jabatan/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <!-- <a type="button" class="btn btn-success btn-sm mb-1 btn-icon-split" data-toggle="modal" data-target=".jabatanADD"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a> -->
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
                                                <th class="text-center">Jabatan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($jabatan as $jbt): ?>
                                                <tr>
                                                    <td><?php echo $jbt->idjabat; ?></td>
                                                    <td><?php echo $jbt->jabatan; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" href="<?php echo base_url('admin/jabatan/editData/'.base64_encode($jbt->idjabat)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="konfirmasi('Jabatan ','<?php echo $jbt->idjabat; ?>','<?php  echo base_url('admin/jabatan/deleteData/'.$jbt->idjabat); ?>')" class="btn btn-sm btn-circle btn-danger" href="#">
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
