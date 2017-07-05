@if($clubEvent->guestlistattendancelist == '1' && $clubEvent->evnt_type != 4)

<div class="panel panel-warning">

	<div class="panel-body no-padding">

		<div class="row paddingTop">

		{{-- Show all Guestentries --}}

			@foreach($guestentry as $guestentry)
		
			{!! Form::open( array('method' => 'PUT',
		   						  'route' => ['guestentry.update', $guestentry->id],
								  'id' => $guestentry->id,
								  'class' => 'GuestAttendanceEntry'))
			!!}
			
			{{-- Firstname and Surname --}}

				<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
					{!! Form::text(	'name' . $guestentry->id,
									$guestentry->name,
									array(	'placeholder'=>Lang::get('mainLang.firstname'),
											'id'=>'name' . $guestentry->id,
											'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
				</div>
				&nbsp;&nbsp;

				<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
					{!! Form::text(	'surname' . $guestentry->id,
									$guestentry->surname,
									array(	'placeholder'=>Lang::get('mainLang.surname'),
											'id'=>'surname' . $guestentry->id,
											'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
				</div>

				&nbsp;&nbsp;

			{{--Comment Section --}}

				<div class="col-md-6 col-sm-12 col-xs-12 no-margin">
					<span class="pull-left">
						{!! $guestentry->comment == "" ? '<i class="fa fa-comment-o"></i>' : '<i class="fa fa-comment"></i>' !!}
						&nbsp;&nbsp;
					</span>

					{!! Form::text(	'comment' . $guestentry->id,
									$guestentry->comment,
									array(	'placeholder'=>Lang::get('mainLang.addComment'),
											'id'=>'comment' . $guestentry->id,
											'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
			
				</div>

				<label for="attendancestatus">{{ trans('mainLang.Attendancestatus') }}</label>

				@if ($guestentry->name !== null)
					@if ($guestentry->attendancestatus !== null)
					{!! Form::checkbox(	'attendancestatus' . $guestentry->id,
										$guestentry->attendancestatus,
										'1')
					!!}
					@else
					{!! Form::checkbox(	'attendancestatus' . $guestentry->id,
										$guestentry->attendancestatus,
										'0')
					!!}
					@endif
				@endif
				
			{{--Only allow logged in Members to change Guestentries, allow everyone to add new--}}

				@if (Session::has("userName") && $guestentry->name !== null)
					{!! Form::submit('save', array('id'=>'btn-submit-changes' . $guestentry->id, 'hidden')) !!}
				@elseif ($guestentry->name == null)
					{!! Form::submit('save', array('id'=>'btn-submit-changes' . $guestentry->id, 'hidden')) !!}
				@endif

			{!! Form::close() !!}

		{{--Show a line after each row--}}

			<hr class="col-md-12 col-md-12 col-xs-12 top-padding no-margin no-padding">

			@endforeach

		</div>
	</div>
</div>
@else
{{--code here--}}
@endif