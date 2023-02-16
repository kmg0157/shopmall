<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 검색(customer_retrieval_db.php)</title>
    <link type="text/css" rel="stylesheet" href="../../common/CSS/common.css">
</head>

<?php
    include "../../common/include/inc_idpw_REQUEST_check.php";

    include "../../common/include/connect_login_db_check.php";

    $cust_id=$_POST["cust_id"];
    $cust_pw=trim($_POST["cust_pw"]);

    $sql="SELECT*FROM customer WHERE (cust_id='$cust_id') and (cust_pw='$cust_pw')";

    $result=mysqli_query($conn,$sql);

    if(!(mysqli_num_rows($result)>0)){
        echo"<script>alert('존재하지 않는 아이디와 비밀번호입니다!');
        history.go(-1);
        </script>";
    }else{
        $tuple=mysqli_fetch_assoc($result);
        mysqli_free_result($result);
        mysqli_close($conn);
    }
?>
<body>
    <form name="customer_form">
        <table>
            <caption>회원정보 검색</caption>
            <tr style="border-style:hidden hidden solid hidden;">
                <td colspan="2" style="background-color: white; text-align: right;">
                </td>
            </tr>
            <?php
                include "../../common/include/inc_echo_data_ret_del.php";
            ?>

            <tr>
                <td colspan="2" style="text-align:center;">
                <input type="button" value="고객정보 관리" onClick="location.href='./customer_maintenance.php';">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>