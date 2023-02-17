<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\trasabilite;
use Illuminate\Support\Facades\Validator;

class TrasabiliteController extends Controller
{
    

    public function index()
    {

       return view('home');
     
    } 

    

    public function storeH(Request $request)
{
   
        $validate=Validator::make($request->all(),[
        'id_operateur' => 'required',
        'splice_name' => 'required',
        'location' => 'required',
        'quantite' => 'required',
        ],[
            'id_operateur.required'=>'Nom d operateur obligatoire',
            
            'splice_name.required'=>'scan splice name',
            'location.required'=>' location obligatoire',
            
            'quantite.required'=>'quantite obligatoire',
        ]);
        if($validate->fails())
        {
            return back()->withErrors($validate->errors());
        }
        $circ = new trasabilite;
        
        $circ->id_operateur = $request->id_operateur;
        $circ->splice_name = $request->splice_name;
        $circ->location = $request->location;
        $circ->quantite = $request->quantite;
        


        $circ->save();

        return redirect('home')->with('status', 'Form Data Has Been Inserted');


}
}
