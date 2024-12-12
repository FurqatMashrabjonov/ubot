<?php

namespace Modules\MainBot\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainBotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mainbot::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('mainbot::create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Show the specified resource.
     */
    public function show($id)
    {
        return view('mainbot::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('mainbot::edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
    }
}
