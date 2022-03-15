<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Notes;

class NotesController extends Controller
{
    //
    public function index(Request $request)
    {
        $note = Notes::where('user_id', $request->user_id)->get();

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
            'note_desc' => 'required',
            'share_with' => 'required',
            'note_date' => 'required|date',
        ]);

        if ($validator->fails()) {
            return response([
                'status' => 0,
                'message' => 'Validation failed!'
            ], 401);
        }

        // $note = Notes::where('user_id', $request->user_id)->first();

        // if (!$note) {
            
            $note_add = new Notes();
            $note_add->user_id = $request->user_id;
            $note_add->note_desc = $request->note_desc;
            $note_add->share_with = $request->share_with;
            $note_add->note_date = $request->note_date;
            $note_add->save();

            $response = [
                'status' => 1,
                'message' => 'Note added!',
                'respData' => $note_add
            ];
        // } else {
        //     $response = [
        //         'status' => 0,
        //         'message' => 'note already exists!',
        //         'respData' => $note
        //     ];
        // }
        return response($response, 200);
    }
}
