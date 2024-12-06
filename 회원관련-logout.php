php
<?php
// 세션 시작 (현재 세션에 접근하기 위해 필요)
session_start();

// 세션 데이터 삭제 (현재 사용자와 관련된 모든 세션 데이터 제거)
session_destroy();

// 로그아웃 후 메시지 설정
$_SESSION['message'] = '로그아웃 되었습니다.';

// 메인 페이지(index.php)로 리다이렉트
header("Location: /index.php");

// PHP 스크립트 실행 종료 (리다이렉트 후 추가 코드 실행 방지)
exit;
?>
