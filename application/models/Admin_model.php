<?php 

use GuzzleHttp\Client;

class Admin_model extends CI_Model{
    
    public function getAdminDataAPI($email){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/admin/userdata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'query' => [
                'email' => $email,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getOperatorDataAPI($id_operator=null){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/admin/operatordata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'query' => [
                'id_operator' => $id_operator,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function getDepartmentDataAPI($id_department=null){
        $client = new Client();
        $response = $client->request('GET', 'http://localhost/server-manajemen-kuliah/admin/department', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'query' => [
                'id_operator' => $id_department,
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function addOperatorDataAPI($nama, $email, $jk, $tgl, $department, $password){
        $client = new Client();
        $response = $client->request('POST', 'http://localhost/server-manajemen-kuliah/admin/operatordata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'form_params' => [
                'nama' => $nama,
                'email' => $email,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl,
                'id_department' => $department,
                'password' => $password
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function editOperatorDataAPI($id_operator, $nama, $email, $jk, $tgl, $department, $password){
        $client = new Client();
        $response = $client->request('PUT', 'http://localhost/server-manajemen-kuliah/admin/operatordata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'form_params' => [
                'id_operator' => $id_operator,
                'nama' => $nama,
                'email' => $email,
                'jenis_kelamin' => $jk,
                'tgl_lahir' => $tgl,
                'id_department' => $department,
                'password' => $password
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

    public function deleteOperatorDataAPI($id_operator){
        $client = new Client();
        $response = $client->request('DELETE', 'http://localhost/server-manajemen-kuliah/admin/operatordata', [
            'allow_redirects' => true,
            'timeout' => 2000,
            'http_errors' => false,
            'form_params' => [
                'id_operator' => $id_operator
            ]
        ]);
        return json_decode($response->getBody()->getContents(), true);
    }

}