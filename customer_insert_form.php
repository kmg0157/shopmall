<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>회원정보 입력(customer_insert_form.php)</title>
    <link rel="stylesheet" href="../shopmall/common/css/common.css">
</head>
<body>

    <form name="customer_form" method="post" action="customer_insert_db.php">
        <table>
            <caption>회원정보 입력</caption>
            <tr style="border-style:hidden hidden solid hidden;">
            <td colspan="2" style="backgroud-color:white; text-align: right;">
            <span class="msg_red">* 부분은 필수입력 항목입니다!</span></td>
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
            <tr>
                <th>
                    <span class="msg_red">*</span>이 &nbsp; 름 &nbsp;&nbsp;
                </th>
                <td>
                    <input type="text" name="cust_name" size="15" maxlength="15" required>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>전화번호
                </th>
                <td>
                    <select name="tel_no_gubun" required>
                        <option selected value="">서비스 구분</option>
                        <option value="010">010</option>
                        <option value="011">011</option>
                        <option value="016">016</option>
                        <option value="017">017</option>
                        <option value="018">018</option>
                        <option value="019">019</option>
                    </select>-
                    <input type="text" name="tel_no_guk" size="5" maxlength="4" required>-
                    <input type="text" name="tel_no_seq" size="5" maxlength="4" required>
                </td>
            </tr>
            <tr>
                <th>
                    <span class="msg_red">*</span>주 &nbsp; 소 &nbsp;&nbsp;
                </th>
                <td>
                    <input type="text" name="cust_addr" size="60" maxlength="60" required>
                </td>
            </tr>
            <tr>
                <th>
                    성 &nbsp; 별 &nbsp;&nbsp;
                </th>
                <td>
                    <input type="radio" name="cust_gender" value="M" checked>남자 &nbsp;
                    <input type="radio" name="cust_gender" value="F">여자
                </td>
            </tr>
            <tr>
                <th>
                    이 메 일
                </th>
                <td>
                    <input type="text" name="cust_email_1" size="15" maxlength="10">@
                    <input type="radio" name="cust_email_2" size="20" maxlength="20">
                </td>
            </tr>
            <tr>
                <td colspan="2" style="text-align:center;">
                    <input type="submit" value="회원가입">
                    <input type="button" value="고객정보 관리" onClick="locaion.href='./customer_maintenance.php';">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>