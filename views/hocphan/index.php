<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Ký Học Phần</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>
    <h2>Đăng Ký Học Phần</h2>

    <?php if (!empty($_GET['message'])): ?>
        <p style="color: <?= ($_GET['message'] == 'Đăng ký thành công!') ? 'green' : 'red' ?>;">
            <?= htmlspecialchars($_GET['message']) ?>
        </p>
    <?php endif; ?>

    <table border="1">
        <thead>
            <tr>
                <th>Mã HP</th>
                <th>Tên Học Phần</th>
                <th>Số Chỉ Chỉ</th>
                <th>Số lượng dự kiến</th>
                <th>Đăng Ký</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($hocphans as $hp): ?>
                <tr>
                    <td><?= $hp['MaHP'] ?></td>
                    <td><?= $hp['TenHocPhan'] ?></td>
                    <td><?= $hp['SoChi'] ?></td>
                    <td style="color: <?= ($hp['SoLuongDuKien'] == 0) ? 'red' : 'black' ?>">
                        <?= $hp['SoLuongDuKien'] ?>
                    </td>
                    <td>
                        <?php if ($hp['SoLuongDuKien'] > 0): ?>
                            <form method="POST" action="HocPhanController.php">
                                <input type="hidden" name="MaSV" value="123456789"> <!-- Mã SV tạm -->
                                <input type="hidden" name="MaHP" value="<?= $hp['MaHP'] ?>">
                                <button type="submit">Đăng Ký</button>
                            </form>
                        <?php else: ?>
                            <span style="color: red;">Hết chỗ</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
