<?php 

use GuzzleHttp\Client;

class Mahasiswa_model extends CI_Model{
    
    public function getMahasiswaDataAPI($email){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/mahasiswa/userdata', [
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