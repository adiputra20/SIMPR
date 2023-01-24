                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/pangkat/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
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
                                                <th class="text-center">Golongan/Ruang</th>
                                                <th class="text-center">Pangkat</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($pangkat as $gol): ?>
                                                <tr>
                                                    <td><?php echo $gol->gorl; ?></td>
                                                    <td><?php echo $gol->pangkat; ?></td>
                                                    <td>
                                                        <center>
                                                            <a onclick="konfirmasi('Pangkat ','<?php echo $gol->gorl; ?>','<?php  echo base_url('admin/pangkat/deleteData/'.$gol->gorl); ?>')" class="btn btn-sm btn-circle btn-danger" href="#">
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

            