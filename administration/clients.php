<?php
include_once 'files/header.php';
?>
<div class="title">الزبون</div>
<?php




if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
    $gidDel = intval($_GET['id']);
    if ($gidDel) {

        $del = mysqli_query($connect, "UPDATE clients SET act=3 WHERE id='$gidDel'");
        if ($del) {
            ?>
            <div class="ok">تم حذف الزبون بنجاح</div>
            <meta http-equiv="refresh" content="1;url=clients.php"/>
            <?php
            exit;
        }
    }
}



if (isset($_POST['editaddclients']) && $_POST['editaddclients'] == 'تعديل الزبون') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $act = $_POST['act'];
    $city = $_POST['city'];
    $loginname = $_POST['loginname'];
    $tel = $_POST['tel'];
    $address = $_POST['address'];
	
	
	
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $hpassword = $_POST['hpassword'];
    $hpassword2 = $_POST['hpassword2'];
    $ide = $_POST['clientsid'];

    $sql = mysqli_query($connect, "SELECT loginname FROM clients WHERE loginname='$loginname' AND id !=$ide");
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
        $update = mysqli_query($connect, "UPDATE clients SET fname='$fname',lname='$lname',email='$email',act='$act',city='$city', "
                . "loginname='$loginname',tel='$tel',address='$address',password='$pass' WHERE id='$ide'");
        if ($update) {
            ?>
            <div class="ok">تم تعديل الزبون بنجاح</div>
            <meta http-equiv="Refresh" content="1;url=clients.php"/>
            <?php
            exit;
        } else {
            echo 'cant';
        }
    }
}
////////////////////////////edit form
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
    $gidEdit = intval($_GET['id']);
    if ($gidEdit) {
        $sql = mysqli_query($connect, "SELECT * FROM clients WHERE id='$gidEdit'");
        $rowEdit = mysqli_fetch_array($sql);
        ?>
        <form method="post" enctype="multipart/form-data">
            <table dir="rtl" width="90%" class="table">
                <tr class="firstTR">
                    <td colspan="4">تعديل الزبون</td>
                </tr>
                <tr>
                    <td>الإسم الأول</td><td><input value="<?php echo $rowEdit['fname'] ?>" type="text" name="fname" required="required"/></td>
                    <td>الإسم الأخير</td><td><input value="<?php echo $rowEdit['lname'] ?>" type="text" name="lname" required="required"/></td>
                </tr>
                <tr>
                    <td>المدينة</td><td><input type="text" value="<?php echo $rowEdit['city'] ?>" name="city" required="required"/></td>
                    <td>العنوان</td><td><input type="text" value="<?php echo $rowEdit['address'] ?>" name="address" required="required"/></td>
                </tr>
                <tr>
                    <td>حالة الحساب</td>
                    <td>
                        <select name="act" required="required">
                            <?php
                            $act = $rowEdit['act'];
                            if ($act == 1) {
                                ?>
                                <option value="1">فعال</option>
                                <option value="2">غير فعال</option>
                                <option value="3">محذوف</option>
                            <?php } elseif ($act == 2) {
                                ?>
                                <option value="2">غير فعال</option>
                                <option value="1">فعال</option>
                                <option value="3">محذوف</option>
                            <?php } elseif ($act == 3) { ?>
                                <option value="3">محذوف</option>
                                <option value="2">غير فعال</option>
                                <option value="1">فعال</option>
                            <?php } else {
                                ?>
                                <option value="">يجب تحديد النوع</option>
                                <option value="3">محذوف</option>
                                <option value="2">غير فعال</option>
                                <option value="1">فعال</option>
                            <?php }
                            ?>
                        </select>
                    </td>
                    <td>رقم الهاتف</td><td><input type="text" value="<?php echo $rowEdit['tel'] ?>" name="tel"/></td>

                </tr>
                <tr>
                    <td>اسم الدخول</td><td><input type="text" value="<?php echo $rowEdit['loginname'] ?>"  name="loginname" required="required"/></td>
                    <td>البريد الإلكتروني</td><td><input type="email" name="email" value="<?php echo $rowEdit['email'] ?>" required="required"/></td>
                </tr>
                <tr>
                    <td>كلمة المرور</td>
                    <td>
                        <input type="password" name="password"/>
                        <input type="hidden" name="hpassword" value="<?php echo $rowEdit['password'] ?>"/>
                    </td>
                    <td>اعاده كلمه المرور</td>
                    <td>
                        <input type="password" name="password2"/>
                        <input type="hidden" name="hpassword2" value="<?php echo $rowEdit['password'] ?>"/>
                    </td>
                </tr>

                <tr>
                    <td colspan="4">
                        <input type="submit" name="editaddclients" value="تعديل الزبون"/>
                        <input type="hidden" name="clientsid" value="<?php echo $gidEdit ?>"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
        // }
    }
    exit;
}
///////////////////////add
if (isset($_POST['addclients']) && $_POST['addclients'] == 'اضافة الزبون') {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $act = $_POST['act'];
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
        $insert = mysqli_query($connect, "INSERT INTO clients "
                . "(fname,lname,loginname,password,email,tel,act,city,address,info_updated) "
                . "VALUES "
                . "('$fname','$lname','$loginname','$password','$email','$tel','$act','$city','$address','$infoUpdated')"
                . "");
        $lid = mysqli_insert_id($connect);
        $insert2 = mysqli_query($connect, "INSERT INTO balance (aid,amount) VALUES ('$lid','0')");








		/////////////////////////////////////////////
		
		$sql="SELECT * FROM `career` WHERE type=1 ";
		
		$query = mysqli_query($connect, $sql);
		
		
		
		while ($row = mysqli_fetch_array($query)) {
		
			$careerid_one=$row['id'];
			$cost=$row['cost'];

			
			
			$sql_last_clients="SELECT * FROM `clients` where 1 ORDER BY id DESC LIMIT 1";
			$query_last_clients = mysqli_query($connect, $sql_last_clients);
			$row_last_clients = mysqli_fetch_array($query_last_clients);
			$row_last_clients=$row_last_clients['id'];
			
			
			/*?><script>alert(<?php echo '"'.$row_last_clients.'"'; ?>);   </script> <?php*/
			
			$sql_insert_career_clients="INSERT INTO clients_specialist_prices "
		        . "(`aid`, `career_id`, `sprice`, `mainprice`, `type`) "
		        . "VALUES "
		        . "('$row_last_clients','$careerid_one','$cost','$cost',1)";
		        
		    /*?><script>alert(<?php echo '"'.$sql_insert_career_clients.'"'; ?>);   </script> <?php  */
		        
			$make_insert = mysqli_query($connect, $sql_insert_career_clients);
		
		}
		////////////////////////////////////////////////////  


        if ($insert) {
            ?>
            <div class="ok">تم اضافة الزبون بنجاح</div>
            <meta http-equiv="refresh" content="1;url=clients.php"/>
            <?php
            exit;
        }
    }
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_clients') {
    ?>
    <form method="post" enctype="multipart/form-data">
        <table dir="rtl" width="90%" class="table">
            <tr class="firstTR">
                <td colspan="4">اضافة زبون</td>
            </tr>
            <tr>
                <td>الإسم الأول</td><td><input type="text" name="fname" required="required"/></td>
                <td>الإسم الأخير</td><td><input type="text" name="lname" /></td>
            </tr>
            <tr>
                <td>المدينة</td><td><input type="text" name="city" /></td>
                <td>العنوان</td><td><input type="text" name="address" /></td>
            </tr>
            <tr>
                <td>حالة الحساب</td>
                <td>
                    <select name="act" required="required">
                        <option value="">الرجاء الإختيار</option>
                        <option value="1" selected>فعال</option>
                        <option value="2">غير فعال</option>
                    </select>
                </td>
                <td>رقم الهاتف</td><td><input type="text" name="tel"  /></td>
            </tr>
            <tr>
                <td>اسم الدخول</td><td><input type="text" name="loginname" required="required"/></td>
                <td>البريد الإلكتروني</td><td><input type="email" name="email" /></td>
            </tr>
            <tr>
                <td>كلمة المرور</td><td><input type="password" name="password" required="required"/></td>
                <td>اعاده كلمة المرور</td><td><input type="password" name="password2" required="required"/></td>
            </tr>

            
            <tr>
                <td colspan="4"><input type="submit" name="addclients" value="اضافة الزبون"/></td>
            </tr>
        </table>
    </form>
    <?php
    exit;
}
?>



