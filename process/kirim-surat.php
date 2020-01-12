<?php session_start(); include('../config/db_conn.php');

    $id_user = $_POST['id_user'];
    $no_surat = $_POST['no_surat'];
    $batas_waktu = $_POST['tgl_surat'];
    $isi_surat = $_POST['isi_surat'];
    
    $nama_file = $_FILES['file_surat']['name'];
    $ukuran_file = $_FILES['file_surat']['size'];
    $tipe_file = $_FILES['file_surat']['type'];
    $tmp_file = $_FILES['file_surat']['tmp_name'];

    $id_surat = uniqid();
    
    // Set path folder tempat menyimpan gambarnya
    $path = "berkas-surat/".$nama_file;

    $data[] = $id_surat;
    $data[] = $batas_waktu.$nama_file;
    $data[] = $path;

    $data1[] = $id_surat;
    $data1[] = $id_user;
    $data1[] = $isi_surat;
    $data1[] = $batas_waktu;
    $data1[] = $no_surat;

    // var_dump($data);

    try {        
        $kirim = $conn -> prepare("INSERT INTO surat (id_surat, id_user, isi_surat, tanggal_surat, nmr_surat, status) 
        VALUES (?, ?, ?, ?, ?, 0)");
        $resultSurat = $kirim -> execute($data1);
        
        var_dump($resultSurat);

        $sql = $conn -> prepare("INSERT INTO file_surat (id_surat, nm_file, path) VALUES (?, ?, ?)");
        $resultFile = $sql -> execute($data);
        
        var_dump($resultFile);
    } catch (Exception $th) {
        echo $th->getMessage();
    }

    move_uploaded_file($tmp_file, '../'.$path);
    
?>