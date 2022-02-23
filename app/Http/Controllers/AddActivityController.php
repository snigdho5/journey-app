<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddActivity;
use Illuminate\Support\Facades\Validator;
use DateTime;
use DateInterval;

class AddActivityController extends Controller
{
    public function index(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'activity_date' => 'required|date'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 0,
                'message' => 'Validation failed!'
            ], 401);
        }
        $activity = AddActivity::where('user_id', $request->user_id)
            ->where('activity_date', "$request->activity_date")
            ->get();

        if ($activity) {
            $response = [
                'status' => 1,
                'message' => 'Activitites found!',
                'respData' => $activity
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Activity not found!',
                'respData' => $activity
            ];
        }
        return response($response, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'activity_id' => 'required|numeric',
            'activity_date' => 'required|date',
            'activity_time' => 'required',
            'is_important' => 'required|in:yes,no',
            'is_liked' => 'required|in:yes,no'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 0,
                'message' => 'Validation failed!'
            ], 401);
        }

        $userAct = AddActivity::where('user_id', $request->user_id)->get();
        // print_r($userAct);die;
        if (!empty($userAct)) {
            $total_hrs = 0;

            // foreach ($userAct as $key => $value) {
            //     $date = new DateTime($total_hrs);
            //     $date->add(new DateInterval('PT'.$value->activity_time.'H'));
            //     echo $date->format('H:i:s a');
            //     echo $value->activity_time . '<br>';
            //     // $total_hrs += date('h:i:s A', strtotime('+' . $value->activity_time . ' hours'));
            // }

            // echo $total_hrs;die;

            $addActivity = new AddActivity();
            $addActivity->user_id = $request->user_id;
            $addActivity->activity_id = $request->activity_id;
            $addActivity->activity_date = $request->activity_date;
            $addActivity->activity_time = $request->activity_time;
            $addActivity->is_important = $request->is_important;
            $addActivity->is_liked = $request->is_liked;
            $addActivity->save();

            return response([
                'status' => 1,
                'message' => 'Activity added!',
                'respData' => $addActivity
            ], 200);
        } else {
            return response([
                'status' => 0,
                'message' => 'Activity already exists!',
                'respData' => []
            ], 200);
        }
    }
}
