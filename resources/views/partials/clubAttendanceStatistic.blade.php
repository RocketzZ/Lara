<div class="panel">
    <div class="panel-heading">
        <h4 class="panel-title">{{ trans('mainLang.AttendanceStatisticHeader') }}:</h4>
    </div>
    <ul class="nav nav-tabs">
        @foreach($clubInfos->keys() as $title)
            <li class="{{Session::get('userClub') == $title? 'active': ''}} statisticClubPicker">
                <a aria-expanded="{{Session::get('userClub') == $title? 'true' : 'false'}}"
                   href="#{{$title}}"
                   data-toggle="tab">
                    {{$title}}
                </a>
            </li>
        @endforeach
    </ul>
</div>


<div class="panel panel-body no-padding">
    <div id="AttendanceStatisticsTabs" class="tab-content">
        @foreach($clubInfos as $title => $clubInfo)
            <div class="tab-pane fade in {{ Session::get('userClub') === $title ? 'active' : '' }}" id="{{$title}}">
                <table class="table table-hover" >
                    <thead>
                    <tr>
                        <td data-sort="name" class="col-md-2 col-sm-3 col-xs-4">
                            {{trans('mainLang.name')}} <i class="fa fa-sort-desc fa-pull-right"></i>
                        </td>

                    </tr>
                    </thead>
                </table>
            </div>
        @endforeach
    </div>
</div>
