<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 삭제(customer_delete_form.php)</title>
    <link type="text/css" rel="stylesheet" href="../../common/CSS/common.css">
</head>
<body>
    <form action="customer_delete_retrieval.php" name="customer_fomr" method="post">
        <table>
            <caption>회원정보 삭제</caption>
            <tr style="border-style: hidden hidden solid hidden;">
                <td colspan="2" style="background-color: white; text-align: right;">
                    <span class="msg_red">* 부분은 필수입력 항목입니다!</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>아 이 디
                </th>
                <td>
                    <input type="text" name="cust_id" size="10" maxlength="10" required autofocus>
                    <span class="msg_blue">(영,숫자 10자리이내)</span>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>비밀번호
                </th>
                <td>
                    <input type="password" name="cust_pw" size="11" maxlength="10" required>
                    <span class="msg_blue">(영,숫자 10자리이내)</span>
                </td>
            </tr>

            <?php
                include "../../common/include/inc_form_ret_upd_del.php";
            ?>

            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="회원정보 검색">
                    <input type="button" value="고객정보 관리" onClick="location.href='./customer_maintenance.php';">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>