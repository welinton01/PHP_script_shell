<?php
// Obtém os dados enviados pelo formulário
$data = json_decode(file_get_contents("php://input"), true);

// Extrai os dados do formulário
$name = $data['name'];
$email = $data['email'];
$permissions = $data['permissions'];

// Caminho para o arquivo de configuração
$configFilePath = "../../../config.txt";

// Escreve os dados no arquivo de configuração
file_put_contents($configFilePath, "Nome: " . $name . "\n");
file_put_contents($configFilePath, "Email: " . $email . "\n", FILE_APPEND);
file_put_contents($configFilePath, "Permissões: " . $permissions . "\n", FILE_APPEND);

// Define as permissões do arquivo de configuração
$permissionsValue = 0644; // Permissões padrão de leitura
if ($permissions === "write") {
  $permissionsValue = 0666; // Permissões de leitura e escrita
} elseif ($permissions === "execute") {
  $permissionsValue = 0777; // Permissões de leitura, escrita e execução
}
chmod($configFilePath, $permissionsValue);

// Retorna uma resposta de sucesso para o JavaScript
http_response_code(200);
?>

<?php
// Executa um script usando a função exec()
exec('/var/script.sh', $output, $returnStatus);

// Verifica o status de retorno
if ($returnStatus === 0) {
    echo "Script executado com sucesso!";
} else {
    echo "Ocorreu um erro ao executar o script.";
}

// Exibe a saída do script
echo "<pre>";
echo implode("\n", $output);
echo "</pre>";
?>
