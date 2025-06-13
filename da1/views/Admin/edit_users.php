
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
    <div class="mb-3 form-check">
        <input type="checkbox" name="is_admin" class="form-check-input" id="is_admin" <?= $user['is_admin'] ? 'checked' : '' ?>>
        <label class="form-check-label" for="is_admin">Quyền admin</label>
    </div>
    <button type="submit" class="btn btn-primary">Lưu</button>
    <a href="index.php?action=admin_users" class="btn btn-secondary">Quay lại</a>
</form>
<?php include 'views/layouts/footer.php'; ?>