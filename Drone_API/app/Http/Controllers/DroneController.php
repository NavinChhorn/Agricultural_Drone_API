<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneUpdateRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Drone;
use Database\Seeders\DroneSeeder;

class DroneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['success'=> true, "data"=>$drones], 200);
    }
    
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
    }
    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        $drone = new DroneResource($drone);
        $location=[
            "drone_id"=>$drone["id"],
            "latitude"=>$drone["location"]["latitude"],
            "longitude"=>$drone["location"]["longitude"],
        ];
        return response()->json(['success'=> true, "data"=>$location], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DroneUpdateRequest $request, string $id)
    {
        $drone = Drone::find($id);
        $drone->update($request->all());
        $drone = new DroneResource($drone);
        return response()->json(['message'=>'Update successfully!','drone'=>$drone],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
