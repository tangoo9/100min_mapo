// child-list-detail datepicker 옵션

function disabledWeekdays(date) {
    var day = date.getDay();
    // 토,일요일 비활성화 옵션
    //0 is Sunday, 1 is Monday, 2 is Tuesday , 3 is Wednesday, 4 is Thursday, 5 is Friday and 6 is Saturday
    if (day == 0 || day == 6) {
        return [false] ; 
    } else { 
        return [true] ;
    }
}

$.datetimepicker.setLocale('ko');
$('#datepicker').datetimepicker({
    // datepicker:false,
    timepicker:false,
    scrollInput : false, //인풋 스크롤방지
    // inline : true,
    beforeShowDay: disabledWeekdays,
    format:'Y-m-d',
    // yearOffset : 1,
    minDate : '-1970/03/01', //minDate -3개월
    maxDate : '+1970/06/01'  //maxDate+ 6개월
});

$('#child_start_datepicker').datetimepicker({
    // datepicker:false,
    timepicker:false,
    scrollInput : false, //인풋 스크롤방지
    // inline : true,
    beforeShowDay: disabledWeekdays,
    format:'Y-m-d',
    // yearOffset : 1,
    minDate : '-1970/03/01', //minDate -3개월
    maxDate : '+1970/06/01'  //maxDate+ 6개월
});
$('#child_end_datepicker').datetimepicker({
    // datepicker:false,
    timepicker:false,
    scrollInput : false, //인풋 스크롤방지
    // inline : true,
    beforeShowDay: disabledWeekdays,
    format:'Y-m-d',
    // yearOffset : 1,
    minDate : '-1970/03/01', //minDate -3개월
    maxDate : '+1970/06/01'  //maxDate+ 6개월
});

/*[timepicker option]
    d1=월, d2=화, d3=수, d4=목, d5=금
    start = 시작일 , end = 종료일
    예) d1_start = 월 시작일,  d4_end = 목 종료일
 */
$.datetimepicker.setLocale('ko');
$('#d1_start').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d1_end').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:30',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d2_start').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d2_end').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:30',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d3_start').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d3_end').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:30',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d4_start').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d4_end').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:30',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d5_start').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
});
$.datetimepicker.setLocale('ko');
$('#d5_end').datetimepicker({
    datepicker:false,
    format:'H:i',
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:30',
    defaultTime: '09:00',
});