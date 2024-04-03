<?php

namespace App\Http\Controllers;

use App\Models\info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
   
    public function getinfo()
    {
        $info = Info::find('660c2146b14fca540f0b8d03');
        return response()->json($info);

    }

    /**
     * Show the form for creating a new resource.
     */

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info = new info();
        $info->prenom = $request->prenom;
        $info->nom = $request->nom;
        $info->save();

        return response()->json(['result' , $info] );
    }

  
    public function update(Request $request)
    {
        $info = Info::find('660c2146b14fca540f0b8d03');
    
        if (!$info) {
            return response()->json(['error' => 'Info not found'], 404);
        }
    
        $info->fill($request->all());
    
        $info->save();
        
        return response()->json(['success' => 'Info updated successfully', 'info' => $info]);
    }   


    public function updateimage(Request $request)
    {
        if ($request->hasFile('image')) {
            $checkimage = Info::find('660c2146b14fca540f0b8d03');
        
            if ($checkimage) {
                $image = $request->file('image');
                
                $image_name = uniqid() . '.' . $image->getClientOriginalExtension();
                
                $image->move(public_path('assets/images'), $image_name);
        
                $checkimage->image = $image_name;
                $checkimage->save(); 
        
                return response()->json(['image_name' => $image_name], 200);
            } else {
                return response()->json(['error' => 'Instance de modèle non trouvée.'], 404);
            }
        } else {
            return response()->json(['error' => 'Aucun fichier téléchargé.'], 400);
        }
    }
    




 
    
}
