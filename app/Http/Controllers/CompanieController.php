<?php

namespace App\Http\Controllers;

use App\Models\Companie;
use Illuminate\Http\Request;
use App\Http\Requests\CompanieRequest;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companie = Companie::orderBy('id', 'DESC')->filter(request(['search']))->paginate(15)->withQueryString();
        return view('companie.index', [
            'companie' => $companie
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanieRequest $request)
    {
        $data = $request->all();

        $data['logo'] = $request->file('logo')->store('assets/logo', 'public');

        Companie::create($data);

        return redirect()->route('companie.index')->with('success', 'Yeah Data Berhasil Di Tambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Companie $companie)
    {
        return view('companie.show', [
            'companie' => $companie,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Companie $companie)
    {
        return view('companie.edit', [
            'companie' => $companie
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanieRequest $request, Companie $companie)
    {
        $data = $request->all();

        if($request->file('logo')){
            $data['logo'] = $request->file('logo')->store('assets/logo', 'public');
        }
        $companie->update($data);

        return redirect()->route('companie.index')->with('success', 'Yeah Data Berhasil Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Companie $companie)
    {
        $companie->delete();

        return redirect()->route('companie.index')->with('success', 'Yeah Data Berhasil Di Hapus');
    }
}
