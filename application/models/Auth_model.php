<?php 

use GuzzleHttp\Client;

class Auth_model extends CI_Model{
    
    public function getUserAPI($email, $password){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/auth/user', [
            'query' => [
                'email' => $email,
                'password' => $password
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

}