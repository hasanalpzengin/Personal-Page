<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
require '../vendor/autoload.php';


class ProjectsController extends Controller
{
    public function show(){
        $data = $this->all();
        return view('pages.projects')->with('datas',$data);
    }

    private function all(){
        $client = new \GuzzleHttp\Client();
        $response = $client->get('https://gitlab.com/api/v4/users/hasanalpzengin/projects?private_token=JytdQ-37psyzgTs_Gqx_');
        $data = json_decode($response->getBody());
        return $data;
    }
}
