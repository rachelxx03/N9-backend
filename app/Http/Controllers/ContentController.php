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

    public function getAll (){
        $results = DB::select('SELECT * FROM contents');
        return response()->json($results);


    }
    public function index()

    {
        $contents = Content::all()->toArray();
        return $contents;
        //
    }

    public function getCatagory(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = $request->input('catagory');
        //viet ro cau lenh ra
        // tach ra thanh 2 bang
        // nguoi dung dong gop xong co phan hoi
        //them phan sua bai
        // them dang nhap admin
        // admin duoc set luon trong code back end
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


    public function update(Request $request, $id)
    {
        $content = Content::findOrFail($id);

        $content->catagory = $request->input('catagory');
        $content->title = $request->input('title');
        $content->subtitle = $request->input('subtitle');
        $content->imag = $request->input('imag');
        $content->mainContent = $request->input('mainContent');

        $content->save();

        return response()->json([
            'message' => 'Content updated successfully',
            'content' => $content
        ]);
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
