<?php
// Comando para executar o script shell
$command = "sudo /var/script.sh";

// Executa o comando e obtém a saída
$output = exec($command);

// Exibe a saída do comando
echo "<pre>$output</pre>";
$usuario = get_current_user();
echo "O usuário atual é: " . $usuario;
?>