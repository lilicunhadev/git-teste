<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Models\Dev;

class DevController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
        $url = "https://api.github.com/users";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        //curl   -H "Accept: application/vnd.github.v3+json"  
        $devs = json_decode(curl_exec($ch)); */

        //echo "<pre>";
        //print_r($devs);
        //echo "\n\nteste";
        //return print_r($devs);
        //return Dev::all();

        $response = \Illuminate\Support\Facades\Http::get('https://api.github.com/users?per_page=110');
        $users = $response->json();
        foreach($users as $user)
        {
            return dd($user['login'] .' - '. $user['html_url']);
        }

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://api.github.com/users', [
       'headers' => ['Content-type: application/x-www-form-urlencoded'],
       'form_params' => [
            'per_page' => '*',
            'followers' => '*',
            'order', '*',
                ],
       //'timeout' => 20, // Response timeout
       //'connect_timeout' => 20, // Connection timeout
        ]);

        dd($response->getBody()->getContents());

        // $response = \Illuminate\Support\Facades\Http::withHeaders(['Accept'=>'application/vnd.github.v3+json'])
        // ->get('https://api.github.com/users?per_page=5');

        // return dd($response->json());

        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
