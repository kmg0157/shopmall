<?php

$conn = mysqli_connect("localhost", "root", "adminpw");

if (mysqli_connect_errno()) {
    printf("MySQL 서버 연결 실패!<Br>%s", mysqli_connect_error());
    exit();
}
?>