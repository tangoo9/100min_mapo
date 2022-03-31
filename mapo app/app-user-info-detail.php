<?php
//세션 체크 기능 모든 페이지에 추가 필요
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_check_app();
$o = "select * from order_info o 
left join member m on m.m_no = o.m_no
left join member_child mc on mc.mc_no = o.mc_no 
left join partner p on p.p_no = o.p_no
where o.o_no = '{$_GET[o_no]}' and o.m_no = '{$_SESSION[m_no]}'";

$o = sqlresult($o)[0];
$od = date("md", strtotime($_SESSION[order_time]));

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>돌봄이음</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/static-style.css">
    <link rel="stylesheet" href="css/app-user-info-detail.css">
    <link rel="stylesheet" href="css/app-user-footer.css">
    <script src="js/jquery-3.6.0.min.js"></script>
    <!-- datepicker -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script> 
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
    <!-- timepicker -->
    <link href="css/jquery.timepicker.css" rel="stylesheet">
    <script src="js/jquery.timepicker.js"></script> 
    <script src="js/datepicker.options.js"></script>
</head>
<body>
    <div id="container">
        <header>
            <button class="returnButton_cont" type ="button" onclick="location.href='/app/app-user-info-list'">
                <div class="returnButton_icon" >
                    <svg width="13" height="21" viewBox="0 0 13 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M0.778809 10.8916C0.778809 11.2847 0.924805 11.6216 1.23926 11.9136L9.97656 20.4712C10.2236 20.7183 10.5381 20.853 10.9087 20.853C11.6499 20.853 12.2451 20.269 12.2451 19.5166C12.2451 19.146 12.0879 18.8203 11.8408 18.562L3.96826 10.8916L11.8408 3.22119C12.0879 2.96289 12.2451 2.62598 12.2451 2.2666C12.2451 1.51416 11.6499 0.930176 10.9087 0.930176C10.5381 0.930176 10.2236 1.06494 9.97656 1.31201L1.23926 9.8584C0.924805 10.1616 0.778809 10.4985 0.778809 10.8916Z" fill="black"/>
                    </svg>
                </div>
                <p>돌아가기</p>    
            </button>
        </header>
        <main>
            <div class="mainContainer">
                <div class="title">
                    <h1 >주문 상세 리스트</h1>
                </div>
                <div class="boxContainer">
                    <?php
                    if($o[o_service] == '아동 돌봄'){
                        ?>
                        <p>아동명(주문번호)</p>
                        <input type="text" value="<?=$o[mc_name]?> (<?=$od?>-<?=$o[o_no]?>)" disabled>
                    <?php
                    }else{
                        if($o[o_normal_yn] == 'N'){
                            ?>
                            <p>성명(본인)</p>
                            <input type="text" value="<?=$o[m_name]?>" disabled>
                            <p>전화번호</p>
                            <input type="text" value="<?=$o[m_tel]?>" disabled>
                            <p>주소</p>
                            <input type="text" value="<?=$o[m_addr]?>" disabled>
                            <?php
                        }
                        else{?>
                            <p>성명(의뢰인)</p>
                            <input type="text" value="<?=$o[o_normal_name]?>(<?=$o[m_name]?>)" disabled>
                            <p>전화번호(의뢰인전화번호)</p>
                            <input type="text" value="<?=$o[o_normal_tel]?>(<?=$o[m_tel]?>)" disabled>
                            <p>주소</p>
                            <input type="text" value="<?=$o[o_normal_addr1]." ".$o[o_normal_addr2]?>" disabled>
                            <?php
                        }
                    }
                    ?>

                    <p>서비스명</p>
                    <input type="text" value="<?=$o[o_service]?>" disabled>
                    <p>상세서비스</p>
                    <input type="text" value="<?=$o[o_service_detail]?>" disabled>
                    <?php
                    if($o[o_service] == '아동 돌봄'){
                        ?>
                        <p>예약기간</p>
                        <input type="text" value="<?=date("Y-m-d",strtotime($o[o_start_time]))?><?=($o[o_service_detail] !="정기")?" ~ ".date("Y-m-d",strtotime($o[o_end_time])):" 시작"?>">
                        <p>예약시간</p>
                        <?php
                        if($o[o_d1] == 'Y')
                            echo "<input type=\"text\" value=\"월요일 : $o[o_d1_start] ~ $o[o_d1_end]\")>";
                        if($o[o_d2] == 'Y')
                            echo "<input type=\"text\" value=\"화요일 : $o[o_d2_start] ~ $o[o_d2_end]\")>";
                        if($o[o_d3] == 'Y')
                            echo "<input type=\"text\" value=\"수요일 : $o[o_d3_start] ~ $o[o_d3_end]\")>";
                        if($o[o_d4] == 'Y')
                            echo "<input type=\"text\" value=\"목요일 : $o[o_d4_start] ~ $o[o_d4_end]\")>";
                        if($o[o_d5] == 'Y')
                            echo "<input type=\"text\" value=\"금요일 : $o[o_d5_start] ~ $o[o_d5_end]\")>";
                        ?>
                        <p>간식 요청</p>
                            <input type="text" value="<?=($o[o_snack] == 'Y')?"간식요청 {$o[o_snack_info]}":"선택안함"?>" disabled>
                        <?php               
                    }else{
                        ?>
                        <p>예약시간</p>
                        <input type="text" value="<?=$o[o_start_time]?>" disabled>
                        <?php
                    }
                    ?>
                    
                    <p>서비스 제공자</p>
                    <input type="text" value="<?=$o[p_name]?><?=($o[p_tel] != "")?"({$o[p_tel]})":"업체 할당 전"?>" disabled>

                    <p>서비스 상태</p>
                    <input type="text" value="<?=$o[o_status]?>" disabled>

                    <p>기타</p>
                    <input type="text" value="<?=$o[o_comment]?> <?=$o[o_textarea]?>" disabled>
                    <?php
                    if($o[o_status] != '취소' && $o[o_status] != '완료' &&  $o[o_status] != '제공완료'){
                        ?>
                        <div class="selectBox">
                           <button class="btn btn-primary change" type="button">시간변경하기</button>
                            <button class="btn btn-light cancel" type="button">취소하기</button>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
            <!-- Layer popup app-user-info-detail-change -->
            <div class="app-user-info-detail-change">
                <div class="layer_popup_cont">
                    <div class="popup_title">
                        <h1>시간 변경하기</h1>
                    </div>
                    <form action="app-user-order-child-register" method="POST" name="select_time">
                        <input type="hidden" name="no" value="<?=$o[o_no]?>">
                        <input type="hidden" name="o_service_detail" value="<?=$o[o_service_detail]?>">
                        <input type="hidden" name="method" value="change_time">
                        <ul class="list-group">
                            <div class="care_date_container">
                                <!-- <p>돌봄날짜 선택</p> -->
                                <section class="calendar_container">
                                    <?php
                                    if($o[o_service_detail] == '시간제'){
                                        ?>
                                    <div class="date_wrapper">
                                        <div class="guide_text">
                                            <p>시작일</p>
                                        </div>
                                        <div class="care_calendar">
                                            <!-- <i class="far fa-calendar-alt"></i> -->
                                            <label>
                                                <input class="datepicker" type="text" placeholder="" id="datepicker1" value="<?=date("Y-m-d",strtotime($o[o_start_time]))?>" name="start_day" inputmode="none" autocomplete="off">
                                            </label>
                                        </div>
                                    </div>
                                    <div class="date_wrapper">
                                        <div class="guide_text">
                                            <p>종료일</p>
                                        </div>
                                        <div class="care_calendar">
                                            <!-- <i class="far fa-calendar-alt"></i> -->
                                            <label>
                                                <input class="datepicker" type="text" placeholder="" id="datepicker2" value="<?=date("Y-m-d",strtotime($o[o_end_time]))?>" name="end_day" inputmode="none" autocomplete="off">
                                            </label>
                                        </div>
                                    </div>
                                    <?php
                                    }else{
                                        ?>
                                        <div class="date_wrapper">
                                            <div class="guide_text">
                                                <p>시작일</p>
                                            </div>
                                            <div class="care_calendar">
                                                <!-- <i class="far fa-calendar-alt"></i> -->
                                                <label>
                                                    <input class="datepicker" type="text" placeholder="" id="datepicker1"  value="<?=date("Y-m-d",strtotime($o[o_start_time]))?>" name="start_day" inputmode="none" autocomplete="off">
                                                </label>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </section>
                                <?php 
                                if($o[o_service] == '아동 돌봄'){
                                ?>
                                <input type="hidden" id="dateCheck" value="">
                                <section class="time_container">
                                    <label for="mon_day">
                                        <input type="checkbox" id="mon_day" name="o_d1" <?=($o[o_d1]=='Y')?"checked":""?>>
                                        <i class="circle"></i>
                                        <span class="check_text left">월</span>
                                        <input id="timepicker1" class="timepicker" name="o_d1_start"  inputmode="none" placeholder="" autocomplete="off" readonly value="<?=$o[o_d1_start]?>"/>
                                        ~
                                        <input id="timepicker2" class="timepicker" name="o_d1_end"  inputmode="none" autocomplete="off" value="<?=$o[o_d1_end]?>" readonly/>
                                    </label>
                                    <label for="tue_day">
                                        <input type="checkbox" id="tue_day" name="o_d2" <?=($o[o_d2]=='Y')?"checked":""?>>
                                        <i class="circle"></i>
                                        <span class="check_text left">화</span>
                                        <input id="timepicker3" class="timepicker" name="o_d2_start"  inputmode="none" autocomplete="off"  value="<?=$o[o_d2_start]?>" readonly />
                                        ~
                                        <input id="timepicker4" class="timepicker" name="o_d2_end"  inputmode="none" autocomplete="off"  value="<?=$o[o_d2_end]?>" readonly />
                                    </label>
                                    <label for="wed_day">
                                        <input type="checkbox" id="wed_day" name="o_d3" <?=($o[o_d3]=='Y')?"checked":""?>>
                                        <i class="circle"></i>
                                        <span class="check_text left">수</span>
                                        <input id="timepicker5" class="timepicker" name="o_d3_start"  inputmode="none" autocomplete="off" value="<?=$o[o_d3_start]?>" readonly />
                                        ~
                                        <input id="timepicker6" class="timepicker" name="o_d3_end"  inputmode="none" autocomplete="off"  value="<?=$o[o_d3_end]?>" readonly />
                                    </label>
                                    <label for="thu_day">
                                        <input type="checkbox" id="thu_day" name="o_d4" <?=($o[o_d4]=='Y')?"checked":""?>>
                                        <i class="circle"></i>
                                        <span class="check_text left">목</span>
                                        <input id="timepicker7" class="timepicker" name="o_d4_start"  inputmode="none" autocomplete="off" value="<?=$o[o_d4_start]?>" readonly />
                                        ~
                                        <input id="timepicker8" class="timepicker" name="o_d4_end"  inputmode="none" autocomplete="off" value="<?=$o[o_d4_end]?>" readonly />
                                    </label>
                                    <label for="fri_day">
                                        <input type="checkbox" id="fri_day" name="o_d5" <?=($o[o_d5]=='Y')?"checked":""?>>
                                        <i class="circle"></i>
                                        <span class="check_text left">금</span>
                                        <input id="timepicker9" class="timepicker" name="o_d5_start"  inputmode="none" autocomplete="off" value="<?=$o[o_d5_start]?>" readonly />
                                        ~
                                        <input id="timepicker10" class="timepicker" name="o_d5_end" inputmode="none" autocomplete="off"  value="<?=$o[o_d5_end]?>" readonly />
                                    </label>
                                </section>
                                <?php
                                }
                                ?>
                                <section class="calendar_container last_box">
                                    <div class="date_wrapper">
                                        <div class="guide_text etc">
                                            <p class="txt">비고</p>
                                        </div>
                                            <!-- <input type="text" class="input" value="<?=$o[o_comment]?>" id=""  name="o_comment" autocomplete="off"> -->
                                            <input type="text" class="input" value="<?=$o[o_textarea]?>" id="" name="o_textarea" autocomplete="off">
                                    </div>
                                </section>
                            </div>
                        </ul>
                        <div class="selectBox">
                            <button type="submit" id="submitBtn" class="btn btn-primary btn-sm change" >변경하기</button>
                            <button type="button" class="goBack btn btn-light btn-sm">돌아가기</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Layer popup app-user-info-detail-cancel -->
            <div class="app-user-info-detail-cancel">
                <div class="layer_popup_cont">
                    <div class="popup_title">
                        <h1>신청내역 취소</h1>
                    </div>
                    <script>
                        function cancel_order() {
                            var request = $.ajax({
                                type: "POST",
                                url: "/api/app_child",
                                data: {
                                    method: 'cancel',
                                    reason: $('#reason').val(),
                                    cmt: $('#cancel_comment').val(),
                                    o_no: '<?=$o[o_no]?>'
                                },
                                success: function (data) {
                                    alert(data);
                                    // location.href='app-user-info-detail?o_no=<?=$o[o_no]?>';
                                    location.href='app-user-info-list';
                                }
                            });
                        }
                    </script>
                        <select name="reason" id="reason" class="form-select" aria-label="Default select example">
                            <option selected disabled>취소 사유 선택</option>
                            <option value="필요가 없어요">필요가 없어요</option>
                            <option value="실수로 예약했어요">실수로 예약했어요</option>
                            <option value="갑자기 아파요">갑자기 아파요</option>
                            <option value="날씨가 안 좋아서요">날씨가 안 좋아서요</option>
                            <option value="운영정책이 마음에 들지 않아요">운영정책이 마음에 들지 않아요</option>
                            <option value="서비스 품질이 마음에 들지 않아요">서비스 품질이 마음에 들지 않아요</option>
                            <option value="가격이 맞지 않아요">가격이 맞지 않아요</option>
                            <option value="기타">기타</option>
                        </select> 
                        <div class="input_box_etc">
                            <input name="cancel_comment" id="cancel_comment" placeholder="취소사유를 입력해 주세요.">
                        </div>
                        <div class="selectBox">
                        <button type="button" class="btn btn-primary btn-sm change" onclick="cancel_order();">신청취소</button>
                        <button type="button" class="goBackc btn btn-light btn-sm">돌아가기</button>
                    </div>
                </div>
            </div>
        </main>
    <!-- footer-->
    <footer>
        <nav id ="navBar">
            <div class="navButton" onclick="location.href='app-user-main'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M2 13L11.293 3.707C11.6835 3.31662 12.3165 3.31662 12.707 3.707L22 13H20V21C20 21.5523 19.5523 22 19 22H14V15H10V22H5C4.44772 22 4 21.5523 4 21V13H2Z" fill="#2E3A59"/>
                </svg>
                <span>홈</span>   
            </div>
            <div class="navButton" onclick="location.href='app-user-biz'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 19H13V13H19V19ZM11 19H5V13H11V19ZM19 11H13V5H19V11ZM11 11H5V5H11V11Z" fill="#2E3A59"/>
                </svg>
                <span>사업소개</span>    
            </div>
            <div class="navButton" class="box" onclick="location.href='app-user-order'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M19 22H5C3.89543 22 3 21.1046 3 20V6C3 4.89543 3.89543 4 5 4H7V2H9V4H15V2H17V4H19C20.1046 4 21 4.89543 21 6V20C21 21.1046 20.1046 22 19 22ZM5 10V20H19V10H5ZM5 6V8H19V6H5ZM13 18H11V16H9V14H11V12H13V14H15V16H13V18Z" fill="#2E3A59"/>
                </svg>
                <span>돌봄신청</span>    
            </div>
            <div class="navButton" class="box" onclick="location.href='app-user-info'">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 22C10.4881 22.0043 8.99522 21.6622 7.636 21C7.13855 20.758 6.66193 20.4754 6.211 20.155L6.074 20.055C4.83382 19.1396 3.81987 17.9522 3.11 16.584C2.37574 15.1679 1.99491 13.5952 1.99995 12C1.99995 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22.005 13.5944 21.6246 15.1664 20.891 16.582C20.1821 17.9494 19.1696 19.1364 17.931 20.052C17.4638 20.394 16.9679 20.6951 16.449 20.952L16.369 20.992C15.0089 21.6577 13.5143 22.0026 12 22ZM12 17C10.5015 16.9971 9.12766 17.834 8.443 19.167C10.6844 20.2772 13.3156 20.2772 15.557 19.167V19.162C14.8715 17.8305 13.4976 16.9954 12 17ZM12 15C14.1661 15.0028 16.1634 16.1701 17.229 18.056L17.244 18.043L17.258 18.031L17.241 18.046L17.231 18.054C19.76 15.8691 20.6643 12.3423 19.4986 9.21011C18.333 6.07788 15.3431 4.00032 12.001 4.00032C8.65891 4.00032 5.66899 6.07788 4.50335 9.21011C3.33771 12.3423 4.242 15.8691 6.771 18.054C7.83726 16.169 9.83436 15.0026 12 15ZM12 14C9.79086 14 8 12.2091 8 10C8 7.79086 9.79086 6 12 6C14.2091 6 16 7.79086 16 10C16 11.0609 15.5786 12.0783 14.8284 12.8284C14.0783 13.5786 13.0609 14 12 14ZM12 8C10.8954 8 10 8.89543 10 10C10 11.1046 10.8954 12 12 12C13.1046 12 14 11.1046 14 10C14 8.89543 13.1046 8 12 8Z" fill="#2E3A59"/>
                </svg>
                <span>내정보</span>    
            </div>
        </nav>
    </footer>
    </div>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/app-user-detail.js"></script>
    <script src="js/date.change.validation.js"></script>
</body>
</html>