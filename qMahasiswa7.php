<?php
    require_once 'koneksi.php';
    if(!$conn){
        die("KONEKSI GAGAL: ".mysqli_connect_error());

    } else {
        //echo("KONEKSI SUKSES");
    }

    //string untuk query
    $sql = "SELECT * FROM tmahasiswa WHERE TahunLulusSMA <2008 AND JenisKelamin='Perempuan'";

    //JALANKAN QUERY
    $r=mysqli_query($conn,$sql);

    //SIMPAN KE ARRAY
    $result = array();

    while($row = mysqli_fetch_array($r)){
        array_push($result, array(
            "nim"=>$row['NIM'],
            "nama"=>$row['NamaLengkap'],
            "programkelas"=>$row['ProgramKelas'],
            "tahunlulussma"=>$row['TahunLulusSMA']
            
        ));
    }
    echo json_encode($result);
    mysqli_close($conn);
?>