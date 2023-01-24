    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <small>
                    <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" ><h1 class="h5 mb-0 text-gray-800 font-weight-bold ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900"> <h1 class="h4 mb-0 text-gray-800 ml-3 font-weight-bold text-center"><b><?php echo $title; ?></b></h1></td>  
                        </tr>
                    </table>
                    <hr color="black" class="mt-2 mb-0"><br>
                    <?php foreach($nsts as $sts): ?>
                        <?php foreach($pemda as $client): ?>
                            <table width="100%" cellspacing="0">
                                <tr>
                                    <td width="5%"></td>
                                    <td class="text-gray-900"><b>Nomor : <?php echo $sts->nosts; ?></b></td>
                                    <td class="text-gray-900" width="10%">Bank</td>
                                    <td class="text-gray-900" width="1%">&nbsp;:&nbsp;</td>
                                    <td class="text-gray-900" width="27%"><?php foreach ($pemda as $client){ echo $client->bank; }; ?></td>
                                </tr>
                                <tr>
                                    <td></td><td></td>
                                    <td class="text-gray-900">No. Rekening</td>
                                    <td class="text-gray-900" width="1%">&nbsp;:&nbsp;</td>
                                    <td class="text-gray-900" width="27%"><?php echo $sts->norek; ?></td>
                                </tr><tr><td><br></td><td></td><td></td><td></td><td></td></tr>
                                <tr>
                                    <td><br></td>
                                    <td class="text-gray-900" colspan="4">Harap diterima uang sebesar Rp. <?php echo number_format($sts->nilai,0,',','.'); ?></td>
                                </tr>
                                <tr>
                                    <td><br></td>
                                    <td class="text-gray-900" colspan="4">dengan huruf ( <?php echo $terbilang; ?> )</td>
                                </tr>
                                <tr><td colspan="5"><br></td></tr>
                                <tr><td colspan="5" class="text-gray-900">Dengan rincian penerimaan sebagai berikut</td></tr>
                            </table>
                            <table width="100%" cellspacing="0" border="1">
                                <tr>
                                    <td class="text-gray-900 text-center font-weight-bold">No.</td>
                                    <td colspan="6" class="text-gray-900 text-center font-weight-bold">Kode Rekening</td>
                                    <td class="text-gray-900 text-center font-weight-bold">Uraian Rincian Obyek</td>
                                    <td class="text-gray-900 text-center font-weight-bold" width="15%">Jumlah<br>(Rp)</td>
                                </tr>
                                <tr>
                                    <td class="text-gray-900 text-center" width="3%">1</td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,0,1); ?></td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,2,1); ?></td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,4,2); ?></td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,7,2); ?></td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,10,2); ?></td>
                                    <td class="text-gray-900 text-center" width="5%"><?php echo substr($sts->kodelra,13,4); ?></td>
                                    <td class="text-gray-900">&nbsp;&nbsp;&nbsp;<?php echo $sts->obyek; ?></td>
                                    <td class="text-gray-900 text-right" width="15%"><?php echo number_format($sts->nilai,0,',','.'); ?></td>
                                </tr>
                                <tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr>
                                <tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr>
                                <tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr>
                                <tr><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td><td><br></td></tr>
                                <tr>
                                    <td class="text-gray-900 text-right font-weight-bold" colspan="8">JUMLAH &nbsp;&nbsp;&nbsp;</td>
                                    <td class="text-gray-900 text-right font-weight-bold" width="15%"><?php echo number_format($sts->nilai,0,',','.'); ?></td>
                                </tr>
                            </table>
                            <table width="100%" cellspacing="0">
                                <tr><td colspan="2" class="text-gray-900">uang tersebut diterima pada tanggal <?php echo date("d F Y",strtotime($sts->tanggal)); ?> </td></tr>
                                <tr><td colspan="2"><br></td></tr>
                                <tr>
                                    <td class="text-center text-gray-900" width="50%">Mengetahui</td>
                                    <td class="text-gray-900 text-center"><?php echo $client->ibu_kota ?>, <?php echo date("d F Y",strtotime($sts->tanggal)); ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center text-gray-900" width="50%">Pengguna Anggaran</td>
                                    <td class="text-center text-gray-900" width="50%">Bendahara Penerimaan</td>
                                </tr>
                                <tr><td><br></td><td></td></tr>
                                <tr><td><br></td><td></td></tr>
                                <tr><td><br></td><td></td></tr>
                                <tr>
                                    <td class="text-center text-gray-900"><?php foreach ($pemda as $client){ echo $client->nama_kaban; }; ?></td>
                                    <td class="text-center text-gray-900"><?php foreach ($pemda as $client){ echo $client->nama_bend; }; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center text-gray-900"><?php foreach ($pemda as $client){ echo $client->nip_kaban; }; ?></td>
                                    <td class="text-center text-gray-900"><?php foreach ($pemda as $client){ echo $client->nip_bend; }; ?></td>
                                </tr>
                                <tr>
                                    <td class="text-center text-gray-900"><br></td>
                                    <td class="text-center text-gray-900"></td>
                                </tr>
                                <tr>
                                    <td class="text-gray-900 font-italic">(catatan: STS dilampiri slip setoran bank)</td>
                                    <td class="text-center text-gray-900"></td>
                                </tr>
                            </table>
                        <?php endforeach; ?>
                    <?php endforeach; ?>
                </div>
            </small>
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