<?php


class api{
    
    function curl($url,$method,$cost){

        $api_url = $url;
        $xpost="";
            if($cost!=""){
                $xpost = "origin=".$cost['origin']."&destination=".$cost['destination']."&weight=".$cost['weight']."&courier=".$cost['courier']."";
            }
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => $api_url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_POSTFIELDS => $xpost,
            CURLOPT_HTTPHEADER => array(
                "content-type: application/x-www-form-urlencoded",
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
        $data = $this->curl($url, "GET","");
        return $data;
    }

    function daftar_kota(){
        $url = "https://api.rajaongkir.com/starter/city";
        $data = $this->curl($url, "GET","");
        return $data;
    }

    function cost($origin, $destination, $weight, $courier){
        $data_cost = [
            'origin' => $origin,
            'destination' => $destination,
            'weight' => $weight,
            'courier' => $courier
        ];
        $url = "https://api.rajaongkir.com/starter/cost";
        $data = $this->curl($url, "POST",$data_cost);
        return $data;
    }
}


?>