php
<?php
session_start(); // 세션 시작
include_once __DIR__ . '/db.php'; // 데이터베이스 연결 포함

if ($_SERVER['REQUEST_METHOD'] === 'POST') { // POST 요청인지 확인
    // 폼 데이터를 변수에 저장
    $member_id = $_POST['member_id'];
    $member_password = password_hash($_POST['member_password'], PASSWORD_BCRYPT); // 비밀번호 암호화
    $member_name = $_POST['member_name'];
    $member_phone = $_POST['member_phone'];
    $member_email = $_POST['member_email'];
    $member_address = $_POST['member_address'];

    // 데이터베이스에 회원 정보 저장
    $query = "INSERT INTO members (member_id, member_password, member_name, member_phone, member_email, member_address)
              VALUES (:member_id, :member_password, :member_name, :member_phone, :member_email, :member_address)";
    $stmt = $pdo->prepare($query); // SQL 준비
    $stmt->bindParam(':member_id', $member_id);
    $stmt->bindParam(':member_password', $member_password);
    $stmt->bindParam(':member_name', $member_name);
    $stmt->bindParam(':member_phone', $member_phone);
    $stmt->bindParam(':member_email', $member_email);
    $stmt->bindParam(':member_address', $member_address);

    // 실행 결과 확인
    if ($stmt->execute()) {
        $_SESSION['message'] = '회원가입 성공! 로그인 페이지로 이동합니다.';
        header("Location: /login.php"); // 성공 시 로그인 페이지로 리디렉션
        exit;
    } else {
        $_SESSION['error_message'] = '회원가입 실패! 다시 시도해 주세요.'; // 실패 메시지 세션에 저장
        header("Location: /join.php"); // 실패 시 회원가입 페이지로 리디렉션
        exit;
    }
}
?>
