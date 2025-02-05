<?php


if(isset($_REQUEST['id'])){

$id=$_REQUEST['id'];

if(isset($_REQUEST['count'])){
$count = $_REQUEST['count'];
}else{
	$count = 0;
}

if (!isset($_SESSION['products'])) {
	$_SESSION['products']=[];
}

if (isset($_SESSION['products'][$id]['count'])) {
	$count += $_SESSION['products'][$id]['count'];
};

$_SESSION['products'][$id]=[
	'id' =>$id,
	'name'=>$_REQUEST['name'], 
	'price'=>$_REQUEST['price'], 
	'count'=>$count
];
}else{


}
?>