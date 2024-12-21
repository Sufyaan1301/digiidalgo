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
     * @return response()
     */
    public function index(): View
    {
        $Citizens_Img = CitizenImg::latest()->paginate(5);
        return view('Citizens_img.index', compact('Citizens_Img'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('citizens_img.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'akta' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'kia' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $input = new CitizenImg();

        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp');
            $ktpName = time() . '_ktp.' . $ktpFile->getClientOriginalExtension();
            $ktpFile->move(public_path('images'), $ktpName);
            $input->ktp = $ktpName;
        }

        if ($request->hasFile('kk')) {
            $kkFile = $request->file('kk');
            $kkName = time() . '_kk.' . $kkFile->getClientOriginalExtension();
            $kkFile->move(public_path('images'), $kkName);
            $input->kk = $kkName;
        }

        if ($request->hasFile('akta')) {
            $aktaFile = $request->file('akta');
            $aktaName = time() . '_akta.' . $aktaFile->getClientOriginalExtension();
            $aktaFile->move(public_path('images'), $aktaName);
            $input->akta = $aktaName;
        }

        if ($request->hasFile('kia')) {
            $kiaFile = $request->file('kia');
            $kiaName = time() . '_kia.' . $kiaFile->getClientOriginalExtension();
            $kiaFile->move(public_path('images'), $kiaName);
            $input->kia = $kiaName;
        }

        $input->save();


        return redirect()->route('citizens_img.index')
            ->with('success', 'CitizenImg updated successfully');
    }


    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        // algoritma dekrip img
        $CitizenImg = CitizenImg::findOrFail($id);
        return view('citizens_img.show', compact('CitizenImg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id): View
    {
        $CitizenImg = CitizenImg::findOrFail($id);
        return view('citizens_img.edit', compact('CitizenImg'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $CitizenImg = CitizenImg::findOrFail($id);
        $request->validate([
            'ktp' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'kk' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'akta' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
            'kia' => 'required|image|mimes:jpeg,png,jpg,|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('ktp')) {
            $ktpFile = $request->file('ktp');
            $ktpName = time() . '_ktp.' . $ktpFile->getClientOriginalExtension();
            $ktpFile->move(public_path('images'), $ktpName);
            $CitizenImg->ktp = $ktpName;
        }

        if ($request->hasFile('kk')) {
            $kkFile = $request->file('kk');
            $kkName = time() . '_kk.' . $kkFile->getClientOriginalExtension();
            $kkFile->move(public_path('images'), $kkName);
            $CitizenImg->kk = $kkName;
        }

        if ($request->hasFile('akta')) {
            $aktaFile = $request->file('akta');
            $aktaName = time() . '_akta.' . $aktaFile->getClientOriginalExtension();
            $aktaFile->move(public_path('images'), $aktaName);
            $CitizenImg->akta = $aktaName;
        }

        if ($request->hasFile('kia')) {
            $kiaFile = $request->file('kia');
            $kiaName = time() . '_kia.' . $kiaFile->getClientOriginalExtension();
            $kiaFile->move(public_path('images'), $kiaName);
            $CitizenImg->kia = $kiaName;
        }

        $CitizenImg->save();


        return redirect()->route('citizens_img.index')
            ->with('success', 'CitizenImg updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $citizenImg = CitizenImg::findOrFail($id);
        $files = [
            $citizenImg->ktp,
            $citizenImg->kk,
            $citizenImg->akta,
            $citizenImg->kia,
        ];
        foreach ($files as $file) {
            $encryptedpath = storage_path('image/images/' . $file);
            if (file_exists($encryptedpath)) {
                unlink($encryptedpath);
            }
        }
        $citizenImg->delete();
        return redirect()->route('citizens_img.index')
            ->with('success', 'CitizenImg deleted successfully');
    }
    
}

