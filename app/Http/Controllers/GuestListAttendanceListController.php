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
            $personidclub       = $template->getGuestListAttendanceList->personidclub;
            $personid           = $template->getGuestListAttendanceList->personid;
            $name               = $template->getGuestListAttendanceList->name;
            $surname            = $template->getGuestListAttendanceList->surname;
            $status             = $template->getGuestListAttendanceList->status;
            $comment            = $template->getGuestListAttendanceList->comment;
            $importsource       = $template->getGuestListAttendanceList->importsource;    //?
            $attendancestatus   = $template->getGuestListAttendanceList->attendancestatus;
            $eventid            = $template->getGuestListAttendanceList->eventid;           //get it from event page

        } else {
            // fill variables with no data if no template was chosen, but not sure if needed here
            $activeTemplate = "";
            $personidclub       = null;
            $personid           = null;
            $name               = null;
            $surname            = null;
            $status             = null;
            $comment            = null;
            $importsource       = null;
            $attendancestatus   = null;
            $eventid            = null;      //maybe get eventid from event page
        }
                
        //return values for creating new table entry
        return View::make('createGuestAttendanceList', compact('personidclub','personid','name','surname',
                                                               'status','comment','importsource',
                                                               'attendancestatus','eventid'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*

        */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       /*$entry = GuestListAttendanceList::where('id', '=', $id)
                              ->firstOrFail();

      

        $ldapId = !is_null($entry->getPerson) ? $entry->getPerson->prsn_ldap_id : "";
        $response = [
            'id'                => $entry->id,
            'name'              => !is_null($entry->getPerson) ? $entry->getPerson->name          : "=FREI=",
            'prsn_ldap_id'      => $ldapId,
            'prsn_status'       => !is_null($entry->getPerson) ? $entry->getPerson->prsn_status        : "",
            'comment'           => $entry->entry_user_comment,
            'is_current_user'   => $ldapId == Session::get('userId')
        ];

        if (Request::ajax()) {
            return response()->json($response);
        } else {     
            return response()->json($response);
            //return View::make('items.index');
        }
        */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /*
            //edit existing entrys
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //here could be the ajax server stuff, but not sure ask patche if possible
        

        $List = $this->editList($id);

        // log the action
        Log::info('List edited: ' . Session::get('userName') . ' (' . Session::get('userId') . ', '
                 . Session::get('userGroup') . ') edited list "' . $list->id . '" (name: ' . $list->name . ') ' + ' 
                    (surname: ' . $list->surname . ') on ' . $list->id . '.');


        // save all data in the database
        $list->save();
        $schedule->save();
        foreach($entries as $entry)
            $entry->save();
        Utilities::clearIcalCache();
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
        $list = new GuestListAttendanceList;
        if(!is_null($id)) {
            $list = GuestListAttendanceList::findOrFail($id);
        }

        // format: strings; no validation needed
        $list->name        = Input::get('name');
        $list->surname     = Input::get('surname');
        $list->comment     = Input::get('comment');
        //all the rest of the data is automated

        // format: tinyInt; validate on filled value
        // reversed this: input=1 means "event is public", input=0 means "event is private"
        //$list->evnt_is_private = (Input::get('isPrivate') == '1') ? 0 : 1;
        //$listIsPublished = Input::get('evntIsPublished');
        

        return $list;
        
     }
 }