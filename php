<?php
header('Content-Type: text/html; charset=utf-8');
header("Access-Control-Allow-Origin: *");
function SEOLink($baslik)
{
    $metin_aranan = array("ş", "Ş", "ı", "ü", "Ü", "ö", "Ö", "ç", "Ç", "ş", "Ş", "ı", "ğ", "Ğ", "İ", "ö", "Ö", "Ç", "ç", "ü", "Ü");
    $metin_yerine_gelecek = array("s", "S", "i", "u", "U", "o", "O", "c", "C", "s", "S", "i", "g", "G", "I", "o", "O", "C", "c", "u", "U");
    $baslik = str_replace($metin_aranan, $metin_yerine_gelecek, $baslik);
    $baslik = preg_replace("@[^a-z0-9\-_şıüğçİŞĞÜÇ]+@i", "-", $baslik);
    $baslik = strtolower($baslik);
    $baslik = preg_replace('/&.+?;/', '', $baslik);
    $baslik = preg_replace('|-+|', '-', $baslik);
    $baslik = preg_replace('/#/', '', $baslik);
    $baslik = str_replace('.', '', $baslik);
    $baslik = trim($baslik, '-');
    return $baslik;
}











// API URL

$url = 'https://www.watched.com/api/box/ping';





$ch = curl_init($url);

$data = array(

    'x' => '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'

);

$data_encode1 = json_encode($data);

$length1 = strlen($data_encode1);

curl_setopt($ch, CURLOPT_POSTFIELDS, $data_encode1);

curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(

'user-agent: WATCHED/1.8.3 (android)', 

'content-type: application/json; charset=utf-8', 

'accept: application/json ',

'accept-encoding: gzip, deflate', 

'host: www.watched.com'));

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$sonuc = curl_exec($ch);









if(curl_exec($ch) === false)

{

 echo 'Curl hatası1: ' . curl_error($ch);
exit;
}

curl_close($ch);











//'content-length: '.$length1.'',





$result = json_decode($sonuc,true);

$sing1 = $result['response']['signed'];




// API URL

//$url2 = 'https://www.oha.to/oha-tv-index/directory.watched';

$url2 = 'https://corsproxy.xyz/huhu.to/huhu-tv-iptv/directory.watched';

$ch2 = curl_init($url2);

$data2 = array(

    'language' => 'tr',

    'region' => 'TR',

    'id' => '',

    'adult' => false,

    'search' => '',

    'sort' => 'name',

    'filter' => ['group' => 'Turkey'],

    'cursor' => null,

	'page' => 300,

    'rootId' => ''

);





curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));

curl_setopt($ch2, CURLOPT_HTTPHEADER, array(

'user-agent: WATCHED/9.9.9 (win32)', 

'content-type: application/json; charset=utf-8',

'watched-sig: '.$sing1.'',

'host: huhu.to'));

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

$sonuc2 = curl_exec($ch2);





if(curl_exec($ch2) === false)

{

 echo 'Curl hatası2: ' . curl_error($ch2);
exit;
}





curl_close($ch2);



//'content-length: '.$length2.'',



$Kanal_listeleri = json_decode("{}");

$Kanal_listeleri = json_decode($sonuc2,true)['items'];



$imza = base64_encode($sing1);



$i=0;
echo "-----||ilk 300 ||---- <br><br>";
foreach($Kanal_listeleri as $liste){
$i++;
	
$url = "http://huhu.unaux.com/kanal.php?url=".base64_encode(($liste['url']))."&imza={$imza}";
$satir1 = "#EXTINF:-1,".$liste['name']."\r\n";

$eklenecek_kod= "<?php
header(\"location: ".$url."\");
?>
";

$seoadres = SEOLink($liste['name']);
$file = fopen("kanal/".$seoadres.".php", "w");

if(fwrite($file, $eklenecek_kod)){
	
	echo $i." - <a href='/kanal/{$seoadres}.php'>".$liste['name']."</a> Kanalı yenilendi <br>";
}else{
	echo $i." - "."<b>".$liste['name']." Kanalı yenilenemedi </b><br>";
}

fclose($file);

}



$ch2 = curl_init($url2);

$data2 = array(

    'language' => 'tr',

    'region' => 'TR',

    'id' => '',

    'adult' => false,

    'search' => '',

    'sort' => 'name',

    'filter' => ['group' => 'Turkey'],

    'cursor' => 301,

	'page' => 300,

    'rootId' => ''

);





curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));

curl_setopt($ch2, CURLOPT_HTTPHEADER, array(

'user-agent: WATCHED/9.9.9 (win32)', 

'content-type: application/json; charset=utf-8',

'watched-sig: '.$sing1.'',

'host: huhu.to'));

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

$sonuc2 = curl_exec($ch2);





if(curl_exec($ch2) === false)

{

 echo 'Curl hatası2: ' . curl_error($ch2);
exit;
}





curl_close($ch2);



//'content-length: '.$length2.'',



