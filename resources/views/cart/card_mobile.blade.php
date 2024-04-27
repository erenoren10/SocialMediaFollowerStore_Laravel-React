<?php

/*
   _____ __    _                          __     ___    ____  ____
  / ___// /_  (_)___  __  __  ____  ___  / /_   /   |  / __ \/  _/
  \__ \/ __ \/ / __ \/ / / / / __ \/ _ \/ __/  / /| | / /_/ // /  
 ___/ / / / / / /_/ / /_/ / / / / /  __/ /_   / ___ |/ ____// /   
/____/_/ /_/_/ .___/\__, (_)_/ /_/\___/\__/  /_/  |_/_/   /___/   
            /_/    /____/                                         

API Versiyon: 2
Güncelleme Tarihi: 27.07.2020
*/

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

if (!empty($_GET['totalprice'])) {
    $oldtotalprice = $_GET['totalprice'];
    $totalprice = $oldtotalprice + (($oldtotalprice*10)/100);
} else {
    $totalprice = 'Hesaplanamadı Tekrar deneyin';
}
if (!empty($_GET['name'])) {
    $name = $_GET['name'];
} else {
    $name = 'Girilmedi';
}
if (!empty($_GET['email'])) {
    $email = $_GET['email'];
} else {
    $email = 'Girilmedi';
}
if (!empty($_GET['phone_number'])) {
    $phone_number = $_GET['phone_number'];
} else {
    $phone_number = 'Girilmedi';
}

if(Auth::check()){
    $user = Auth::id();
}else{
    $user = session()->getId();
}



$returnID = $user; // İşlem tamamlandığında size gönderilecek veri, INT veya STRING olabilir.
$usrIp = request()->ip(); // Ödeme yapacak kullanıcının IP adresi.
$amount = $totalprice; // Ödenecek tutar, TL cinsinden.
$apiKey = 'T1Wh8dsp4BNmdbBK'; // Gizli API anahtarınız
$usrName = $name;  // Ödeme yapacak kullanıcınızın adı, soyadı.
$usrAddress = "deneme"; // Ödeme yapacak kullanıcınızın adresi.
$usrPhone = $phone_number;  // Ödeme yapacak kullanıcınızın telefon numarası.
$usrEmail = $email;// Ödeme yapacak kullanıcınızın e-posta adresi.

$fields = array(
    "usrIp" => $usrIp,
    "usrName" => $usrName,
    "usrAddress" => $usrAddress,
    "usrPhone" => $usrPhone,
    "usrEmail" => $usrEmail,
    "amount" => $amount,
    "returnID" => $returnID,
    "apiKey" => $apiKey
);

$postvars = http_build_query($fields);
$ch = curl_init();

curl_setopt_array($ch, array(
    CURLOPT_URL => "https://api.shipy.dev/pay/mobile",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => http_build_query($fields),
    CURLOPT_SSL_VERIFYPEER => 0,
));

$result = curl_exec($ch);
print_r($result);
curl_close($ch);

?>
