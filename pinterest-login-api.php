<?php

class PinterestApi 
{
	public function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {		
		//$url = 'https://api.pinterest.com/v1/oauth/token';
		$url = 'https://api.pinterest.com/v3/oauth/access_token';
		
		// $curlPost = 'client_id='. $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';

		$curlPost = 'code='. $code . '&redirect_uri=' . $redirect_uri . '&grant_type=authorization_code&client_id='. $client_id . '&client_secret='.$client_secret;

		$ch = curl_init();	
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
			
		/*curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);			
		$data = json_decode(curl_exec($ch), true);*/
		$content = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		curl_close($ch);
		$data = json_decode($content, true);
		//print_r($data);	 		
		if($http_code != '200')	
			//echo $curlPost."<br>";		
			//throw new Exception('Error : Failed to receieve access token');
			throw new Exception($http_code);
			
		echo 'Access Token: '. $data['access_token'];	
		return $data['access_token'];		
	}

	public function users_me() {		
		$token = ""; // add your token here
		$url = 'https://api.pinterest.com/v3/users/me/?access_token='.$token;
		
		// $curlPost = 'client_id='. $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';

		$curlPost = "";

		$ch = curl_init();	
		
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
			
		/*curl_setopt($ch, CURLOPT_URL, $url);		
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_POST, 1);		
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);			
		$data = json_decode(curl_exec($ch), true);*/
		$content = curl_exec($ch);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		curl_close($ch);
		$data = json_decode($content, true);
		//print_r($data);	 		
		if($http_code != '200')	
			//echo $curlPost."<br>";		
			//throw new Exception('Error : Failed to receieve access token');
			throw new Exception($http_code);
			
		echo 'Access Token: '. $data['access_token'];	
		return $data['access_token'];		
	}


	public function GetUserProfileInfo($access_token) { 
		//$url = 'https://api.pinterest.com/v1/me/?access_token=' . $access_token . '&fields=id,username,first_name,last_name,image';	
		$url = 'https://api.pinterest.com/v3/users/me/?access_token=' . $access_token . '&fields=id,username,first_name,last_name,image';	

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLINFO_HEADER_OUT, 1);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);

		// curl_setopt($ch, CURLOPT_URL, $url);		
		// curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);	
		// curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
		$data = json_decode(curl_exec($ch), true);
		$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);	
		curl_close($ch); 
		if($http_code != 200)
			throw new Exception('Error : Failed to get user information');

		return $data['data'];
	}
}

?>