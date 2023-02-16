<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 DB 삭제</title>
</head>
<body>
    <?php
        include "../../common/include/inc_idpw_REQUEST_check.php";
        include "../../common/include/connect_login_db_check.php";

        $cust_id=$_POST["cust_id"];
        $cust_pw=trim($_POST["cust_pw"]);

        $query="DELETE FROM customer WHERE (cust_id='$cust_id') and (cust_pw='$cust_pw')";
        $result=mysqli_query($conn,$result);

        if($result){
            printf("고객테이블의 %d개 튜플 삭제 성공!<Br>",mysqli_affected_rows($conn));
        }else{
            printf("고객테이블의 튜플 삭제 실패!<Br>%s",mysqli_error($conn));
        }

        mysqli_close($conn);

        echo"<script>alert('회원정보가 삭제되었습니다!');
                location.href='./customer_maintenance.php';
            </script>";
    ?>
</body>
</html>