<!DOCTYPE html>
<html>
<head>
    <title>Sistema de Monitoramento de Sinais Vitais</title>
</head>
<body> 
    <?php
          require_once './banco/banco_paciente.php';

            $sAcao = $_GET['acao'] ?? false;
            
            if ($sAcao === 'cadastrar') {
                $nome   = $_POST['nome']   ?? '';
                $idade = $_POST['idade'] ?? 0;
                $sexo = $_POST['sexo'] ?? '';
                $cidade = $_POST['cidade'] ?? '';
                
                if (!empty($nome) && !empty($idade) && !empty($sexo) && !empty($cidade)) {
                cadastrar($nome, $idade, $sexo, $cidade);
                } else {
                    echo 'Informe os campos corretamente!';
                }
            }
            
            if ($sAcao === 'deletar') {
                $iRegistro = $_POST['registro'] ?? '';
                
                deletar($iRegistro);
            }
            
            ?>
            <h1>Cadastro de Pacientes</h1>
            <form action="?acao=cadastrar" method="POST">
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome"><br><br>
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade"><br><br>
                <label for="sexo">Sexo:</label>
                <select id="sexo" name="sexo">
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                </select><br><br>
                <label for="cidade">Cidade:</label>
                <input type="text" id="cidade" name="cidade"><br><br>
                <button type="submit">Cadastrar Paciente</button>
            </form>
        </fieldset>
        <fieldset>
            <legend>Pacientes</legend>
            <?php
            
            
            $aPacientes = selecionarTodosDados();
            
            echo '<table>';
            echo "<tr>
                      <th>Código</th>
                      <th>Nome</th>
                      <th>Idade</th>
                      <th>Sexo</th>
                      <th>Cidade</th>
                      <th>ação</th>
                  </tr>";
            foreach ($aPacientes as $aPaciente) {
                echo "<tr>
                          <td>{$aPaciente['id']}</td>
                          <td>{$aPaciente['nome']}</td>
                          <td>{$aPaciente['idade']}</td>
                          <td>{$aPaciente['sexo']}</td>
                          <td>{$aPaciente['cidade']}</td>
                          <td>
                            <form method='POST' action='?acao=deletar'>
                                <button type='submit' name='registro' value='{$aPaciente['id']}'>Deletar</button>
                            </form>
                          </td>
                      </tr>";
            }
            echo '</table>';
            
            ?>
        </fieldset>

    <h1>Monitoramento de Sinais Vitais</h1>
    <div id="vital-signs">
        <!-- Exibir sinais vitais aqui -->
    </div>

    <h1>Alertas</h1>
    <div id="alerts">
        <!-- Exibir alertas aqui -->
    </div>

    <script src="script.js"></script>
</body>
</html>
