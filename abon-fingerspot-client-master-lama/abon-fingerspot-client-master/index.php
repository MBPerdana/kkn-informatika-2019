<?php

require('config.php');


$url_get_scan = $config['sdk_url'].'/scanlog/new';
$host_url = $config['host_url'].'/api/fingerprint/save';


$fields = [
  	'sn' => $config['serial_number'],
];

//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url_get_scan);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post

//GET RESPONSE DATA DARI DATABASE FINGERSPOT
$result_get_data = curl_exec($ch);



// KIRIM KE HOST



$fields = [
  	'id_sekolah' => $config['id_sekolah'],
    'api_key' => $config['host_api_key'],    
  	'data' => $result_get_data,
];

$fields_string = http_build_query($fields);

curl_setopt($ch,CURLOPT_URL, $host_url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

$results = curl_exec($ch);


// RUN Config

// delete all scans

// print_r($results['status']);


$response = json_decode($results);
var_dump($response);


echo "<br>";


$result_delete_data = null;

if($config['delete_scans_after_save'])
{
  if($response->status == 201) 
   
   {
    $delete_url = $config['sdk_url'].'/scanlog/del';

    $fields = [
        'sn' => $config['serial_number'],
    ];

    $fields_string = http_build_query($fields);

      curl_setopt($ch,CURLOPT_URL, $delete_url);
      curl_setopt($ch,CURLOPT_POST, true);
      curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

    curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

    $result_delete_data = curl_exec($ch);
  }
    
}

echo $result_get_data;

echo "<br> <br>";

echo $result_delete_data;

echo "<br> <br>";

echo $results;

// echo ($result);


// DELETE HASIL SCAN YANG ADA DI FINGERSPOT

//  $result = json_decode(	$result);
 

// // echo $result->Data;

// foreach($result->Data as $data)
// {
// 	var_dump($data->PIN);
// 	echo '<br>';
// }




?>


<!-- $options = array(
  'http' => array(
    'method'  => 'POST',
    'content' => json_encode( $data ),
    'header'=>  "Content-Type: application/json\r\n" .
                "Accept: application/json\r\n"
    )
);   -->