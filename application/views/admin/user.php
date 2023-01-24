                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/user/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
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
                                                <th class="text-center">NIP</th>
                                                <th class="text-center">Nama</th>
                                                <!-- <th>Pangkat/Golongan</th> -->
                                                <th class="text-center">Jabatan</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($user as $pegawai): ?>
                                                <tr>
                                                    <td><?php echo $pegawai->nip; ?></td>
                                                    <td><?php echo $pegawai->nama; ?></td>
                                                    <!-- <td><?php echo $pegawai->golr; ?></td> -->
                                                    <td><?php echo $pegawai->jabatan; ?></td>
                                                    <td>
                                                        <center>
                                                            <a class="btn btn-sm btn-circle btn-primary" href="<?php echo base_url('admin/user/editData/'.base64_encode($pegawai->nip)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <?php if ($pegawai->aktif !=1){ ?>
                                                                <a class="btn btn-sm btn-circle btn-warning" href="<?php echo base_url('admin/user/aktifasi/'.base64_encode($pegawai->nip)); ?>">
                                                                    <i class="fas fa-check"></i>
                                                                </a>
                                                            <?php }; ?>
                                                            <a onclick="konfirmasi('Jabatan ','<?php echo $pegawai->nip; ?>','<?php  echo base_url('admin/user/deleteData/'.$pegawai->nip); ?>')" class="btn btn-sm btn-circle btn-danger" href="#">
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

            