<?php

namespace App\Http\Controllers;

use App\Models\Contribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ControbuteController extends Controller
{


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {


        // Do something with the data
        $this->validate($request, [
            'author'    =>  'required',
            'title'     =>  'required',
            'content'     =>  'required'

        ]);
        $contribute = new Contribute([
            'author'    =>  $request->get('author'),
            'title'     =>  $request->get('title'),
            'content'      =>  $request->get('content' )

        ]);

        try {
            // your code here
            $contribute->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }


        return response()->json([

            'message' => 'Data save successfully'
        ]);
    }


}
