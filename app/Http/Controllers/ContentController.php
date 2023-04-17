<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return mixed[]
     */
    public function index()

    {
        $contents = Content::all()->toArray();
        return $contents;
        //
    }

    public function getCatagory(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = $request->input('catagory');
        $contents = DB::table('contents')->where('catagory', '=', $category)->get();
        return response()->json($contents);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function getObjectById(Request $request) {
        $id = $request->input('id');
        $ListOfObject = $this->index();
        foreach ( $ListOfObject as $object)
            if($object['id'] == $id)
                return   response()->json($object);
        return null;
    }
    public function create()
    {

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'catagory'    =>  'required',
            'title'     =>  'required',
            'subtitle'     =>  'required',
            'imag'     =>  'required',
            'mainContent'     =>  'required',
        ]);
        $content = new Content([
            'catagory'     =>  $request->get('catagory'),
            'title'    =>  $request->get('title'),
            'subtitle'     =>  $request->get('subtitle'),
            'imag'     =>  $request->get('imag'),
            'mainContent'    =>  $request->get('mainContent'),
        ]);
        try {
            // your code here
            $content->save();
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
        return response()->json([

            'message' => 'Data save successfully'
        ]);        //
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
