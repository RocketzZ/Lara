Guestlist to be integrated here.


<div class="panel panel-warning">

	<div class="panel-body no-padding">
		@foreach($entries as $entry)
			<div class="row pattingTop">
				{!! Form::open( array('route' => ['guestentry.show', $entry->id],
									  'id'	  => $entry->id,
									  'method'=> 'PUT',
									  'class' => 'scheduleEntry'))!!}
				
						{{-- COMMENT SECTION --}}
						<br class="visible-print hidden-md hidden-sm hidden-xs">
						<br class="visible-print hidden-md hidden-sm hidden-xs">
						<div class="col-md-6 col-sm-12 col-xs-12 no-margin">
						    <span class="pull-left">
						    	{!! $entry->comment == "" ? '<i class="fa fa-comment-o"></i>' : '<i class="fa fa-comment"></i>' !!}
						    	&nbsp;&nbsp;
						    </span>

						    {!! Form::text('comment' . $entry->id,
					                   $entry->comment,
					                   array('placeholder'=>Lang::get('mainLang.addCommentHere'),
					                         'id'=>'comment' . $entry->id,
			                     			 'name'=>'comment' . $entry->id,
					                         'class'=>'col-md-11 col-sm-11 col-xs-10 no-padding no-margin')) 
					    	!!}	
						</div>
						<br class="visible-print hidden-md hidden-sm hidden-xs">

					{!! Form::close() !!}
			</div>
			{{-- Show a line after each row except the last one --}}
			@if($entry !== $entries->last() )
				<hr class="col-md-12 col-md-12 col-xs-12 top-padding no-margin no-padding">
			@endif
		
		@endforeach
	</div>
</div>