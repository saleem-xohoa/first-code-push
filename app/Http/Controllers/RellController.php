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
          /**
     * one to one polymorphic
     */
        // $rell = Rell::find(2);
        // return $rell->image;

          /**
     * one to many polymorphic
     */
        // $rell = Rell::with('comments')->find(1);
        // return $rell;

             /**
     * Many to many polymorphic
     */
        $rell = Rell::with('tags')->find(1);
        return $rell;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
     * one to one polymorphic
     */
        // $rell = Rell::create([
        //   'heading' => "hamza",
        //   'description' => " dummy text of the printing and typesetting industry. "
        // ]);
        // $rell->image()->create([
        //     'url' => 'images/post1.jpeg'
        // ]);
        /**
     * one to many polymorphic
     */
        // $rell = Rell::find(5);
        // $rell->comments()->create([
        //     'detail' => 'Great '
        // ]);

         /**
     * Many to many polymorphic
     */

         $rell = Rell::create([
            "heading" => "lorem",
            "description" => "Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece "
         ]);
         $rell->tags()->create([
            "name" => "lorem ipsum",
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
