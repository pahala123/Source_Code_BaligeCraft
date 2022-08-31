<?php
$host       = 'localhost:3307';
$user       = 'root';
$password   = '';
$db         = 'rating';

$con    = new mysqli($host, $user, $password, $db);

$ipuser = md5($_SERVER['REMOTE_ADDR']);

if (isset($_POST['rate']) && is_numeric($_POST['rate'])) {
    $rate = $con->real_escape_string($_POST['rate']);

    //cek apakah user telah memberi penilaian
    $sql = $con->query("SELECT * FROM `t_rating` WHERE ipuser = '" . $ipuser . "'");

    //hitung row
    if ($sql->num_rows > 0) {
        //lakukan update jika user sudah pernah menilai
        $con->query("UPDATE `t_rating` SET `rate` = '" . $rate . "' WHERE `ipuser` = '" . $ipuser . "'");
    } else {
        //simpan jika user belum pernah menilai
        $con->query("INSERT INTO `t_rating` VALUES ('" . $ipuser . "', '" . $rate . "')");
    }

    //hitung rata-rata
    $q = $con->query("SELECT AVG(rate) AS jml FROM t_rating")->fetch_assoc();

    echo $rate . '|' . ceil($q['jml']) . '|';
    for ($i = 0; $i < ceil($q['jml']); $i++) {
        echo '<span class="on"><i class="fa fa-star"></i></span>';
    }
    for ($i = 5; $i > ceil($q['jml']); $i--) {
        echo '<span class="off"><i class="fa fa-star"></i></span>';
    }
}
