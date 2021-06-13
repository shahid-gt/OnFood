<?php
require('resdatabase.php');
require('../functions.php');
require('../constant.php');

//for setting the dynamic title of pages 
$curStr = $_SERVER['REQUEST_URI'];
//convert the string into the array 
$curArr = explode('/',$curStr);
$cur_path=$curArr[count($curArr)-1];

$title='';
if($cur_path==''||$cur_path=='index.php'){
  $title='Dashboard';
}
elseif($cur_path=='category.php'){
  $title='Category' ;
}
elseif($cur_path=='food.php'){
  $title='ManageFood';
}
elseif($cur_path=='addfood.php'){
  $title='AddFood';
}
elseif($cur_path=='addcat.php'){
  $title='AddCat';
}
elseif($cur_path=='logout.php'){
  $title='LogOut';
}
?>
<?php require('../header.html'); ?>
<title><?php echo $title ?> </title>
</head>
<body>
  
<nav class="navbar navbar-expand-xxl navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">oNFOod</a>

      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" href="category.php">Category</a>
        </li>

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="food.php">Manage Food</a>
        </li>
      </ul>
      
        <form action="../logout.php" class="d-flex">
          
          <input class="btn btn-outline-success me-2" type="submit" value="LOGOUT">
        </form>
      </div>
    </div>
  </nav>