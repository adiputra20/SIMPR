    
    <body>
        <div class="container-fluid">
            <div class="table-responsive">
                <table width="100%" cellspacing="0">
                        <tr>
                            <td class="text-gray-900 text-center text-bold mb-1" rowspan="2" width="7%"><img src="<?php echo base_url().'assets/img/logo.png';?>" class="img-fluid ml-2.5" width="60px"></td>
                            <td class="text-gray-900" colspan="3="> <h1 class="h6 mb-0 text-gray-800 ml-3 text-center"><b>PEMERINTAH <?php foreach ($pemda as $client){ echo $client->Nama_Pemda; }; ?></b></h1></td> 
                        </tr>
                        <tr>
                            <td class="text-gray-900" colspan="3="> <h1 class="h5 mb-0 text-gray-800 ml-3 text-center">BADAN PENDAPATAN DAERAH</h1></td>  
                        </tr>
                </table>
                <hr color="black" class="sidebar-divider text-gray-100 mt-2">
                <center><label for="nomor" class="col-md-9 col-form-label text-gray-900">REGISTER <?php echo $jenis ?></label></center>
                <div class="table-responsive">
                    <small>
                    <table class="table table-bordered table-sm text-gray-900" id="dataTable" width="100%" cellspacing="0">
                    <!-- <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"> -->
                        <thead>
                            <tr>
                                <th class="text-center">NPWRD</th>
                                <th class="text-center">Nama Pemilik</th>
                                <th class="text-center">Nama/Merk Usaha</th>
                                <th class="text-center">Jenis Usaha</th>
                                <th class="text-center">Lokasi Usaha</th>
                                <th class="text-center">No. Surat Izin</th>
                                <th class="text-center">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($wajibp as $wp): ?>
                                <tr>
                                    <td><?php echo $wp->npwprd; ?></td>
                                    <td><?php echo $wp->namapemilik; ?></td>
                                    <td><?php echo $wp->namausaha; ?></td>
                                    <td><?php echo $wp->jenisusaha; ?></td>
                                    <td><?php echo $wp->alamatusaha; ?></td>
                                    <td><?php echo $wp->situ; ?></td>
                                    <!-- <td><?php echo date("d  F Y",strtotime($wp->tanggal)); ?></td> -->
                                    <td><?php if($wp->status==1){ echo "beroperasi"; }else{ echo "tutup"; }; ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <table width="100%" cellspacing="0" class="text-gray-900">
                        <tr>
                        </tr>
                        <tr>
                            <td></td><td class="text-center" width="50%" colspan="3=">KEPALA BADAN PENDAPATAN DAERAH<br><br><br><br><br><br></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo $client->nama_kaban; }; ?></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo $client->pangkat; }; ?></td> 
                        </tr>
                        <tr>
                            <td></td><td class="text-center" colspan="3="><?php foreach ($pemda as $client){ echo "NIP. ".$client->nip_kaban; }; ?><br><br></td> 
                        </tr>
                    </table>
                    </small>
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