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
use Illuminate\Database\Eloquent\Collection;
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
use Lara\GuestAttendanceEntry;

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
    public function create($templateId = null)
    {
        if ( is_null($templateId) ) {
            $templateId = 0;    // 0 = no template
        }

        
        // if a template id was provided, load the schedule needed and extract job types
        if ( $templateId != 0 ) {
            $template = Schedule::where('id', '=', $templateId)
                                ->first();

            // put name of the active template for further use
            $activeTemplate = $template->guest_attendance_list;
            
            //get template
            $guestentry    = $template->getGuestEntry()->get();
            //$personidclub               = $template->getGuestListAttendanceList->personidclub;
            //$personid                   = $template->getGuestListAttendanceList->personid;
            $name                       = $template->getGuestEntry->name;
            $surname                    = $template->getGuestEntry->surname;
            $status                     = $template->getGuestEntry->status;
            $comment                    = $template->getGuestEntry->comment;
            //$importsource               = $template->getGuestListAttendanceList->importsource;    //?
            $attendancestatus           = $template->getGuestEntry->attendancestatus;
            //$evnt_id                    = $template->getGuestEntry->evnt_id;
            
            //$guestentry                 = $template->getGuestEntry->id;
            //$eventid            = $template->getGuestListAttendanceList->eventid;           //get it from event page

        } else {
            // fill variables with no data if no template was chosen, but not sure if needed here
            $activeTemplate = "";
            $guestentry    = null;
            //$personidclub               = null;
            //$personid                   = null;
            $name                       = null;
            $surname                    = null;
            $status                     = null;
            $comment                    = null;
            //$importsource               = null;
            $attendancestatus           = null;
            $evnt_id                    = null;
            $list_id                    = null;
            //$guestentry                 = null;
            //$eventid            = null;      //maybe get eventid from event page
        }
                
        //return values for creating new table entry
        return $guestentry;
        //redirect()->back()->withErrors(compact('guestentry', 'name', 'surname', 'comment', 'attendancestatus', 'id', 'list_id'));
        
        // Not needed because guestattendancelist are created only as part of a event pair. 
        // Restricted via routes exception.
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {   
        $guestentry = new GuestAttendanceEntry;
        
        $guestentry->name              = Input::get('name' . $guestentry->id);
        $guestentry->surname           = Input::get('surname' . $guestentry->id);
        $guestentry->comment           = Input::get('comment' . $guestentry->id);

        $guestentry->save();

        return redirect()->back();
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
    public function update($id)
    {   
        
        $guestentry = GuestAttendanceEntry::where('id', '=', $id)->findOrFail($id);

        //Get the Data

        if ($id != 0){
        $id                 = $guestentry->find('id');
        $name               = $guestentry->find('name');
        $surname            = $guestentry->find('surname');
        $comment            = $guestentry->find('comment');
        $attendancestatus   = $guestentry->find('attendancestatus');
        
        
        //Find the Guestentry
        
        $guestentry->name              = Input::get('name' . $guestentry->id);
        $guestentry->surname           = Input::get('surname' . $guestentry->id);
        $guestentry->comment           = Input::get('comment' . $guestentry->id);
        $guestentry->attendancestatus  = Input::get('attendancestatus' . $guestentry->id);

        $guestentry->save();
        }
        //$guestentry = new GuestAttendanceEntry;
        
        //$guestentry = GuestAttendanceEntryController::store($id, $guestentry);
        //$guestentry = GuestAttendanceEntry::find($id);
        //$guestentry->id = ++$id;
        //$guestentry->save();

        return redirect()->back();
        //Redirect::route('guestentry.store', array('id' => $guestentry->id))->withInput(); 
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
