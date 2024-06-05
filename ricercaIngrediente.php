<?php
    session_start();
    if(!isset($_SESSION["email"]))
    {
        header("Location: index.html");
        exit;
    }
    if(isset($_GET['q']))
    {
        $inputValue =urlencode( $_GET['q']);
        
        $appID='23db2455';
        $apiKey = '38587711c00e8bd03fddfde455006e81';

        $url='https://api.edamam.com/api/recipes/v2?type=public&q='.$inputValue.'&app_id='.$appID.'&app_key='.$apiKey.'';

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);
        
        echo $result;
    }
    else
    {
        echo 'Errore';
    }
?>