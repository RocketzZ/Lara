Guestlist to be integrated here.
@if($guestlistattendancelist->eventid != '')

<div class="panel panel-warning">


	<div class="panel-body no-padding">
		<span hidden>{{$counter = 0}}</span>
		
			<div class="row pattingTop">

				<div id="container" class="container">
 {{-- If there are entries passed - fill them with data and increment counter --}} 

		   		{!! Form::open(['method' => 'PUT', 'route' => ['guestentry.update', $counter]]) !!}

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
	    	<br>
			<input type="hidden" name="counter" id="counter" value="{{$counter}}" />
			{!! Form::submit('Eintrag speichern', array('class'=>'hidden', 'id'=>'button-create-submit')) !!}
			<button class="btn btn-primary" id="saveGuestentry"></button>
			
			{!! Form::close() !!}	
			
			</div>		
		</div>
	</div>
</div>
@endif