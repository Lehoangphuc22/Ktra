<?php require_once __DIR__ . '/../../controllers/AuthController.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Nhập</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <h2>Đăng Nhập</h2>
    <?php if (isset($error)): ?>
        <p style="color:red;"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>
    <form method="POST">
        <label>Mã Sinh Viên:</label>
        <input type="text" name="MaSV" required>
        <button type="submit">Đăng Nhập</button>
    </form>
</body>
</html>
