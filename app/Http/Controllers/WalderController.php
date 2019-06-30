<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WalderController extends Controller
{
    

    public function testeAPI()
    {
        
        
        $headers = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'];
        $client = new Client();
        
        $res = $client->get('http://clinic5.feegow.com.br/components/public/api/company/list-unity',['headers' => $headers]);
        $response = $res->getBody()->getContents();
      
        dd($response);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $var = ['a' => 'aqui!!!'];
        return view('walder',['var' => $var]);
       
    }

    public function listaEspecialidade()
    {
        $headers = [
            'x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'];
        $client = new Client();
        
        $res = $client->get('http://clinic5.feegow.com.br/components/public/api/specialties/list',['headers' => $headers]);
        $response = $res->getBody()->getContents();
       
        $aff = json_decode($response);

        $response = $aff->content;
        return view('walder',['response' => $response]);
    }
    
    public function retornaProfissional(Request $especialidade){

        $especialidade = $especialidade->especialidade_id;
        $headers = ['x-access-token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38'

        ];
        $client = new Client(['headers' => $headers]);
        
        $res = $client->get('http://clinic5.feegow.com.br/components/public/api/professional/list?especialidade_id='.$especialidade);
        
        $code = $res->getStatusCode(); // 200
        $reason = $res->getReasonPhrase(); // OK
        
        $response = $res->getBody()->getContents();
        
        $aff = json_decode($response);
        
        $response = $aff->content;
       // dd($response);
        return view('profissional',['response' => $response]);
        
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
