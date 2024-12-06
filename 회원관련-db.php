php
<?php
// 데이터베이스 연결 설정 (로컬 환경에 맞게 변경)
$host = 'localhost';            // 데이터베이스 서버 호스트
$dbname = 'database_name';      // 데이터베이스 이름
$username = 'root';             // 사용자명
$password = '';                 // 비밀번호 

// 데이터베이스 연결 생성 (PDO 방식)
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // PDO의 에러 처리 방식 설정
} catch (PDOException $e) {
    // 연결 실패 시 오류 메시지 출력 후 실행 종료
    die("DB연결 실패: " . $e->getMessage());
}

// 공통 함수: 로그인 상태 확인
function is_logged_in() {
    // 세션에 'member_id' 값이 설정되어 있으면 로그인 상태로 간주
    return isset($_SESSION['member_id']);
}
?>
