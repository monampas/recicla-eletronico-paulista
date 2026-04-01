<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Perfil</title>
    <link rel="stylesheet" href="assets/styles.css/perfil.css">
    <link rel="stylesheet" href="assets/styles.css/index.css">
    <link rel="stylesheet" href="assets/styles.css/header.css" />
</head>

<body>
    <?php
    require_once 'cabecalho.php';
    require_once 'conexao.php';


    if ((isset($_SESSION['id']) && isset($_SESSION['tipo'])) && ($_SESSION['tipo'] === 'descartador')) {

        ?>
        <div class="container">
            <!-- Perfil do usuário descartador -->
            <div class="profile-container">

                <?php
                // Consulta os dados do usuário e endereço
                $query = "
                SELECT id_descartador,dec_nome,dec_telefone,dec_email,dec_cpf,end_nome,end_numero,end_cep,end_complemento
                FROM descartador
                INNER JOIN endereco
                ON id_descartador = id_descartador_fk
                WHERE id_descartador = $_SESSION[id];";

                // executa o comando e armazena na variável $dados
                $executar = mysqli_query($conexao, $query);
                $dados = mysqli_fetch_array($executar);
                ?>

                <div class="form-group">
                    <form method="POST" action="editar_perfil.php">
                        <!-- Campos de dados pessoais -->
                        <label for="id">ID</label>
                        <input type="text" id="id" name="id_descartador" value="<?php echo $dados['id_descartador'] ?>"
                            disabled />

                        <label for="nome">Nome</label>
                        <input type="text" id="nome" name="dec_nome" value="<?php echo $dados['dec_nome'] ?>" disabled />

                        <label for="cpf">CPF</label>
                        <input type="text" id="dec_cpf" name="dec_cpf" value="<?php echo $dados['dec_cpf'] ?>" disabled />

                        <label for="email">Email</label>
                        <input type="email" id="email" name="dec_email" value="<?php echo $dados['dec_email'] ?>"
                            disabled />

                        <label for="telefone">Telefone</label>
                        <input type="text" id="telefone" name="dec_telefone" value="<?php echo $dados['dec_telefone'] ?>"
                            disabled />

                        <!-- Campos de endereço -->
                        <label for="cpf">Endereço</label>
                        <input type="text" id="end_nome" name="end_nome" value="<?php echo $dados['end_nome'] ?>"
                            disabled />

                        <label for="numero">Numero:</label>
                        <input type="number" id="end_numero" name="end_numero" value="<?php echo $dados['end_numero'] ?>"
                            disabled />

                        <label for="cep">CEP:</label>
                        <input type="text" id="end_cep" name="end_cep" value="<?php echo $dados['end_cep'] ?>" disabled />

                        <label for="complemento">Complemento:</label>
                        <input type="text" id="end_complemento" name="end_complemento"
                            value="<?php echo $dados['end_complemento'] ?>" disabled />

                        <br></br>

                        <!-- Botões para editar e salvar -->
                        <button type="button" class="edit-btn" onclick="enableEdit()">Editar</button>
                        <button type="submit" value="Editar" class="save-btn" style="display:none;">Salvar</button>
                    </form>
                </div>
            </div>

            <!-- JavaScript para editar e salvar -->
            <script>
                // Máscara para CPF
                document.getElementById('dec_cpf').addEventListener('input', function (e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length > 11) value = value.slice(0, 11);
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d)/, '$1.$2');
                    value = value.replace(/(\d{3})(\d{1,2})$/, '$1-$2');
                    e.target.value = value;
                });

                function enableEdit() {
                    const fields = document.querySelectorAll("input");
                    fields.forEach(field => {
                        if (field.id !== "id") {
                            field.disabled = false;
                        }
                    });
                    document.querySelector(".edit-btn").style.display = "none";
                    document.querySelector(".save-btn").style.display = "inline-block";
                }

                function saveProfile() {
                    const fields = document.querySelectorAll("input");
                    fields.forEach(field => field.disabled = true);
                    document.querySelector(".edit-btn").style.display = "inline-block";
                    document.querySelector(".save-btn").style.display = "none";
                }
            </script>

            <div class="history-container">
                <div class="history-title">Histórico</div>
                <ul class="history-list">
                    <?php
                    $queryHistorico = "SELECT h.data_HIST, r.rec_nome, GROUP_CONCAT(res.nome SEPARATOR ', ') AS residuos FROM historico h LEFT JOIN receptor r ON h.id_receptor_fk = r.id_receptor LEFT JOIN historico_residuo hr ON hr.id_historico_fk = h.id_historico LEFT JOIN residuo res ON res.id_residuo = hr.id_residuo_fk WHERE h.id_descartador_fk = {$_SESSION['id']} GROUP BY h.id_historico ORDER BY h.data_HIST DESC";
                    $res = mysqli_query($conexao, $queryHistorico);
                    echo (mysqli_num_rows($res)) ?
                        implode('', array_map(function ($row) {
                            return "<li><strong>Data:</strong> " . date("d/m/Y H:i", strtotime($row['data_HIST'])) . "<br><strong>Receptor:</strong> {$row['rec_nome']}<br><strong>Resíduos descartados:</strong> {$row['residuos']}</li>";
                        }, mysqli_fetch_all($res, MYSQLI_ASSOC))) :
                        "<li>Nenhum histórico encontrado.</li>";
                    ?>
                    <?php
        // Verifica se é um usuário do tipo receptor
    } elseif (isset($_SESSION['id']) && isset($_SESSION['tipo']) && $_SESSION['tipo'] === 'receptor') {
        ?>

                    <div class="container">
                        <!-- Lado esquerdo: Perfil -->
                        <div class="left-box">
                        <div class="profile-container">
                            <!-- Perfil do receptor -->

                            <?php
                            $query = "SELECT * FROM receptor WHERE id_receptor = $_SESSION[id];";
                            $executar = mysqli_query($conexao, $query);
                            $dados = mysqli_fetch_array($executar);
                            ?>

                            <form method="POST" action="editar_perfil.php">
                                <div class="form-group">
                                    <label for="id">ID</label>
                                    <input type="text" id="id" name="id_receptor"
                                        value="<?php echo $dados['id_receptor'] ?>" disabled />

                                    <label for="nome">Nome</label>
                                    <input type="text" id="rec_nome" name="rec_nome"
                                        value="<?php echo $dados['rec_nome'] ?>" disabled />

                                    <label for="cpf">CPF/CNPJ</label>
                                    <input type="text" id="rec_cpf_cnpj" name="rec_cpf_cnpj"
                                        value="<?php echo $dados['rec_cpf_cnpj'] ?>" disabled />

                                    <label for="email">Email</label>
                                    <input type="email" id="rec_email" name="rec_email"
                                        value="<?php echo $dados['rec_email'] ?>" disabled />

                                    <label for="telefone">Telefone</label>
                                    <input type="text" id="rec_telefone" name="rec_telefone"
                                        value="<?php echo $dados['rec_telefone'] ?>" disabled />

                                    <label for="endereco">Endereço</label>
                                    <input type="text" id="rec_endereco" name="rec_endereco"
                                        value="<?php echo $dados['rec_endereco'] ?>" disabled />

                                    <br><br>

                                    <!-- Botões para editar e salvar -->
                                    <button type="button" class="edit-btn" onclick="enableEdit()">Editar</button>
                                    <button type="submit" value="Editar" class="save-btn"
                                        style="display:none;">Salvar</button>
                                </div>
                            </form>
                        </div>
                        </div>
                        
                        <div class="right-box">
                            <!-- Histórico -->
                            <div class="bottom-box">
                            <div class="history-container">
                                <div class="history-title">Histórico</div>
                                <ul class="history-list">
                                    <?php
                                    $queryHistorico = "SELECT h.data_HIST, d.dec_nome, GROUP_CONCAT(res.nome SEPARATOR ', ') AS residuos FROM historico h LEFT JOIN descartador d ON h.id_descartador_fk = d.id_descartador LEFT JOIN historico_residuo hr ON hr.id_historico_fk = h.id_historico LEFT JOIN residuo res ON res.id_residuo = hr.id_residuo_fk WHERE h.id_receptor_fk = {$_SESSION['id']} GROUP BY h.id_historico ORDER BY h.data_HIST DESC";
                                    $res = mysqli_query($conexao, $queryHistorico);
                                    echo (mysqli_num_rows($res)) ?
                                        implode('', array_map(function ($row) {
                                            return "<li><strong>Data:</strong> " . date("d/m/Y H:i", strtotime($row['data_HIST'])) . "<br><strong>Descartador:</strong> {$row['dec_nome']}<br><strong>Resíduos recebidos:</strong> {$row['residuos']}</li>";
                                        }, mysqli_fetch_all($res, MYSQLI_ASSOC))) :
                                        "<li>Nenhum histórico encontrado.</li>";
                                    ?>
                                </ul>
                            </div>
                            </div>

                            <!-- Formulário novo histórico -->
                            <div class="top-box">
                            <div class="history-container">
                                <h3 class="history-title">Cadastrar novo histórico</h3>
                                <form method="POST" action="cadastrar_historico.php" class="form-group">
                                    <label for="descartador">Selecione o Descartador:</label>
                                    <select name="id_descartador" required>
                                        <option value="">-- Escolha --</option>
                                        <?php
                                        $descartadores = mysqli_query($conexao, "SELECT id_descartador, dec_nome FROM descartador");
                                        while ($d = mysqli_fetch_assoc($descartadores)) {
                                            echo "<option value='{$d['id_descartador']}'>{$d['dec_nome']}</option>";
                                        }
                                        ?>
                                    </select>

                                    <label for="residuos">Resíduos (Ctrl para múltiplos):</label>
                                    <select name="residuos[]" multiple required>
                                        <option value="">Resíduos</option>
                                        <?php
                                        $residuos = mysqli_query($conexao, "SELECT id_residuo, nome FROM residuo");
                                        while ($r = mysqli_fetch_assoc($residuos)) {
                                            echo "<option value='{$r['id_residuo']}'>{$r['nome']}</option>";
                                        }
                                        ?>
                                    </select>

                                    <div class="button-group">
                                        <button type="submit" class="enviar-btn">Enviar
                                            Histórico</button>
                                    </div>                            
                                </form>
                            </div>
                            </div>
                        </div>

                        <!-- JavaScript para editar e salvar -->
                        <script>
                            function enableEdit() {
                                const fields = document.querySelectorAll("input");
                                fields.forEach(field => {
                                    if (field.id !== "id") {
                                        field.disabled = false;
                                    }
                                });
                                document.querySelector(".edit-btn").style.display = "none";
                                document.querySelector(".save-btn").style.display = "inline-block";
                            }

                            function saveProfile() {
                                const fields = document.querySelectorAll("input");
                                fields.forEach(field => field.disabled = true);
                                document.querySelector(".edit-btn").style.display = "inline-block";
                                document.querySelector(".save-btn").style.display = "none";
                            }
                        </script>

                        <?php
        // Caso não esteja logado ou seja de outro tipo
    } else {
        echo "<script>alert('Acesso Negado!'); location.href='login.php'</script>";
    }
    ?>
</body>

</html>