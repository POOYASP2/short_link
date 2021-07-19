<html dir="auto">
  <heade>
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
        min-height: 85vh;
      }
      a{
      color:white;
      text-decoration:none;
      }
      h1{
      margin-bottom:0;
      }
    </style>
  </head>
  <body>
    <?php
      $Sfile = file('links.txt');
      if(count($Sfile) == 0 ){
        echo '<h1 dir="rtl">لینکی کوتاه نشده است.</h1>';
      } else{ ?>
        <h1>تمامی لینک‌ها:</h1>
        <ul dir="ltr">
      <?php
      foreach($Sfile as $s){
          $s = explode(" ", $s);
          echo "
              <li> <a href=http://localhost/test/?urlink=$s[0]>http://localhost/test/?urlink=".$s[0]."</a><br>
              <a href=".$s[1]."'>".$s[1]."</a>
              </li><br>";
        }
      }?>
    </ul>
  </body>
</html>
