<!doctype html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
<?php
include("config.php");
?>
<script src="prettify.js"></script>
<meta charset="UTF-8">
<link rel="stylesheet" href="src/bootstrap.css">
<link rel="stylesheet" href="src/bootstrap-theme.min.css">
<link rel="stylesheet" href="src/main.css">
<title><?=$header_title?></title>
</head>
<body>
<?php
if($_GET['id']){
if(file_exists($docs_dir.'/'.$_GET['id'].$docs_pattern)){$rt=str_replace("\n","<br>",file_get_contents($docs_dir.'/'.$_GET['id'].$docs_pattern));}else{
$rt=str_replace("\n","<br>",file_get_contents($error_page));
}
}else{
$rt=str_replace("\n","<br>",file_get_contents($top_page));
}
?>


<menubar><h1 class="text-left"><a href="?" style="text-decoration: none; color:#000000;">
<?php
if($header_logo){
	echo '<img src="'.$header_logo.'" height="40px" />';
}
?>
<?=$header_title?></a></h1><p class="auto-style99"><?=$_GET['id']?></p></menubar>

<h3 class="auto-style1"><contents><?=$rt?></contents><p class="auto-style1">&nbsp;</p>
<p class="auto-style3">検索</p>
<form id="form1" action="#" method="get">
<input id="sbox1" id="q" name="q" type="text" placeholder="検索" value="<?=$_GET['q']?>" />
<input id="sbtn1" type="submit" value="検索" /></form>
<br>
<p class="auto-style1">
<?php
foreach(glob($docs_dir.'/*'.$docs_pattern) as $file){
    if(is_file($file)){
        if(strpos($file,$_GET['q']) != false){
$re=str_replace($docs_pattern,'',str_replace($docs_dir.'/','',$file));
  echo '<a href="index.php?id='.$re.'">'.$re.'</a><br>';
}else{if(strpos(file_get_contents($file),$_GET['q']) != false){
$re=str_replace($docs_pattern,'',str_replace($docs_dir.'/','',$file));
 echo '<a href="index.php?id='.$re.'">'.$re.'</a><br>';
}}
    }
}

?>
<br/><p class="auto-style1"><?=$footer?><br>
</body>
</html>

 