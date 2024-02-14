<?php


if (isset($_SESSION['login_id'])) {


	if ($_SESSION['login_user_type'] == 'TEACHER') {


		if (isset($_SESSION['is_profile_complete']) and $_SESSION['is_profile_complete'] == 'YES') {
?>
			<script>
				window.location.href = "dashboard";
			</script>
		<?php
		} else {
		?>
			<script>
				window.location.href = "teacherprofilecomplete";
			</script>
		<?php
		}
	} else {
		?>
		<script>
			window.location.href = "<?php echo $server; ?>studentcourses";
		</script>
<?php
	}
}
?>