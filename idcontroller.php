<?php

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conecta ao banco de dados
    $conn = mysqli_connect("localhost", "usuario", "senha", "nome_do_banco");
    // Verifica se a conexão foi bem sucedida
    if (!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }
    // Obtém os dados do formulário
    $id = $_POST["id"];
    $tipo = $_POST["tipo"];
    $empresa = $_POST["empresa"];
    $modelo = $_POST["modelo"];
    $numero_serie = $_POST["numero_serie"];
    $data_aquisicao = $_POST["data_aquisicao"];
    $data_manutencao = $_POST["data_manutencao"];
    $descricao = $_POST["descricao"];
    // Verifica se é uma edição ou uma inclusão
    if ($id) {
        // Atualiza os dados do equipamento existente
        $sql = "UPDATE equipamentos SET tipo='$tipo', empresa='$empresa', modelo='$modelo', numero_serie='$numero_serie', data_aquisicao='$data_aquisicao', data_manutencao='$data_manutencao', descricao='$descricao' WHERE id=$id";
    } else {
        // Insere um novo equipamento
        $sql = "INSERT INTO equipamentos (tipo, empresa, modelo, numero_serie, data_aquisicao, data_manutencao, descricao) VALUES ('$tipo', '$empresa', '$modelo', '$numero_serie', '$data_aquisicao', '$data_manutencao', '$descricao')";
    }
    // Executa a consulta SQL
    if (mysqli_query($conn, $sql)) {
        echo "Equipamento salvo com sucesso!";
    } else {
        echo "Erro ao salvar o equipamento: " . mysqli_error($conn);
    }
    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
}
?>
<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <label for="tipo">Tipo:</label>
    <input type="text" name="tipo" value="<?php echo $tipo; ?>">
    <br>
    <label for="empresa">Empresa:</label>
    <input type="text" name="empresa" value="<?php echo $empresa; ?>">
    <br>
    <label for="modelo">Modelo:</label>
    <input type="text" name="modelo" value="<?php echo $modelo; ?>">
    <br>
    <label for="numero_serie">Número de Série:</label>
    <input type="text" name="numero_serie" value="<?php echo $numero_serie; ?>">
    <br>
    <label for="data_aquisicao">Data de Aquisição:</label>
    <input type="date" name="data_aquisicao" value="<?php echo $data_aquisicao; ?>">
    <br