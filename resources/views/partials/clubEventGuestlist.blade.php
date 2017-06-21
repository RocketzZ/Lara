Guestlist to be integrated here.
@if($guestlistattendancelist->eventid != '')

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
		           

		            <div id={{ "box" . ++$counter }} class="box">

					

						<input type="text" 
				       		   name={{ "name" . $counter }}
				       		   class="input" 
			           		   id={{ "name" . $counter }}
			           		   value=""
			           		   placeholder="{{ trans('mainLang.firstname') }}"/>          					           	
						
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

						<input type="text" 
				           	   name={{ "surname" . $counter }}
				           	   class="input" 
				        	   id={{ "surname" . $counter }}
				       		   value=""
				        	   placeholder="{{ trans('mainLang.surname') }}"/>

					{{--  CHECKBOX  --}}
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          			   <label class="custom-control custom-checkbox">
            		  	 <input type="checkbox" class="custom-control-input">
                      	 <span class="custom-control-indicator"></span>
                      	 <span class="custom-control-description"></span>
                       </label>
					   <label class="custom-control custom-checkbox">
            		  	 <input type="checkbox" class="custom-control-input">
                      	 <span class="custom-control-indicator"></span>
                      	 <span class="custom-control-description"></span>
                       </label>



		            	&nbsp;&nbsp;&nbsp;&nbsp;
		            	<input type="text" 
		            		   class="input" 
		            		   name={{ "addComment" . $counter }} 
		            		   id={{ "addComment" . $counter }}
		            		   value=""
							   placeholder="{{ trans('mainLang.addComment') }}" />
							   

		            	
		            	<input type="button" value="+" class="btn btn-small btn-success btnAdd" />
		            	&nbsp;&nbsp;
	    				@if(Session::has('userId'))
						<input type="button" value="&#8211;" class="btn btn-small btn-danger btnRemove" />
						@endif
					</div>
					
				
			


		    {{-- and add one empty entry --}}
		       <div id={{ "box" . ++$counter }} class="box">
			           	
				    <input type="text" 
				    	   name={{ "name" . $counter }}
			       		   class="input" 
		           		   id={{ "name" . $counter }}
		           		   value=""
		           		   placeholder="{{ trans('mainLang.firstname') }}"/>
				           	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				

					<input type="text" 
		           		   name={{ "surname" . $counter }}
		           		   class="input" 
		           		   id={{ "surname" . $counter }}
		           		   value=""
		           		   placeholder="{{ trans('mainLang.surname') }}"/>


				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	        	<label class="custom-control custom-checkbox">
            		<input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                	<span class="custom-control-description"></span>
                </label> 
				<label class="custom-control custom-checkbox">
            		<input type="checkbox" class="custom-control-input">
                    <span class="custom-control-indicator"></span>
                	<span class="custom-control-description"></span>
                </label> 

         	&nbsp;&nbsp;&nbsp;&nbsp;
		        <input type="text" 
		        	   class="input" 
		    		   name={{ "addComment" . $counter }} 
            		   id={{ "addComment" . $counter }}
		        	   value=""
					   placeholder="{{ trans('mainLang.addComment') }}" />    
							             



	        	<input type="button" value="+" class="btn btn-small btn-success btnAdd" /> 
	        	&nbsp;&nbsp;
				@if(Session::has('userId'))
				<input type="button" value="&#8211;" class="btn btn-small btn-danger btnRemove" />
				@endif
				
			
		</div>	
	</div>
</div>
@endif