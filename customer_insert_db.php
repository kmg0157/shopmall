<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 DB 저장</title>
</head>
<body>

<?php
    include "../../common/include/inc_idpw_REQUEST_check.php";

    include "../../common/include/connect_login_db_check.php";

    $cust_id=$_POST["cust_id"];

    $sql="SELECT*FROM customer WHERE cust_id='$cust_id'";
    $result=mysqli_query($conn,$sql);

    if((mysqli_num_rows($result)>0)){
        echo"<script>alert('사용할 수 없는 아이디입니다!');
        history.go(-1);
        </script>";
    }else{
        include "../../common/include/inc_data_assign_ins_upd.php";

        $sql="INSERT
        INTO customer(cust_id,cust_pw,cust_name,cust_tel_no,cust_addr,cust_gender,cust_email,cust_join_date)
        VALUES('$cust_id','$cust_pw','$cust_name','$cust_tel_no','$cust_addr','$cust_gender','$cust_email',now())
        ";
        $result=mysqli_query($conn,$sql);

        if($result){
            printf("고객테이블에 %d개 튜플 저장 성공!<Br>",mysqli_affected_rows($conn));
        }else{
            printf("고객테이블에 튜플 저장 실패!!<Br>",mysqli_error($conn));
        }

        mysqli_close($conn);

        echo "<script>alert('회원정보가 저장되었습니다!');
        location.href='./customer_maintenance.php';
        </script>";
    }
?>
</body>
</html>