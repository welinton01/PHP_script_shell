document.getElementById("myForm").addEventListener("submit", function(event) {
  event.preventDefault(); // Impede o envio do formulário

  // Obtém os valores dos campos de entrada
  var name = document.getElementById("name").value;
  var email = document.getElementById("email").value;
  var permissions = document.getElementById("permissions").value;

  // Cria um objeto com os dados do formulário
  var formData = {
    name: name,
    email: email,
    permissions: permissions
  };

  // Envia os dados para o arquivo de configuração
  fetch("write_config.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/json"
    },
    body: JSON.stringify(formData)
  })
  .then(function(response) {
    if (response.ok) {
      alert("Dados enviados com sucesso!");
    } else {
      alert("Ocorreu um erro ao enviar os dados.");
    }
  })
  .catch(function(error) {
    alert("Ocorreu um erro ao enviar os dados: " + error);
  });
});
