<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Sign in</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; background: #fafafa; color: #222; padding: 40px 20px; }
        form { max-width: 400px; margin: 40px auto; background: #fff; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
        label { display: block; margin: 14px 0 6px; font-size: .9rem; font-weight: 600; }
        input { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { margin-top: 20px; padding: 10px 14px; border: 0; border-radius: 4px; background: #222; color: #fff; cursor: pointer; }
        .error { color: #a00; margin-bottom: 16px; }
    </style>
</head>
<body>
    <form method="post" action="<?= htmlspecialchars(site_url('login'), ENT_QUOTES, 'UTF-8'); ?>">
        <h2>Sign in</h2>
        <?php if (!empty($error)) : ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <label for="username">Username</label>
        <input id="username" name="username" maxlength="100" required value="<?= htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?>">
        <label for="password">Password</label>
        <input id="password" name="password" type="password" required>
        <button type="submit">Sign in</button>
    </form>
</body>
</html>