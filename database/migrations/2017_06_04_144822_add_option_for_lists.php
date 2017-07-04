<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOptionForLists extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //adds the function to specify if guest list or attendance list or none
        Schema::table('club_events', function (Blueprint $table) {
            $table->boolean('guestlistattendancelist')->nullable()->default(NULL)->after('evnt_is_private');
            //can be NULL 
            //true 	->guest list wanted
			//false ->attendance list wanted
			//NULL 	->neither wanted
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('club_events', function (Blueprint $table) {
             $table->dropColumn('guestlistattendancelist');
        }); 
    }
}
