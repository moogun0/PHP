<?php
session_start(); // 세션 시작
include_once __DIR__ . '/header.php'; // 헤더(절대경로)
?>

<!-- 로그인 폼 -->
<h2>로그인</h2>

<?php
// 회원가입 성공 메시지 출력
if (isset($_SESSION['message'])) {
    echo '<p style="color: green;">' . $_SESSION['message'] . '</p>';
    unset($_SESSION['message']); // 메시지를 출력한 후 세션에서 제거
}
// 로그인 실패 시 메시지 출력
if (isset($_SESSION['error_message'])) {
    echo '<p style="color: red;">' . $_SESSION['error_message'] . '</p>';
    unset($_SESSION['error_message']); // 메시지를 출력한 후 세션에서 제거
}
?>

<form action="/login_process.php" method="POST">
    <label>아이디: <input type="text" name="member_id" required></label><br>
    <label>비밀번호: <input type="password" name="member_password" required></label><br>
    <button type="submit">로그인</button> <!-- 폼 제출 버튼 -->
</form>

<?php include_once __DIR__ . '/footer.php'; ?> // 푸터(절대경로)
