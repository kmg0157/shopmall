<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>테이블 생성</title>
</head>
<body>
<b>고객테이블(customer) 생성</b></p>

<?php
include "../project/shopmall/include/connect_login_check.php";

$sql = "DROP DATABASE shopdb";
$result = mysqli_query($conn, $sql);

if ($result) {
    printf("쇼핑몰 데이터베이스 삭제 성공!");
} else {
    printf("쇼핑몰 데이터베이스 삭제 실패!!<Br>%s", mysqli_error($conn));
}

mysqli_close($conn);
?>

</body>
</html>