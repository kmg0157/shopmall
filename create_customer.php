<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>테이블 생성</title>
</head>
<body>
    <b>고객테이블(customer)  생성</b>
    <?php
    include "../project/shopmall/common/include/connect_login_check.php";

    $sql="CREATE TAVLE customer(

        cust_id varchar(10) NOT NULL,
        cust_pw varchar(13),
        cust_name varchar(15),
        cust_tel_no varchar(13),
        cust_addr varchar(100),
        cust_gender char(1),
        cust_email varchar(30),
        cust_join_date date,
        primary key(cust_id))";

    $result=mysqli_query($conn,$sql);

    if ($result) {
        print("고객테이블 생성 성공!");
    } else {
        printf("고객테이블 생성 실패!!<Br>%s", mysqli_error($conn));
    }

    mysqli_close($conn);
    ?>
</body>
</html>