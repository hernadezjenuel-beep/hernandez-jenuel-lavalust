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
        .card {
            max-width: 500px;
            margin: 50px auto;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 14px rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .card-header {
            background: #1b3a57;
            color: #fff;
            padding: 24px;
            text-align: center;
        }
        .card-header h1 { margin: 0; font-size: 22px; }
        .card-body { padding: 24px; }
        .field {
            display: flex;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .field:last-child { border-bottom: none; }
        .field .label { color: #777; font-weight: 600; }
        .field .value { color: #222; text-align: right; }
    </style>
</head>
<body>

    <div class="navbar">
        <a href="<?= site_url('student') ?>">Home</a>
        <a href="<?= site_url('student/profile') ?>">Student Profile</a>
    </div>

    <div class="card">
        <div class="card-header">
            <h1>Student Information</h1>
        </div>
        <div class="card-body">
            <div class="field"><span class="label">Student ID</span><span class="value"><?= htmlspecialchars($student['student_id']) ?></span></div>
            <div class="field"><span class="label">Name</span><span class="value"><?= htmlspecialchars($student['name']) ?></span></div>
            <div class="field"><span class="label">Course</span><span class="value"><?= htmlspecialchars($student['course']) ?></span></div>
            <div class="field"><span class="label">Year Level</span><span class="value"><?= htmlspecialchars($student['year']) ?></span></div>
            <div class="field"><span class="label">Section</span><span class="value"><?= htmlspecialchars($student['section']) ?></span></div>
            <div class="field"><span class="label">Email</span><span class="value"><?= htmlspecialchars($student['email']) ?></span></div>
            <div class="field"><span class="label">Address</span><span class="value"><?= htmlspecialchars($student['address']) ?></span></div>
            <div class="field"><span class="label">Contact No.</span><span class="value"><?= htmlspecialchars($student['contact_no']) ?></span></div>
            <div class="field"><span class="label">Skills</span><span class="value"><?= htmlspecialchars($student['skills']) ?></span></div>
            <div class="field"><span class="label">Hobbies</span><span class="value"><?= htmlspecialchars($student['hobbies']) ?></span></div>
            <p style="margin-top:20px; color:#555;"><?= htmlspecialchars($student['description']) ?></p>
        </div>
    </div>

</body>
</html>
