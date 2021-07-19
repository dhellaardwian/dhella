<?php defined('BASEPATH') OR exit('No direct script access allowed');

class RajaOngkir {

    public $apiKey;

    public function __construct($param = '')
    {
        if ($param) {
            $this->apiKey = $param;
        }else{
            $this->apiKey = 'd6f0cb09d5cf46fb69d642124cccb42e';
        }
    }

    protected function req_curl($res = array()){
		$config = [];
		$config = [
			'url'		=> (isset($res['url']) && !empty($res['url']))			? $res['url'] 		: '',
			'method'	=> (isset($res['method']) && !empty($res['method']))	? $res['method'] 	: 'GET',
			'data'		=> (isset($res['data']) && !empty($res['data']))		? $res['data'] 		: '',
			'header'	=> (isset($res['header']) && $res['header'])			? $res['header']	: [],
		];

		if ($config['url']) {
			try {
				$headers = array( 
					'Content-Type: application/json',
					'accept: application/json'
				);
				$ch = curl_init(); 
                if ($config['header'] && is_array($config['header'])) {
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $config['header']);
                }else{
                    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers);
                }
				
				if (strtolower($config['method']) == "get") {
					if ($config['data']) {
						$query_get = "?" . http_build_query($config['data']);
						$config['url'] .= $query_get;
					}
					curl_setopt($ch, CURLOPT_URL, $config['url']);
				}else {
					curl_setopt($ch, CURLOPT_URL, $config['url']);
					curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $config['method']);
					if ($config['data']) {
						curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($config['data']));
					}
				}
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); 
				curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1); 
				curl_setopt($ch, CURLOPT_FRESH_CONNECT, TRUE);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);  
                curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);  
				$output = curl_exec($ch); 
				curl_close($ch);      
			} catch (\Throwable $th) {
				$output = json_encode([]);
			}
        }
        $result_out = $output;
        $output = json_decode($output, true);
        if ($output) {
            if ($output['rajaongkir']['status']['code'] == 200) {
                $result['success']  = true;
                $result['data']     = $output['rajaongkir'];
                $result['result_out'] = $result_out;
            }else{
                $result['success'] = false;
                $result['data'] = $output;
                $result['result_out'] = $result_out;
            }
        }else{
            $result['success'] = false;
            $result['data'] = $output;
            $result['result_out'] = $result_out;
        }
		return $result;
		// return $output;
	}
    
    public function get_province($args = [])
    {
        $data = $args;
        $result = $this->req_curl([
            'url'       => 'https://api.rajaongkir.com/starter/province',
            'method'    => 'GET',
            'header'    => ['key: '.$this->apiKey],
            'data'      => $data
        ]);

        return $result;
    }

    public function get_city($args = [])
    {
        $data = $args;
        $result = $this->req_curl([
            'url'       => 'https://api.rajaongkir.com/starter/city',
            'method'    => 'GET',
            'header'    => ['key: '.$this->apiKey],
            'data'      => $data
        ]);

        return $result;
    }

    public function get_subdistrict($args = [])
    {
        $data = $args;
        $result = $this->req_curl([
            'url'       => 'https://pro.rajaongkir.com/api/subdistrict',
            'method'    => 'GET',
            'header'    => ['key: '.$this->apiKey],
            'data'      => $data
        ]);

        return $result;
    }

    public function get_cost($args = [])
    {
        $ongkir = [];

        $courier = isset($args['courier']) ? strtolower($args['courier']) : false;
        $service = isset($args['service']) ? strtolower($args['service']) : false;
        
        $destination = isset($args['destination']) ? $args['destination'] : false;
        $origin = isset($args['origin']) ? $args['origin'] : false;

        $weight = isset($args['weight']) && $args['weight'] ? intval($args['weight']) : 1000;

        if (!$courier || !$destination || !$origin )
            return $ongkir;

        $dataOngkir = [
            'origin' => $origin,
            // 'originType' => 'subdistrict',
            'destination' => $destination,
            // 'destinationType' => 'subdistrict',
            'weight' => $weight,
            'courier' => $courier
        ];

        $getOngkir = $this->req_curl([
            'url'       => 'https://api.rajaongkir.com/starter/cost',
            'method'    => 'POST',
            'header'    => ['content-type: application/x-www-form-urlencoded', 'key: '.$this->apiKey],
            'data'      => $dataOngkir
        ]);
        // if (!$getOngkir['success'] || !isset($getOngkir['data']['results'][0]['costs']))
        //     return $ongkir;

        $ongkir = $getOngkir;
        return $ongkir;
    }

    public function get_tracing($args = [])
    {
        $result = [];

        $number  = isset($args['no']) ? $args['no'] : false;
        $courier = isset($args['courier']) ? $args['courier'] : false;

        if (!$number || !$courier) 
            return $result;
        
        $dataTracing = [
            'waybill' => $number,
            'courier' => $courier
        ];
        $getTracing = $this->req_curl([
            'url'       => 'https://pro.rajaongkir.com/api/waybill',
            'method'    => 'POST',
            'header'    => ['content-type: application/x-www-form-urlencoded', 'key: '.$this->apiKey],
            'data'      => $dataTracing
        ]);

        if (!$getTracing['success']) 
            return $result;
        
        $result = $getTracing;
        return $result;
    }

}
