php
<?php
session_start(); // 세션 시작: 로그인 상태를 관리하기 위해 사용
include_once __DIR__ . '/db.php'; // 데이터베이스 연결 포함
include_once __DIR__ . '/header.php'; // 헤더(절대경로)

// 로그아웃 후 메시지 출력
if (isset($_SESSION['message'])) {
    echo '<p style="color: green;">' . $_SESSION['message'] . '</p>';
    unset($_SESSION['message']); // 메시지를 출력한 후 세션에서 제거
}
?>

<!-- 메인 페이지 콘텐츠 -->
<h1>환영합니다!</h1>

<?php if (is_logged_in()): ?>
    <!-- 로그인 상태인 경우 -->
    <p>
        <a href="/mypage.php">마이페이지</a> | <!-- 마이페이지로 이동 -->
        <a href="/logout.php" onclick="return confirm('정말 로그아웃하시겠습니까?');"">로그아웃</a> <!-- 로그아웃 처리 -->
    </p>
<?php else: ?>
    <!-- 로그아웃 상태인 경우 -->
    <p>
        <a href="/join.php">회원가입</a> | <!-- 회원가입 페이지로 이동 -->
        <a href="/login.php">로그인</a> <!-- 로그인 페이지로 이동 -->
    </p>
<?php endif; ?>

<?php include_once __DIR__ . '/footer.php'; ?> // 푸터(절대경로)
