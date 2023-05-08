<?php

namespace App\Http\Controllers;
use App\Models\Menclothing;
use Illuminate\Http\Request;

class MenclothingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menclothings = Menclothing::all()->toArray();
        return view('menclothings.index', compact('menclothings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('menclothings.create');
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
    $menclothing = $this->validate(request(), [
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
        $menclothing = new menclothing;
        $menclothing->categories = $request->input('categories');
        $menclothing->category = $request->input('category');
        $menclothing->colour = $request->input('colour');
        $menclothing->price = $request->input('price');
        $menclothing->description = $request->input('description');
        $menclothing->created_at = now();
        $menclothing->image = $fileNameToStore;
        // save the clothes object
        $menclothing->save();
        // generate a redirect HTTP response with a success message
        return back()->with('success', 'New men clothe added');
        
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menclothing = Menclothing::find($id);
        return view('menclothings.show',compact('menclothing'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menclothing = Menclothing::find($id);
        return view('menclothings.edit',compact('menclothing'));
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
        $menclothing = menclothing::find($id);
        $this->validate(request(), [
        'categories' => 'required',
        //'category' => 'required|numeric'
    ]);

    $menclothing->categories = $request->input('categories');
    $menclothing->category = $request->input('category');
    $menclothing->colour = $request->input('colour');
    $menclothing->price = $request->input('price');
    $menclothing->description = $request->input('description');
    $menclothing->updated_at = now();

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
    
        $menclothing->image = $fileNameToStore;
        $menclothing->save();
        return redirect('menclothings');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $menclothing = Menclothing::find($id);
        $menclothing->delete();
        return redirect('menclothings');
    }
}
