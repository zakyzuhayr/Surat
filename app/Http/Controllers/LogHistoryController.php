<?php

namespace App\Http\Controllers;

use App\DataTables\LogHistoryDataTable;
use App\Models\LogHistory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class LogHistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(LogHistoryDataTable $table)
    {
        if(!Gate::check('is_admin')) {
            return redirect()->intended('/');
        }

        return $table->render('templates.datatable', [
            'title' => 'Log History',
            'buttons' => ''
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LogHistory  $logHistory
     * @return \Illuminate\Http\Response
     */
    public function show(LogHistory $logHistory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LogHistory  $logHistory
     * @return \Illuminate\Http\Response
     */
    public function edit(LogHistory $logHistory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\LogHistory  $logHistory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LogHistory $logHistory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LogHistory  $logHistory
     * @return \Illuminate\Http\Response
     */
    public function destroy(LogHistory $logHistory)
    {
        //
    }
}
