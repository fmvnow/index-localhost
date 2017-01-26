<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Vamos acessar o LOCALHOST?</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="favicon.ico">
    <meta http-equiv="Cache-control" content="public">
</head>
<style type="text/css">
    body{
        background: #f5f5f5;
    }
    .links a{
        font-size: 16px;
        color:#295d87;
    }
    a i{
        font-size: 18px !important;
        margin-right: 10px;
    }
    .xispa{
        max-width: 320px;
        overflow: auto;
        height: 100vh;
        background: #f0f0f0;
        border: 1px solid #e5e5e5;
    }
    h1{
        text-align: center;
        margin-bottom: 30px;
        margin-top: 28px;
    }
    .smile{
        font-size: 128px;
        text-align: center;
        color: #666;
    }
    .parent:before{
        font-family: 'FontAwesome';
        content:'\f061';
        margin-left: 3px;
        margin-right: 20px;
        color:#666;
    }
</style>
<body>
<div class="container-fluid">
    <div class="row">
    <div class="col-md-3 col-sm-4 hidden-xs xispa">
            <h2>Diretórios</h2>
            <div class="list-group dir">
            <?php
                $scan = scandir('.');
                usort($scan, function($a){
                    return !is_dir($a);
                });
                foreach($scan as $dir){
                    if($dir[0] == '.'){
                        continue;
                    }
                    $class = 'fa-folder-open';
                    $link = $dir;
                    if(is_file($dir)){
                        continue;
                        //Se quiser visualizar os arquivos da listagem também é só descomentar abaixo :(|)
                        // $class = 'fa-file';
                        // $dir = preg_replace('/(\.[^.]+$)/', '<b>$1</b>', $dir);                        
                    }
                    echo "<a href=\"$link\" class=\"list-group-item\"><i class=\"fa $class\"></i> $dir</a>";
                }
            ?>
            </div>
        </div>
        <div class="col-md-7 col-md-offset-1 col-sm-8 col-xs-12 links">
            <h1>Vamos acessar o LOCALHOST?</h1>
            <h2>Serviços Internos</h2>
            <div class="list-group">
            <?php
                $links = file_get_contents('links.json');
                $links = json_decode($links, true);
                foreach($links['services'] as $link){
                    preg_match('/(^(https?:\\/\\/)?[^\\/]+)/', $link['url'], $match);
                    $main = $match[1];

                    $text = preg_replace('/([^\\/]*\.[^\\/]*)/', '<b>$1</b>', $link['name']);

                    echo "<a href=\"".$link['url']."\" class=\"list-group-item\" target=\"blank\"><i class=\"icon fa ".$link['icon']."\"></i> ".$text."</a>";
                }
             ?>
            </div>
             <h3 class="smile">:0</h3>
            </div>
            
        </div>
    </div>
</div>

</body>
</html>