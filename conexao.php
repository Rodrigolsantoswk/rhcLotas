<?php
define('HOST', 'sql300.rf.gd');
define('USUARIO', 'epiz_26021611');
define('SENHA', 'xDdC6Uu25fcrh');
define('DB', 'epiz_26021611_rhcLotas');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('ERRO AO CONECTAR'.mysqli_error($conexao));
?>