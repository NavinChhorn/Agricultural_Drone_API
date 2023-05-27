<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResouce;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Add plan.
     */
    public function store(PlanRequest $request)
    {
        $plan = Plan::create($request->all());
        return response()->json(['message'=>'Create plan success !','data'=>$plan],200);
    }

    /**
     * Get a plan.
     */
    public function show(string $plan_name)
    {
        $plan = Plan::where('name',$plan_name)->first();
        if(isset($plan)){
            $plan = new PlanResouce($plan);
            return response()->json(["success"=>true,'message'=>'Get success!','data'=>$plan],200);
        }
        return response()->json(['message'=>"Plan not found !"], 401);
    }
}
