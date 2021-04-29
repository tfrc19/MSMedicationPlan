<?php

namespace App\Http\Controllers;
use App\Models\MedicationPlan;
use App\Models\Drug;
use App\Traits\ApiResponser;

class MedicationPlanController extends Controller
{
    use ApiResponser;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function index($user){
       

        $medicationPlan= MedicationPlan::where('user_id',$user)->get();
        //$medicationPlan= MedicationPlan::all();
        $output = array();
        
        foreach($medicationPlan as $mp){
            $temp = array();
            $temp['id']=$mp->id;
            $temp['name']=$mp->name;
            $temp['user_id']=$mp->user_id;
            $temp['drug'] = ['id' => $mp->drug->id, 'name'=>$mp->drug->name];
            $temp['from_date'] = $mp->from_date;
            $temp['frequency'] = $mp->frequency;
            $temp['observations'] = $mp->observations;
            $output[] = $temp;
        }
        
         //$output = response()->json($output, 200)->header('Content-Type','application/json');
        return $this->successResponse($output);
        //return $output;


    }

    //
}
