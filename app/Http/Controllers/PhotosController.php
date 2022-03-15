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
        $note = Photos::where('user_id', $request->user_id)->get();

        if ($note) {
            $response = [
                'status' => 1,
                'message' => 'Found!',
                'respData' => $note
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

        // $note = Photos::where('user_id', $request->user_id)->first();

        // if (!$note) {

        if ($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $request->file->move(public_path('uploads'), $fileName);
        }

        $note_add = new Photos();
        $note_add->user_id = $request->user_id;
        $note_add->share_with = $request->share_with;
        $note_add->photo_date = $request->photo_date;
        $note_add->file_path = url('public/uploads/' . $fileName);
        $note_add->save();

        $response = [
            'status' => 1,
            'message' => 'Photo added!',
            'respData' => $note_add
        ];
        // } else {
        //     $response = [
        //         'status' => 0,
        //         'message' => 'photo already exists!',
        //         'respData' => $note
        //     ];
        // }
        return response($response, 200);
    }
}
