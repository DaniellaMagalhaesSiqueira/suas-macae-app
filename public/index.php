<?php
require_once(dirname(__FILE__, 2). '\\src\\config\\config.php');
require_once(dirname(__FILE__, 2). '\\src\\models\\Funcionario.php');

// $sql = "SELECT * FROM funcionarios";

// $result = Database::getResultFromQuery($sql);
// while ($row = $result->fetch_assoc()){
//   print_r($row);
//   echo "<br>";
// }

$func = new Funcionario(['nome_funcionario' => 'coordenador_teste', 'email' => 'coordenador@gmail.com', 'nivel_acesso' => 'C']);
print_r($func);
?>