window.onload = function(){
    // 시간변경 불러올때 disabled 추가
    console.log('onload 완료.')
    let chk = $("#mon_day").is(':checked')
    let chk2 = $("#tue_day").is(':checked')
    let chk3 = $("#wed_day").is(':checked')
    let chk4 = $("#thu_day").is(':checked')
    let chk5 = $("#fri_day").is(':checked')    
    // console.log("체크박스확인" +chk)
    // console.log("체크박스확인" +chk2)
    // console.log("체크박스확인" +chk3)
    if(chk == 0){
        $('#timepicker1, #timepicker2').attr("disabled", true)
    }
    if(chk2 == 0){
        $('#timepicker3, #timepicker4').attr("disabled", true)
    }
    if(chk3 == 0){
        $('#timepicker5, #timepicker6').attr("disabled", true)
    }
    if(chk4 == 0){
        $('#timepicker7, #timepicker8').attr("disabled", true)
    }
    if(chk5 == 0){
        $('#timepicker9, #timepicker10').attr("disabled", true)
    }
}

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
    $("#datepicker1").change(function(){
        if($("#datepicker2").val() != ""){
            if($("#datepicker1").val() > $("#datepicker2").val()){
                alert("날짜 선택이 올바르지 않습니다. \r\n다시 선택해 주세요.")
                $("#datepicker2").val('')
            }
        }
    })

//  == Timepicker Option Start ==============================
$("#mon_day").change(function(){
        let chk = $("#mon_day").is(':checked')
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
        minTime:'09:30',
        maxTime:'20:00',
        dynamic : false,
        dropdown : true,
    change: function(time) {
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


$("#tue_day").change(function(){
        let chk = $("#tue_day").is(':checked')
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
        minTime:'09:30',
        maxTime:'20:00',
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

$("#wed_day").change(function(){
        let chk = $("#wed_day").is(':checked')
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
        minTime:'09:30',
        maxTime:'20:00',
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

$("#thu_day").change(function(){
        let chk = $("#thu_day").is(':checked')
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
        minTime:'09:30',
        maxTime:'20:00',
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

$("#fri_day").change(function(){
        let chk = $("#fri_day").is(':checked')
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
        minTime:'09:30',
        maxTime:'20:00',
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
        if($("#datepicker1").val() =="" || $("#datepicker2").val() ==""){
            alert('날짜를 선택해주세요.')
            return false
        }else if(
                ($('#dateCheck').val() =="") &&
                (
                    (
                        ($("#mon_day").is(':checked')) ||
                        ($("#tue_day").is(':checked')) ||
                        ($("#wed_day").is(':checked')) ||
                        ($("#thu_day").is(':checked')) ||
                        ($("#fri_day").is(':checked'))
                    )  == false
                ) 
            ){
            alert("요일을 하나 이상 지정해 주세요.")
            return false;
        }else if(
                ($("#mon_day").is(':checked')) ||
                ($("#tue_day").is(':checked')) ||
                ($("#wed_day").is(':checked')) ||
                ($("#thu_day").is(':checked')) ||
                ($("#fri_day").is(':checked')) != false
                ){
                    if((($("#mon_day").is(':checked')) == true) && (($("#timepicker1").val() || $("#timepicker2").val()) == "")){
                    alert("[월요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("#tue_day").is(':checked')) == true) && (($("#timepicker3").val() || $("#timepicker4").val()) == "")){
                    alert("[화요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("#wed_day").is(':checked')) == true) && (($("#timepicker5").val() || $("#timepicker6").val()) == "")){
                    alert("[수요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("#thu_day").is(':checked')) == true) && (($("#timepicker7").val() || $("#timepicker8").val()) == "")){
                    alert("[목요일] 시간을 지정해주세요.")
                    return false;
                    }
                    if((($("#fri_day").is(':checked')) == true) && (($("#timepicker9").val() || $("#timepicker10").val()) == "")){
                        alert("[금요일] 시간을 지정해주세요.")
                        return false;
                    }
        }else{
            return true;
        }

    })
//  == Timepicker Option END ==============================
})