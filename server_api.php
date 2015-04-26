<?php

if ($argc < 2) {
	echo 'Informe o Method e a uri | exe: GET v1/create |';
	exit();
}

//v1/create

$method = $argv[1];
$uri = $argv[2];

/*
  Set the Request Url (without Parameters) here
*/
$api_request_url = 'https://webservice-mayronceccon.c9.io/api/'. $uri;
 
/*
  Which Request Method do I want to use ?
  DELETE, GET, POST or PUT
*/
$method_name = $method;

/*USUARIO E SENHA*/
$username = 'mayron';
$password = '123';
 
/*
  Let's set all Request Parameters (api_key, token, user_id, etc)
*/
$api_request_parameters = array(
  'usuario' => 'teste',
  'password' => '123',
  'email' => 'teste@teste.com',
  'token' => '#43r23r23234234234234b23423'
);
 
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
 
if ($method_name == 'DELETE')
{
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
}
 
if ($method_name == 'GET')
{
  $api_request_url .= '?' . http_build_query($api_request_parameters);
}
 
if ($method_name == 'POST')
{
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
}
 
if ($method_name == 'PUT')
{
  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');
  curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($api_request_parameters));
}

curl_setopt($ch, CURLOPT_USERPWD, "$username:$password");

/*
  Here you can set the Response Content Type you prefer to get :
  application/json, application/xml, text/html, text/plain, etc
*/
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
 
/*
  Let's give the Request Url to Curl
*/
curl_setopt($ch, CURLOPT_URL, $api_request_url);
 
/*
  Yes we want to get the Response Header
  (it will be mixed with the response body but we'll separate that after)
*/
curl_setopt($ch, CURLOPT_HEADER, TRUE);
 
/*
  Allows Curl to connect to an API server through HTTPS
*/
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 
/*
  Let's get the Response !
*/
$api_response = curl_exec($ch);
 
/*
  We need to get Curl infos for the header_size and the http_code
*/
$api_response_info = curl_getinfo($ch);
 
/*
  Don't forget to close Curl
*/
curl_close($ch);
 
/*
  Here we separate the Response Header from the Response Body
*/
$api_response_header = trim(substr($api_response, 0, $api_response_info['header_size']));
$api_response_body = substr($api_response, $api_response_info['header_size']);
 
// Response HTTP Status Code
#echo $api_response_info['http_code'];
 
// Response Header
#echo $api_response_header;
 
// Response Body
#echo $api_response_body;
var_dump(json_decode($api_response_body));