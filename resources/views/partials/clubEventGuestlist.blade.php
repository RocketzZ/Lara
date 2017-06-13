Guestlist to be integrated here.
@if($guestlistattendancelist->evnt_id != '')

<div class="panel panel-warning">

	<div class="panel-body no-padding">
	
		{!! Form::open( array('method' => 'PUT',
		   					  'route' => ['guestentry.update', $guestlistattendancelist->id],
							  'id' => $guestlistattendancelist->id)) !!}

			{!! Form::text(	'name' . $guestlistattendancelist->id,
							$guestlistattendancelist->name,
							array(	'placeholder'=>Lang::get('mainLang.firstname'),
									'id'=>'name' . $guestlistattendancelist->id,
									'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin'))
			!!}

		           

			
		{!! Form::close() !!}	
			
		
	</div>
</div>
@endif