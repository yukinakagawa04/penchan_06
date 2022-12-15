<?php

$str = '';
$array = [];
//読み取りだけできる方式'r'
$fileName = "pen.csv";
$file = fopen($fileName, 'r');

flock($file, LOCK_EX);

if ($file) {
    while ($line = fgets($file)) {
        //文字列に追加するは「 .=」で行けます！
        $recordValue = mb_convert_encoding($recordValue, "SJIS", "UTF-8");
        $str .= "<tr><td>{$line}</td><tr>";

        $array[] = [
            "deadline" => explode(" ", $line)[0],
            "word" => str_replace("\n", "", explode(" ", $line)[1]),
        ];
    }

}

flock($file, LOCK_UN);
fclose($file);


?>


<!-- 送るほう -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ペン活日記（入力画面）</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
    <div class="input_area">
        <form action="pen_diary_create.php" method="POST" class="input_area">
            <legend>ペン活日記（入力画面）</legend>
            <div>
                <input type="submit" value="記録する">
                <label for="">記録日</label>
                <input type="date" name="deadline">
            </div>
            <div>
                <textarea type="text" name="word" class="commentTextArea"></textarea>
            </div>
            <div>
                <input type="file" name="example" accept="image/jpeg, image/png">
            </div>
            <!-- <div>
                <button>記録する</button>
            </div> -->
    </div>
    </form>

    <div class="read_area">
        <legend>ペン活日記（一覧画面）</legend>
        <div class="look_area">
            <table>
                <tbody>
                    <?= $str ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        // JSではPHPの配列を扱えないため，サーバ上でJSON形式に変換する
        const pen = <?= json_encode($array) ?>;
        console.log(pen);
    </script>

</body>

</html>