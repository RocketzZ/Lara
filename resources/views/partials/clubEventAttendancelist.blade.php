<div class="panel">
	<div class="panel-heading">
	<h4 class="panel-title">{{ trans('mainLang.editAttendanceList') }}:</h4>
	</div>
	
	<div class="panel-body no-padding" id="main">

	{{-- jobtype fields --}}
	    <span hidden>{{$counter = 0}}</span>


<div class="container ">
<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
&nbsp;&nbsp;
<div class="btn-group">
    <button type="button" class="btn btn-primary">{{ trans('mainLang.sort') }}</button>
    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
      <span class="caret"></span>
    </button>
    <ul class="dropdown-menu" role="menu">
      <li><a href="#">{{ trans('mainLang.sortByName') }}</a></li>
      <li><a href="#">{{ trans('mainLang.sortByClub') }}</a></li>
	  <li><a href="#">{{ trans('mainLang.sortByAttendancestatus') }}</a></li>
      
    </ul>
  </div>
             <style>
			 #myInput {
  background-image: url('\Lara\public\1496511668_icon-111-search.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 60%;
  font-size: 14px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
			 </style>

</div>




	    <div id="container" class="container">
		    {{-- If there are entries passed - fill them with data and increment counter --}} 

		    @if(isset($entries))
		        @foreach($entries as $entry)
		            <div id={{ "box" . ++$counter }} class="box">
			           	
				           	<input type="text" 
				           		   name={{ "person_name" . $counter }}
				           		   class="input" 
				           		   id={{ "person_name" . $counter }}
				           		   value=""
				           		   placeholder="{{ trans('mainLang.name') }}"/>
				           	
				           	

						
						&nbsp;&nbsp;&nbsp;&nbsp;

						<input type="text" 
				           		   name={{ "club_name" . $counter }}
				           		   class="input" 
				           		   id={{ "club_name" . $counter }}
				           		   value=""
				           		   placeholder="{{ trans('mainLang.club') }}"/>


{{--  CHECKBOX  --}}
&nbsp;&nbsp;&nbsp;&nbsp;
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
	    				<input type="button" value="&#8211;" class="btn btn-small btn-danger btnRemove" />
					</div>
					
				
			
		        @endforeach 
		    @endif












		    {{-- and add one empty entry --}}
		       <div id={{ "box" . ++$counter }} class="box">
			           	
				           	<input type="text" 
				           		   name={{ "person_name" . $counter }}
				           		   class="input" 
				           		   id={{ "person_name" . $counter }}
				           		   value=""
				           		   placeholder="{{ trans('mainLang.name') }}"/>
				           	
				           	

					

				&nbsp;&nbsp;&nbsp;&nbsp;
				

					<input type="text" 
				           		   name={{ "club_name" . $counter }}
				           		   class="input" 
				           		   id={{ "club_name" . $counter }}
				           		   value=""
				           		   placeholder="{{ trans('mainLang.club') }}"/>


				&nbsp;&nbsp;&nbsp;&nbsp;
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
				<input type="button" value="&#8211;" class="btn btn-small btn-danger btnRemove" />


				
	    	</div>
	    	<br>
			<input type="hidden" name="counter" id="counter" value="{{$counter}}" />
		</div>
	</div>
</div>

@include clubAttendanceStatisitc

















{{--


			<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">

             <style>
			 #myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 60%;
  font-size: 14px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
			 </style>



<script>
function myFunction() {
    var myInput, filter, ul, li, a, i;
    myInput = document.getElementById("container");
    filter = myInput.value.toUpperCase();
    input = document.getElementById("person_name" . $counter);
   
    for (i = 0; i < $counter; i++) {
        a = input[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            input[i].style.display = "";
        } else {
           input[i].style.display = "none";

        }
    }
}
</script>

     

--}}