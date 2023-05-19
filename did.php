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

//Actually get this from session
$liuser = 'vvvvv';

////GET list of DIDs for logged in user
$didlist = mysqli_query($con, "SELECT hdid FROM humandids WHERE husername = '" . $liuser . "'");

foreach ($didlist as $did) {

    echo $did['hdid'];
    echo '<br><br>';
    //CURL to get list of NFTS
    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, 'https://api.spacescan.io/did/nfts/' . $did['hdid'] . '?authkey=tkn1qqqksdnjyv3sf899jpwv5ujfz2ehpg9d0rtqvksksdnjyv3sgqqqj743lx&type=owned&version=0.1.0&network=mainnet&page=1');
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

    var_dump($result);

    $resultDecoded = (array) json_decode($result,true);

    echo "-->" . sizeof($resultDecoded) . "<--<br><br>";

    //Need to work out WHY the error occurs sometimes..? Timing?

    $nftd = $resultDecoded['owned_nfts'];

    foreach($nftd as $nft){
        echo $nft['id'] . '<br>';
        // this ID comes with a trailing whitespace
        $current_nftid = trim($nft['id'], ' ');

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://api.spacescan.io/nft/info/' . $current_nftid  . '?version=0.1.0&network=mainnet&includeActivities=false');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');

        $headers = array();
        $headers[] = 'Accept: */*';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
          echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        $resultDecoded = json_decode($result, true);

        $nftd = $resultDecoded['data']['data_url'];

        echo "<br>--<br>";

        foreach($nftd as $nft){
            echo $nft;
            echo "<br>";
            //Remove the gallery insert
            $insert_query = mysqli_query($con, "INSERT INTO humanlists (husername,nfturl,hgallery) values ('$liuser','$nft','$liuser')");
        };
 
    }



  };