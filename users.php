<?php
include 'db_connect.php';

// 創建 users 表格（如果不存在）
$sql = "CREATE TABLE IF NOT EXISTS users (
    uid INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    registrationdate DATE NOT NULL,
    birthday DATE NOT NULL,
    nickname VARCHAR(255) NOT NULL
)";

if ($conn->query($sql) !== TRUE) {
    die("Error creating table: " . $conn->error);
}

// 處理表單提交
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['add'])) {
        // 新增用戶
        $name = $_POST['name'];
        $email = $_POST['email'];
        $registrationdate = $_POST['registrationdate'];
        $birthday = $_POST['birthday'];
        $nickname = $_POST['nickname'];
        $stmt = $conn->prepare("INSERT INTO users (name, email, registrationdate, birthday, nickname) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $registrationdate, $birthday, $nickname);
        if ($stmt->execute() === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['delete'])) {
        // 刪除用戶
        $uid = $_POST['uid'];
        $stmt = $conn->prepare("DELETE FROM users WHERE uid = ?");
        $stmt->bind_param("i", $uid);
        if ($stmt->execute() === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    } elseif (isset($_POST['update'])) {
        // 修改用戶
        $uid = $_POST['uid'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $registrationdate = $_POST['registrationdate'];
        $birthday = $_POST['birthday'];
        $nickname = $_POST['nickname'];
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, registrationdate = ?, birthday = ?, nickname = ? WHERE uid = ?");
        $stmt->bind_param("sssssi", $name, $email, $registrationdate, $birthday, $nickname, $uid);
        if ($stmt->execute() === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }
}

// 查詢用戶
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result === FALSE) {
    die("Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>用戶管理</title>
    <style>
        /* 您的CSS樣式 */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f9;
        }
        header {
            background-color: #333;
            color: white;
            padding: 1rem;
            text-align: center;
        }
        .content {
            padding: 2rem;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 1rem;
            text-align: left;
        }
        .button-container {
            margin-top: 1rem;
        }
        .button-container button {
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            background-color: #007bff;
            color: white;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button-container button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <header>
        <h1>用戶管理</h1>
    </header>
    <div class="content">
        <h2>用戶列表</h2>
        <table>
            <tr>
                <th>會員編號</th>
                <th>會員名稱</th>
                <th>電子郵件</th>
                <th>註冊日期</th>
                <th>會員生日</th>
                <th>會員暱稱</th>
                <th>操作</th>
            </tr>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['uid']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['registrationdate']; ?></td>
                <td><?php echo $row['birthday']; ?></td>
                <td><?php echo $row['nickname']; ?></td>
                <td>
                    <form method="post" style="display:inline;">
                        <input type="hidden" name="uid" value="<?php echo $row['uid']; ?>">
                        <button type="submit" name="delete">刪除</button>
                    </form>
                    <button onclick="editUser(<?php echo $row['uid']; ?>, '<?php echo $row['name']; ?>', '<?php echo $row['email']; ?>', '<?php echo $row['registrationdate']; ?>', '<?php echo $row['birthday']; ?>', '<?php echo $row['nickname']; ?>')">修改</button>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <div class="button-container">
            <button onclick="showAddForm()">新增用戶</button>
            <button onclick="queryUsers()">查詢所有用戶</button>
        </div>
        <div id="form-container" style="display:none;">
            <h2 id="form-title">新增用戶</h2>
            <form method="post">
                <input type="hidden" name="uid" id="user-id">
                <label for="name">會員名稱:</label>
                <input type="text" name="name" id="user-name" required>
                <label for="email">電子郵件:</label>
                <input type="email" name="email" id="user-email" required>
                <label for="registrationdate">註冊日期:</label>
                <input type="date" name="registrationdate" id="registrationdate" required>
                <label for="birthday">會員生日:</label>
                <input type="date" name="birthday" id="birthday" required>
                <label for="nickname">會員暱稱:</label>
                <input type="text" name="nickname" id="nickname" required>
                <button type="submit" name="add" id="form-submit">新增</button>
            </form>
        </div>
    </div>

    <script>
        function showAddForm() {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('form-title').innerText = '新增用戶';
            document.getElementById('form-submit').name = 'add';
            document.getElementById('user-id').value = '';
            document.getElementById('user-name').value = '';
            document.getElementById('user-email').value = '';
            document.getElementById('registrationdate').value = '';
            document.getElementById('birthday').value = '';
            document.getElementById('nickname').value = '';
        }

        function editUser(uid, name, email, registrationdate, birthday, nickname) {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('form-title').innerText = '修改用戶';
            document.getElementById('form-submit').name = 'update';
            document.getElementById('user-id').value = uid;
            document.getElementById('user-name').value = name;
            document.getElementById('user-email').value = email;
            document.getElementById('registrationdate').value = registrationdate;
            document.getElementById('birthday').value = birthday;
            document.getElementById('nickname').value = nickname;
        }

        function editUser(uid, name, email, registrationdate, birthday, nickname) {
            document.getElementById('form-container').style.display = 'block';
            document.getElementById('form-title').innerText = '修改用戶';
            document.getElementById('form-submit').name = 'update';
            document.getElementById('user-id').value = uid;
            document.getElementById('user-name').value = name;
            document.getElementById('user-email').value = email;
            document.getElementById('registrationdate').value = registrationdate;
            document.getElementById('birthday').value = birthday;
            document.getElementById('nickname').value = nickname;
        }

        function queryUsers() {
            window.location.href = 'users.php';
        }
    </script>
</body>
</html>