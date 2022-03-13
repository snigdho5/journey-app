<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddActivity;
use Illuminate\Support\Facades\Validator;
use DateTime;
use DateInterval;
use Carbon\Carbon;


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
        // $activity = AddActivity::where('user_id', $request->user_id)
        //     ->where('activity_date', $request->activity_date)
        //     ->get();

        $userActTimeSum = AddActivity::where('user_id', $request->user_id)->where('activity_date', $request->activity_date)->sum('activity_time');

        if (isset($userActTimeSum) && $userActTimeSum > 0) {

            $yes_yes_count = 0;
            $yes_no_count = 0;
            $no_yes_count = 0;
            $no_no_count = 0;

            $yes_yes_per = 0;
            $yes_no_per = 0;
            $no_yes_per = 0;
            $no_no_per = 0;

            $userActTimeSum = AddActivity::where('user_id', $request->user_id)->where('activity_date', $request->activity_date)->sum('activity_time');

            // yes yes
            $yes_yes_count = AddActivity::where('user_id', $request->user_id)
                ->where('activity_date', $request->activity_date)
                ->where('is_important', 'yes')
                ->where('is_liked', 'yes')
                ->count('activity_time');

            if ($yes_yes_count > 0) {

                $yes_yes_sum = AddActivity::where('user_id', $request->user_id)
                    ->where('activity_date', $request->activity_date)
                    ->where('is_important', 'yes')
                    ->where('is_liked', 'yes')
                    ->sum('activity_time');
                if ($yes_yes_sum > 0) {
                    $yes_yes_per = (($yes_yes_sum / 1440) * 100);
                } else {
                    $yes_yes_per = 0;
                }
            } else {
                $yes_yes_per = 0;
            }

            //yes no
            $yes_no_count = AddActivity::where('user_id', $request->user_id)
                ->where('activity_date', $request->activity_date)
                ->where('is_important', 'yes')
                ->where('is_liked', 'no')
                ->count('activity_time');

            if ($yes_no_count > 0) {

                $yes_no_sum = AddActivity::where('user_id', $request->user_id)
                    ->where('activity_date', $request->activity_date)
                    ->where('is_important', 'yes')
                    ->where('is_liked', 'no')
                    ->sum('activity_time');
                if ($yes_no_sum > 0) {
                    $yes_no_per = (($yes_no_sum / 1440) * 100);
                } else {
                    $yes_no_per = 0;
                }
            } else {
                $yes_no_per = 0;
            }

            //no yes
            $no_yes_count = AddActivity::where('user_id', $request->user_id)
                ->where('activity_date', $request->activity_date)
                ->where('is_important', 'no')
                ->where('is_liked', 'yes')
                ->count('activity_time');

            if ($no_yes_count > 0) {

                $no_yes_sum = AddActivity::where('user_id', $request->user_id)
                    ->where('activity_date', $request->activity_date)
                    ->where('is_important', 'no')
                    ->where('is_liked', 'yes')
                    ->sum('activity_time');
                if ($no_yes_sum > 0) {
                    $no_yes_per = (($no_yes_sum / 1440) * 100);
                } else {
                    $no_yes_per = 0;
                }
            } else {
                $no_yes_per = 0;
            }

            // no no

            $no_no_count = AddActivity::where('user_id', $request->user_id)
                ->where('activity_date', $request->activity_date)
                ->where('is_important', 'no')
                ->where('is_liked', 'no')
                ->count('activity_time');

            if ($no_no_count > 0) {

                $no_no_sum = AddActivity::where('user_id', $request->user_id)
                    ->where('activity_date', $request->activity_date)
                    ->where('is_important', 'no')
                    ->where('is_liked', 'yes')
                    ->sum('activity_time');
                if ($no_no_sum > 0) {
                    $no_no_per = (($no_no_sum / 1440) * 100);
                } else {
                    $no_no_per = 0;
                }
            } else {
                $no_no_per = 0;
            }


            $response = [
                'status' => 1,
                'message' => 'Activitites found!',
                'respData' => [
                    'total_mins' => $userActTimeSum,
                    'yes_yes_count' => $yes_yes_count,
                    'yes_no_count' => $yes_no_count,
                    'no_yes_count' => $no_yes_count,
                    'no_no_count' => $no_no_count,
                    'yes_yes_per' => $yes_yes_per,
                    'yes_no_per' => $yes_no_per,
                    'no_yes_per' => $no_yes_per,
                    'no_no_per' => $no_no_per,
                    // 'activity' => $activity,

                ]
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'No activities found!',
                'respData' => []
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
            'activity_time' => 'required|integer|between:1,1440',
            'is_important' => 'required|in:yes,no',
            'is_liked' => 'required|in:yes,no'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 0,
                'message' => 'Validation failed!'
            ], 401);
        }

        // $userAct = AddActivity::where('user_id', $request->user_id)->where('activity_date', $request->activity_date)->get();

        $userActSum = AddActivity::where('user_id', $request->user_id)->where('activity_date', $request->activity_date)->sum('activity_time');
        // print_r($userAct);die;

        // $current = Carbon::now();

        if (isset($userActSum) && $userActSum > 0) {

            $addedMins = $userActSum + $request->activity_time;
            // echo $addedMins;die;

            if ($addedMins < 1440) {
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
                    'message' => 'Total activity time cannot cross the day limit!',
                    'respData' => []
                ], 200);
            }
        } else {
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
        }
    }
}
