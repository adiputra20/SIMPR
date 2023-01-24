                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <small>
                    <div class="card shadow mb-4" style="width: 80%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach($fiskal as $fiskal): ?>
                                <form method="POST" action="<?php echo base_url('admin/fiskal/editDataAct'); ?>" class="needs-validation" novalidate>
                                    <div class="form-group row">
                                        <label for="nomor" class="col-sm-2 col-form-label">Nomor</label>
                                        <div class="col-sm-4">
                                            <input id="nomor" type="text" readonly name="nomor" class="form-control form-control-sm" placeholder="Nomor Ket. Fiskal" value="<?php echo $fiskal->nomorfiskal; ?>" required>
                                            <div class="invalid-feedback">Nomor Keterangan Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="nama" class="col-sm-2 col-form-label">Badan Usaha</label>
                                        <div class="col-sm-4">
                                            <input id="nama" type="text" name="nama" class="form-control form-control-sm" placeholder="Nama Badan Usaha" value="<?php echo $fiskal->namausaha; ?>" required>
                                            <div class="invalid-feedback">Nama Badan Usaha Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="npwp" type="text" name="npwp" class="form-control form-control-sm" placeholder="NPWP Badan Usaha" value="<?php echo $fiskal->npwp; ?>" required>
                                            <div class="invalid-feedback">NPWP Wajib Diisi!!!!!</div>
                                        </div>
                                        <div class="col-sm-3">
                                            <input id="jenis" type="text" name="jenis" class="form-control form-control-sm" placeholder="Jenis Badan Usaha" value="<?php echo $fiskal->jenisusaha; ?>" required>
                                            <div class="invalid-feedback">Jenis Usaha Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="pemilik" class="col-sm-2 col-form-label">Nama Pemilik</label>
                                        <div class="col-sm-10">
                                            <input id="pemilik" type="text" name="pemilik" class="form-control form-control-sm" placeholder="Nama Pemilik Usaha" value="<?php echo $fiskal->namapemilik; ?>" required>
                                            <div class="invalid-feedback">Nama Pemilik Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                        <div class="col-sm-10">
                                            <textarea id="alamat" type="text" name="alamat" class="form-control form-control-sm" placeholder="Alamat Badan Usaha" required><?php echo $fiskal->alamat; ?></textarea>
                                            <div class="invalid-feedback">Alamat Wajib Diisi!!!!!</div>
                                        </div>
                                    </div>   
                                    <div class="form-group row">
                                        <label class="col-sm-2 col-form-label">Lunas Terhitung dari</label>
                                        <div class="col-sm-3">
                                            <input id="tanggal1" type="date" name="tanggal1" class="form-control form-control-sm" value="<?php echo date("Y-m-d",strtotime($fiskal->tanggalawal)); ?>" required>
                                            <div class="invalid-feedback">Tanggal Wajib Diisi!!!!!</div>
                                        </div>
                                        s.d
                                        <div class="col-sm-3">
                                            <input id="tanggal2" type="date" name="tanggal2" class="form-control form-control-sm" value="<?php echo date("Y-m-d",strtotime($fiskal->tanggalakhir)); ?>" required>
                                            <div class="invalid-feedback">Tanggal Wajib Diisi!!!!!</div>
                                            <input id="tanggal3" type="hidden" name="tanggal3" class="form-control form-control-sm" value="<?php echo date("Y-m-d"); ?>">
                                        </div>
                                    </div>
                                    <hr class="sidebar-divider mt-0">
                                    <button type="submit" class="btn btn-sm btn-success btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Update</span></button>
                                    <a href="<?php echo base_url('admin/fiskal') ?>" class="btn btn-sm btn-danger btn-icon-split"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                                </form>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    </small>
            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            