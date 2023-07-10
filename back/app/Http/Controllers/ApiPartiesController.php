<?php

namespace App\Http\Controllers;

use App\Models\Parties;
use Illuminate\Http\Request;

class ApiPartiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Parties::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = Parties::create($request->all());
        return response()->json($item);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = Parties::create($request->all());
        return response()->json($item);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $idjoueur
     * @return \Illuminate\Http\Response
     */
    public function show($idjoueur)
    {
        $partie = Parties::find($idjoueur);
        if($partie){
            return response()->json($partie);
        }else{
            return response()->json(["status" => "error"]);
        }
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
        $partieid = Partie::find($id);
        if($partieid){
            $partieid->update(
                [
                    'name'=> $request->name,
                    'email'=> $request->email,
                    'password'=> $request->password,
        ]);
            return response()->json($partieid);
        }else{
            return response()->json(['id non trouvé']);
        }
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
