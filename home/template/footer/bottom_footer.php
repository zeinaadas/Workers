
<div class="footer-2">
<div class="container">
<div class="footer-2--copyrights">
<div align="middle">
<b style="font-size:1.3em;text-align:center;"> <?php echo mysqli_fetch_array(mysqli_query($connect,"SELECT value FROM site_setting WHERE 1 AND attribute='site_copywrite';"))['value']; ?></b> </div>
<div></div>
</div>

</div>
</div>

