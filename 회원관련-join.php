php
<?php
session_start(); // 세션 시작
include_once __DIR__ . '/header.php'; // 헤더(절대경로)

// 회원가입 실패 시 오류 메시지 출력
if (isset($_SESSION['error_message'])) {
    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
    unset($_SESSION['error_message']); // 메시지를 출력한 후 세션에서 제거
}
?>

<!-- 회원가입 폼 -->
<h2>회원가입</h2>
<form action="/join_process.php" method="POST">
    <!-- 각 입력 필드에 required로 필수 입력 지정 -->
    <label>아이디: <input type="text" name="member_id" required></label><br>
    <label>비밀번호: <input type="password" name="member_password" required></label><br>
    <label>이름: <input type="text" name="member_name" required></label><br>
    <label>휴대폰 번호: <input type="text" name="member_phone" required></label><br>
    <label>이메일: <input type="email" name="member_email" required></label><br>
    <label>주소: <input type="text" name="member_address" required></label><br>
    <button type="submit">가입하기</button> <!-- 폼 제출 버튼 -->
</form>

<?php include_once __DIR__ . '/footer.php'; ?> // 푸터(절대경로)
