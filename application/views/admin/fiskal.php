                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <small>
                    <a class="btn btn-sm btn-success mb-1 btn-icon-split" href="<?php echo base_url('admin/fiskal/addData/'); ?>"><span class="icon text-white-50"><i class="fas fa-plus"></i></span><span class="text">Tambah Data</span></a>
                    <a class="btn btn-sm btn-primary mb-1 btn-icon-split" href="<?php echo base_url('admin/fiskal/printRegister/'); ?>"><span class="icon text-white-50"><i class="fas fa-print"></i></span><span class="text">Register</span></a>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary">Daftar <?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover" id="example" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Nomor</th>
                                            <th class="text-center">Nama Pemilik</th>
                                            <th class="text-center">Nama/Merk Usaha</th>
                                            <th class="text-center">Jenis Usaha</th>
                                            <th class="text-center">NPWP</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($fiskal as $fiskal): ?>
                                            <tr>
                                                <td><?php echo $fiskal->nomorfiskal; ?></td>
                                                <td><?php echo $fiskal->namapemilik; ?></td>
                                                <td><?php echo $fiskal->namausaha; ?></td>
                                                <td><?php echo $fiskal->jenisusaha; ?></td>
                                                <td><?php echo $fiskal->npwp; ?></td>
                                                <td>
                                                <center>
                                                    <a class="btn btn-sm btn-circle btn-success" data-toggle="tooltip" data-placement="top" title="cetak Fiskal" href="<?php echo base_url('admin/fiskal/printData/'.str_replace("/","_",$fiskal->nomorfiskal)); ?>">
                                                        <i class="fas fa-print"></i>
                                                    </a>
                                                    <a class="btn btn-sm btn-circle btn-primary"  data-toggle="tooltip" data-placement="top" title="edit Fiskal" href="<?php echo base_url('admin/fiskal/editData/'.str_replace("/","_",$fiskal->nomorfiskal)); ?>">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    </a>
                                                    <a onclick="konfirmasi('Fiskal','<?php echo $fiskal->nomorfiskal; ?>','<?php  echo base_url('admin/fiskal/deleteData/'.str_replace('/','_',$fiskal->nomorfiskal)); ?>')" class="btn btn-sm btn-circle btn-danger" data-toggle="tooltip" data-placement="top" title="hapus Fiskal" href="#">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </center>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </small>
                </div>
                <!-- /.container-fluid -->
                
                
            </div>
            <!-- End of Main Content -->

            