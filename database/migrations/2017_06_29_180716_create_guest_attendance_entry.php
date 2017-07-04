<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuestAttendanceEntry extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_attendance_entry', function (Blueprint $table){
            $table->increments('id');
            $table->smallInteger('personidclub')->references('id')->on('users')->nullable()->default(NULL);        //if club id is existing for current user
            $table->integer('personid')->nullable()->default(NULL);                                                //id for current user without club id
            $table->string('name')->nullable()->default(NULL);                                                     //name in table
            $table->string('surname')->nullable()->default(NULL);                                                  //surname in table
            $table->tinyInteger('status')->nullable()->default(NULL);                                              //status of person e.g. Member/Candidate...
            $table->timestamp('created_at');                                                                       //creation timestamp of table entry
            $table->timestamp('updated_at');                                                                       //creation timestamp of table entry
            $table->string('comment', 250)->nullable()->default(NULL);                                             //comment field
            $table->tinyInteger('importsource')->nullable()->default(NULL);                                        //manually added or facebook...
            $table->tinyInteger('attendancestatus')->nullable()->default(NULL);                                    //is attening/not attending/apologized... 
            $table->integer('list_id')->references('evnt_id')->on('guest_attendance_list');                             //event id for guest list
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('guest_attendance_entry');
    }
}
