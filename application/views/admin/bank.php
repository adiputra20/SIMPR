                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/bank/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <!-- <a type="button" class="btn btn-success btn-sm mb-1 btn-icon-split" data-toggle="modal" data-target=".jabatanADD"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-seconday">Daftar <?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-hover table-sm" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">No. Rekening Bank</th>
                                                <th class="text-center">Nama Rekening Bank</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($rek as $bank): ?>
                                                <tr>
                                                    <td><?php echo $bank->norek; ?></td>
                                                    <td><?php echo $bank->nmrek; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" href="<?php echo base_url('admin/bank/editData/'.base64_encode($bank->norek)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="konfirmasi('No. Rekening ','<?php echo $bank->norek; ?>','<?php  echo base_url('admin/bank/deleteData/'.$bank->norek); ?>')" class="btn btn-sm btn-circle btn-danger" href="#">
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
