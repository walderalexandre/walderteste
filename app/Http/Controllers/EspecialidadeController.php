<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EspecialidadeController extends Controller
{
    private $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJmZWVnb3ciLCJhdWQiOiJwdWJsaWNhcGkiLCJpYXQiOiIxNy0wOC0yMDE4IiwibGljZW5zZUlEIjoiMTA1In0.UnUQPWYchqzASfDpVUVyQY0BBW50tSQQfVilVuvFG38';

    /**
     * Função para requisitar dados via REST
     * @param string $url
     * @return mixed values
     */
    public function restRequest($url){
        
        $headers = [
            'x-access-token' => $this->token];
        $client = new Client();
        
        try {
        
            $res = $client->get($url,['headers' => $headers]);

        } catch (\Exception $e) {
            
            return false;

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

        return view('especialidade',['response' => $response]);
    }
    
    /**
     * 
     * @param Request $especialidade
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function retornaProfissionalPorEspecialidade(Request $especialidade)
    {

        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/professional/list?especialidade_id='.$especialidade->especialidade_id);
           
        return view('profissional',['response' => $response, 'especialidade_id' => $especialidade->especialidade_id, 'total' => count($response)]);
        
    }
    
    /**
     * 
     * @param integer $id
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     */
    public function retornaProfissionalPorId($id)
    {
        
        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/professional/search?profissional_id='.$id);
        
        return view('profissional',['response' => $response]);
        
    }
    
}
