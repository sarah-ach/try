<?php

namespace App\Http\Controllers;
use App\Models\location;
use Illuminate\Http\Request;
use DB;

class LocationController extends Controller
{
    

    public function index()
    {
    
        return view('search');
    }


    public function search(Request $request)
    {
        $get_name=$request->search_name;
        $users=location::where('splice_name', 'LIKE' ,'%'.$get_name.'%')->get();
        return view('search',compact('users'));
    }

   /* public function search(Request $request)
    {
        

         if($request->ajax())
        {

            $output='';
            $locations=location::where('splice_name','LIKE','%'.$request->search.'%' )->get()->unique('location'); //distinct

            if($locations)
            {
                foreach($locations as $loca)
                {
                    $output .=$loca->location; 
                }
                
                return response()->json($output);
            }
        }  

       return view('/search');
        
    }*/

   
    /*public function search(Request $request)
    {
        

         if($request->ajax())
        {

            $output='';
            $locations=location::where('splice_name','LIKE','%'.$request->search.'%' )->get()->unique('location'); //distinct

            if($locations)
            {
                foreach($locations as $location)
                {
                    $output .=$location->location; 
                }
                
                return response()->json($output);
            }
        }  

       return view('/home');
        
    }*/

}
