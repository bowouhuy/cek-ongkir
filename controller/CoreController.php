<?php


class api{
    
    function curl($url,$method){

        $api_url = $url;
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => array(
                "key: acbbd724a63c95cde3c321e1edafee7c"
            )
        ));
    
        // $response = curl_exec($curl);
        $err = curl_error($curl);
    
        $data = json_decode(curl_exec($curl),true);
        curl_close($curl);
        // $query = $data['rajaongkir']['query']['id'];
        // echo ($query);
        return $data;
    }
    function cek_ongkir(){
        $data = $this->curl();
        return $data;
    }

    function daftar_provinsi(){
        $url = "https://api.rajaongkir.com/starter/province";
        $data = $this->curl($url, "GET");
        return $data;
    }

    function daftar_kota(){
        $url = "https://api.rajaongkir.com/starter/city";
        $data = $this->curl($url, "GET");
        return $data;
    }
}


?>