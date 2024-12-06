php
<?php
session_start(); // 세션 시작
include_once __DIR__ . '/db.php'; // 데이터베이스 연결 포함

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // 로그인 폼에서 POST 데이터 수신
    $member_id = $_POST['member_id'];
    $member_password = $_POST['member_password'];

    // 데이터베이스에서 사용자 정보 확인
    $query = "SELECT * FROM members WHERE member_id = :member_id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':member_id', $member_id);
//prepare(): SQL 쿼리를 준비
//bindParam(): SQL에 변수를 안전하게 바인딩
    $stmt->execute();
//execute(): 쿼리 실행
    $user = $stmt->fetch(PDO::FETCH_ASSOC); // 결과 가져오기
//fetch(PDO::FETCH_ASSOC): 결과를 연관 배열로 반환

    // 비밀번호 검증
    if ($user && password_verify($member_password, $user['member_password'])) {
        $_SESSION['member_id'] = $user['member_id']; // 세션에 사용자 ID 저장
        header("Location: /mypage.php"); // 로그인 성공 시 마이페이지로 이동
        exit;
    } else {
        // 로그인 실패 시 오류 메시지를 세션에 저장하고 로그인 페이지로 리디렉션
        $_SESSION['error_message'] = '아이디 또는 비밀번호가 잘못되었습니다.';
        header("Location: /login.php"); // 로그인 페이지로 리디렉션
        exit;
    }
}
?>
