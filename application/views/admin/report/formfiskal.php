    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" ><h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900"> <h1 class="h4 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b>BADAN PENDAPATAN DAERAH</b></h1></td>  
                        </tr>
                </table>
                <hr color="black" class="mt-2 mb-0"><br>
                <?php foreach($fiskal as $fiskal): ?>
                    <?php foreach($pemda as $client): ?>
                        <table width="100%" cellspacing="0">
                            <tr><td class="text-center text-gray-900 mb-0"><b><u><?php echo $title; ?></u></b></td></tr>
                            <tr><td class="text-center text-gray-900"><b>Nomor : <?php echo $fiskal->nomorfiskal; ?></b></td></tr>
                            <tr><td><br></td></tr>
                            <tr><td><br></td></tr>
                            <tr><td><br></td></tr>
                        </table>
                        <table cellspacing="0">
                            <tr colspan="2"><td width="10%"></td>
                                <td class="text-gray-900">Kepala Badan Pendapatan Daerah <?php echo $client->Nama_Pemda; ?> menerangkan dengan sebenarnya bahwa :</td>
                            </tr>
                        </table>
                        <table cellspacing="0">
                            <tr colspan="4"><td width="25%"><br></td></tr>
                            <tr>
                                <td></td><td class="text-gray-900">Nama Pemilik</td><td>:</td><td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $fiskal->namapemilik; ?></td>
                            </tr>
                            <tr>
                                <td></td><td class="text-gray-900">Nama Badan Usaha&nbsp;&nbsp;&nbsp;</td><td>:</td><td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $fiskal->namausaha; ?></td>
                            </tr>
                            <tr>
                                <td></td><td class="text-gray-900">Alamat</td><td>:</td><td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $fiskal->alamat; ?></td>
                            </tr>
                            <tr>
                                <td></td><td class="text-gray-900">NPWP</td><td>:</td><td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $fiskal->npwp; ?></td>
                            </tr>
                            <tr>
                                <td></td><td class="text-gray-900">Jenis Badan Usaha</td><td>:</td><td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $fiskal->jenisusaha; ?></td>
                            </tr>
                            <tr><td><br></td></tr>
                        </table>
                        <table cellspacing="0">
                            <tr colspan="2"><td width="8%"></td>
                                <td class="text-gray-900">Telah melunasi pembayaran pajak dan retribusi daerah terhitung dari&nbsp;<?php echo date("d F Y",strtotime($fiskal->tanggalawal)); ?> sampai dengan <?php echo date("d F Y",strtotime($fiskal->tanggalakhir)); ?></td>
                            </tr>
                        </table>
                        <br><br>    
                        <table cellspacing="0">
                            <tr>
                                <td width="65%"></td>
                                <td class="text-gray-900 text-center"><?php echo $client->ibu_kota ?>, <?php echo date("d F Y",strtotime($fiskal->tanggalcetak)); ?></td>
                            </tr>
                            <tr><td></td><td class="text-gray-900 text-center">KAPALA BADAN PENDAPATAN DAERAH<br><br><br><br><br></td></tr>
                            <tr><td></td><td class="text-gray-900 text-center"><?php echo $client->nama_kaban ?></td></tr>
                            <tr><td></td><td class="text-gray-900 text-center"><?php echo $client->pangkat ?></td></tr>
                            <tr><td></td><td class="text-gray-900 text-center">NIP. <?php echo $client->nip_kaban ?></td></tr>
                        </table>
                    <?php endforeach; ?>
                <?php endforeach; ?>
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