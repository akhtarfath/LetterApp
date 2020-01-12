<?php $dsn= "mysql:host=localhost; dbname=kmft_surat";
    try {
        $conn = new PDO($dsn, 'akhtarfath', 'fathan10');
        // echo 'sukses!';
    } catch (PDOException $th) {
        echo $th->getMessage();
    }