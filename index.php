<?php
include 'config.php';
?>
<html>
    <head>
         <title><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_head_title';"))['value']; ?></title>
    </head>
   
    
	 <meta http-equiv="refresh" content="1;url=./home/index.php"/>


</html>
