<header>
<div class="container" style="width:95%;">


	<a class="header--logo" href="" title="" style="vertical-align: top;">


	<img src="../assets/images/logo/logo.png"  height="88" style="margin-top:-33px;">

	<span style="color:white;font-size:1.5em;margin:0;padding:0;vertical-align: top;">
	<?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_main_title';"))['value']; ?>
	
	</span>
	</a>


	<ul class="header--menu m-hide-f">
	<li class="sh-ov">
	<a href="?page=login_admin" title="أعلن عن وظيفة" rel="nofollow" class="btn-2">الادارة العامة </a>
	</li>

	</ul>

	<div id="menu-wrapper" class="menu-wrapper d-hide"></div>
	<nav class="main-menu">

	
	<ul data-title="" role="navigation" itemscope="" itemtype="">
	
		<li class="active ">
			<a itemprop="url" href="?page=main" title="الرئيسية">
			<i class="ji ji-home"></i>
			<span itemprop="name">الرئيسية</span>
			</a>
		</li> 


	 	<li class=" ">
			<a itemprop="url" href="?page=contact_us" title="إتصل بنا">
			<i class="ji ji-contact-us"></i>
			<span itemprop="name">إتصل بنا</span>
			</a>
		</li> 
	
	</ul>

	</nav>



</div>
</header>
