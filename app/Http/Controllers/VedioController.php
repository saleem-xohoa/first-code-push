<?php
namespace App\Http\Controllers;

use App\Models\Vedio;
use Illuminate\Http\Request;

class VedioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         *  one to many polymorphic
         */

        // $vedios = Vedio::with('comments')->find(2);
        // return $vedios;

        /**
         *  Many to many polymorphic
         */

        $vedio = Vedio::with('tags')->find(1);
        return $vedio;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         *  one to many polymorphic
         */
        // $vedio = Vedio::find(1);
        // $vedio->comments()->create([
        //     'detail' => 'You are very funny'
        // ]);

        /**
         *  Many to many polymorphic
         */

        // $vedio = Vedio::create([
        //     "title" => "lorem six",
        //     "url" => "vedios/loremsix.mp4"
        //  ]);
        // $vedio = Vedio::create([
        //     "name" => "lorem",
        // ]);

        $vedio = Vedio::find(2);
        $vedio->tags()->sync([14, 16]);
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
    public function show(Vedio $vedio)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vedio $vedio)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vedio $vedio)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vedio $vedio)
    {
        //
    }
}
