<?php
require 'config/humans.php';
//Remove below in Prod
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
///////////////////////
// About:
// Process the DIDs saved by the user
// For each DID, call for the list of NFT IDs
// For each NFT ID, call for the details and insert the NFT Data URL into the database

$authKSS = 'tkn1qqqkw9fyjpp4n899jpwv5ujfz2ehpg9d0rtqvkskw9fyjpp4jqqqnzy9f3';
$famList = ['xch1zf4dd6x4u5lk80cfd800xk9wvhv72dvfhpsss5x7yvvua97lc9hsghacxx'];

https://api.spacescan.io/address/balance/xch1zf4dd6x4u5lk80cfd800xk9wvhv72dvfhpsss5x7yvvua97lc9hsghacxx?authkey=tkn1qqqkw9fyjpp4n899jpwv5ujfz2ehpg9d0rtqvkskw9fyjpp4jqqqnzy9f3&version=0.1.0&network=mainnet&type=All

////GET list of DIDs for logged in user
//$didlist = mysqli_query($con, "SELECT hdid FROM humandids WHERE husername = '" . $liuser . "'");

foreach ($famList as $fammember) {

    echo '<br><br>';
    echo $fammember;
    //CURL to get list of NFTS
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.spacescan.io/address/balance/' . $fammember . '?authkey=tkn1qqqkw9fyjpp4n899jpwv5ujfz2ehpg9d0rtqvkskw9fyjpp4jqqqnzy9f3&version=0.1.0&network=mainnet&type=All');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
    curl_setopt($ch, CURLOPT_TIMEOUT, 400);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    curl_setopt($ch,CURLOPT_ENCODING,""); 


    $headers = array();
    $headers[] = 'Accept: */*';
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    $result = curl_exec($ch);
    $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo $httpcode . "<br>";



    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);

    //var_dump($result);

    $resultDecoded = (array) json_decode($result,true);

   $cats = $resultDecoded['data']['cats'];

   foreach($cats as $cat){
        echo $cat['asset_id'] . ' - Balance: ' . $cat['balance'] . '<br>';

   };





  };