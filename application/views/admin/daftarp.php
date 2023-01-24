                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/daftarp/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <a class="btn btn-sm btn-info mb-1 btn-icon-split" href="<?php echo base_url('admin/daftarp/printBlanko/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Blanko Pendaftaran</span></a>
                    <!-- <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/daftarp/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a> -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <small>
                                    <table class="table table-bordered table-hover table-sm" id="example" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th class="text-center">NPWPD</th>
                                                <th class="text-center">Nama Pemilik</th>
                                                <th class="text-center">Nama/Merk Usaha</th>
                                                <th class="text-center">Alamat</th>
                                                <th class="text-center">Jenis</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($wp as $wp) : ?>
                                                <tr>
                                                    <td><?php echo $wp->npwprd; ?></td>
                                                    <td><?php echo $wp->namapemilik; ?></td>
                                                    <td><?php echo $wp->namausaha; ?></td>
                                                    <td><?php echo $wp->alamatpemilik; ?></td>
                                                    <td><?php echo $wp->jenisusaha; ?></td>
                                                    <td><?php if ($wp->status == 1) {
                                                            echo '<center><i class="fas fa-check"></i></center>';
                                                        } else {
                                                            echo '<center><i class="fas fa-times"></i></center>';
                                                        } ?></td>
                                                    <td>
                                                        <center>
                                                            <a id="cetakKartu" class="btn btn-sm btn-circle btn-success npwp-dialog" data-toggle="modal" data-target="#myModal" data-id="<?php echo $wp->npwprd; ?>" data-nama="<?php echo $wp->namapemilik; ?>" data-usaha="<?php echo $wp->namausaha; ?>" data-alamat="<?php echo $wp->alamatpemilik; ?>" data-jenis="<?php echo $wp->jenisusaha; ?>">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-circle btn-info" data-toggle="tooltip" data-placement="top" title="cetak SPTPD" href="<?php echo base_url('admin/daftarp/cetakSPTPD/' . base64_encode($wp->npwprd)); ?>">
                                                                <i class="fas fa-file-alt"></i>
                                                            </a>
                                                            <a class="btn btn-sm btn-circle btn-primary" data-toggle="tooltip" data-placement="top" title="edit data WP" href="<?php echo base_url('admin/daftarp/editData/' . base64_encode($wp->npwprd)); ?>">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a onclick="konfirmasi('Wajib Pajak ','<?php echo $wp->npwprd; ?>','<?php echo base_url('admin/daftarp/deleteData/' . $wp->npwprd); ?>')" data-toggle="tooltip" data-placement="top" title="hapus data WP" class="btn btn-sm btn-circle btn-danger" href="#">
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
                <!-- Large modal -->
                <!-- Button trigger modal -->
                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Cetak Kartu NPWPD</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="container">
                                    <div class="card img-fluid" style="width:500px">
                                        <img class="card-img-top" src="<?php echo base_url('assets/img/npwpd.png') ?>" alt="Card image" style="width:100%">
                                        <div class="card-img-overlay">
                                            <br><br>
                                            <div class="form-group row mb-0">
                                                <label for="colFormLabelSm" class="col-sm-5 col-form-label font-weight-bold text-gray-900">NPWPD</label>
                                                <div class="col-sm-7 mb-0">
                                                    <input type="text" class="form-control form-control-plaintext mb-0 font-weight-bold text-gray-900" id="nonpwpd">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm text-gray-800">Nama Pemilik</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm form-control-plaintext text-gray-800" id="nama">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm text-gray-800">Merk/Nama Usaha</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm form-control-plaintext text-gray-800" id="usaha">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm text-gray-800">Alamat</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm form-control-plaintext text-gray-800" id="alamat">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <label for="colFormLabelSm" class="col-sm-5 col-form-label col-form-label-sm text-gray-800">Jenis Usaha</label>
                                                <div class="col-sm-7">
                                                    <input type="text" class="form-control form-control-sm form-control-plaintext text-gray-800" id="jenis">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End of Large Modal -->
                </div>