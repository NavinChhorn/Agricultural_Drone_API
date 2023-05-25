<?php

namespace App\Http\Controllers;


use App\Http\Resources\DroneResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Drone;
use App\Models\Instruction;

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
        return response()->json(['success'=> true, "data"=>$drone], 200);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $drone = Drone::find($id);
        $instruction = Instruction::find($drone["instruction_id"]);
        $instruction->update($request->all());
        return response()->json(['success'=> true, "message"=>"Plan is starting"], 200);
        return new DroneResource($drone);
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function getDroneLocation(string $id){
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
