/*
    -- app-user-order-child-order-step1-add.html 
        select 년도 받아오는 기능
*/ 

var start_year= new Date().getFullYear();// 시작할 년도 
var index=0;    


for(var y=start_year; y>='2010'; y--){
    //start_year ~ 현재 년도 
    document.getElementById('select_year').options[index] = new Option(y, y); index++;
} 

index=0; 
for(var m=1; m<=12; m++){
    document.getElementById('select_month').options[index] = new Option(m, m); index++; 
} 
lastday();

function lastday(){ //년과 월에 따라 마지막 일 구하기 
var Year=document.getElementById('select_year').value; 
var Month=document.getElementById('select_month').value; 
var day=new Date(new Date(Year,Month,1)-86400000).getDate(); /* = new Date(new Date(Year,Month,0)).getDate(); */
var dayindex_len=document.getElementById('select_day').length;

    if(day>dayindex_len){
        for(var i=(dayindex_len+1); i<=day; i++){
            document.getElementById('select_day').options[i-1] = new Option(i, i); 
            }
    }else if(day<dayindex_len){
        for(var i=dayindex_len; i>=day; i--){ 
            document.getElementById('select_day').options[i]=null; 
            } 
    } 
}



// == 키입력 제한
function fnChkByte(obj, maxByte)
{
        var str = obj.value;
        var str_len = str.length;
        
        var rbyte = 0;
        var rlen = 0;
        var one_char = "";
        var str2 = "";
        for(var i=0; i<str_len; i++)
        {
            one_char = str.charAt(i);
            if(escape(one_char).length > 4) {
                rbyte += 2;                                         //한글2Byte
            }else{
                rbyte++;                                            //영문 등 나머지 1Byte
            }
            if(rbyte <= maxByte){
                rlen = i+1;                                          //return할 문자열 갯수
            }
        }
        if(rbyte > maxByte)
        {
            // alert("한글 "+(maxByte/2)+"자 / 영문 "+maxByte+"자를 초과 입력할 수 없습니다.");
            alert("요청사항은 " + maxByte + "자 이내로 작성해주세요.")
            str2 = str.substr(0,rlen);                                  //문자열 자르기
            obj.value = str2;
            fnChkByte(obj, maxByte);
        }
        else
        {
            document.getElementById('byteInfo').innerText = rbyte;
        }
}
