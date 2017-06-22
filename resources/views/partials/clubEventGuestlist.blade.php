@if($guestlistattendancelist->evnt_id != '')

<div class="panel panel-warning">

	<div class="panel-body no-padding">

		<div class="row paddingTop">
			
			{!! Form::open( array('method' => 'PUT',
		   						  'route' => ['guestentry.update', $guestlistattendancelist->id],
								  'id' => $guestlistattendancelist->id,))
			!!}
			
			{{-- Firstname and Surname --}}

				<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
					{!! Form::text(	'name' . $guestlistattendancelist->id,
									Input::old('name' . $guestlistattendancelist->id),
									array(	'placeholder'=>Lang::get('mainLang.firstname'),
											'id'=>'name' . $guestlistattendancelist->id,
											'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
				</div>
				&nbsp;&nbsp;

				<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
					{!! Form::text(	'surname' . $guestlistattendancelist->id,
									$guestlistattendancelist->surname,
									array(	'placeholder'=>Lang::get('mainLang.surname'),
											'id'=>'surname' . $guestlistattendancelist->id,
											'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
				</div>

				&nbsp;&nbsp;

			{{--Comment Section --}}

				<div class="col-md-6 col-sm-12 col-xs-12 no-margin">
					<span class="pull-left">
						{!! $guestlistattendancelist->comment == "" ? '<i class="fa fa-comment-o"></i>' : '<i class="fa fa-comment"></i>' !!}
						&nbsp;&nbsp;
					</span>

					{!! Form::text(	'comment' . $guestlistattendancelist->id,
								$guestlistattendancelist->comment,
								array(	'placeholder'=>Lang::get('mainLang.addComment'),
										'id'=>'comment' . $guestlistattendancelist->id,
										'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
					!!}
			
				</div>

				{!! Form::button( 'attendancestatus' . $guestlistattendancelist->id,
								$guestlistattendancelist->attendancestatus,
								array(	'name'=>'attendancestatus' . $guestlistattendancelist->id,
										'id'=>'attendancestatus' . $guestlistattendancelist->id,
										'class'=>'btn btn-small btn-success hide'))
				!!} 

				{!! Form::submit('Eintrag speichern', array('class'=>'hidden', 'id'=>'button-create-submit')) !!} 
      			<button class="btn btn-primary" id="saveGuestentry"></button> 

			{!! Form::close() !!}
		</div>	
	</div>
</div>
@else
Nothing.
@endif