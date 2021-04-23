<?php

require_once('pinterest-api-settings.php');

?>
<html>
<head></head>

<body>
	<!-- <a href="<?= 'https://www.pinterest.com/oauth/?client_id=' . PINTEREST_APPLICATION_ID . '&redirect_uri=' . urlencode(PINTEREST_REDIRECT_URI) . '&response_type=code&scope=read_public,write_public' ?>">Login with Pinterest</a> -->

	<!-- <a href="<?= 'https://www.pinterest.com/oauth/?client_id=' . PINTEREST_APPLICATION_ID . '&redirect_uri=' . urlencode(PINTEREST_REDIRECT_URI) . '/&response_type=code/&scope=manage_merchants,read_secret,manage_organic,write_advertisers,read_user_followers,read_secret_pins,write_users,read_users,write_pins,read_pins' ?>">Login with Pinterest</a> -->

	<a href="<?= 'https://www.pinterest.com/oauth/?client_id=' . PINTEREST_APPLICATION_ID . '&redirect_uri=' . urlencode(PINTEREST_REDIRECT_URI) . '/&response_type=code/' ?>">Login with Pinterest</a>

</body>

</html>