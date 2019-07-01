<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agendar;

class AgendarController extends EspecialidadeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/patient/list-sources');
        
        return view('agendar',['request' =>  $request, 'response' => $response]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cpf = str_replace(['.','-'], '', $request->get('inputCPF'));

        $verificaDuplicidade = Agendar::where('cpf', $cpf)->exists();
   
        if ($verificaDuplicidade) {
                       
            $retorno =  ['mensagem' => 'CPF já cadastrado'];
           
        } else {
          
            $agendar = new Agendar(['specialty_id' => $request->get('inputEspecialidadeId'),
                                    'professional_id' => $request->get('inputProfissionalId'),
                                    'source_id' => $request->get('inputOrigem'),
                                    'name' => $request->get('inputNome'),
                                    'cpf' => $cpf,
                                    'birthdate' => $request->get('inputNascimento'),
                                    'date_time' => '2019-06-30 23:56'
            ]);
            
                
            if ($agendar->save()) {
                
                $retorno =  ['mensagem' => 'Registro salvo com sucesso'];
                
            } else {
                
                $retorno =  ['mensagem' => 'Falha ao cadastrar'];
            }
  
        }
        
        return $retorno;
    }

}
