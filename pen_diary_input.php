<!-- 送るほう -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ペン活日記（入力画面）</title>
</head>

<body>
    <form action="pen_diary_create.php" method="POST">
        <fieldset>
            <legend>ペン活日記（入力画面）</legend>
            <a href="pen_diary_read.php">一覧画面</a>
            <div>
                記録日<input type="date" name="deadline">
            </div>
            <div>
                ひとこと<input type="text" name="word">
            </div>
            <!-- <div>
                <input type="file" name="example" accept="image/jpeg, image/png">
            </div> -->
            <div>
                <button>記録する</button>
            </div>
        </fieldset>
    </form>

</body>

</html>