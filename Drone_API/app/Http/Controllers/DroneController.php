<?php

namespace App\Http\Controllers;

use App\Http\Requests\DroneUpdateRequest;
use App\Http\Resources\DroneResource;
use App\Http\Resources\LocationResource;
use Illuminate\Http\Request;
use App\Models\Drone;
use App\Models\Instruction;
use App\Models\Location;

class DroneController extends Controller
{
    /**
     * List all drones
     */
    public function index()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        return response()->json(['success' => true, "data" => $drones], 200);
    }

    /**
     * Get drone details
     */
    public function show(string $id)
    {
        $drone = Drone::find($id);
        if(isset($drone)){
            $drone = new DroneResource($drone);
            return response()->json(['success' => true, "data" => $drone], 200);
        }
        return response()->json(["success"=>false, "message"=>"Drone is not found"], 401);
    }

    /**
     * Instruct drone to run mode
     */
    public function update(Request $request, string $id)
    {
        $drone = Drone::find($id);
        if(isset($drone)){
            $instruction = Instruction::find($drone["instruction_id"]);
            $instruction->update($request->all());
            return response()->json(['success' => true, "message" => "Plan is starting"], 200);
        }
        return response()->json(["success"=>false, "message"=>"Drone is not found"], 401);
    }
    
    /**
     * Get drone location.
     */
    public function getDroneLocation(string $id)
    {
        $drone = Drone::find($id);
        if(isset($drone)){
            $location = new LocationResource($drone["location"]);
            return response()->json(['success' => true, "data" => $location], 200);
        }
        return response()->json(["success"=>false, "message"=>"Drone is not found"], 401);
    }
    
    /**
     * Update drone's status.
     */
    public function updateDroneStatus(DroneUpdateRequest $request, string $id)
    {
        $drone = Drone::find($id);
        if(isset($drone)){
            $drone->update($request->all());
            $drone=[
                "type"=>$drone["type"],
                "bettery"=> $drone["bettery"],
                "location"=> new LocationResource($drone["location"])
            ];
            return response()->json(['message' => 'Update successfully!', 'data' => $drone], 200);
        }
        return response()->json(["success"=>false, "message"=>"Drone is not found"], 401);
    }
    
    /**
     * Get drone's instructions
     */
    public function getInstructions()
    {
        $drones = Drone::all();
        $drones = DroneResource::collection($drones);
        $instructions = [];
        foreach($drones as $drone){
            $instruction=[
                "drone_id"=>$drone["id"],
                "instruction"=>$drone["instruction"],
            ];
            array_push($instructions, $instruction);
        }
        return response()->json(["success"=>true, 'data' => $instructions], 200);
    }
}
