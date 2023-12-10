
<div class="main-content content-side" style="width:100%;">
<?php

if($_GET['page']=='login_admin')
{
	include 'login_admin.php';
}
else if($_GET['page']=='login_worker')
{
	include 'login_worker.php';
}
else if($_GET['page']=='login_client')
{
	include 'login_client.php';
}
else
  include 'top_bar.php';

?>

</div>

<?php


if($_GET['page']=='contact_us')
{
	include 'contact_us.php';
}

//include 'article_img.php';


?>

































</div>









