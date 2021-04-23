# pinterest_generate_token_key_apis
PHP code and api info


1) change pinterest-api-settings.php parameters
2) run index.php
3) after that use following APIs in postman and get a code from there.


1st API to generate token
==================================================================
PUT : https://api.pinterest.com/v3/oauth/access_token
form-data parameters:
1) code : which u will get from redirected url after giving an access
2) redirect_uri
3) grant_type : authorization_code
4) client_id : 
5) client_secret

2nd API
===================================================================

GET : https://api.pinterest.com/v3/users/me
in Authorization : add bearer token

3rd API to post pins
===================================================================

PUT : https://api.pinterest.com/v3/pins/
in Authorization : add bearer token

body >> x-www-form-urlencoded

1) board_id: with category name [mandatory]
2) image_url
3) source_url

you can add more paras follow the link.
https://developers.pinterest.com/docs/redoc/pinner_app/#operation/v3_create_pin_handler_PUT
