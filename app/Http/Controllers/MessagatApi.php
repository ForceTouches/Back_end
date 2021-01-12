<?php
namespace App\Http\Controllers;

trait MessagatApi{

    public function send_smsapi($Mobiles, $msg, $Sender)
    {
        $Mobiles="966599476414";
        $Sender="forceAD";
        $msg="السلام عليكم";
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://msegat.com/gw/sendsms.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "{\n  \"userName\":\"forcetouches\",\n  \"numbers\": \"$Mobiles\",\n  \"userSender\":\"$Sender\",\n  \"apiKey\":\"281ac1d96efd8971e92545c8a1a3ec59\",\n  \"msg\":\"$msg\"\n}",
            CURLOPT_HTTPHEADER => array(
                "cache-control: no-cache",
                "content-type: application/json",
                "postman-token: a7ea1eb1-fd96-7b73-0a48-f9eb45592c0f"
    
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
    }
}
