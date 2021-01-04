<?php 

use GuzzleHttp\Client;

class Operator_model extends CI_Model{
    
    public function getOperatorDataAPI($email){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/operator/userdata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'query' => [
                'email' => $email,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

}