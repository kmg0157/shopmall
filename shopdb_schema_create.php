<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>쇼핑몰데이터베이스 스키마 생성</title>
</head>
<body>
<b>쇼핑몰데이터베이스 스키마 생성(shopdb_customer)</b></p>

<?php
include "../project/shopmall/include/connect_login_check.php";

$sql = "CREATE DATABASE shopdb";
$result = mysqli_query($conn, $sql);

if (mysqli_errno($conn)) {
    printf("쇼핑몰데이터베이스 생성 실패!!<Br>%s", mysqli_error($conn));
    exit();
} else {
    printf("쇼핑몰데이터베이스 생성 성공!<Br>");

    mysqli_select_db($conn, "shopdb") or
        die("선택한 쇼핑몰데이터베이스(shopdb)찾기 실패!!" . mysqli_error($conn));

    $sql="CREATE TABLE customer(
        cust_id varchar(10)NOT NULL,
        cust_pw varchar(13),
        cust_name varchar(15),
        cust_tel_no varchar(13),
        cust_addr varchar(100),
        cust_gender char(1),
        cust_email varchar(30),
        cust_join_date date,
        primary key(cust_id))";

    $result=mysqli_query($conn,$sql);
    
    if($result){
        printf("고객테이블 생성 성공!<Br>");
    }else{
        printf("고객테이블 생성 실패!!%s<Br>", mysqli_error($conn));
    }
}

mysqli_close($conn);
?>

</body>
</html>