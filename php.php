
<?php

mysql_connect-

php 는 page 종료가 될때 GC(gabage collector)에 의해서 모든 reousrce를 반환하도록 되어 있습니다. 즉 mysql open은 page가 종료되는 시점에서 자동으로 close가 됩니다.

그럼 왜 close를 해야 하느냐에 대한 의문이 남을 수 있는데

1. connection을 끊고 다른 connection을 사용하고 싶을 때
2. 시간이 긴 page 처리에서, db connection 이 전반부에서만 사용될 때의 resource 중복 낭비를 위해서..

처리하는 page의 속도가 아주 빠르다거나, 또는 resource 사용량이 많지 않다면 굳이 close를 하지 않아도 상관은 없습니다만, 이건 일반적인 견해이고, logic에 따라 close를 해 주시는 것이 더 효율적일 수 있습니다.
 다만 이 효율이라는 것이 resource 관점일 뿐, 다른 비용을 추가했을 경우에는 close에 신경을 쓰는 것이 더 비효율적일 수도 있습니다. :-)




 extract 함수-

 extract함수에 인자 $_GET $_POST  등을 넣으면 해당 type의 파라미터와 값을 변수와 그 초기값으로 설정할 수 있다.
 
 ex )
     $before = 'testMSG'; 
     extract($_GET);
     $After = 'testMSG!';
 
 
 여기서 before 함수는 extract 전에 선언된 변수로  보안에 취약하다. 서버 변수 및 환경변수등을 포함해 이미 정의되어 있는 변수를 덮어버릴수 있게 되버린다.
 
 해결법으로 
 1.extract함수 선언 후 변수 생성 
 2.EXTR_SKIP >> 충돌이 발생하면, 기존 변수를 덮어쓰지 않는다.  
 
 


 //Include File confirm -----------------------------------

$included_files = get_included_files();
echo "현재페이지 인클루드된 파일리스트:";    
foreach ($included_files as $filename) :         
    echo $filename;    
endforeach;

//---------------------------------------------------------

//session -------------------------------------------------
PHP에서 세션에 고유한 세션 ID가 부여되며 이 부여된 ID는 무작위 숫자이다. 세션 ID는 웹서버에 의해 생성되며 설정한 세션 기간동안 사용자쪽에 저장된다.
세션ID는 세션 변수라 불리는 특별한 변수를 등록하는데 키처럼 쓰인다.
세션ID는 클라이언트 쪽에서 알수 있는 유일한 정보이며 웹서버에서는 클라이언트로부터 세션ID를 받아 세션 변수에 저장된 내용을 다룰수 있다. 그리고 이 세션 변수는 서버에서 파일형태로 저장된다.

ession_get_cookie_params()는 세션관리에 사용되는 쿠키의 내용들을 보는데 사용할 수 있다.

세션의 흐름

 session_start();  - 1 

 $_SESSION['mysession'] = value;   -  2 

 unset ( $_SESSION['mysession'] ); -3

 session_destroy(); -4

 1. 세션을 사용하기위해 session_start() 함수를 호출한다
 2. 세션ID가 mysession 인 변수 생성 및 값 저장  [이떄 세션 변수는 $_SESSION 이라는 전역 배열에 저장됨 .] 해당 세션은 세션이끝날떄까지 유지된다.
 3. 세션ID가 mysession 인 변수를 $_SSESION 전역 배열에서 삭제한다.
 4. 세션ID 삭제

//---------------------------------------------------------
