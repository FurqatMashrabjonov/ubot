<?php

namespace Modules\AdminBot\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminBotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('adminbot::index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('adminbot::create');
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
        return view('adminbot::show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view('adminbot::edit');
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
