<?php

namespace App\Http\Controllers;
use App\Models\Womenclothing;
use Illuminate\Http\Request;

class WomenclothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $womenclothings = Womenclothing::all()->toArray();
    return view('womenclothings.index', compact('womenclothings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('womenclothings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            // form validation
    $womenclothing = $this->validate(request(), [
        'categories' => 'required',
        'price' => 'required|numeric',
        'image' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:500',
        ]);
        //Handles the uploading of the image
        if ($request->hasFile('image')){
        //Gets the filename with the extension
        $fileNameWithExt = $request->file('image')->getClientOriginalName();
        //just gets the filename
        $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
        //Just gets the extension
        $extension = $request->file('image')->getClientOriginalExtension();
        //Gets the filename to store
        $fileNameToStore = $filename.'_'.time().'.'.$extension;
        //Uploads the image
        $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
        }
        else {
        $fileNameToStore = 'noimage.jpg';
        }
        // create a Vehicle object and set its values from the input
        $womenclothing = new womenclothing;
        $womenclothing->categories = $request->input('categories');
        $womenclothing->category = $request->input('category');
        $womenclothing->colour = $request->input('colour');
        $womenclothing->price = $request->input('price');
        $womenclothing->description = $request->input('description');
        $womenclothing->created_at = now();
        $womenclothing->image = $fileNameToStore;
        // save the clothes object
        $womenclothing->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'New Women clothes added');
        
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $womenclothing = Womenclothing::find($id);
        return view('womenclothings.show',compact('womenclothing'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $womenclothing = Womenclothing::find($id);
        return view('womenclothings.edit',compact('womenclothing'));

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
    $womenclothing = womenclothing::find($id);
    $this->validate(request(), [
    'categories' => 'required',
    //'category' => 'required|numeric'
    ]);

    $womenclothing->categories = $request->input('categories');
    $womenclothing->category = $request->input('category');
    $womenclothing->colour = $request->input('colour');
    $womenclothing->price = $request->input('price');
    $womenclothing->description = $request->input('description');
    $womenclothing->updated_at = now();

    //Handles the uploading of the image
    if ($request->hasFile('image')){
    //Gets the filename with the extension
    $fileNameWithExt = $request->file('image')->getClientOriginalName();
    //Gets the filename with the extension
    $fileNameWithExt = $request->file('image')->getClientOriginalName();
    //just gets the filename
    $filename = pathinfo($fileNameWithExt, PATHINFO_FILENAME);
    //Just gets the extension
    $extension = $request->file('image')->getClientOriginalExtension();
    //Gets the filename to store
    $fileNameToStore = $filename.'_'.time().'.'.$extension;
    //Uploads the image
    $path = $request->file('image')->storeAs('public/images', $fileNameToStore);
    }
    else {
    $fileNameToStore = 'noimage.jpg';
    }
    
        $womenclothing->image = $fileNameToStore;
        $womenclothing->save();
        return redirect('womenclothings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //deletes vehicles
    public function destroy($id)
    {
        $womenclothing = Womenclothing::find($id);
        $womenclothing->delete();
        return redirect('womenclothings');
    }
}
