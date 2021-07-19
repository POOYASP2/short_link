<html dir='auto'>
<head>
<style>
  @font-face {
      font-family: Vazir;
      src: url('http://fonts.codearena.ir/rastikerdar/vazir/vazir.eot');
      src: url('http://fonts.codearena.ir/rastikerdar/vazir/vazir.eot?#iefix') format('embedded-opentype'),
           url('http://fonts.codearena.ir/rastikerdar/vazir/vazir.woff') format('woff'),
           url('http://fonts.codearena.ir/rastikerdar/vazir/vazir.ttf') format('truetype');
      font-weight: normal;
    }
  body{
    font-family: Vazir;
    background-color:#2a363b;
    color: white;
    max-width:950px;
    margin-left: auto;
    margin-right: auto;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    height: 85vh;
  }
  a{
    color:white;
  }
  h1{
    margin-bottom:0;
  }
  form{
    display:flex;
    flex-direction:column;
    align-items:center;
    width:35%;
  }
  textarea:focus, input:focus{
    outline: none;
}
  .input-form{
    font-family: Vazir;
    border-radius: 25px;
    border: 2px solid #2a363b;
    height:4em;
    padding:2em;
    width:100%;
  }
  .submit-class{
    width:25%;
    padding:0.5em 1em;
    border-radius: 15px;
    border: 2px solid white;
    font-family:Vazir;

  }
  .error {color: #FF0000;}
</style>
</head>
<body>  

<?php
$Sfile = file('links.txt');
if (isset($_GET['urlink'])) {
  foreach($Sfile as $s){
    $s = explode(' ', $s);
    if($s[0] == $_GET['urlink']){
      header("Location: $s[1]");
    }
  }
}
$add_to_file_var = '';
$short_link = '';
function generateRandomString($length = 4) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

if($_SERVER['REQUEST_METHOD']== 'POST'){
  $add_to_file_var = $_POST['add_to_file_var'];
  $file = 'links.txt';
  // The new Links to add to the file
  $short_link = generateRandomString();
  file_put_contents($file, $short_link . ' ' . $add_to_file_var . "\n", FILE_APPEND | LOCK_EX);
  header('Location: /test?short='. $short_link.'&long='. $add_to_file_var);
}
?>

<h1>یک مسیر کوتاه به لینک بلند شما</h1>
<p>در یک چشم به هم زدن لینک خود را کوتاه کنید.</p>
<form method='post' action="<?=$_SERVER['PHP_SELF'];?>">  
  <input class='input-form' type='url' name="add_to_file_var" value="<?php echo $add_to_file_var;?>" dir="ltr" required>
  <br>
  <input class='submit-class' type="submit" name="submit" value="کوتاه کردن">  
</form>
<a href="http://localhost/test/Alllinks.php">مشاهده تمامی لینک ها</a>

<?php
if (isset($_GET['short'])) {
  echo "<h2>لینک شما:</h2>";
  echo "<a href='".$_GET['long']."'>".$_GET['long']."</a>";
  echo "<br>";
  echo "<p>لینک کوتاه شده شما :</p>
        <a href='http://localhost/test/?urlink=".$_GET['short'] . "'>http://localhost/test/?urlink=" . $_GET['short'] . "</a>";
}
echo "<br>";
?>
</body>
</html>