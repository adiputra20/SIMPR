                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="card shadow mb-4" style="width: 100%"> 
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-secondary"><?php echo $title; ?></h6>
                        </div>
                        <div class="card-body">
                            <?php foreach($strd as $data):  ?>
                                <form method="POST" action="<?php if(is_null($data->nostpd)){ echo base_url('admin/strd/addDataAct'); }else{ echo base_url('admin/strd/editDataAct'); };  ?>" class="needs-validation" novalidate>
                                <div class="form-group row mb-0">
                                    <label for="npwpd" class="col-md-2 col-form-label col-form-label-sm">No. SKPD / NPWPD</label>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control form-control-sm" readonly id="noskpd" name="noskpd" value="<?php echo $data->skpd; ?>" required>
                                        <div class="invalid-feedback">Nomor STS Wajib Diisi!!!!!</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control form-control-sm" readonly id="npwpd" name="npwpd" value="<?php echo $data->npwpd; ?>" required>
                                        <div class="invalid-feedback">NPWPD Wajib Diisi!!!!!</div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <input type="text" class="form-control form-control-sm" readonly id="namausaha" name="namausaha" value="<?php echo $data->namausaha; ?>" required>
                                        <div class="invalid-feedback">Nama Usaha Wajib Diisi!!!!!</div>
                                    </div>

                                    <!-- <div class="form-group col-md-2">
                                        <input type="date" class="form-control form-control-sm" id="tanggal" name="tanggal" placeholder="tanggal" value="<?php echo date("Y-m-d"); ?>" required>
                                        <div class="invalid-feedback">Tanggal STS Wajib Diisi!!!!!</div>
                                    </div> -->
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="tanggal3" class="col-md-2 col-form-label col-form-label-sm">Ketetapan / Jatuh Tempo</label>
                                    <div class="form-group col-md-2">
                                        <input type="text" class="form-control form-control-sm text-right" readonly id="ketetapan" name="ketetapan" value="<?php echo number_format($data->ketetapan,0,',','.'); ?>" required>
                                        <div class="invalid-feedback">Ketetapan Wajib Diisi!!!!!</div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <input type="date" readonly class="form-control form-control-sm"  id="jatuhtempo" name="jatuhtempo" value="<?php echo date("Y-m-d",strtotime($data->jatuhtempo)); ?>" required>
                                        <div class="invalid-feedback">Jatuh Tempo Wajib Diisi!!!!!</div>
                                    </div>
                                    <div class="form-group col-md-5">
                                    <input type="text" readonly class="form-control form-control-sm"  id="obyek" name="obyek" value="<?php echo $data->obyek; ?>" required>
                                        <div class="invalid-feedback">Jatuh Tempo Wajib Diisi!!!!!</div>
                                    </div>
                                    <!-- <div class="form-group col-md-9">
                                        <textarea class="form-control form-control-sm" name="keterangan" id="keterangan" rows="3" placeholder="Keterangan Setoran" required></textarea>
                                        <div class="invalid-feedback">Keterangan Wajib Diisi!!!!!</div>
                                    </div> -->
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Jumlah Setoran / Sisa</label>
                                    <div class="form-group col-md-2">
                                        <input type="text" readonly class="form-control form-control-sm text-right"  id="nilai" name="nilai" value="<?php echo number_format($data->nilai,0,',','.'); ?>" required>
                                        <div class="invalid-feedback">Nilai Wajib Diisi!!!!!</div>
                                     </div>
                                    <div class="form-group col-md-2">
                                        <input type="text" readonly class="form-control form-control-sm text-right"  id="sisa" name="sisa" value="<?php echo number_format($data->ketetapan-$data->nilai,0,',','.'); ?>" required>
                                        <div class="invalid-feedback">Sisa Wajib Diisi!!!!!</div>
                                     </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Nomor Tagihan dan Teguran</label>
                                    <div class="form-group col-md-4">
                                    <input type="text" class="form-control form-control-sm"  id="nostpd" name="nostpd" placeholder="No. STRD/Teguran" <?php if(!is_null($data->nostpd)){ ?> readonly value="<?php echo $data->nostpd; ?>"  <?php }; ?> required>
                                        <div class="invalid-feedback">Nomor STRD/Teguran Wajib Diisi!!!!!</div>
                                     </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <label for="perbulan" class="col-md-2 col-form-label col-form-label-sm">Tanggal Tagihan dan Teguran</label>
                                    <div class="form-group col-md-2">
                                        <input type="date" class="form-control form-control-sm"  id="tanggal" name="tanggal" value="<?php if(is_null($data->tanggal)){ echo date("Y-m-d"); }else{ echo date("Y-m-d",strtotime($data->tanggal));}; ?>" required>
                                        <div class="invalid-feedback">Tanggal Surat Wajib Diisi!!!!!</div>
                                     </div>
                                </div>
                                <hr class="sidebar-divider mt-0">
                                <button type="submit" class="btn btn-sm btn-primary btn-icon-split"><span class="icon text-white-50"><i class="fas fa-save"></i></span><span class="text">Simpan</span></button>
                                <a class="btn btn-sm btn-danger btn-icon-split" href="<?php echo base_url('admin/strd') ?>"><span class="icon text-white-50"><i class="fas fa-times"></i></span><span class="text">&nbsp Batal &nbsp</span></a>
                            </form>
                            <?php endforeach ?>
                        </div>
                    </div>

            </div>
                <!-- /.container-fluid -->
        </div>
            <!-- End of Main Content -->

            