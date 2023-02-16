<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>고객정보 테이블 검색</title>
    <link rel="stylesheet" href="../../common/CSS/table_100.css">
</head>
<?php
    include "../../common/include/connect_login_db_check.php";

    $sql="SELECT * FROM customer ORDER BY cust_id ASC";
    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)){
        ?>

<body>
    <form name="customer_form_table">
        <table>
            <caption>고객정보 테이블 검색</caption>
            <tr>
                <th>아이디</th>
                <th>비밀번호</th>
                <th>이름</th>
                <th>전화번호</th>
                <th>주소</th>
                <th>성별</th>
                <th>이메일</th>
                <th>가입일</th>
                <th>갱신</th>
                <th>삭제</th>
            </tr>

            <?php
                while($customer=mysqli_fetch_array($result)){
            ?>
            <tr>
                <td><?php echo $customer["cust_id"]; ?></td>
                <td><?=$customer["cust_pw"];?></td>
                <td><?=$customer["cust_name"];?></td>
                <td><?=$customer["cust_tel_no"];?></td>
                <td><?=$customer["cust_addr"];?></td>

                <?php
                    if($customer["cust_gender"]=="M"){
                        $customer["gender"]="남자";
                    }else{
                        $customer["gender"]="여자";
                    }
                ?>

                <td><?=$customer["cust_gender"]."(".$customer['gender'].")";?></td>
                <td><?=$customer["cust_email"];?></td>
                <td><?=$customer["cust_join_date"];?></td>
                <td style="text-align:center;">
                    <a href="./customer_update_retrieval.php?cust_id=<?=$customer["cust_id"];?>&cust_pw=<?=$customer["cust_pw"]; ?>">[갱신]</a>
                </td>
                <td style="text-align:center;">
                    <a href="./customer_delete_retrieval.php?cust_id=<?=$customer["cust_id"];?>&cust_pw=<?=$customer["cust_pw"]; ?>">[삭제]</a>
                </td>
            </tr>

            <?php
            }
                echo"</table>
                </form>
            </body>
            </html>";

            printf("고객테이블 %d개 튜플 검색 성공!<Br>",mysqli_affected_rows($conn));
            mysqli_free_result($result);
    }else{
        printf("고객테이블이 비어 있습니다!<Br>");
    }

    mysqli_close($conn);
    ?>
    <input type="button" value="고객정보관리" onclick="location.href='./customer_maintenance.php';">