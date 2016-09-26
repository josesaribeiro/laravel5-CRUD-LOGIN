<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Session;
use DateTime;
use App\Poder;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use PhpOffice\PhpWord\PhpWord as PhpWord;

class PodersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $poders = Poder::orderBy('poderante')->get();

        return view('poders.index')->withPoders($poders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('poders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'fecha' => 'required',
            'poderante' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'localidad' => 'required',
            'demandado' => 'required',
            'aseguradora' => 'required',
            'fecha_siniestro' => 'required',
            'dominio_siniestro' => 'required',
            'direccion_siniestro' => 'required',
            'localidad_siniestro' => 'required'
        ]);
        
        $input = $request->all();

        Poder::create($input);

        Session::flash('flash_message', '¡Poder creado correctamente!');

        return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $poder = Poder::findOrFail($id);

        return view('poders.show')->withPoder($poder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $poder = Poder::findOrFail($id);

        return view('poders.edit')->withPoder($poder);
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
        $poder = Poder::findOrFail($id);
    
        $this->validate($request, [
            'fecha' => 'required',
            'poderante' => 'required',
            'dni' => 'required',
            'direccion' => 'required',
            'localidad' => 'required',
            'demandado' => 'required',
            'aseguradora' => 'required',
            'fecha_siniestro' => 'required',
            'dominio_siniestro' => 'required',
            'direccion_siniestro' => 'required',
            'localidad_siniestro' => 'required'
        ]);
    
        $input = $request->all();
    
        $poder->fill($input)->save();
    
        Session::flash('flash_message', '¡Poder actualizado correctamente!');
    
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $poder = Poder::findOrFail($id);

        $poder->delete();
    
        Session::flash('flash_message', '¡Poder eliminado!');
    
        return redirect()->route('poders.index');
    }
    
     /**
     * Generate doc and download.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $poder = Poder::findOrFail($id);
        $phpWord = new PhpWord();
        $template= public_path(). "/download/poderespecial.docx";
        $file= public_path(). "/download/".$poder->id."-".$poder->poderante.".docx";
        $download = $phpWord->loadTemplate($template);
        $d_fecha= new DateTime($poder->fecha);
        $s_fecha= new DateTime($poder->fecha_siniestro);
        $download->setValue('dia_fecha', $d_fecha->format("d"));
        $download->setValue('mes_fecha', getMes($d_fecha->format("m")));
        $download->setValue('ano_fecha', trim(valorEnLetras((int) $d_fecha->format("Y"))));
        $download->setValue('poderante', strtoupper($poder->poderante));
        $download->setValue('dni', $poder->dni);
        $download->setValue('direccion', strtoupper($poder->direccion));
        $download->setValue('localidad', $poder->localidad);
        $download->setValue('demandado', strtoupper($poder->demandado));
        $download->setValue('aseguradora', strtoupper($poder->aseguradora));
        $download->setValue('fecha_siniestro', $s_fecha->format("d").".".$s_fecha->format("m").".".$s_fecha->format("Y"));
        $download->setValue('dominio_siniestro', $poder->dominio_siniestro);
        $download->setValue('direccion_siniestro', strtoupper($poder->direccion_siniestro));
        $download->setValue('localidad', $poder->localidad);
        $download->saveAs($file);
        $headers = array('Content-Type: application/docx',);
        return response()->download($file, $poder->id."-".$poder->poderante.".docx", $headers);
    }
    
}
