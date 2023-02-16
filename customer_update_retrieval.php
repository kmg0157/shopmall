<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 갱신(customer_update_retieval.php)</title>
    <link type="text/css" rel="stylesheet" href="../../common/CSS/common.css">
</head>
<?php
    include "../../common/include/inc_idpw_REQUEST_check.php";

    include "../../common/include/connect_login_db_check.php";

    $cust_id=$_REQUEST["cust_id"];
    $cust_pw=trim($_REQUEST["cust_pw"]);

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
<form action="customer_update_db.php" name="customer_form" method="post">
        <table>
            <caption>회원정보 검색(갱신)</caption>
            <tr style="border-style:hidden hidden solid hidden;">
                <td colspan="2" style="background-color:white; text-align:right;">
                    <span class="msg_red">* 부분은 필수입력 항목입니다!</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>아 이 디
                </th>
                <td>
                    <input type="text" name="cust_id" size="10" maxlength="10" value="<?=$tuple['cust_id'];?>"readonly>
                    <span class="msg_blue">(영,숫자 10자리이내)</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>비밀번호
                </th>
                <td>
                    <input type="text" name="cust_pw" size="10" maxlength="10" value="<?=$cust_pw; ?>" required autofocus>
                    <span class="msg_blue">(영,숫자 10자리이내)</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>이 &nbsp; 름 &nbsp;&nbsp;
                </th>
                <td>
                    <input type="text" name="cust_name" size="10" maxlength="5" value="<?=$tuple['cust_pw']; ?>" required>
                    <span class="msg_blue">(영,숫자 10자리이내)</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>전화번호
                </th>
                <td>
                    <select name="tel_no_gubun">
                        <option selected value="">서비스 구분</option>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="016">016</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="019">019</option>
                        <?php
                            $cust_tel_no=explode("-",$tuple["cust_tel_no"],3);

                            if($cust_tel_no[0]=="010"){
                                echo '<option selected value="010">010</option>';
                            }elseif($cust_tel_no[0]=="011"){
                                echo '<option selected value="011">011</option>';
                            }elseif($cust_tel_no[0]=="016"){
                                echo '<option selected value="016">016</option>';
                            }elseif($cust_tel_no[0]=="017"){
                                echo '<option selected value="017">017</option>';
                            }elseif($cust_tel_no[0]=="018"){
                                echo '<option selected value="018">016</option>';
                            }elseif($cust_tel_no[0]=="019"){
                                echo '<option selected value="019">019</option>';
                            }else{
                                echo '<option selected value="">서비스구분</option>';
                            }
                        ?>
                    </select>
                    <input type="text" name="tel_no_guk" size="5" maxlength="4" value="<?=$cust_tel_no[1];?>"required>-
                    <input type="text" name="tel_no_seq" size="5" maxlength="4" value="<?=$cust_tel_no[2];?>"required>
                </td>
            </tr>
           <tr>
                <th>주 &nbsp; 소 &nbsp;&nbsp;</th>
                <td><input type="text" name="cust_addr" size="50" value="<?=$tuple['cust_addr'];?>">readonly</td>
            </tr>   

            <tr>
                <th>성 &nbsp; 별 &nbsp;&nbsp; </th>
                <td>
                    <?php
                        if($tuple["cust_gender"]=="M"){
                            echo'<input type="radio" name="cust_gender" value="M" checked disabled>남자&nbsp;
                            <input type="radio" name="cust_gender" value="F" disabled>여자</td>';
                        }elseif($tuple["cust_gender"]=="F"){
                            echo'<input type="radio" name="cust_gender" value="M" disabled>남자&nbsp;
                            <input type="radio" name="cust_gender" value="F" checked disabled>여자</td>';
                        }else{
                            echo'<input type="radio" name="cust_gender" value="M" disabled>남자&nbsp;
                            <input type="radio" name="cust_gender" value="F" disabled>여자</td>';
                        }
                    ?>
            </tr>
            <tr>
                <th>이 메 일</th>
                <td>
                    <?php
                        if(empty($tuple['cust_email'])){
                            $cust_email[0]="";
                            $cust_email[1]="";
                        }else{
                            $cust_email=explode("@",$tuple['cust_email'],2);
                        }
                    ?>
                    <input type="text" name="cust_email_1" size="15" maxlength="10" value="<?=$cust_email[0];?>">@
                    <input type="text" name="cust_email_2" size="20" maxlength="20" value="<?=$cust_email[1];?>">
                </td>
            </tr>
            <tr>
                 <th><span style="color:red;">가 입 일</span></th>
                td><input type="text" name="cust_join_date" size="10" value="<?=$tuple['cust_join_date'];?>"readonly></td>
            </tr>   

            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="갱신하시겠습니까?">
                    <input type="button" value="갱신 취소" onClick="location.href='./customer_maintenance.php';">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>