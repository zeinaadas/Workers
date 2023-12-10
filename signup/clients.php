<?php
include_once 'files/header.php';
?>
<div align="middle" style="width:100%">

<?php


if (isset($_POST['client_register']) && $_POST['client_register'] == 'انشاء حساب') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $act = 2;
    $city = $_POST['city'];
    
    
    $loginname = $_POST['loginname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
    $pass = $_POST['password'];
    $password = MD5(sha1($_POST['password']));
    $password2 = MD5(sha1($_POST['password2']));
    $infoUpdated = 1;



    $sql = mysqli_query($connect, "SELECT loginname FROM clients WHERE loginname='$loginname'");
    $num = mysqli_num_rows($sql);

    $sel2 = mysqli_query($connect, "SELECT email FROM clients WHERE email='$email' and email!=NULL");
    $num2 = mysqli_num_rows($sel2);

    if ($password !== $password2) {
        echo '<div class="error">الرجاء كتابة كلمة مرور متطابقة</div>';
    } elseif ($num > 0) {
        echo '<div class="error">الرجاء اختيار اسم دخوول أخر</div>';
    } elseif ($num2 > 0) {
        echo '<div class="error">البريد الإلكتروني موجود مسبقا</div>';
    } else {
        $sql="INSERT INTO clients (fname,lname,loginname,password,email,tel,act,city,address) VALUES ('$fname','$lname','$loginname','$password','$email','$tel','$act','$city','$address')";
        //echo $sql;
        //exit;
        $insert = mysqli_query($connect, $sql);
        $lid = mysqli_insert_id($connect);

		
		}



    if ($insert) {
        ?>
        <meta http-equiv="refresh" content="0;url=clients.php?finish=1"/>
        <?php
        exit;
    }
    
}
if (1) {
    ?>
        <br></br>
    <form method="post" enctype="multipart/form-data">
        <table dir="rtl" width="400px" class="tablein">
            <tr class="tr_title">
              <td colspan="2" style="padding-bottom:5px;">انشاء حساب زبون (باحث عن مهني)</td>
            </tr>
            <tr>
              <td colspan=2><hr></td>
            </tr>
            <tr>
                <td>الإسم الأول<br><input type="text" name="fname" required="required"/></td>
                <td>الإسم الأخير<br><input type="text" name="lname" /></td>
            </tr>
            <tr>
                <td>المدينة<br><input type="text" name="city" /></td>
                <td>العنوان<br><input type="text" name="address" /></td>
            </tr>
            <tr>

			    <td>رقم الهاتف<br><input type="text" name="tel"  /></td>

                <td>البريد الإلكتروني<br><input type="email" name="email" /></td>

            </tr>
            <tr>
              <td colspan=2><hr></td>
            </tr>
            <tr>
                <td>اسم الدخول<br><input type="text" name="loginname" required="required"/></td>
            </tr>
            <tr>
                <td>كلمة المرور<br><input type="password" name="password" required="required"/></td>
            </tr>
            <tr>
                <td>اعاده كلمة المرور<br><input type="password" name="password2" required="required"/></td>
            </tr>

            
            <tr>
                <td colspan="4" align="middle"><input type="submit" name="client_register" value="انشاء حساب"/></td>
            </tr>
        </table>
    </form>
    <?php
}


if (isset($_GET['finish']) && $_GET['finish'] == 1) {

?>

<div style="color:green;">تم انهاء التسجيل ... انتظر عدة دقائق ليتم تفعيل الحساب والتاكد من بياناتك</div>


<?php

}

?>

<?php
include_once 'files/footer.php';
?>
