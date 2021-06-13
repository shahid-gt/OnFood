<?php
require('../database.php');
require('../functions.php');
require('../constant.php');
session_start();

//for setting the dynamic title of pages 
$curStr = $_SERVER['REQUEST_URI'];
//convert the string into the array 
$curArr = explode('/',$curStr);
//now encapsulate the file name 
$cur_path=$curArr[count($curArr)-1];

$title='';
if($cur_path==''||$cur_path=='index.php'){
  $title='Dashboard';
}
elseif($cur_path=='add.php'){
  $title='Add Restaurant' ;
}

elseif($cur_path=='mod.php'){
  $title='Modify Restaurant' ;
}
elseif($cur_path=='del.php'){
  $title='Delete Restaurant';
}
elseif($cur_path=='password.php'){
  $title='Set Password for restaurant';
}
?>
<?php require('../header.html'); ?>
<title><?php echo $title ?> </title>
</head>
<body>



  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">oNFOod</a>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="feedbacks.php">Feedbacks</a>
        </li>
        </ul>
      
        <form action="../logout.php" class="d-flex">
          
          <input class="btn btn-outline-dark" type="submit" value="LOGOUT">
        </form>
      </div>
    </div>
  </nav>
