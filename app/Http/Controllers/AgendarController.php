<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Agendar;

class AgendarController extends EspecialidadeController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $verificaDuplicidade = Agendar::where('cpf', $request->get('inputCPF'))->exists();
        
        if ($verificaDuplicidade) {
                       
            $retorno =  ['mensagem' => 'CPF já cadastrado'];
 
            return $retorno;
          
        } else {
          
            $agendar = new Agendar(['specialty_id' => $request->get('inputEspecialidadeId'),
                                    'professional_id' => $request->get('inputProfissionalId'),
                                    'source_id' => $request->get('inputOrigem'),
                                    'name' => $request->get('inputNome'),
                                    'cpf' => $request->get('inputCPF'),
                                    'birthdate' => $request->get('inputNascimento'),
                                    'date_time' => '2019-06-30 23:56'
            ]);
            
          //  try {
                
                $agendar->save();
                echo view('mensagem',['mensagem' => 'Registro salvo com sucesso']);
          //      return true;
                
                // $code = $res->getStatusCode(); // 200
                // echo $res->getReasonPhrase(); die;// OK
                
          //  } catch (Exception $e) {
                
                
                // view('mensagem',['codigo' => $e->getCode()]);
                
              //  var_dump( $e->getCode());
                
              //  echo view('mensagem',['mensagem' => 'Falha ao salvar o registro: '.$e->getCode()]);
           //     return false;
                
           // }
            /**
            if ($agendar->save()) {
                echo view('mensagem',['mensagem' => 'Registro salvo com sucesso']);
            } else {
                echo view('mensagem',['mensagem' => 'Falha ao salvar o registro']);
            }
                */
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //  dd($request);
        
        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/patient/list-sources');

        return view('agendar',['request' =>  $request, 'response' => $response]);

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
