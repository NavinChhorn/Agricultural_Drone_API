<?php

namespace App\Http\Controllers;

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
     * Display a listing of the resource.
     */
    public function index()
    {
        $maps = Map::all();
        $maps = MapResource::collection($maps);
        return response()->json(['success'=> true, "data"=>$maps], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $province_name, string $farm_id)
    {
        $province =Province::where("name", $province_name)->get();
        if($province->count() > 0){
            $province=new ProvinceResource($province[0]);
            $farms =FarmResource::collection($province["farms"]);
            foreach($farms as $farm){
                if($farm["id"] == $farm_id){
                    $farm=new FarmResource($farm);
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
