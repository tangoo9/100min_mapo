// date+time시 옵션

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
$('#datetimepicker').datetimepicker({
    // datepicker:false,
    // inline : true,
    beforeShowDay: disabledWeekdays,
    format:'Y-m-d H:i',
    // yearOffset : 1,
    step : 30, //시간 간격, 분
    minTime: '09:00',
    maxTime: '20:00',
    defaultTime: '09:00',
    minDate : '-1970/03/01', //minDate -3개월
    maxDate : '+1970/06/01'  //maxDate+ 6개월
});