<?php

namespace Lara\Http\Controllers;

use Illuminate\Http\Request;

use Lara\Http\Requests;
use Lara\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

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

class GuestListAttendanceListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Not showing everything to guests or managing reading and writing rules
        //currently not showing content to guests
        if(!Session::has('userId'))
        {
            Session::put('message', Config::get('messages_de.access-denied'));
            Session::put('msgType', 'danger');
            return Redirect::action('MonthController@showMonth', ['year' => date("Y"), 'month' => date('m')]);
        }
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
            $guestlistattendancelist    = $template->getGuestListAttendanceList()->get();
            $personidclub               = $template->getGuestListAttendanceList->personidclub;
            $personid                   = $template->getGuestListAttendanceList->personid;
            $name                       = $template->getGuestListAttendanceList->name;
            $surname                    = $template->getGuestListAttendanceList->surname;
            $status                     = $template->getGuestListAttendanceList->status;
            $comment                    = $template->getGuestListAttendanceList->comment;
            $importsource               = $template->getGuestListAttendanceList->importsource;    //?
            $attendancestatus           = $template->getGuestListAttendanceList->attendancestatus;
            $evnt_id                    = $template->getGuestListAttendanceList->evnt_id;
            $guestentry                 = $template->getGuestEntry->id;
            //$eventid            = $template->getGuestListAttendanceList->eventid;           //get it from event page

        } else {
            // fill variables with no data if no template was chosen, but not sure if needed here
            $activeTemplate = "";
            $guestlistattendancelist    = null;
            $personidclub               = null;
            $personid                   = null;
            $name                       = null;
            $surname                    = null;
            $status                     = null;
            $comment                    = null;
            $importsource               = null;
            $attendancestatus           = null;
            $evnt_id                    = null;
            $guestentry                 = null;
            //$eventid            = null;      //maybe get eventid from event page
        }
                
        //return values for creating new table entry
        return redirect()->back()->withErrors(compact('guestentry', 'guestlistattendancelist', 'name', 'surname', 'comment', 'attendancestatus'));
        
               //View::make('createGuestAttendanceList', compact('personidclub','personid','name','surname',
               //                                                'status','comment','importsource',
               //                                                'attendancestatus','eventid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       GuestListAttendanceList::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
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
            'id'                => $guestlistattendancelist->id,
            'name'              => $guestlistattendancelist->name,
            'surname'           => $guestlistattendancelist->surname,
            'comment'           => $guestlistattendancelist->comment,
            'attendancestatus'  => $guestlistattendancelist->attendancestatus,
        ];
        
        if (Request::ajax()) {
            return response()->json($response);
        } else {
            return response()->json($response);
        }

        return redirect()->back()->withErrors(compact('guestlistattendancelist', 'name', 'surname', 'comment', 'attendancestatus', 'id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {   
        $guestentry = new GuestListAttendanceList;
        $guestlistattendancelist = GuestListAttendanceList::where('id', '=', $id)->get();

        //$id                 = $guestlistattendancelist->get('id');
        //$name               = $guestlistattendancelist->get('name');
        //$surname            = $guestlistattendancelist->get('surname');
        //$comment            = $guestlistattendancelist->get('comment');
        //$attendancestatus   = $guestlistattendancelist->get('attendancestatus');
         
        $guestentry->name              = Input::get('name');
        $guestentry->surname           = Input::get('surname');
        $guestentry->comment           = Input::get('comment');
        //$guestentry->attendancestatus  = Input::get('attendancestatus');
        //all the rest of the data is automated
        
        //
        //
        $guestentry = GuestListAttendanceList::where('id', '=', $id)
                    ->where('id', $id)
                    ->update(['name' => $guestentry->name],
                             ['surname' => $guestentry->surname],
                             ['comment' => $guestentry->comment]
                             //['attendancestatus']
                            );
        //
        //

        // format: tinyInt; validate on filled value
        
        //$guestlistattendancelist->save();
        //$guestentry->save();
        
        //return response()->json([ 
        //    "id"                => $guestentry->id, 
        //    "comment"           => $guestentry->comment, 
        //    "name"              => $guestentry->name, 
        //    "surname"           => $guestentry->surname, 
        //    "attendancestatus"  => $guestentry->attendancestatus 
        //], 200); 

        $guestentry->save();
        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //to destroy an entry
    }





//--------- PRIVATE FUNCTIONS ------------


 /**
    * Edit or create a guest list or attendance list with its entered information.
    * If $id is null create a new guestlistattendancelist, otherwise the clubEvent specified by $id will be edit.
    *
    * @param int $id
    * @return GuestListAttendanceList
    */
    private function editList($id)
    {
        $guestlistattendancelist = new GuestListAttendanceList;
        if(!is_null($id)) {
            $guestlistattendancelist = GuestListAttendanceList::findOrFail($id);
        }

        // format: strings; no validation needed
        $guestlistattendancelist->name              = Input::get('name');
        $guestlistattendancelist->surname           = Input::get('surname');
        $guestlistattendancelist->comment           = Input::get('comment');
        $guestlistattendancelist->attendancestatus  = Input::get('attendancestatus');
        //all the rest of the data is automated

        // format: tinyInt; validate on filled value
        // reversed this: input=1 means "event is public", input=0 means "event is private"
        //$guestlistattendancelist->evnt_is_private = (Input::get('isPrivate') == '1') ? 0 : 1;
        //$guestlistattendancelistIsPublished = Input::get('evntIsPublished');
        
        return redirect()->back()->withInput();
     }
 }