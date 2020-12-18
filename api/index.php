<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?id=39&province=5",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_HTTPHEADER => array(
    "key: acbbd724a63c95cde3c321e1edafee7c"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

// echo $response;
$data = json_decode($response,true);
$query = $data['rajaongkir']['query']['id'];
echo ($query);
// echo $data.code;
// echo "NIM : ".$data['rajaongkir']."<br>";
// echo "<br> HASILLL";
// echo $response->{'rajaongkir'};
// if ($err) {
//   echo "cURL Error #:" . $err;
// } else {
//   echo $response;
// }