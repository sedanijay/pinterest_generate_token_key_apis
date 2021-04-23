<?php
session_start();

require_once('pinterest-api-settings.php');
require_once('pinterest-login-api.php');

// Pinterest passes a parameter 'code' in the Redirect Url
if(isset($_GET['code'])) {
	try {
		$pinterest_ob = new PinterestApi();
		
		// Get the access token 
		$access_token = $pinterest_ob->GetAccessToken(PINTEREST_APPLICATION_ID, PINTEREST_REDIRECT_URI, PINTEREST_APPLICATION_SECRET, $_GET['code']);
		
		echo "access token : ".$access_token."<br><br>";

		$users_me = $pinterest_ob->users_me();
		echo "usersme response : ".$users_me."<br><br>";


		// Get user information
		$user_info = $pinterest_ob->GetUserProfileInfo($access_token);

		// Echo user information for display
		$html = '<div style="margin:40px auto 0 auto;width:350px">';
			$html .= '<div style="margin:0 0 20px 0">';
				$html .= '<div style="display:inline-block; width:150px;vertical-align:middle;font-weight:700">Name</div><div style="display:inline-block; vertical-align:middle">' . $user_info['first_name'] . ' ' . $user_info['last_name'] . '</div>';
			$html .= '</div>';
			$html .= '<div style="margin:0 0 20px 0">';
				$html .= '<div style="display:inline-block; width:150px;vertical-align:middle;font-weight:700">ID</div><div style="display:inline-block; vertical-align:middle">' . $user_info['id'] . '</div>';
			$html .= '</div>';
			$html .= '<div style="margin:0 0 20px 0">';
				$html .= '<div style="display:inline-block; width:150px;vertical-align:middle;font-weight:700">Username</div><div style="display:inline-block; vertical-align:middle">' . $user_info['username'] . '</div>';
			$html .= '</div>';
			$html .= '<div style="margin:0 0 20px 0">';
				$html .= '<div style="display:inline-block; width:150px;vertical-align:middle;font-weight:700">Picture</div><img style="display:inline-block; vertical-align:middle;width:60px" src="' . $user_info['image']['60x60']['url'] . '" />';
			$html .= '</div>';
			$html .= '<div style="margin:0 0 20px 0">';
				$html .= '<div style="display:inline-block; width:150px;vertical-align:middle;font-weight:700">Access Token</div><div style="display:inline-block; vertical-align:middle">' . $access_token . '</div>';;
			$html .= '</div>';
		$html .= '</div>';
		echo $html;

		// Now that the user is logged in you may want to start some session variables
		// $_SESSION['logged_in'] = 1;

		// You may now want to redirect the user to the home page of your website
		// header('Location: home.php');
	}
	catch(Exception $e) {
		echo $e->getMessage();
		exit;
	}
}

?>