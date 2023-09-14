<?php
include_once "./scambler_functions.php";

$task = "encode";
if(isset($_GET['task']) && $_GET['task'] !== ''){
    $task = $_GET['task'];
}

$initialKey = 'abcdefghijklmnopqrstuvwxyz1234567890';
$key = "";

if($task == 'key'){
    $key_splitted = str_split($initialKey);
    shuffle($key_splitted);
    $key = join('', $key_splitted);
    
} else if (isset($_POST['key']) && $_POST['key'] != '') {
    $key = $_POST['key'];
}


$scambledData = "";
if($task == 'encode'){
    $data = $_POST['data'] ?? "";
    if($data != ""){
        $scambledData = scambleData($data, $key);
    }
}

if($task == 'decode'){
    $data = $_POST['data'] ?? "";
    if($data != ""){
        $scambledData = decodeData($data, $key);
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,300italic,700,700italic" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/milligram/1.4.1/milligram.css" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="column">
                <div class="column-60 column-offset-20">
                    <h2>Data Scambler</h2>
                    <p>Use this application to scamble your data</p>
                    <p>
                        <a href="/scambler.php/?task=encode">Encode</a>
                        <a href="/scambler.php/?task=decode">Decode</a>
                        <a href="/scambler.php/?task=key">Generate Key</a>
                    </p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="column">
                <div class="column-60 column-offset-20">
                    <form method="POST" action="/scambler.php<?php if('decode' == $task){echo "?task=decode";}?>">
                        <label for="key">Key</label>
                        <input type="text" name='key' id='key' <?php displayKey($key) ?>>

                        <label for="data">Data</label>
                        <textarea name="data" id="data" cols="30" rows="10"><?php if(isset($_POST['data'])){echo $_POST['data'];
}?></textarea>

                        <label for="result">Result</label>
                        <textarea name="result" id="result" cols="30" rows="10"><?php echo $scambledData ?></textarea>

                        <button type='submit'>Do it for me</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>