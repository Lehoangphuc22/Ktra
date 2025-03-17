<?php
require_once __DIR__ . '/../models/NganhHoc.php';

$nganhHoc = new NganhHoc();

// Lấy danh sách ngành
$dsNganh = $nganhHoc->getAll();

// Kiểm tra ngành có tồn tại
if ($nganhHoc->exists('CNTT')) {
    echo "Ngành Công nghệ thông tin tồn tại!";
}

// Lấy thông tin ngành theo mã
$thongTinNganh = $nganhHoc->getById('CNTT');
print_r($thongTinNganh);


?>