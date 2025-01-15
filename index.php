<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>影片管理平台</title>
    <style>
        /* 您現有的CSS樣式 */
    </style>
</head>
<body>
    <header>
        <h1>視頻平台管理</h1>
    </header>
    <nav>
        <a href="#">用戶</a>
        <a href="#">影片</a>
        <a href="#">演員</a>
        <a href="#">訂閱方案</a>
        <a href="#">評論</a>
        <a href="#">觀看紀錄</a>
        <a href="#">被添加至口袋名單</a>
        <a href="#">口袋名單</a>
    </nav> 
      
    <div class="content">
        <div class="button-container">
            <button onclick="manageUsers()">用戶</button>
            <button onclick="manageVideos()">影片</button>
            <button onclick="manageActors()">演員</button>
            <button onclick="manageSubscriptionPlans()">訂閱計劃</button>
            <button onclick="manageComments()">評論</button>
            <button onclick="viewHistory()">觀看紀錄</button>
            <button onclick="addedVideos()">被添加至口袋名單</button>
            <button onclick="pocketList()">口袋名單</button>
        </div>
    </div>

    <script>
        function Users() {
            window.location.href = 'users.php';
        }
        function Videos() {
            window.location.href = 'videos.php';
        }
        function VActors() {
            window.location.href = 'vactors.php';
        }
        function SubscriptionPlans() {
            window.location.href = 'subscription_plans.php';
        }
        function Comments() {
            window.location.href = 'comments.php';
        }
        function viewHistory() {
            window.location.href = 'view_history.php';
        }
        function Wasadded() {
            window.location.href = 'was_added.php';
        }
        function PocketList() {
            window.location.href = 'pocket_list.php';
        }
    </script>
</body>
</html>

