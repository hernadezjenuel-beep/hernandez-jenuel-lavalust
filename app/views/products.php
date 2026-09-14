<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Products</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif; background: #fafafa; color: #222; padding: 40px 20px; }
        .container { max-width: 900px; margin: 0 auto; }
        .toolbar { display: flex; justify-content: space-between; align-items: center; margin-bottom: 24px; }
        .button, button { background: #222; color: #fff; padding: 9px 14px; border: 0; border-radius: 4px; text-decoration: none; font-size: .9rem; cursor: pointer; }
        .logout { background: transparent; color: #333; padding-right: 0; }
        table { width: 100%; border-collapse: collapse; background: #fff; box-shadow: 0 1px 3px rgba(0,0,0,.08); }
        th, td { padding: 12px 16px; text-align: left; border-bottom: 1px solid #eee; }
        th { background: #f5f5f5; font-size: .8rem; text-transform: uppercase; color: #666; }
        .actions { white-space: nowrap; } .actions a { color: #333; margin-right: 10px; }
        .inline { display: inline; }
    </style>
</head>
<body>
    <div class="container">
        <div class="toolbar">
            <h2>Products</h2>
            <div>
                <a class="button" href="<?= htmlspecialchars(site_url('products/create'), ENT_QUOTES, 'UTF-8'); ?>">Add product</a>
                <form class="inline" method="post" action="<?= htmlspecialchars(site_url('logout'), ENT_QUOTES, 'UTF-8'); ?>"><button class="logout" type="submit">Sign out</button></form>
            </div>
        </div>
        <table>
            <thead><tr><th>Product name</th><th>Description</th><th>Price</th><th>Quantity</th><th>Actions</th></tr></thead>
            <tbody>
            <?php foreach ($products as $product) : ?>
                <tr>
                    <td><?= htmlspecialchars($product['product_name'], ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= htmlspecialchars($product['description'] ?? '', ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?= number_format((float) $product['price'], 2); ?></td>
                    <td><?= (int) $product['quantity']; ?></td>
                    <td class="actions">
                        <a href="<?= htmlspecialchars(site_url('products/edit/' . (int) $product['id']), ENT_QUOTES, 'UTF-8'); ?>">Edit</a>
                        <a href="<?= htmlspecialchars(site_url('products/delete/' . (int) $product['id'] . '/confirm'), ENT_QUOTES, 'UTF-8'); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
