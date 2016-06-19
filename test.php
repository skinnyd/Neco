<html>

<body>
<b>START</b>
<?php
$url = 'http://snapdish.co/officials/past/case.json?skip=0&limit=9';
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($curl);
$result = json_decode($response, true);
foreach($result['campaigns'] as $item){
    echo '<br>';
        echo $item['name'];
        }
        curl_close($curl);
        echo '<br>';
        ?>

END
</body>
