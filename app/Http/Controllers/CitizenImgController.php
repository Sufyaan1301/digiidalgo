<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\CitizenImg;



  

class CitizenImgController extends Controller

{

    /**

     * Display a listing of the resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function index()

    {

        $Citizens_img = CitizenImg::latest()->paginate(5);

    

        return view('Citizens_img.create',compact('Citizens_img'))

            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

   

    /**

     * Show the form for creating a new resource.

     *

     * @return \Illuminate\Http\Response

     */

    public function create() : View     
    {
        return view('Citizens_img.create');

    }
    /**

     * Store a newly created resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @return \Illuminate\Http\Response

     */

    public function store(Request $request):RedirectResponse

    {

        $request->validate([

            'ktp' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'kk' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'akta' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'kia' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

  

        $input = $request->all();

  

        if ($image = $request->file('image')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }

    

        CitizenImg::create($input);

     
        return redirect()->route('Citizens_img.create')->with('succsess','Product created Successfully.');

    }

     

    /**

     * Display the specified resource.

     *

     * @param  \App\CitizenImg  $product

     * @return \Illuminate\Http\Response

     */

    public function show(CitizenImg $product):View

    {

        return view('Citizens_img.create',compact('product'));

    }

     

    /**

     * Show the form for editing the specified resource.

     *

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function edit(CitizenImg $product):View

    {

        return view('Citizens_img.edit',compact('product'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  \Illuminate\Http\Request  $request

     * @param  \App\Product  $product

     * @return \Illuminate\Http\Response

     */

    public function update(Request $request, CitizenImg $product):RedirectResponse

    {

        $request->validate([

            'name' => 'required',

            'detail' => 'required'

        ]);

  

        $input = $request->all();

  

        if ($image = $request->file('image')) {

            $destinationPath = 'image/';

            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();

            $image->move($destinationPath, $profileImage);

            $input['image'] = "$profileImage";

        }else{

            unset($input['image']);

        }

          

        $product->update($input);

    

        return redirect()->route('Citizen_img.update')

                        ->with('success','Product updated successfully');

    }

  

    

    public function destroy(CitizenImg $product):RedirectResponse

    {

        $product->delete();

     

        return redirect()->route('Citizens_img.create')

                        ->with('success','Product deleted successfully');

    }

}

