<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\FarmResource;
use App\Http\Resources\ProvinceResource;
use App\Models\Farm;
use App\Models\Map;
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
                    return response()->json(['message'=>'Delete success!'],200);
                }
            }
           
        }
        return response()->json(['message'=>'Farm not found !'],200);
        
        
    }
    public function addMap(MapRequest $request,$province_name,$id){
        $provinces = Province::where("name",$province_name)->get();
        if($provinces->count()>0){
            $provinces = new ProvinceResource($provinces[0]);
            $farms = $provinces['farms'];
            foreach($farms as $farm){
                if($farm['id']==$id){
                    $map = Map::create([
                        'image_name'=>$request->input('image_name'),
                        'height'=>$request->input('height'),
                        'width'=>$request->input('width'),
                        'drone_id'=>$request->input('drone_id'),
                        'farm_id'=>$id
                    ]);
                    return response()->json(['message'=>'create map success !','data'=>$map],200);
                    
                }
            }

        }
        return response()->json(['message'=>'Farm not found !'],200);
    }

}