<form method="post">
    <table class="barTab" style="font-weight: bold">
       <td colspan="2">
	        <input type="text" name="clients_name" style="z-index:10;"  placeholder=" البحث عن زبون"  >
	    </td>
      <td colspan="2">
	        <input class="ball" type="submit" name="بحث" value="بحث"/>
	    </td>
		
    </table>
</form>

<center><div class="add"><a href="?action=add_clients">اضافة زبون</a></div></center>
<table class="table" width="95%">
    <tr class="firstTR">
        <th></th>
        <th>الإسم الأول</th>
        <th>الإسم الثاني</th>
        <th>البريد الإلكتروني</th>
        <th>رقم الهاتف</th>
        <th>المدينة</th>
        <th>الحالة</th>
        <th>تعديل</th>
        <th>حذف</th>
    </tr>
    <?php
    
    	$rows_per_page = 15;
    	
    	
			$clients_name = $_POST['clients_name'];
		  
		  $where_clients = "";
			if (!empty($clients_name)) 
			{
			  $where_clients = " AND (clients.fname LIKE '%$clients_name%' OR clients.lname LIKE '%$clients_name%')  ";
			}
		
	
	
		
		$sql="SELECT * FROM clients WHERE 1 $where_clients ORDER BY id DESC";	
		
    	//echo $sql;
    
        if (isset($_GET['page'])) {
            $currentPage = $_GET['page'];
        } else {
            $currentPage = 1;
        }

        $prevPage = $currentPage - 1;
        $nextPage = $currentPage + 1;
        $perPage = $rows_per_page;
        $start = ($currentPage - 1) * $perPage;

        $totalRows = mysqli_num_rows(mysqli_query($connect, $sql));
        if ($totalRows > 0) {
            $lastPage = ceil($totalRows / $perPage);

            if ((@$_GET['page']) > $lastPage) {
                die("<div id='error'>لقد طلبت صفحة خاطئة</div>");
            }
           

    
    	$sql = $sql." LIMIT $start,$perPage";##
            

		
		
		
		
		
		$query = mysqli_query($connect, $sql);
		
		
		
		
		
		$row_number=0;
		while ($row = mysqli_fetch_array($query)) {
			$row_number+=1;
		    $id = $row['id'];
		    $act = $row['act'];
		    if ($act == 1) {
		        $acti = "<span style='color:green'>فعال</span>";
		    } elseif ($act == 2) {
		        $acti = "<span style='color:orange'>غير فعال</span>";
		    } elseif ($act == 3) {
		        $acti = "<span style='color:red'>محذوف</span>";
		    }
		    ?>
		    <tr class="parentTR">
		        <td><?php echo $row_number; ?></td>
		        <td><?php echo $row['fname']; ?></td>
		        <td><?php echo $row['lname']; ?></td>
		        <td><?php echo $row['email']; ?></td>
		        <td><?php echo $row['tel']; ?></td>
		        <td><?php echo $row['city']; ?></td>
		        <td><?php echo $acti; ?></td>
		        <td><a href="?action=edit&id=<?php echo $id; ?>"><img src="resources/icons/update.png" width="25" title="تعديل معلومات الزبون"/></a></td>
		        <td><a href="?action=delete&id=<?php echo $id; ?>"><img src="resources/icons/delete.png" width="25" title="حذف الزبون" onclick="return confirm('هل تريد بالتأكيد حذف الزبون ')"/></a></td>
		    </tr>
		<?php }} ?>
		
		
		
		
</table>





<?php

echo '<div class="clear"></div><br/><center><div id="pagination">';
echo "<a class='pagers'>" . $currentPage . "|" . $lastPage . "</a>";


if ($currentPage == 1) {
    echo'';
} else {


}

for ($i = $currentPage - 3; $i <= $currentPage + 5; $i++) {
    if ($i > 0 && $i <= $lastPage) {
        if ($currentPage != $i) {
            echo"<a class='pager pagin' href='$url_page_go_href?page=" . $i . "'>" . $i . "</a>";
        } else {
            echo"<a class='pagers'>" . $i . "</a>";
        }
    }
}

if ($currentPage == $lastPage) {
    echo'';
} else {


}
echo"</div></center>";
?>








<?php
include_once 'files/footer.php';
?>
