@extends('layouts.master')

@section('title')
	{{ $clubEvent->evnt_title }}
@stop
@section('content')
    <div class="panelEventView">
		<div class="row no-margin">
			<div class="panel col-xs-12 col-md-6 no-padding">
				@if	($clubEvent->evnt_type == 1 AND $clubEvent->evnt_is_private)
					<div class="panel panel-heading calendar-internal-info white-text">
				@elseif     ($clubEvent->evnt_type == 1)
					<div class="panel panel-heading calendar-public-info white-text">

				@elseif (($clubEvent->evnt_type == 6 OR $clubEvent->evnt_type == 9) AND $clubEvent->evnt_is_private)
					<div class="panel panel-heading calendar-internal-task white-text">
				@elseif ($clubEvent->evnt_type == 6 OR $clubEvent->evnt_type == 9)
					<div class="panel panel-heading calendar-public-task white-text">


				@elseif (($clubEvent->evnt_type == 7 OR $clubEvent->evnt_type == 8) AND $clubEvent->evnt_is_private)
					<div class="panel panel-heading calendar-internal-marketing white-text">
				@elseif ($clubEvent->evnt_type == 7 OR $clubEvent->evnt_type == 8)
					<div class="panel panel-heading calendar-public-marketing white-text">


				@elseif ($clubEvent->getPlace->plc_title == "bc-Club" AND $clubEvent->evnt_is_private )
					<div class="panel panel-heading calendar-internal-event-bc-club white-text">
				@elseif ($clubEvent->getPlace->plc_title == "bc-Club")
					<div class="panel panel-heading calendar-public-event-bc-club white-text">

				@elseif ($clubEvent->getPlace->plc_title == "bc-Café" AND $clubEvent->evnt_is_private)
					<div class="panel panel-heading calendar-internal-event-bc-cafe white-text">
				@elseif ($clubEvent->getPlace->plc_title == "bc-Café")
					<div class="panel panel-heading calendar-public-event-bc-cafe white-text">

				@else
					{{-- DEFAULT --}}
					<div class="panel panel-heading white-text">
				@endif
					<h4 class="panel-title">@include("partials.event-marker")&nbsp;{{ $clubEvent->evnt_title }}</h4>
					<h5 class="panel-title">{{ $clubEvent->evnt_subtitle }}</h5>
				</div>
					<table class="table table-hover">
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.type') }}:</i>
							</td>
							<td>
								@if( $clubEvent->evnt_type == 0)
									{{ trans('mainLang.normalProgramm') }}
								@elseif( $clubEvent->evnt_type == 1)
									{{ trans('mainLang.information') }}
								@elseif( $clubEvent->evnt_type == 2)
									{{ trans('mainLang.special') }}
								@elseif( $clubEvent->evnt_type == 3)
									{{ trans('mainLang.LiveBandDJ') }}
								@elseif( $clubEvent->evnt_type == 4)
									{{ trans('mainLang.internalEvent') }}
								@elseif( $clubEvent->evnt_type == 5)
									{{ trans('mainLang.utilization') }}
								@elseif( $clubEvent->evnt_type == 6)
									{{ trans('mainLang.flooding') }}
								@elseif( $clubEvent->evnt_type == 7)
									{{ trans('mainLang.flyersPlacard') }}
								@elseif( $clubEvent->evnt_type == 8)
									{{ trans('mainLang.preSale') }}
								@elseif( $clubEvent->evnt_type == 9)
									{{ trans('mainLang.others') }}
								@endif
							</td>
						</tr>
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.begin') }}:</i>
							</td>
							<td>
								{{ strftime("%a, %d. %b", strtotime($clubEvent->evnt_date_start)) }} um
								{{ date("H:i", strtotime($clubEvent->evnt_time_start)) }}
							</td>
						</tr>
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.end') }}:</i>
							</td>
							<td>
								{{ strftime("%a, %d. %b", strtotime($clubEvent->evnt_date_end)) }} um
								{{ date("H:i", strtotime($clubEvent->evnt_time_end)) }}
							</td>
						</tr>
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.DV-Time') }}:</i>
							</td>
							<td>
								{{ date("H:i", strtotime($clubEvent->getSchedule->schdl_time_preparation_start)) }}
							</td>
						</tr>
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.club') }}:</i>
							</td>
							<td>
								{{ $clubEvent->getPlace->plc_title }}
								&nbsp;&nbsp;<br class="visible-xs">
								<i>({{ trans('mainLang.willShowFor') }}: {{ implode(", ", json_decode($clubEvent->evnt_show_to_club, true)) }})</i>
							</td>
						</tr>
						<tr>
							<td width="20%" class="left-padding-16">
								<i>{{ trans('mainLang.iCal') }}:</i>
							</td>
							<td>
								@if($clubEvent->evnt_is_published == "1")
									<i class="fa fa-check-square-o" aria-hidden="true"></i>
									&nbsp;&nbsp;{{trans('mainLang.eventIsPublished')}}
								@else
									<i class="fa fa-square-o" aria-hidden="true"></i>
									&nbsp;&nbsp;{{trans('mainLang.eventIsUnpublished')}}
								@endif
							</td>
						</tr>
					</table>
				{{-- CRUD --}}
				@if(Session::has('userGroup')
					AND (Session::get('userGroup') == 'marketing'
					OR Session::get('userGroup') == 'clubleitung'
					OR Session::get('userGroup') == 'admin'
					OR Session::get('userId') == $created_by))
					<div class="panel panel-footer col-md-12 col-xs-12 hidden-print">
						<span class="pull-right">
							<button  id="unPublishEventLnkBtn"
								data-href="{{ URL::route('togglePublishState', $clubEvent->id) }}"
								class="btn btn-danger @if($clubEvent->evnt_is_published == 0) hidden @endif"
								name="toggle-publish-state"
							    data-toggle="tooltip"
							    data-placement="bottom"
							    title="{{trans("mainLang.unpublishEvent")}}"
							    data-token="{{csrf_token()}}"
								>
								<i class="fa fa-bullhorn" aria-hidden="true"></i>
							</button>
							<button  id="pubishEventLnkBtn"
								data-href="{{ URL::route('togglePublishState', $clubEvent->id) }}"
								class="btn btn-success @if($clubEvent->evnt_is_published == 1) hidden @endif"
								name="toggle-publish-state"
								data-toggle="tooltip"
								data-placement="bottom"
								title="{{trans("mainLang.publishEvent")}}"
								data-token="{{csrf_token()}}"
								>
								<i class="fa fa-bullhorn" aria-hidden="true"></i>

							</button>
							&nbsp;&nbsp;
							<a href="{{ URL::route('event.edit', $clubEvent->id) }}"
							   class="btn btn-primary"
							   data-toggle="tooltip"
		                       data-placement="bottom"
		                       title="{{ trans('mainLang.changeEvent') }}">
							   <i class="fa fa-pencil"></i>
							</a>
							&nbsp;&nbsp;
							<a href="{{ URL::route('guestentry.create', $clubEvent->id) }}"
							   class="btn btn-info"
							   data-toggle="tooltip"
		                       data-placement="bottom"
		                       title="{{ trans('mainLang.createGuestAttendanceList') }}">
							   <i class="fa fa-bars"></i>
							</a>
							&nbsp;&nbsp;
							<a href="{{ $clubEvent->id }}"
							   class="btn btn-default"
							   data-toggle="tooltip"
		                       data-placement="bottom"
		                       title="{{ trans('mainLang.deleteEvent') }}"
							   data-method="delete"
							   data-token="{{csrf_token()}}"
							   rel="nofollow"
							   data-confirm="{{ trans('mainLang.confirmDeleteEvent') }}">
							   <i class="fa fa-trash"></i>
							</a>
						</span>
					</div>
				@endif
			</div>
	                        <span class="displayMobile">
	                            <br>	&nbsp;
	                        </span>

			<div class="col-xs-12 col-md-6 col-sm-12 no-padding-xs">
				@if( $clubEvent->evnt_public_info != '')
				<div class="panel">
					<div class="panel-body more-info">
						<h5 class="panel-title">{{ trans('mainLang.additionalInfo') }}:</h5>
						{!! nl2br($clubEvent->evnt_public_info) !!}
					</div>
					<button type="button" class="moreless-more-info btn btn-primary btn-margin" data-dismiss="alert">{{ trans('mainLang.showMore') }}</button>
					<button type="button" class="moreless-less-info btn btn-primary btn-margin" data-dismiss="alert">{{ trans('mainLang.showLess') }}</button>
				</div>
				@endif

				@if(Session::has('userId'))
					@if($clubEvent->evnt_private_details != '')
					<div class="panel hidden-print">
						<div class="panel-body more-details">
							<h5 class="panel-title">{{ trans('mainLang.moreDetails') }}:</h5>
							{!! nl2br($clubEvent->evnt_private_details) !!}
						</div>
						<button type="button" class="moreless-more-details btn btn-primary btn-margin" data-dismiss="alert">{{ trans('mainLang.showMore') }}</button>
						<button type="button" class="moreless-less-details btn btn-primary btn-margin" data-dismiss="alert">{{ trans('mainLang.showLess') }}</button>
					</div>
					@endif
				@endif
			</div>
		</div>
	</div>

	<br>

	{{-- Tabs for Changing Guestlist/Schedule View --}}
	<div class="container">
		<ul class="nav nav-tabs">
  			<li class="active"><a href="#schedule" data-toggle="tab" aria-expanded="true">{{ trans('mainLang.Schedule') }}</a></li>
  			<li class=""><a href="#guestlist" data-toggle="tab" aria-expanded="false">{{ trans('mainLang.Guestlist') }}</a></li>
			<li class=""><a href="#attendancelist" data-toggle="tab" aria-expanded="false">{{ trans('mainLang.Attendancelist') }}</a></li>
		</ul>

		<div class="tab-content">
  			<div class="tab-pane active" id="schedule">
   				@include("partials.clubEventSchedule")
  			</div>

  			<div class="tab-pane" id="guestlist">
    			@include("partials.clubEventGuestlist")
  			</div>

			  <div class="tab-pane " id="attendancelist">
    			@include("partials.clubEventAttendancelist")
  			</div>
		</div>
	</div>

@stop



