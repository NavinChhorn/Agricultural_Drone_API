<?php

namespace App\Http\Controllers;

use App\Http\Requests\PlanRequest;
use App\Http\Resources\PlanResouce;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{

    public function store(PlanRequest $request)
    {
        $plan = Plan::create($request->all());
        return response()->json([
            'message'=>'Create plan success !',
            'data'=>$plan,
        ],200);
        return $request;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $plan_name)
    {
        $plan = Plan::where('name',$plan_name)->get();

        if($plan->count()>0){
            $plan = new PlanResouce($plan[0]);
            return response()->json(['message'=>'Get success !','data'=>$plan],200);
        }
        return response()->json(['message'=>"Can't find this plan name !"]);
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
