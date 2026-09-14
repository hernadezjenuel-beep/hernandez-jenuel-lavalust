<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Confirm product deletion</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; background: #fafafa; color: #222; padding: 40px 20px; }
        .panel { max-width: 520px; margin: 40px auto; background: #fff; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
        .warning { color: #a00; }
        button, a { display: inline-block; margin-top: 20px; padding: 10px 14px; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; }
        button { background: #a00; color: #fff; } a { color: #333; margin-left: 8px; }
        .inline { display: inline; }
    </style>
</head>
<body>
    <main class="panel">
        <h2>Delete product?</h2>
        <p>Are you sure you want to delete <strong><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?></strong>?</p>
        <p class="warning">This action cannot be undone.</p>
        <form class="inline" method="post" action="<?= htmlspecialchars(site_url('products/delete/' . (int) $product['id']), ENT_QUOTES, 'UTF-8'); ?>">
            <button type="submit">Yes, delete product</button>
        </form>
        <a href="<?= htmlspecialchars(site_url('products'), ENT_QUOTES, 'UTF-8'); ?>">Cancel</a>
    </main>
</body>
</html>
