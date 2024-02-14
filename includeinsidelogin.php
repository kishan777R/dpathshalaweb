<?php
$whereiamrightnow="IN";


if (!isset($_SESSION['login_id'])) {
?>
	<script>
		window.location.href = "login";
	</script>
<?php
}
if($_SESSION['login_user_type'] == 'TEACHER'){


if (isset($_SESSION['is_profile_complete']) and $_SESSION['is_profile_complete'] == 'YES') {

} else {
	?>
	<script>
		window.location.href = "profilecomplete";
	</script>
<?php
}
}
?>