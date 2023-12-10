<?php
include_once 'files/header.php';
?>
<div class="title">البيانات الخاصة بالعامل</div>
<?php

///////////////////////////////edit code
if (isset($_POST['editaddworker']) && $_POST['editaddworker'] == 'تعديل بيانات') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];

    $city = $_POST['city'];
    $loginname = $_POST['loginname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
	
	
	
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $hpassword = $_POST['hpassword'];
    $hpassword2 = $_POST['hpassword2'];
    $ide = $_POST['workerid'];

    $sql = mysqli_query($connect, "SELECT loginname FROM worker WHERE loginname='$loginname' AND id !=$ide");
    $num = mysqli_num_rows($sql);

    if ($num > 0) {
        $error[] = '<div class="error">اسم الدخول موجود مسبقا، الرجاء اختيار اسم أخر</div>';
    }
    //password
    //password2
    if (!empty($password)) {
        if ($password !== $password2) {
            $error[] = '<div class="error">الرجاء كتابة كلمة مرور متطابقة</div>';
        } else {
            $pass = md5(sha1($password));
        }
    } else {
        $pass = $hpassword;
    }

    if (!empty($error)) {
        foreach ($error as $errors) {
            echo $errors;
        }
    } else {
        $update = mysqli_query($connect, "UPDATE worker SET fname='$fname',lname='$lname',email='$email',city='$city', "
                . "loginname='$loginname',tel='$tel',address='$address',password='$pass' WHERE id='$ide'");
        if ($update) {
            ?>
            <div class="ok">تم تعديل بيانات بنجاح</div>
            <meta http-equiv="Refresh" content="1;url=worker.php"/>
            <?php
            exit;
        } else {
            echo 'cant';
        }
    }
}












$sql = mysqli_query($connect, "SELECT * FROM worker WHERE id='".$_SESSION['sessionidworker']."'");
$rowEdit = mysqli_fetch_array($sql);
?>
<br><br>
<form method="post" enctype="multipart/form-data">
    <table dir="rtl" width="70%" class="tablein" style="padding:11px;min-height:520px;">

        <tr>
            <td>الإسم الأول<br><input value="<?php echo $rowEdit['fname'] ?>" type="text" name="fname" required="required"/></td>
            <td>الإسم الأخير<br><input value="<?php echo $rowEdit['lname'] ?>" type="text" name="lname" required="required"/></td>
        </tr>
        <tr>
            <td>المدينة<br><input type="text" value="<?php echo $rowEdit['city'] ?>" name="city" required="required"/></td>
            <td>العنوان<br><input type="text" value="<?php echo $rowEdit['address'] ?>" name="address" required="required"/></td>
        </tr>
        <tr>

            <td>رقم الهاتف<br><input type="text" value="<?php echo $rowEdit['tel'] ?>" name="tel"/></td>

        </tr>
        <tr>
            <td>اسم الدخول<br><input type="text" value="<?php echo $rowEdit['loginname'] ?>"  name="loginname" required="required"/></td>
            <td>البريد الإلكتروني<br><input type="email" name="email" value="<?php echo $rowEdit['email'] ?>" required="required"/></td>
        </tr>
        <tr>
            <td>كلمة المرور<br>
                <input type="password" name="password"/>
                <input type="hidden" name="hpassword" value="<?php echo $rowEdit['password'] ?>"/>
            </td>
            <td>اعاده كلمه المرور<br>
                <input type="password" name="password2"/>
                <input type="hidden" name="hpassword2" value="<?php echo $rowEdit['password'] ?>"/>
            </td>
        </tr>

        <tr>
            <td colspan="4">
                <input type="submit" name="editaddworker" value="تعديل بيانات"/>
            </td>
        </tr>
    </table>
</form>




