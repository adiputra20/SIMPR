
    <body>
        <?php foreach($wajibp as $data): ?>
            <table border="1" cellspacing="0" width="100%">
                <tr>
                    <td rowspan="2" width="10%"><center><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="85px"></center></td>
                    <td width="70%">
                        <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 mt-2 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1>
                        <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>SPTPD</b></h1>
                        <h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>(SURAT PEMBERITAHUAN PAJAK DAERAH)</b></h1>
                    </td>
                    <td class="text-center">
                        <small class="font-weight-bold text-gray-900"> Lembar 1<br>Untuk Wajib Pajak</small>
                    </td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <td>
                        <label class="col-sm-6 col-form-label ml-4 text-gray-900 mb-0">BADAN PENDAPATAN DAERAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></label><br>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;A.</label>
                            <label class="col-sm-3 col-form-label text-gray-900">1. Nama Wajib Pajak</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->namapemilik; ?> ">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">2. Alamat Wajib Pajak</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->alamatpemilik; ?>">
                            </div>
                        </div>
                    </td>
                </tr>
            </table>
            <table width="100%" cellspacing="0" border="1">
                <tr>
                    <td>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;B.</label>
                            <label class="col-sm-3 col-form-label text-gray-900">1. NPWPD)*</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->npwprd; ?> ">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">2. Nama Usaha</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->namausaha; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">3. Jenis Usaha</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->jenisusaha; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">4. Alamat Usaha</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->alamatusaha; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">5. Keluarahan/Desa</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->desa; ?>">
                            </div>
                        </div>
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;</label>
                            <label class="col-sm-3 col-form-label text-gray-900">6. Kecamatan/Distrik</label>
                            <div class="col-sm-6 ml-0">
                                <input type="text" readonly class="form-control-plaintext text-gray-900" value=": <?php echo $data->kecamatan; ?>">
                            </div>
                        </div>
                    
                        <div class="form-group row mb-0 ml-2">
                            <label class="col-sm-1 col-form-label text-gray-900">&nbsp;&nbsp;&nbsp;C.</label>
                            <label class="col-sm-3 col-form-label text-gray-900">Penghitungan Pajak Daerah</label>
                        </div>
                    </td>
                </tr>
            </table>
            <table border="1" width="100%" cellspacing="0" class="text-gray-900">
                <tr class="text-center">
                    <td>Uraian)*</td>
                    <td width="25%">Peredaran Usaha/Pembukuan</td>
                    <td width="20%">Tarif Pajak</td>
                    <td width="20%">Besarnya Pajak Daerah</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pajak Hotal</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pajak Restoran/Rumah Makan</td>
                    <td class="text-center">12 Bulan</td>
                    <td class="text-right">Rp. 200.000,-&nbsp;&nbsp;</td>
                    <td class="text-right">Rp. 2.400.000,-&nbsp;&nbsp;</td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pajak Hiburan</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pajak....................</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </table>
            <table border="1" width="100%" cellspacing="0" class="text-gray-900">
                <tr>
                    <td></td>
                    <td width="20%" class="text-right">Jumlah Pajak Daerah</td>
                    <td width="20%" class="text-right">Rp. 2.400.000,-</td>
                </tr>
            </table>
            <table border="1" width="100%" cellspacing="0"><tr><td><br></td></tr></table>
            <table border="1" width="100%" cellspacing="0" class="text-gray-900 text-center">
                <tr>
                    <td width="33%">
                        <?php echo $client->ibu_kota.', '.date("d F Y",strtotime($data->tanggal)); ?><br>Wajib Pajak<br><br><br><br><br>
                        <?php echo $data->namapemilik; ?>
                    </td>
                    <td>
                        Diterima Oleh<br><?php echo $client->jbt_kaban; ?><br><br><br><br>
                        <?php echo $client->nama_kaban; ?><br>
                        <?php echo $client->nip_kaban; ?>
                    </td>
                    <td width="33%">
                        Telah Diverifikasi<br><?php echo $client->jbt_kabid; ?><br><br><br><br>
                        <?php echo $client->nama_kabid; ?><br>
                        <?php echo $client->nip_kabid; ?>
                    </td>
                </tr>
            </table> 
        <?php endforeach; ?>
        
        <script>
            window.print();
            window.onafterprint = back;

            function back() {
                window.history.back();
            }
        </script>
    </body>