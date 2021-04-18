<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://the-shashi.jp.auth0.com/oauth/token",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "{\"client_id\":\"iBrq0rde3vQlvmkFqBpHBOxqFM1fEONo\",\"client_secret\":\"gHPhT6kzLFU3Q0FkPARQdNpkol-wSqbYmn7b5c5XZ_MCiqPCI-HtiX1INDBLolzf\",\"audience\":\"https://the-shashi.jp.auth0.com/api/v2/607aba44d1f9c0007129ede4/roles\",\"grant_type\":\"client_credentials\"}",
  CURLOPT_HTTPHEADER => array(
    "content-type: application/json"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}