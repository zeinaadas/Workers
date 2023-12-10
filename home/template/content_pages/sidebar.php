

<div class="sidebar">







	<div class="b2 b6 has-arrow" style="background-color:#ccc;padding:1px;">
		<div class="b6--title">

			<a >
			<span style="font-size:1.5em;">
			الزبون المشغل
			</span>


			</a>
		</div>


		<div class="b6--content">
			<div class="featured-logos grid--3">
				<div class="featured-logos--col" style="width:100%;padding:3px;">
				<a href="?page=login_client" title="" class="btn-3 featured-post--apply" style="margin:2px;border-radius:3px;background-color:white;color:black;">تسجيل دخول</a>
				<a href="../signup/index.php?who=clients" title="" class="btn-3 featured-post--apply" style="margin:2px;border-radius:3px;">اشتراك جديد</a>
				</div>


			</div>
		</div>
	</div>




	<div class="b2 b6 has-arrow" style="background-color:#ccc;padding:1px;">
		<div class="b6--title">

			<a >
			<span style="font-size:1.5em;">
			عامل او مهني
			</span>


			</a>
		</div>


		<div class="b6--content">
			<div class="featured-logos grid--3">
				<div class="featured-logos--col" style="width:100%;padding:3px;">
				<a href="?page=login_worker" title="" class="btn-3 featured-post--apply" style="margin:2px;border-radius:3px;background-color:white;color:black;">تسجيل دخول</a>
				<a href="../signup/index.php?who=worker" title="" class="btn-3 featured-post--apply" style="margin:2px;border-radius:3px;">اشتراك جديد</a>
				</div>

			</div>
		</div>
	</div>






	<?php
		$sql="SELECT `name`, `img` FROM `adv` WHERE 1 AND name!='###' AND`act`=1";
	    $query = mysqli_query($connect, $sql);
		while ($row = mysqli_fetch_array($query)) 
		{
	?>
				
		  <div class="b12 get-right-job">
				  <div class="b12--content get-right-job--content center-align">
				 <img src="../assets/images/advs/<?php echo $row['img'];?>" height="150px" width="250px">
		 
				  <p class="get-right-job--desc"><?php echo $row['name'];?></p>
				  </div>

		  </div>
		  


	<?php
		}
	?>
		




</div>
