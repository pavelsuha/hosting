<?php
  @$content=$_GET['page'];
  if($content){
    $f=$content.".php";
    include('pages/'.$f);
  }                    
  else{
    include('pages/overview.php');
  }
  ?>