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
        $provinces=new ProvinceResource(Province::where("name", $province_name)->first());
        // return $provinces;
        $farms =FarmResource::collection($provinces["farms"]);
        foreach($farms as $farm){
            if($farm["id"] == $farm_id){
                $farm=new FarmResource($farm);
                return MapResource::collection($farm["maps"]);
            }
        }
        return $farms;
        // return ProvinceResource::collection(Province::where("name", $province_name)->get());
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
