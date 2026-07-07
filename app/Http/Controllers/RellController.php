<?php

namespace App\Http\Controllers;

use App\Models\Rell;
use Illuminate\Http\Request;

class RellController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rell = Rell::find(2);
        return $rell->image;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $rell = Rell::create([
          'heading' => "hamza",
          'description' => " dummy text of the printing and typesetting industry. "
        ]);
        $rell->image()->create([
            'url' => 'images/post1.jpeg'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Rell $rell)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rell $rell)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rell $rell)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rell $rell)
    {
        //
    }
}
