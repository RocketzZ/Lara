    <div class="panelEventView">
        {{-- show time button Ger.: Zeiten einblenden --}}
		&nbsp;&nbsp;
		<button class="btn btn-xs hidden-print" type="button" id="toggle-shift-time">{{ trans('mainLang.hideTimes') }}</button>
	
		{{-- hide taken shifts button Ger.: Vergebenen Diensten ausblenden --}}
		<button class="btn btn-xs hidden-print" type="button" id="toggle-taken-shifts">{{ trans('mainLang.hideTakenShifts') }}</button>
		
	</div>	


	<div class="panel panel-warning">
		@if( $clubEvent->getSchedule->schdl_password != '')
			<div class="hidden-print panel panel-heading">
			    {!! Form::password('password', array('required',
			                                         'class'=>'col-md-4 col-sm-4 col-xs-12 black-text',
		                                             'id'=>'password' . $clubEvent->getSchedule->id,
			                                         'placeholder'=>Lang::get('mainLang.enterPasswordHere'))) !!}
			    <br />
			</div>

		@endif

		<div class="panel-body no-padding ">
			@foreach($entries as $entry)
				{{-- highlight with my-shift class if the signed in user is the person to do the entry --}}
				<div class="row paddingTop {!! ( isset($entry->getPerson->prsn_ldap_id) AND Session::has('userId') AND $entry->getPerson->prsn_ldap_id == Session::get('userId')) ? "my-shift" : false !!}">
			        {!! Form::open(  array( 'route' => ['entry.update', $entry->id],
			                                'id' => $entry->id, 
			                                'method' => 'PUT', 
			                                'class' => 'scheduleEntry')  ) !!}

			        {{-- SPAMBOT HONEYPOT - this field will be hidden, so if it's filled, then it's a bot or a user tampering with page source --}}
			        <div id="welcome-to-our-mechanical-overlords">
			            <small>If you can read this this - refresh the page to update CSS styles or switch CSS support on.</small>
			            <input type="text" id="{!! 'website' . $entry->id !!}" name="{!! 'website' . $entry->id !!}" value="" />
			        </div>

			        {{-- ENTRY TITLE --}}
			        <div class="col-md-2 col-sm-2 col-xs-4 left-padding-8">
			            @include("partials.scheduleEntryTitle")
			        </div>

			        {{-- show public events, but protect members' entries from being changed by guests --}}
			        @if( isset($entry->getPerson->prsn_ldap_id) AND !Session::has('userId'))

						<div class="col-md-2 col-sm-2 col-xs-4 input-append btn-group">
						    {{-- ENTRY STATUS --}}
						    <div class="col-md-3 col-sm-2 col-xs-3 no-padding" id="clubStatus{{ $entry->id }}">
						        @include("partials.scheduleEntryStatus")
						    </div>

						    {{-- ENTRY USERNAME--}}
						    <div id="{!! 'userName' . $entry->id !!}">
						        {!! $entry->getPerson->prsn_name !!}
						    </div>

						    {{-- no need to show LDAP ID or TIMESTAMP in this case --}}
						</div>

						{{-- ENTRY CLUB --}}
						<div id="{!! 'club' . $entry->id !!}" class="col-md-2 col-xs-3 no-padding">
						    {!! "(" . $entry->getPerson->getClub->clb_title . ")" !!}
						</div>

						<br class="visible-xs hidden-sm">

						{{-- COMMENT SECTION --}}
						<div class="col-md-6 col-sm-6 col-xs-12 hidden-print word-break no-margin">
						    <span class="pull-left">
						    	{!! $entry->entry_user_comment == "" ? '<i class="fa fa-comment-o"></i>' : '<i class="fa fa-comment"></i>' !!}
						    	&nbsp;&nbsp;
						    </span>

						    <span class="col-md-10 col-sm-10 col-xs-10 no-padding no-margin">
							    {!! !empty($entry->entry_user_comment) ? $entry->entry_user_comment : "-" !!}
							</span>
						</div>


			        {{-- show everything for members --}}
					@else

			        	{{-- ENTRY STATUS, USERNAME, DROPDOWN USERNAME and LDAP ID --}}
						<div class="col-md-2 col-sm-2 col-xs-5 input-append btn-group">      
						    @include("partials.scheduleEntryName")
						</div>

						{{-- ENTRY CLUB and DROPDOWN CLUB --}}
						<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
						    @include("partials.scheduleEntryClub")
						</div>

						{{-- COMMENT SECTION --}}
						<br class="visible-print hidden-md hidden-sm hidden-xs">
						<br class="visible-print hidden-md hidden-sm hidden-xs">
						<div class="col-md-6 col-sm-12 col-xs-12 no-margin">
						    <span class="pull-left">
						    	{!! $entry->entry_user_comment == "" ? '<i class="fa fa-comment-o"></i>' : '<i class="fa fa-comment"></i>' !!}
						    	&nbsp;&nbsp;
						    </span>

						    {!! Form::text('comment' . $entry->id,
					                   $entry->entry_user_comment,
					                   array('placeholder'=>Lang::get('mainLang.addCommentHere'),
					                         'id'=>'comment' . $entry->id,
			                     			 'name'=>'comment' . $entry->id,
					                         'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin')) 
					    	!!}	
						</div>
						<br class="visible-print hidden-md hidden-sm hidden-xs">

			        @endif

			        {!! Form::close() !!}

				</div>

				{{-- Show a line after each row except the last one --}}
				@if($entry !== $entries->last() )
					<hr class="col-md-12 col-md-12 col-xs-12 top-padding no-margin no-padding">
				@endif

			@endforeach
		</div>

	</div>

	<br>

	@if(Session::has('userId'))
		{{-- REVISIONS --}}
		<span class="hidden-xs">&nbsp;&nbsp;</span><span>&nbsp;&nbsp;&nbsp;&nbsp;</span>
		<a id="show-hide-history" class="text-muted hidden-print" href="#">
			{{ trans('mainLang.listChanges') }} &nbsp;&nbsp;<i class="fa fa-caret-right" id="arrow-icon"></i>
		</a>

		<div class="panel hide" id="change-history">
			<table class="table table-hover table-condensed">
				<thead>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.work') }}
					</th>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.whatChanged') }}
					</th>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.oldEntry') }}
					</th>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.newEntry') }}
					</th>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.whoBlame') }}
					</th>
					<th class="col-xs-2 col-md-2">
						{{ trans('mainLang.whenWasIt') }}
					</th>
				</thead>
				<tbody>
					@for ($i = 0; $i < count($revisions); $i++)
					    <tr>
					    	<td>
					    		{{ $revisions[$i]["job type"] }}
					    	</td>
					    	<td>
					    		{{ $revisions[$i]["action"] }}
					    	</td>
					    	<td>
					    		{{ $revisions[$i]["old value"] }}
					    	</td>
					    	<td>
					    		{{ $revisions[$i]["new value"] }}
					    	</td>
					    	<td>
					    		{{ $revisions[$i]["user name"] }}
					    	</td>
					    	<td>
					    		{{ $revisions[$i]["timestamp"] }}
					    	</td>
					    </tr>
					@endfor
				</tbody>
			</table>
		</div>
		<br>
		<br class="visible-xs">
                    </div>
	@endif