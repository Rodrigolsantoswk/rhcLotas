<?php
$senha= password_hash(81653283, PASSWORD_DEFAULT);
echo $senha."<br>";
if (password_verify($senha,'$2y$10$QBN9/HHowmWkw377UVOc8uO4A7x6NrBWuh9/gwfrTjIuYrA8rHoN2')){
	echo "senhas correspondem";
}else{
	echo "senhas não correspondem";
}

?>