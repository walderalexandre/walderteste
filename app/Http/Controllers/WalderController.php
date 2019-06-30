<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;

class WalderController extends Controller
{
    private $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38';

    public function testeAPI()
    {
        
        $headers = [
            'x-access-token' => $this->token];
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
    /**
     * 
     * @param unknown $url
     * @return unknown
     */
    private function restRequest($url){
        
        $headers = [
            'x-access-token' => $this->token];
        $client = new Client();
        
        try {
        
            $res = $client->get($url,['headers' => $headers]);
    
           // $code = $res->getStatusCode(); // 200  
           // echo $res->getReasonPhrase(); die;// OK
        
        } catch (\Exception $e) {
            
            
           // view('mensagem',['codigo' => $e->getCode()]);
            
            var_dump( $e->getCode());
            exit;

        }
        
        $response = $res->getBody()->getContents();
        
        $aff = json_decode($response);
        
        $response = $aff->content;
        
        return $response;
     
    }

    /**
     * 
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function listaEspecialidade()
    {

        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/specialties/list');

        return view('walder',['response' => $response]);
    }
    
    /**
     * 
     * @param Request $especialidade
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function retornaProfissionalPorEspecialidade(Request $especialidade)
    {

        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/professional/list?especialidade_id='.$especialidade->especialidade_id);
        
        return view('profissional',['response' => $response, 'especialidade_id' => $especialidade->especialidade_id]);
        
    }
    
    public function retornaProfissionalPorId($id)
    {
        
        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/professional/search?profissional_id='.$id);
        
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
    public function showEspecifico($id)
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
