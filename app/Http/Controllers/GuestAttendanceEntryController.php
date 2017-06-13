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
        // Not needed because single guestattendancelist have no meaning without a event context
        // Restricted via routes exception.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Not needed because guestattendancelist are created only as part of a event pair. 
        // Restricted via routes exception.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Called as part of  CREATE
        // IMPLEMENT LATER
    }

    /**
     * Display the specified resource.
     *
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function show(GuestListAttendanceList $id)
    {
        $guestListAttendanceList = GuestListAttendanceList::where()
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function edit(GuestListAttendanceList $id)
    {
        // Called as part of guestattendancelist CREATE
        // IMPLEMENT LATER
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GuestListAttendanceList $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Lara\GuestListAttendanceList  $guestListAttendanceList
     * @return \Illuminate\Http\Response
     */
    public function destroy(GuestListAttendanceList $id)
    {
        //
    }



    //--------- PRIVATE FUNCTIONS ------------


    /**
    *
    *
    */
    private function onDelete($id)
    {

    }


    /**
    *
    *
    */
    private function onAdd($id)
    {
        
    }


    /**
    *
    *
    */
    private function updateStatus($id)
    {
        
    }

}
