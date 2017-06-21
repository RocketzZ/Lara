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

use Hash;

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
        // Called as part of GuestListAttendanceList CREATE
        // IMPLEMENT LATER
    }

    /**
     * Display the specified resource.
     *Returns JSON-formatted contents of a GuestListAttendanceList enty
     *
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $guestlistattendancelist = GuestListAttendanceList::where('id', '=', $id)
                                                           //->with()   //not sure if needed to specify
                                                           ->firstOrFail();
        //possible to add get ... , but should work already
        //at the moment just the pure basics
        $response = [
            'id'        => $guestlistattendancelist->id,
            'name'      => $guestlistattendancelist->name,
            'surname'   => $guestlistattendancelist->surname,
            'comment'   => $guestlistattendancelist->comment,
        ];
        
        if (Request::ajax()) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }

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
    public function update(Request $request, $id)
    {
        // Check if it's our form (CSRF protection)
        if ( Session::token() !== Input::get( '_token' ) ) {
            return response()->json('Fehler: die Session ist abgelaufen. Bitte aktualisiere die Seite und logge dich ggf. erneut ein.', 401);
        }

        Utilities::clearIcalCache();

         // If we only want to modify the item via management pages - do it without evaluating the rest
        if ( !empty($request->get('id')) AND is_numeric($request->get('id')) ) {

        // Find the corresponding entry object 
        $guestlistattendancelist = GuestListAttendanceList::where('id', '=', $request->get('id'))->first();
        
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
