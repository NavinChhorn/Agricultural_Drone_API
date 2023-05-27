<?php

namespace App\Http\Controllers;

use App\Http\Requests\MapRequest;
use App\Http\Resources\FarmResource;
use App\Http\Resources\MapResource;
use App\Http\Resources\ProvinceResource;
use Illuminate\Http\Request;
use App\Models\Map;
use App\Models\Province;
use App\Models\Farm;

class MapController extends Controller
{
    /**
     * List all maps.
     */
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['success'=> true, "data"=>$maps], 200);
    }

    /**
     * Add map to a farm
     */
    public function addMap(MapRequest $request, string $province_name,string $id){
        $province = Province::where("name",$province_name)->first();
        if(isset($province)){
            $farms = $province->farms;
            foreach($farms as $farm){
                if($farm['id']==$id){
                    $map = Map::create([
                        'image_name'=>$request->input('image_name'),
                        'height'=>$request->input('height'),
                        'width'=>$request->input('width'),
                        'drone_id'=>$request->input('drone_id'),
                        'farm_id'=>$id
                    ]);
                    return response()->json(['message'=>'Map is created.','data'=>$map],200); 
                }
            }
        }
        return response()->json(['message'=>'Farm not found !'],200);
    }

    /**
     * Download map image from a farm
     */
    public function getMap(string $province_name, string $farm_id)
    {
        $province =Province::where("name", $province_name)->first();
        if(isset($province)){
            $farms = $province->farms;     // farms : is a function in province model.
            foreach($farms as $farm){
                if($farm["id"] == $farm_id){
                    $maps = Farm::find($farm_id)->maps;     // maps : is a function in farm model.
                    $maps = MapResource::collection($farm["maps"]);
                    if(count($maps)>0){
                        return response()->json(['success'=> true, "data"=>$maps], 200);
                    }
                }
            }
        }
        return response()->json(["success"=> false, "message"=>"Map not Found"], 401);
    }

      /**
     * Delete maps from a farm
     */
    public function deleteMap(string $province_name, string $id )
    {   
        $province = Province::where("name",$province_name)->first();
        if(isset($province)){
            $farms = $province->farms;      // farms : is a function in province model.
            foreach($farms as $farm){
                if($farm['id']==$id){
                    $maps = Farm::find($id)->maps;      // maps : is a function in farm model.
                    foreach($maps as $map){
                        $map->delete();
                    }
                    return response()->json(['message'=>'Delete success!'],200);
                }
            }
        }
        return response()->json(['message'=>'Farm not found !'],200);
    }
}
