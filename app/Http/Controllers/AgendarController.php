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
     
            $agendar = new Agendar(['specialty_id' => $request->get('especialidade_id')]);
          //  $agendar->save();
            
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        //echo $request->inputEspecialidadeNome;
       // dd ($request->inputProfissionalNome);
        
        //$profissional = $this->retornaProfissionalPorId($profissional_id);
        
        $response = $this->restRequest('http://clinic5.feegow.com.br/components/public/api/patient/list-sources');

        /**echo "<pre>";
        echo array_search($especialidade_id, $profissional->getData()['response']->especialidades);
        var_dump($profissional->getData()['response']->especialidades);
        echo "</pre>";
        die;*/
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
