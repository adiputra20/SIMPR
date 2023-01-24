                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/rekLO/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Daftar <?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-striped table-sm" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">Kode Rekening</th>
                                                <th class="text-center">Nama Rekening</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($akun as $rek): ?>
                                                <tr>
                                                    <td><?php echo $rek->kodeLO; ?></td>
                                                    <td><?php echo $rek->namaLO; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" href="<?php echo base_url('admin/rekLO/editData/'.base64_encode($rek->kodeLO)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            
                                                            <a onclick="return confirm('Yakin Hapus?') " class="btn btn-sm btn-circle btn-danger" href="<?php echo base_url('admin/rekLO/deleteData/'.$rek->kodeLO); ?>">
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

            