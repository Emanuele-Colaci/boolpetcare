<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Illness;

class IllnessController extends Controller
{
    public function show($slug){
        $illness = Illness::with('pets', 'vaccinations')->where('slug', $slug)->first();

        if($illness){
            return response()->json([
                'success'  => true,
                'vaccination'  => $illness
            ]);
        }
        else{
            return response()->json([
                'success'  => false,
                'error'  => 'Nessun post trovato'
            ]);
        }
    }
}
