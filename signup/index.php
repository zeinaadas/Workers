<?php
include 'sessions.php';
?>
<html>
    <head>
         <title><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_head_title';"))['value']; ?></title>

    </head>
   
    
    
	<?php
	if(isset($_GET['who']))
	{
		if($_GET['who']=='worker')
		{
			include './worker.php';
		}
		else if($_GET['who']=='clients')
		{
			include './clients.php';
		}
	}
	?>
    
    
</html>
