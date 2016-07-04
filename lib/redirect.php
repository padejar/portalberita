<?php 
function redirect($page){
	echo "<meta http-equiv='refresh' content='0;url=".$page.".php'>";
}