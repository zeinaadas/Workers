<?php
include 'sessions.php';
?>
<html>
    <head>
         <title><?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_head_title';"))['value']; ?></title>
    </head>
   

		<frameset noresize='noresize' cols='*,20%'>
		    <frame name='home' src='new_orderd_careers.php' >
		    <frame src='menu.php' >
		</frameset>
    	

    
    
</html>
