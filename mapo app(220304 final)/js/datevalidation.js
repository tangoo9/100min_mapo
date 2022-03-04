$(document).ready(function(){
    $("#datepicker2").change(function(){
        if($("#datepicker1").val() ==""){
            alert("시작일을 먼저 입력해주세요.")
            $("#datepicker2").val('')
            // $("#datepicker1").focus()
        }
        if($("#datepicker1").val() > $("#datepicker2").val()){
            alert("날짜 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#datepicker2").val('')
        }
    })

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
//     $("#" + id).timepicker("open");
// }    
//  == Timepicker Option Start ==============================
$("input[name='mon_day']").change(function(){
        let chk = $("input[name='mon_day']").is(':checked')
        if(chk==1){
            $('#timepicker1, #timepicker2').attr("disabled", false)
            console.log("monday checked " + chk)
        }else if(chk==0){
            $('#timepicker1, #timepicker2').attr("disabled", true)
            $('#timepicker1, #timepicker2').val("")
            console.log("monday checked " + chk)
        }
    })

$('#timepicker1').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        // the input field
        console.log(this.val())
        if($("#timepicker2").val() != false){
            if($("#timepicker1").val() >= $("#timepicker2").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker1").val('')
            }
        }
    }
});

$('#timepicker2').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        // the input field
        // var element = $(this), text;
        // get access to this Timepicker instance
        // var timepicker = element.timepicker();
        // text = 'Selected time is: ' + timepicker.format(time);
        // element.siblings('span.help-line').text(text);
        if($('#timepicker1').val()==""){
            alert("시작시간을 먼저 입력해주세요.")
            $("#timepicker2").val('')
        }
        if($("#timepicker1").val() >= $("#timepicker2").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker2").val('')
        }
    }
});


$("input[name='tue_day']").change(function(){
        let chk = $("input[name='tue_day']").is(':checked')
        if(chk==1){
            $('#timepicker3, #timepicker4').attr("disabled", false)
            console.log("tuesday checked " + chk)
        }else if(chk==0){
            $('#timepicker3, #timepicker4').attr("disabled", true)
            $('#timepicker3, #timepicker4').val("")
            console.log("tuesday checked " + chk)
        }
    })
$('#timepicker3').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($("#timepicker4").val() != false){
            if($("#timepicker3").val() >= $("#timepicker4").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker3").val('')
            }
        }
    }
});
$('#timepicker4').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($('#timepicker3').val()==""){
            alert("시작시간을 먼저 입력해주세요.")
            $("#timepicker4").val('')
        }
        if($("#timepicker3").val() >= $("#timepicker4").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker4").val('')
        }
    }
});

$("input[name='wed_day']").change(function(){
        let chk = $("input[name='wed_day']").is(':checked')
        if(chk==1){
            $('#timepicker5, #timepicker6').attr("disabled", false)
            console.log("wed_day checked " + chk)
        }else if(chk==0){
            $('#timepicker5, #timepicker6').attr("disabled", true)
            $('#timepicker5, #timepicker6').val("")
            console.log("wed_day checked " + chk)
        }
    })
$('#timepicker5').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($("#timepicker6").val() != false){
            if($("#timepicker5").val() >= $("#timepicker6").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker5").val('')
            }
        }
    }
});

$('#timepicker6').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($('#timepicker5').val()==""){
            alert("시작시간을 먼저 입력해주세요.")
            $("#timepicker6").val('')
        }
        if($("#timepicker5").val() >= $("#timepicker6").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker6").val('')
        }
    }
});

$("input[name='thu_day']").change(function(){
        let chk = $("input[name='thu_day']").is(':checked')
        if(chk==1){
            $('#timepicker7, #timepicker8').attr("disabled", false)
            console.log("thu_day checked " + chk)
        }else if(chk==0){
            $('#timepicker7, #timepicker8').attr("disabled", true)
            $('#timepicker7, #timepicker8').val("")
            console.log("thu_day checked " + chk)
        }
    })
$('#timepicker7').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($("#timepicker8").val() != false){
            if($("#timepicker7").val() >= $("#timepicker8").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker7").val('')
            }
        }
    }
});

$('#timepicker8').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($('#timepicker7').val()==""){
            alert("시작시간을 먼저 입력해주세요.")
            $("#timepicker8").val('')
        }
        if($("#timepicker7").val() >= $("#timepicker8").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker8").val('')
        }
    }
});

$("input[name='fri_day']").change(function(){
        let chk = $("input[name='fri_day']").is(':checked')
        if(chk==1){
            $('#timepicker9, #timepicker10').attr("disabled", false)
            console.log("fri_day checked " + chk)
        }else if(chk==0){
            $('#timepicker9, #timepicker10').attr("disabled", true)
            $('#timepicker9, #timepicker10').val("")
            console.log("fri_day checked " + chk)
        }
    })
$('#timepicker9').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($("#timepicker10").val() != false){
            if($("#timepicker9").val() >= $("#timepicker10").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker9").val('')
            }
        }
    }
});
$('#timepicker10').timepicker({
    timeFormat : "HH:mm ",
        interval : 30,
        minTime:'9',
        maxTime:'19:30',
        // defaultTime:'13:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
        if($('#timepicker9').val()==""){
            alert("시작시간을 먼저 입력해주세요.")
            $("#timepicker10").val('')
        }
        if($("#timepicker9").val() >= $("#timepicker10").val()){
            alert("시간 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
            $("#timepicker10").val('')
        }
    }
});

    $('#submitBtn').click(function(){
        function timeCheck(){

        }
        if($("#datepicker1").val() =="" || $("#datepicker2").val() ==""){
            alert('날짜를 선택해주세요.')
            return false
        }else if(
            (
                ($("input[name='mon_day']").is(':checked')) ||
                ($("input[name='tue_day']").is(':checked')) ||
                ($("input[name='wed_day']").is(':checked')) ||
                ($("input[name='thu_day']").is(':checked')) ||
                ($("input[name='fri_day']").is(':checked'))
            ) == false
            ){
            alert("요일을 하나 이상 지정해 주세요.")
            return false;
        }else if(
                ($("input[name='mon_day']").is(':checked')) ||
                ($("input[name='tue_day']").is(':checked')) ||
                ($("input[name='wed_day']").is(':checked')) ||
                ($("input[name='thu_day']").is(':checked')) ||
                ($("input[name='fri_day']").is(':checked')) != false
                ){
                    if((($("input[name='mon_day']").is(':checked')) == true) && (($("#timepicker1").val() || $("#timepicker2").val()) == "")){
                    alert("[월요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("input[name='tue_day']").is(':checked')) == true) && (($("#timepicker3").val() || $("#timepicker4").val()) == "")){
                    alert("[화요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("input[name='wed_day']").is(':checked')) == true) && (($("#timepicker5").val() || $("#timepicker6").val()) == "")){
                    alert("[수요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("input[name='thu_day']").is(':checked')) == true) && (($("#timepicker7").val() || $("#timepicker8").val()) == "")){
                    alert("[목요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("input[name='fri_day']").is(':checked')) == true) && (($("#timepicker9").val() || $("#timepicker10").val()) == "")){
                        alert("[금요일] 시간을 지정해주세요.")
                        return false;
                    }
        }else{
            return true;
        }
    })
//  == Timepicker Option END ==============================
})