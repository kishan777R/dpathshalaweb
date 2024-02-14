<?php include "constantphp.php";


 
if (!$isitlocalhost) {
?>
		<script>
		var str=window.location.href;

			var n=str.search("https");
			if(n>-1){

			}else{
			 	window.location.href = "https://dpathshala.live";
			}


	 		
		</script>
<?php
}
?>

<script>
	const apiurl = "<?php echo $apiurl ;?>";
</script>