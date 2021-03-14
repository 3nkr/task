<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Cars;
//use App\Models\Auth;
use Auth;
class CarsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars= Cars::all();
        return view('cars.index')->with('cars',$cars);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'required' ,
            'model'=> 'required',
            'color'=> 'required',
            'description'=> 'required',
            'image'=>'image|nullable|max:1999',
        ]);
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);

	    // make thumbnails
	    $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('image')->getRealPath());
            $thumb->resize(100, 100);
            $thumb->save('storage/image/'.$thumbStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $car = new Cars;
        $car->CarName= $request->input('name');
        $car->CarModel= $request->input('model');
        $car->CarColor= $request->input('color');
        $car->CarDes= $request->input('description');
        $car->car_img = $fileNameToStore;
        $car->user_id=Auth::user()->id;
        $car->save();
        return redirect('/cars')->with('success','Car Added Successfully');

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
        $car = Cars::find($id);
        return view('cars.edit')->with('car',$car);
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
        $request->validate([
            'name'=> 'required' ,
            'model'=> 'required',
            'color'=> 'required',
            'description'=> 'required'
        ]);
        if($request->hasFile('image')){
            // Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore= $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
    

	   //Make thumbnails
	    $thumbStore = 'thumb.'.$filename.'_'.time().'.'.$extension;
            $thumb = Image::make($request->file('image')->getRealPath());
            $thumb->resize(100, 100);
            $thumb->save('storage/image/'.$thumbStore);

        }
        $car = Cars::find($id);
        $car->CarName= $request->input('name');
        $car->CarModel= $request->input('model');
        $car->CarColor= $request->input('color');
        $car->CarDes= $request->input('description');
        if($request->hasFile('image')){
            $car->car_img = $fileNameToStore;
        }
        $car->save();
        return redirect('/cars')->with('success','Car Updated Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Cars::find($id);
        $car->delete();
        return redirect('/cars')->with('success','Car info. Deleted Successfully');
    }
    public function list()
    {
        $cars= Cars::all();
        return view('cars.listcarsedit')->with('cars',$cars);
    }
}
