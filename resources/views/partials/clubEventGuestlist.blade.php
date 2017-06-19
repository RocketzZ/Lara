Guestlist to be integrated here.
@if($guestlistattendancelist->evnt_id != '')

<div class="panel panel-warning">

	<div class="panel-body no-padding">
		<div class="row paddingTop">

		{!! Form::open( array('method' => 'PUT',
		   					  'route' => ['guestentry.update', $guestlistattendancelist->id],
							  'id' => $guestlistattendancelist->id)) !!}
			
			
			{!! Form::text(	'name' . $guestlistattendancelist->id,
							$guestlistattendancelist->name,
							array(	'placeholder'=>Lang::get('mainLang.firstname'),
									'id'=>'name' . $guestlistattendancelist->id,
									'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
			!!}
			&nbsp;&nbsp;
			{!! Form::text(	'surname' . $guestlistattendancelist->id,
							$guestlistattendancelist->surname,
							array(	'placeholder'=>Lang::get('mainLang.surname'),
									'id'=>'surname' . $guestlistattendancelist->id,
									'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
			!!}
			&nbsp;&nbsp;
			{!! Form::text(	'comment' . $guestlistattendancelist->id,
							$guestlistattendancelist->comment,
							array(	'placeholder'=>Lang::get('mainLang.addComment'),
									'id'=>'comment' . $guestlistattendancelist->id,
									'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
			!!}
		           

			
		{!! Form::close() !!}	
			
		</div>	
	</div>
</div>
@endif