$Kanal_listeleri = json_decode("{}");

$Kanal_listeleri = json_decode($sonuc2,true)['items'];



$imza = base64_encode($sing1);



echo "-----||2. 300 ||---- <br><br>";

foreach($Kanal_listeleri as $liste){
$i++;
	
$url = "http://huhu.unaux.com/kanal.php?url=".base64_encode(($liste['url']))."&imza={$imza}";
$satir1 = "#EXTINF:-1,".$liste['name']."\r\n";

$eklenecek_kod= "<?php
header(\"location: ".$url."\");
?>
";

$seoadres = SEOLink($liste['name']);
$file = fopen("kanal/".$seoadres.".php", "w");

if(fwrite($file, $eklenecek_kod)){
	
	echo $i." - <a href='/kanal/{$seoadres}.php'>".$liste['name']."</a> Kanalı yenilendi <br>";
}else{
	echo $i." - "."<b>".$liste['name']." Kanalı yenilenemedi </b><br>";
}

fclose($file);

}



$ch2 = curl_init($url2);

$data2 = array(

    'language' => 'tr',

    'region' => 'TR',

    'id' => '',

    'adult' => false,

    'search' => '',

    'sort' => 'name',

    'filter' => ['group' => 'Turkey'],

    'cursor' => 601,

	'page' => 300,

    'rootId' => ''

);





curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));

curl_setopt($ch2, CURLOPT_HTTPHEADER, array(

'user-agent: WATCHED/9.9.9 (win32)', 

'content-type: application/json; charset=utf-8',

'watched-sig: '.$sing1.'',

'host: huhu.to'));

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

$sonuc2 = curl_exec($ch2);





if(curl_exec($ch2) === false)

{

 echo 'Curl hatası2: ' . curl_error($ch2);
exit;
}





curl_close($ch2);



//'content-length: '.$length2.'',



$Kanal_listeleri = json_decode("{}");

$Kanal_listeleri = json_decode($sonuc2,true)['items'];



$imza = base64_encode(($sing1));



echo "-----||3. 300 ||---- <br><br>";

foreach($Kanal_listeleri as $liste){
$i++;
	
$url = "http://huhu.unaux.com/kanal.php?url=".base64_encode(($liste['url']))."&imza={$imza}";
$satir1 = "#EXTINF:-1,".$liste['name']."\r\n";

$eklenecek_kod= "<?php
header(\"location: ".$url."\");
?>
";

$seoadres = SEOLink($liste['name']);
$file = fopen("kanal/".$seoadres.".php", "w");

if(fwrite($file, $eklenecek_kod)){
	
	echo $i." - <a href='/kanal/{$seoadres}.php'>".$liste['name']."</a> Kanalı yenilendi <br>";
}else{
	echo $i." - "."<b>".$liste['name']." Kanalı yenilenemedi </b><br>";
}

fclose($file);

}


$ch2 = curl_init($url2);

$data2 = array(

    'language' => 'tr',

    'region' => 'TR',

    'id' => '',

    'adult' => false,

    'search' => '',

    'sort' => 'name',

    'filter' => ['group' => 'Turkey'],

    'cursor' => 901,

	'page' => 300,

    'rootId' => ''

);





curl_setopt($ch2, CURLOPT_SSL_VERIFYPEER, FALSE);

curl_setopt($ch2, CURLOPT_POSTFIELDS, json_encode($data2));

curl_setopt($ch2, CURLOPT_HTTPHEADER, array(

'user-agent: WATCHED/9.9.9 (win32)', 

'content-type: application/json; charset=utf-8',

'watched-sig: '.$sing1.'',

'host: huhu.to'));

curl_setopt($ch2, CURLOPT_RETURNTRANSFER, true);

$sonuc2 = curl_exec($ch2);





if(curl_exec($ch2) === false)

{

 echo 'Curl hatası2: ' . curl_error($ch2);
exit;
}





curl_close($ch2);



//'content-length: '.$length2.'',



$Kanal_listeleri = json_decode("{}");

$Kanal_listeleri = json_decode($sonuc2,true)['items'];



$imza = base64_encode($sing1);



echo "-----||4. 300 ||---- <br><br>";

foreach($Kanal_listeleri as $liste){
$i++;
	
$url = "http://huhu.unaux.com/kanal.php?url=".base64_encode(($liste['url']))."&imza={$imza}";
$satir1 = "#EXTINF:-1,".$liste['name']."\r\n";

$eklenecek_kod= "<?php
header(\"location: ".$url."\");
?>
";

$seoadres = SEOLink($liste['name']);
$file = fopen("kanal/".$seoadres.".php", "w");

if(fwrite($file, $eklenecek_kod)){
	
	echo $i." - <a href='/kanal/{$seoadres}.php'>".$liste['name']."</a> Kanalı yenilendi <br>";
}else{
	echo $i." - "."<b>".$liste['name']." Kanalı yenilenemedi </b><br>";
}

fclose($file);

}
?>
