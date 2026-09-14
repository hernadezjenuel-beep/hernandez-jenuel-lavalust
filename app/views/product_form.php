<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; background: #fafafa; color: #222; padding: 40px 20px; }
        form { max-width: 520px; margin: 0 auto; background: #fff; padding: 28px; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
        label { display: block; margin: 14px 0 6px; font-size: .9rem; font-weight: 600; }
        input, textarea { width: 100%; padding: 10px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        textarea { min-height: 100px; resize: vertical; }
        button, a { display: inline-block; margin-top: 20px; padding: 10px 14px; border: 0; border-radius: 4px; text-decoration: none; cursor: pointer; }
        button { background: #222; color: #fff; } a { color: #333; }
        .error { color: #a00; margin-bottom: 16px; }
    </style>
</head>
<body>
    <form method="post" action="<?= htmlspecialchars($action, ENT_QUOTES, 'UTF-8'); ?>">
        <h2><?= htmlspecialchars($title, ENT_QUOTES, 'UTF-8'); ?></h2>
        <?php if (!empty($error)) : ?><p class="error"><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8'); ?></p><?php endif; ?>
        <label for="product_name">Product name</label>
        <input id="product_name" name="product_name" maxlength="100" required value="<?= htmlspecialchars($product['product_name'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <label for="description">Description</label>
        <textarea id="description" name="description"><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
        <label for="price">Price</label>
        <input id="price" name="price" type="number" min="0" step="0.01" required value="<?= htmlspecialchars($product['price'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <label for="quantity">Quantity</label>
        <input id="quantity" name="quantity" type="number" min="0" step="1" required value="<?= htmlspecialchars($product['quantity'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
        <button type="submit">Save product</button>
        <a href="<?= htmlspecialchars(site_url('products'), ENT_QUOTES, 'UTF-8'); ?>">Cancel</a>
    </form>
</body>
</html>
