<?php

namespace App\Http\Controllers;

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

        return view('ranking.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ranking($query, $repo)
    {
        $repo = ($repo == '') ? '0' : $repo;
        $todos_usuarios = array();
        $page = 1;
        while (count($todos_usuarios) < 10) {
            $response = \Illuminate\Support\Facades\Http::withHeaders(['access_token' => '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'])
                ->get("https://api.github.com/search/users?per_page=30;page=$page;q=$query");
            $users = $response->json();
           
            if (isset($users['items'])) {

                foreach ($users['items'] as $user) {
                    $login = $user['login'];
                    $response = \Illuminate\Support\Facades\Http::withHeaders(['access_token' => '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'])
                        ->get("https://api.github.com/users/$login");
                    $user = $response->json();
                    // dd( $user);
                    if (isset($user['public_repos'])) {


                        if ($user['public_repos'] >= $repo) {
                            $todos_usuarios[$user['id']]['id'] = (isset($user['id'])) ? $user['id'] : '';
                            $todos_usuarios[$user['id']]['login'] = $user['id'];
                            $todos_usuarios[$user['id']]['name'] = $user['name'];
                
                            $todos_usuarios[$user['id']]['seguidores'] = $user['followers'];
                            $todos_usuarios[$user['id']]['repo'] = $user['public_repos'];
                            $todos_usuarios[$user['id']]['local'] = $user['location'];
                        }
                    }
                  
                }
            }else{
                return $todos_usuarios;  
            }

            $page++;
        }



        return $todos_usuarios;
    }
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
    public function list(Request $request)
    {
        $query = '';

        $pesquisa_language = $request['language'];
        $pesquisa_repositorio = $request['pesquisa_repositorio'];
        $pesquisa_seguidores = $request['pesquisa_seguidores'];

        if ($pesquisa_language != null) {
            $pesquisa_language = "$pesquisa_language language:$pesquisa_language";
        } else {
            $pesquisa_language = '';
        }
        if ($pesquisa_seguidores != null) {
            $pesquisa_seguidores = "+followers:>$pesquisa_seguidores";
        } else {
            $pesquisa_seguidores = '';
        }

        $query = "$pesquisa_language$pesquisa_seguidores";
        // dd($query);



        $devs = $this->ranking($query, $pesquisa_repositorio);

        return view('ranking.list', compact('devs'));
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
