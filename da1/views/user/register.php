<?php require_once 'menu.php'; ?>
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
<style>
body {
    background: linear-gradient(120deg, #89f7fe 0%, #66a6ff 100%);
    font-family: 'Roboto', sans-serif;
}
.login-container {
    max-width: 370px;
    margin: 60px auto;
    padding: 35px 30px 30px 30px;
    background: #fff;
    border-radius: 18px;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18);
    position: relative;
}
.login-container h2 {
    text-align: center;
    margin-bottom: 28px;
    font-weight: 700;
    color: #e53935; /* đỏ */
    letter-spacing: 1px;
}
.login-container label {
    font-weight: 500;
    color: #333;
    margin-bottom: 5px;
    display: block;
}
.login-container input[type="text"],
.login-container input[type="email"],
.login-container input[type="password"] {
    width: 100%;
    padding: 12px 40px 12px 38px;
    margin: 10px 0 22px 0;
    border: 1.5px solid #e0e0e0;
    border-radius: 6px;
    font-size: 15px;
    background: #f7fafd;
    transition: border 0.2s;
    outline: none;
    box-sizing: border-box;
}
.login-container input[type="text"]:focus,
.login-container input[type="email"]:focus,
.login-container input[type="password"]:focus {
    border: 1.5px solid #e53935;
    background: #fff;
}
.input-icon {
    position: absolute;
    left: 38px;
    top: 0;
    height: 100%;
    display: flex;
    align-items: center;
    color: #e53935;
    font-size: 18px;
    pointer-events: none;
}
.input-group {
    position: relative;
}
.input-group .input-icon {
    left: 10px;
    top: 0;
}
.login-container button {
    width: 100%;
    padding: 12px;
    background: linear-gradient(90deg, #e53935 60%, #ff7675 100%);
    color: #fff;
    border: none;
    border-radius: 6px;
    font-size: 17px;
    font-weight: 700;
    cursor: pointer;
    box-shadow: 0 2px 8px rgba(229,57,53,0.10);
    transition: background 0.2s;
}
.login-container button:hover {
    background: linear-gradient(90deg, #b71c1c 60%, #ff7675 100%);
}
.login-container .register-link {
    text-align: center;
    margin-top: 18px;
    font-size: 15px;
}
.login-container .register-link a {
    color: #e53935;
    text-decoration: none;
    font-weight: 500;
}
.login-container .register-link a:hover {
    text-decoration: underline;
}
.login-container .error {
    color: #d8000c;
    background: #ffd2d2;
    padding: 10px 14px;
    border-radius: 5px;
    margin-bottom: 18px;
    text-align: center;
    font-size: 15px;
    font-weight: 500;
}
</style>
<div class="login-container">
    <h2>Đăng ký</h2>
    <?php if (!empty($error)): ?>
        <div class="error"><?= htmlspecialchars($error) ?></div>
    <?php endif; ?>
    <form method="POST" action="?action=register" autocomplete="off">
        <div class="input-group">
            <span class="input-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M6 20v-2a4 4 0 0 1 8 0v2"/></svg>
            </span>
            <input type="text" id="name" name="name" placeholder="Họ tên" required style="padding-left:38px;">
        </div>
        <div class="input-group">
            <span class="input-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4 4h16v16H4z" fill="none"/><path d="M22 6l-10 7L2 6" /></svg>
            </span>
            <input type="email" id="email" name="email" placeholder="Email" required style="padding-left:38px;">
        </div>
        <div class="input-group">
            <span class="input-icon">
                <svg width="20" height="20" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><path d="M12 16v-4"/><path d="M12 8h.01"/></svg>
            </span>
            <input type="password" id="password" name="password" placeholder="Mật khẩu" required style="padding-left:38px;">
        </div>
        <button type="submit">Đăng ký</button>
    </form>
    <div class="register-link">
        Đã có tài khoản? <a href="?action=login">Đăng nhập</a>
    </div>
</div>
<?php include 'views/layouts/footer.php'; ?>