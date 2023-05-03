<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;


class ContentController extends Controller
{
    /**
     * lấy thông tin của tất cả các bài  cho API
     *
     * @return  json
     */

    public function getAll (){
        $results = DB::select('SELECT * FROM contents');
        return response()->json($results);
    }
    /**
     * lấy thông tin của tất cả các bài thành 1 array
     *
     * @return  json
     */
    public function index()

    {
//        $contents =        Content::all()->toArray();

//        DB::select('SELECT * FROM contents');
        $results = DB::select('SELECT * FROM contents');
        $contents = json_decode(json_encode($results), true);
        return $contents;
        //
    }
    /**
     *  lấy thông tin của 1 bài dựa trên category
     *
     * @return JsonResponse
     */
    public function getCatagory(Request $request): \Illuminate\Http\JsonResponse
    {
        $category = $request->input('catagory');
        $contents = DB::select('SELECT * FROM contents WHERE catagory = ?', [$category]);
//        $contents = DB::table('contents')->where('catagory', '=', $category)->get();
        return response()->json($contents);

    }

    /**
     *  lấy thông tin của 1 bài dựa trên ID
     *
     * @return JsonResponse
     */

    public function getObjectById(Request $request) {
        $id = $request->input('id');
        $ListOfObject = $this->index();
        foreach ( $ListOfObject as $object)
            if($object['id'] == $id)
                return   response()->json($object);
        return null;
    }

    /**
     * lưu thông tin vào data base
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


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
     * update thông tin vào database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
//        $content = Content::findOrFail($id);
        $content = DB::select('SELECT * FROM contents WHERE id = ?', [$id]);

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



}
