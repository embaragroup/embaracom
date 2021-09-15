<?php

namespace App\Repositories\Invoice;

class MidtransRepository {
    public static function request($httpMethod, $baseUrl, $path, $dataRequest = null){
        $authKey = config('apikey.midtrans.auth_key');
        $dataRequestString = $dataRequest ? json_encode($dataRequest, JSON_UNESCAPED_SLASHES) : '';
        $curlDataRequest = null;

        if ($httpMethod === 'get') {
            $curlDataRequest = array(
                CURLOPT_URL => $baseUrl.$path,
                CURLOPT_RETURNTRANSFER => true,
            );
        } else {
            $curlDataRequest = array(
                CURLOPT_URL => $baseUrl.$path,
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_POST => true,
                CURLOPT_POSTFIELDS => $dataRequestString
            );
        }

        $curl = curl_init();
        curl_setopt_array($curl, $curlDataRequest);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            "Authorization: Basic ". $authKey,
            'Content-Type: application/json',
            "Accept: application/json"
        ));

        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);

        if ($err) {
            return [
                'status' => false,
                'message' => 'cURL Error : ' . $err
            ];
        } else {
            json_decode($response, true);
        }
    }
}
