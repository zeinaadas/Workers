<?php
include_once 'files/header.php';
?>

<div  class="title" >المهن</div>
<?php
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'delete') {
    $iddel = intval($_GET['id']);
    if ($iddel) {
        $del = mysqli_query($connect, "DELETE FROM `career_type`  WHERE id='$iddel'");
        if ($del) {
            ?>
            <meta http-equiv="refresh" content="0;url=career_type.php"/>
            <?php
            exit;
        }
    }
}



if (isset($_POST['edit']) && $_POST['edit'] == 'تعديل') {

    $ids = $_POST['family_nameid'];
    $family_name_var = $_POST['family_name_i'];
 

    $update = mysqli_query($connect, "UPDATE `career_type` SET `career_type_name`='$family_name_var' WHERE id=$ids");

    if ($update) {
        ?>
        <meta http-equiv="refresh" content="0;url=career_type.php"/>
        <?php
    } else {
        echo 'cant';
    }
    exit;
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'edit') {
    $ide = intval($_GET['id']);
    if ($ide) {
        $query1 = mysqli_query($connect, "SELECT * FROM career_type WHERE id='$ide'");
        $row1 = mysqli_fetch_array($query1);
        $family_name = $row1['career_type_name'];
 
        ?>
        <form method="post" enctype="multipart/form-data">
            <table class="table" width="60%">
                <tr class="firstTR">
                    <td colspan="2">التعديل على المهنة <span><?php echo $family_name ?></span></td>
                </tr>
                <tr>
                    <td>اسم المهنة</td>
                    <td><input type="text" name="family_name_i" value="<?php echo $family_name ?>" required="rquired"/></td>
				</tr>

              
                <tr>
                    <td colspan="2">
                        <input type="submit" name="edit" value="تعديل"/>
                        <input type="hidden" name="family_nameid" value="<?php echo $ide ?>"/>
                    </td>
                </tr>
            </table>
        </form>
        <?php
    }
    exit;
}
if (isset($_POST['addfamily_name']) && $_POST['addfamily_name'] == 'اضافة') {

    $family_name_var = $_POST['family_name_i'];
 

	$sql="INSERT INTO career_type (career_type_name)VALUES ('$family_name_var') ";
    $insert = mysqli_query($connect, $sql);
	//echo $sql;
	
	
    if ($insert) {
        ?>
        <meta http-equiv="refresh" content="0;url=career_type.php"/>
        <?php
        exit;
    }
}
if (isset($_REQUEST['action']) && $_REQUEST['action'] == 'add_family') {
    ?>
    <form method="post" enctype="multipart/form-data">
        <table class="table" width="60%">
            <tr class="firstTR">
                <td colspan="2">اضافة مهنة جديده</td>
            </tr>
            <tr>
                <td>اسم المهنة</td>
                <td><input type="text" name="family_name_i" required="rquired"/></td>
            </tr>
 

            <tr>
                <td colspan="2"><input type="submit" name="addfamily_name" value="اضافة"/></td>
            </tr>
        </table>
    </form>
    <?php
    exit;
}
?>
<center><div class="add"><a href="?action=add_family">اضافة مهنة جديده</a></div></center>
<table class="table" width="70%">
    <tr class="firstTR">
        <th width=10%></th>
        <th>المهن </th>
 
        <th width=10% >تعديل</th>
        <th width=10%>حذف</th>
    </tr>
    <?php
    $query = mysqli_query($connect, "SELECT `id`, `career_type_name`  FROM `career_type` ORDER BY `id` ASC");
    $row_number=0;
    while ($row = mysqli_fetch_array($query)) {
        $id = $row['id'];
        $row_number=$row_number+1;

        ?>
        <tr>
            <td><?php echo $row_number ?></td>
            <td><?php echo $row['career_type_name'] ?></td>
 


            <td><a href="?action=edit&id=<?php echo $id; ?>"><img width=25 src="resources/icons/update.png" title="تعديل معلومات المهنة"/></a></td>
            <td><a href="?action=delete&id=<?php echo $id; ?>"><img width=25 src="resources/icons/delete.png" title="حذف المهنة" onclick="return confirm('هل تريد بالتأكيد حذف المهنة ؟')"/></a></td>
        </tr>   
    <?php }
    ?>
</table>


