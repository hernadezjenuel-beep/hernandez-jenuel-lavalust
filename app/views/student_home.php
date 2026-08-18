<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $page_title ?> | Student Info App</title>
    <style>
        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background: #eef3f7;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background: #1b3a57;
            padding: 14px 24px;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            margin-right: 20px;
            font-weight: 600;
        }
        .navbar a:hover { text-decoration: underline; }
        .container {
            max-width: 600px;
            margin: 60px auto;
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            text-align: center;
        }
        h1 { color: #1b3a57; margin-bottom: 10px; }
        p.subtitle { color: #555; margin-bottom: 30px; }
        .btn {
            display: inline-block;
            background: #1b3a57;
            color: #fff;
            padding: 12px 24px;
            border-radius: 6px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn:hover { background: #14293e; }
        .flash {
            background: #ffe6e6;
            color: #a30000;
            padding: 10px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="<?= site_url('student') ?>">Home</a>
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </div>

    <div class="container">
        <?php if (session_status() !== PHP_SESSION_NONE && !empty($_SESSION['access_message'])): ?>
            <div class="flash">
                <?= $_SESSION['access_message']; unset($_SESSION['access_message']); ?>
            </div>
        <?php endif; ?>

        <h1>Welcome, <?= htmlspecialchars($student['name']) ?>!</h1>
        <p class="subtitle">This is the Student Home Page for <?= htmlspecialchars($student['course']) ?>.</p>

        <a class="btn" href="<?= site_url('student/profile') ?>">View My Profile</a>
    </div>

</body>
</html>
