<?php
$conn = mysqli_connect("localhost", "root", "adminpw", "shopdb");

if (mysqli_connect_errno()) {
    printf("Mysql 서버와 데이터베이스 연결 실패!!<Br>%s", mysqli_connect_error());
}

?>