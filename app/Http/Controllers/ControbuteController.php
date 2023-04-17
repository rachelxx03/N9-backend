<?php

namespace App\Http\Controllers;

use App\Models\Contribute;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ControbuteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
