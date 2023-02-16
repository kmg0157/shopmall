<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>데이터베이스 생성</title> 
    </head>
    <body>
        <b>쇼핑몰 데이터베이스(shopdb) 생성</b></p>

        <?php
        include "../project/shopmall/common/include/connect_login_check.php";

        $sql = "CREATE DATABASE shopdb";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            printf("쇼핑몰 데이터 베이스 생성 성공!");
        } else {
            printf("쇼핑몰 데이터 베이스 생성 실패!!<Br>%s", mysqli_error($conn));
        }

        mysqli_close($conn);
        ?>
    </body>
</html>