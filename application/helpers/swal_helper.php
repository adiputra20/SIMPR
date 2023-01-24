<?php
    
    function set_notifikasi_swal($icon, $title, $text){
        session()->set_flashdata('pesan',$icon);
        session()->set_flashdata('title',$title);
        session()->set_flashdata('text',$text);
    }
