<?php require_once __DIR__ . '/../../controllers/DangKyController.php'; ?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Học Phần Đã Đăng Ký</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <h2>Danh Sách Học Phần Đã Đăng Ký</h2>

    <?php if (!empty($registeredCourses)): ?>
        <table border="1">
            <tr>
                <th>Mã HP</th>
                <th>Tên Học Phần</th>
                <th>Số Tín Chỉ</th>
                <th>Hành Động</th>
            </tr>
            <?php foreach ($registeredCourses as $course): ?>
                <tr>
                    <td><?= htmlspecialchars($course['MaHP']) ?></td>
                    <td><?= htmlspecialchars($course['TenHP']) ?></td>
                    <td><?= htmlspecialchars($course['SoTinChi']) ?></td>
                    <td>
                        <form method="POST">
                            <input type="hidden" name="maHP" value="<?= htmlspecialchars($course['MaHP']) ?>">
                            <button type="submit" name="deleteOne">Xóa</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

        <form method="POST" style="margin-top: 20px;">
            <button type="submit" name="deleteAll" onclick="return confirm('Bạn có chắc muốn xóa tất cả học phần?')">Xóa Tất Cả</button>
        </form>
    <?php else: ?>
        <p>Chưa đăng ký học phần nào.</p>
    <?php endif; ?>

    <p><a href="/views/hocphan/index.php">Quay lại đăng ký học phần</a></p>
</body>
</html>
