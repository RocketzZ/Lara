<?php

namespace Lara;

use Illuminate\Database\Eloquent\Model;

class GuestListAttendanceList extends Model
{
    
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'guest_attendance_list';

    /**
     * The database columns used by the model.
     * This attributes are mass assignable.
     *
     * @var array
     */
     protected $fillable = array('personidclub',
                                 'personid',
                                 'name',
                                 'surname',
                                 'status',
                                 'comment',
                                 'importsource',    //0->added manually
                                                    //1->added by clubleitung
                                                    //2->added by member
                                                    //3->added by admin
                                                    //->...
                                                    //4->added via facebook import
                                 'attendancestatus',
                                 'evnt_id',
                                 'id');

//name functions correctly and get data
public function getUserID() {
		return $this->belongsTo('Lara\Person', 'personid', 'id');
	}

public function getEventID() {
        return $this->belongsTo('Lara\ClubEvent', 'evnt_id', 'id');
    }


}
