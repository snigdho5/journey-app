<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Photos;

class PhotosController extends Controller
{
    //
    public function index(Request $request)
    {
        $photo = Photos::where('user_id', $request->user_id)->get();

        if ($photo) {
            $response = [
                'status' => 1,
                'message' => 'Found!',
                'respData' => $photo
            ];
        } else {
            $response = [
                'status' => 0,
                'message' => 'Not Found!',
                'respData' => []
            ];
        }

        return response($response, 200);
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_id' => 'required|numeric',
            'share_with' => 'required',
            'photo_date' => 'required|date',
            'file' => 'required|mimes:jpg,png,jpeg|max:2048'
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 0,
                'message' => 'Validation failed!'
            ], 401);
        }

        // $photo = Photos::where('user_id', $request->user_id)->first();

        // if (!$photo) {

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
        }

        $photo_add = new Photos();
        $photo_add->user_id = $request->user_id;
        $photo_add->share_with = $request->share_with;
        $photo_add->photo_date = $request->photo_date;
        $photo_add->file_path = url('public/uploads/' . $fileName);
        $photo_add->save();

        $response = [
            'status' => 1,
            'message' => 'Photo added!',
            'respData' => $photo_add
        ];
        // } else {
        //     $response = [
        //         'status' => 0,
        //         'message' => 'photo already exists!',
        //         'respData' => $photo
        //     ];
        // }
        return response($response, 200);
    }
}
