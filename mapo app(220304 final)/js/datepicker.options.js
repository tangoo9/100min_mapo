$.datepicker.setDefaults({
    dateFormat: 'yy-mm-dd',
    prevText: '이전 달',
    nextText: '다음 달',
    monthNames: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    monthNamesShort: ['1월', '2월', '3월', '4월', '5월', '6월', '7월', '8월', '9월', '10월', '11월', '12월'],
    dayNames: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesShort: ['일', '월', '화', '수', '목', '금', '토'],
    dayNamesMin: ['일', '월', '화', '수', '목', '금', '토'],
    showMonthAfterYear: true,
    yearSuffix: '년',
    minDate : 0,
    maxDate : 35
});
$( function() { $( "#datepicker1").datepicker(); } ); 


$( function() { $( "#datepicker2").datepicker(); } ); 
// alert("테스트")



// https://kimsg.tistory.com/290



//timepicker
// function fn_timePicker(obj) {
//     var id = $(obj).attr("id");
//     $("#" + id ).timepicker({
//         timeFormat : "HH:mm ",
//         interval : 30,
//         minTime:'9',
//         maxTime:'19:30',
//         defaultTime:'13:00',
//         dynamic : false,
//         dropdown : true
//         // scrollbar : true
//     });
//     // $("#" + id).timepicker("open");
// }










// $('#timepicker1')
// .timepicker( 
//     {timeFormat : "HH:mm ",
//     interval : 30,
//     minTime:'9',
//     maxTime:'19:30',
//     defaultTime:'13:00',
//     dynamic : false,
//     dropdown : true})  //stime 시작 기본 설정
// .on('changeTime', function() {                            //stime 을 선택한 후 동작
//     var from_time = $("input[name='timepicker1']").val();  //stime 값을 변수에 저장
//     $('#timepicker2').timepicker('option', 'minTime', from_time); //timepicker2의 mintime 지정
//     if ($('#timepicker2').val() && $('#timepicker2').val() < from_time) { 
//         $('#timepicker2').timepicker('setTime', from_time);
//         console.log($('#timepicker1').val())
//         console.log($('#timepicker2').val())
// //timepicker2을 먼저 선택한 경우 그리고 timepicker2시간이 stime시간보다 작은경우 timepicker2시간 변경
//     }	
// });
// $('#timepicker2').timepicker(
//     {timeFormat : "HH:mm ",
//     interval : 30,
//     minTime:'9',
//     maxTime:'19:30',
//     defaultTime:'13:00',
//     dynamic : false,
//     dropdown : true}
// ); //timepicker2 시간 기본 설정



// $('#stime')
//     .timepicker({timeFormat:'H:i', 'minTime':'06:00','maxTime': '23:00','scrollDefaultNow': true })  //stime 시작 기본 설정
//     .on('changeTime', function() {                            //stime 을 선택한 후 동작
//         var from_time = $("input[name='stime']").val();  //stime 값을 변수에 저장
//         $('#etime').timepicker('option', 'minTime', from_time); //etime의 mintime 지정
//         if ($('#etime').val() && $('#etime').val() < from_time) { 
//             $('#etime').timepicker('setTime', from_time);
// //etime을 먼저 선택한 경우 그리고 etime시간이 stime시간보다 작은경우 etime시간 변경
//         }	
//     });

// $('#etime').timepicker({timeFormat:'H:i','minTime':'06:00','maxTime': '23:00'}); //etime 시간 기본 설정