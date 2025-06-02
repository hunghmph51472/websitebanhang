<?php include 'views/layouts/header.php'; ?>
<h2>Đăng nhập</h2>
<form method="POST" action="?action=login">
    <label>Tên đăng nhập:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Mật khẩu:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Đăng nhập</button>
</form>
<p>Chưa có tài khoản? <a href="?action=register">Đăng ký</a></p>
<?php include 'views/layouts/footer.php'; ?>
