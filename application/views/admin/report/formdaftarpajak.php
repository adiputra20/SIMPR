   
   <body>
        <div class="container-fluid">
            <div class="table-responsive tabel-bordered">
                <label for="nomor" class="col-md-9 col-form-label"><?php  echo $title; ?></label>
                <div class="table-responsive">
                    <table width="100%" cellspacing="0">
                        <tr colspan="3">
                            <td></td><td class="text-right text-gray-900">Nomor Formulir :</td><td width="15%"><input type="text"></td>
                        </tr>
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" colspan="3="> <h1 class="h5 mb-0 text-gray-800 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900" colspan="3="> <h1 class="h4 mb-0 text-gray-800 ml-3 text-center">BADAN PENDAPATAN DAERAH</h1></td>  
                        </tr>
                    </table>
                    <hr color="black" class="sidebar-divider mt-2">
                    <table width="100%" cellspacing="0">
                        <tr colspan="3">
                            <td width="27%"></td>
                            <td class="text-gray-900 p-3 text-center mb-1"><u><b>FORMULIR PENDAFTARAN WAJIB <?php echo $jenis; ?> DAERAH</b></u></td>
                            <td width="27%"></td>
                        </tr>
                        <tr><td></td><td class="text-gray-100 text-right"></td><td class="text-gray-900 mt-3">Kepada</td></tr>
                        <tr><td></td><td class="text-gray-900 text-right">Yth. </td><td class="text-gray-900">Kepala Badan Pendapatan Daerah</td></tr>
                        <tr><td></td><td class="text-gray-900 text-right"></td><td class="text-gray-900"><?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></td></tr>
                        <tr><td></td><td class="text-gray-900 text-right"></td><td class="text-gray-900">di - </td></tr>
                        <tr><td></td><td class="text-gray-900 text-right"></td><td class="text-gray-900">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<u><b><?php foreach ($pemda as $client){ echo $client->ibu_kota; }; ?></b></u></td></tr>
                    </table>
                    <table width="100%" cellspacing="0">
                        <tr colspan="1"><td width="2%"></td><td class="text-gray-900"><b>PERHATIAN</b></td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">1. Harap diisi dalam rangkap 2 (dua) dengan huruf CETAK.</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">2. Berikan tanda V pada tempat yang tersedia untuk jawaban yang diberikan.</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">3. Setelah formulir pendaftaran ini diisi dan ditandatangani, harap diserahkan kembali kepada Badan Pendapatan Daerah</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?> secara langsung paling lambat 7 hari kerja.</td><td></td></tr>
                        <tr></tr><td></td><td></td><td><br></td>
                        <tr colspan="1"><td width="2%"></td><td class="text-gray-900 text-center"><b>DIISI OLEH SELURUH WAJIB <?php echo $jenis; ?></b></td><td></td></tr>
                        <tr></tr><td></td><td></td><td><br></td>
                    </table>
                    <table width="100%" cellspacing="0">
                        <tr colspan="3"><td width="2%" ></td>
                            <td class="text-gray-900" width="45%">1. Nama Badan/Merk Usaha</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">2. Alamat (sesuai dengan KTP, dilampirkan)</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- Jalan/No</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Kabupaten</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- RT/RW/Dusun/Lingk.</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Nomor Telepon</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- Desa/Kelurahan</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Kode Pos</label> <input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">3. Surat Izin yang dimiliki (dilampirkan)</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">SITU</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">Nomor & Tanggal</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">Surat Izin ..........</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">Nomor & Tanggal</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">Surat Izin ..........</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">Nomor & Tanggal</label> <input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">4. Bidang Usaha (diisi sesuai dengan bidang usahanya)</td><td></td></tr>   
                            <tr><td width="2%" ></td>
                                <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
                                        <label class="form-check-label" for="inlineCheckbox1">Hotel/Penginapan/Losmen/Wisma/Guest House</label>
                                    </div>
                                </td>
                            <tr><td></td>
                                <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Restoran</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Rumah Makan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Kios</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Hiburan</label>
                                    </div>
                                </td>  
                            </tr>
                            <tr><td></td>
                                <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Reklame</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Penerangan Jalan</label>
                                    </div>
                                <td>
                            <tr><td></td>   
                                <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Penggunaan Aset Pemda</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="inlineCheckbox2" value="option2">
                                        <label class="form-check-label" for="inlineCheckbox2">Sewa Rumah Dinas</label>
                                    </div>
                                </td>  
                            </tr>
                            <tr><td width="2%" ></td>
                            <td class="text-gray-900">2. Alamat Lokasi Usaha</td><td></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- Jalan/No</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Kabupaten</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- RT/RW/Dusun/Lingk.</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Nomor Telepon</label><input type="text" class="col-md-7"></td></tr>
                        <tr><td width="2%" ></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-5 col-form-label">- Desa/Kelurahan</label><input type="text" class="col-md-6"></td>
                            <td class="text-gray-900">&nbsp;&nbsp;&nbsp;&nbsp;<label class="col-md-4 col-form-label">- Kode Pos</label> <input type="text" class="col-md-7"></td></tr>                
                        <tr><td></td><td></td>
                            <td class="text-gray-900 text-center"><br></td>
                        </tr>
                        <tr><td></td><td></td>
                            <td class="text-gray-900 text-center"><?php foreach ($pemda as $client){ echo $client->ibu_kota; }; ?>, ................... 20.......</td>
                        </tr>
                        <tr><td></td><td></td>
                            <td class="text-gray-900 text-left">Nama Jelas :</td>
                        </tr>
                        <tr><td></td><td></td>
                            <td class="text-gray-900 text-left"><br><br><br><br>  Tanda Tangan :</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    <script>
        window.print();
        window.onafterprint = back;

        function back() {
            window.history.back();
        }
    </script>
</html>