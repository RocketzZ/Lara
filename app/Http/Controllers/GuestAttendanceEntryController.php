<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;

use Lara\Http\Requests;
use Lara\Http\Controllers\Controller;

use Lara\Utilities;
use Session;
use Cache;
use DateTime;                       //timestamp
use DateInterval;                   //timestamp
use DateTimeZone;                   //timestamp
use View;
use Input;
use Config;
use Log;
use Redirect;

use Carbon\Carbon;

use Lara\ClubEvent;
use Lara\Schedule;
use Lara\ScheduleEntry;
use Lara\Jobtype;
use Lara\Person;
use Lara\Club;
use Lara\Place;
use Lara\GuestListAttendanceList;

class GuestAttendanceEntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function show(GuestListAttendanceList $guestListAttendanceList)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function edit(GuestListAttendanceList $guestListAttendanceList)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestListAttendanceList $guestListAttendanceList)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestListAttendanceList $guestListAttendanceList)
    {
        //
    }
}
