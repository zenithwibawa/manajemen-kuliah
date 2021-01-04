<?php 

use GuzzleHttp\Client;

class Auth_model extends CI_Model{
    
    public function getLoginAPI($email, $password){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/auth/login', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'query' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

}