<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Calamity;
use DB;

class PostsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $calamities = Calamity::orderBy('created_at', 'dsc')->paginate(10);
        //$calamityposts = DB::select('SELECT * FROM calamityposts');
        return response()->json([$calamities], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json(['response'=> 'success'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**
      $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|max:1999',
            'priority' => 'required'

        ]);

        ///Handle File Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('images/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        **/

      $filename = $request->file('image')->getClientOriginalName();
      $moveImage = $request->file('image')->move('image', $filename);


        //Create Calamity
        $calamity = new Calamity;
        $calamity->name = $request->input('name');
        $calamity->description = $request->input('description');
        //$calamity->image = $fileNameToStore;
        $calamity->image = $filename;
        $calamity->save();

        return response()->json([$calamity], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $calamity = Calamity::find($id);
        return response()->json([$calamity], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $calamity = Calamity::find($id);
        return response()->json([$calamity], 200);

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
        /**
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'image|max:1999',
            'priority' => 'required'

        ]);

        //Handle File Upload
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just file name
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('images/', $fileNameToStore);
        }
        **/

        $filename = $request->file('image')->getClientOriginalName();
        $moveImage = $request->file('image')->move('image', $filename);

        //Update Calamity
        $calamity = Calamity::find($id);
        $calamity->name = $request->input('name');
        $calamity->description = $request->input('description');
        if($request->hasFile('image')){
            $calamity->image = $filename;
        }
        $calamity->save();

        return response()->json([$calamity], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $calamity = Calamity::find($id);
        $calamity->delete();

        if($calamity->images != 'noimage.jpg'){
            //Delete Image
            Storage::delete('image/'.$calamity->image);
        }

        return response()->json([$calamity], 200);
    }
}
