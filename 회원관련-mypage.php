php
<?php
session_start(); // 세션 시작

include_once __DIR__ . '/header.php'; // 헤더(절대경로) 

// 세션에 로그인 정보가 없으면 로그인 페이지로 리디렉션
if (!isset($_SESSION['member_id'])) {
    header("Location: /login.php"); // 로그인 페이지로 리디렉션
    exit;
}

// 데이터베이스 연결
include_once __DIR__ . '/db.php';

// 로그인한 사용자의 ID를 세션에서 가져오기
$member_id = $_SESSION['member_id'];

// 데이터베이스에서 해당 사용자 정보 가져오기
$query = "SELECT * FROM members WHERE member_id = :member_id";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':member_id', $member_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC); // 사용자의 정보 가져오기

// 사용자가 없으면 로그인 페이지로 리디렉션
if (!$user) {
    header("Location: /login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <title>마이페이지</title>
</head>
<body>

<h1>마이페이지</h1>

<!-- 로그인한 사용자 정보 출력 -->
<p><strong>아이디:</strong> <?php echo htmlspecialchars($user['member_id']); ?></p>
<p><strong>이름:</strong> <?php echo htmlspecialchars($user['member_name']); ?></p>
<p><strong>전화번호:</strong> <?php echo htmlspecialchars($user['member_phone']); ?></p>
<p><strong>이메일:</strong> <?php echo htmlspecialchars($user['member_email']); ?></p>
<p><strong>주소:</strong> <?php echo htmlspecialchars($user['member_address']); ?></p>

<!-- 로그아웃 버튼 -->
<p>
<a href="/logout.php" onclick="return confirm('정말 로그아웃하시겠습니까?');"">로그아웃</a> |<!-- 로그아웃 처리 -->
<!-- 메인 버튼 -->
<a href="/index.php">메인</a>
</p>
<?php include_once __DIR__ . '/footer.php'; ?> // 푸터(절대경로)
</body>
</html>
