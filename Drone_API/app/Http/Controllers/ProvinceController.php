<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmResource;
use App\Http\Resources\ProvinceResource;
use App\Models\Farm;
use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    
    public function destroy( $province_name, $id )
    {   
        $provinces = Province::where("name",$province_name)->get();
        if($provinces->count()>0){
            $provinces = new ProvinceResource($provinces[0]);
            $farms = $provinces['farms'];
            foreach($farms as $farm){
                if($farm['id']==$id){
                    $farm = new FarmResource(Farm::find($id));
                    $maps = $farm['maps'];
                    foreach($maps as $map){
                        $map->delete();
                    }
                    return response()->json(['message'=>'Delete success!']);
                }
            }
           
        }
        return response()->json(['message'=>'No data !']);
        
        
    }

}
