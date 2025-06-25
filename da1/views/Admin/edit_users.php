<?php require_once 'views/user/menu.php'; ?>
<h2>Sửa người dùng</h2>
<form method="post" action="index.php?action=edit_user&id=<?= $user['id'] ?>">
    <div class="mb-3">
        <label>Tên</label>
        <input type="text" name="name" class="form-control" value="<?= htmlspecialchars($user['name']) ?>" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="<?= htmlspecialchars($user['email']) ?>" required>
    </div>
    <label>Quyền</label><br>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="roleUser" value="user" <?= ($user['role'] ?? 'user') === 'user' ? 'checked' : '' ?>>
        <label class="form-check-label" for="roleUser">User</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="roleShipper" value="shipper" <?= ($user['role'] ?? '') === 'shipper' ? 'checked' : '' ?>>
        <label class="form-check-label" for="roleShipper">Shipper</label>
    </div>
    <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="role" id="roleAdmin" value="admin" <?= ($user['role'] ?? '') === 'admin' ? 'checked' : '' ?>>
        <label class="form-check-label" for="roleAdmin">Admin</label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?action=admin_users" class="btn btn-secondary">Quay lại</a>
</form>
<?php include 'views/layouts/footer.php'; ?>