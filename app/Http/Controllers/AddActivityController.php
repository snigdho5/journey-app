<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddActivity;
use Illuminate\Support\Facades\Validator;


class AddActivityController extends Controller
{
    public function index()
    {
        //
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

        // $user = AddActivity::where('email', $request->email)->orWhere('phone', $request->phone)->first();
        // print_r($user);die;
        // if (!$user) {

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
            ], 200);
        // } else {
        //     return response([
        //         'status' => 0,
        //         'message' => 'Activity already exists!',
        //         'respData' => $user,
        //     ], 200);
        // }
    }
}
