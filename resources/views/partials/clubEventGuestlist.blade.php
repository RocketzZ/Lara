{{--@if($guestlistattendancelist->evnt_id != '')--}}

<div class="panel panel-warning">

	<div class="panel-body no-padding">

		<div class="row paddingTop">
			
			@foreach($guestentry as $guestlistattendancelist)

			{{-- Add new Guestentries --}}
		
			{!! Form::open( array('method' => 'PUT',
		   						  'route' => ['guestentry.update', $guestentry->id],
								  'id' => $guestentry->id,))
			!!}
			
			{{-- Firstname and Surname --}}

				<div class="col-md-2 col-sm-2 col-xs-3 no-padding">
					{!! Form::text(	'name' . $guestentry->id,
									Input::old('name' . $guestentry->id),
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
				{!! Form::checkbox(	'attendancestatus' . $guestentry->id,
									$guestentry->attendancestatus,
									'0', false)
				!!} 

				{!! Form::submit('Eintrag speichern', array('class'=>'hidden', 'id'=>'button-create-submit')) !!} 
      			<button class="btn btn-primary" id="saveGuestentry">{{trans('mainLang.Save')}}</button> 

			{!! Form::close() !!}

			@endforeach

		</div>
	</div>
</div>
{{--@else
Nothing.
@endif--}}