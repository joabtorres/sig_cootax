
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/css/relatorio.css">
    </head>
    <body>
        <div id="conteudo">
            <div id="header">
                <h2 class="text-center text-upercase"> <span class="text-upercase"><?php echo $cidade['nome_siglas'] ?></span> - <?php echo $cidade['nome_completo'] ?> </h2>
                <p class="text-center">                    
                    <small>
                        <?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?><br/>
                        <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?><br/>
                        CNPJ <?php echo $cidade['cnpj'] ?>
                    </small>
                </p>
            </div>
            <div id="section">
                <h2>Relatório de Saídas</h2>
                <?php if (isset($busca) && !empty($busca)): ?>
                    <table class="table">

                        <tr>
                            <th>De</th>
                            <th>Até</th>
                        </tr>
                        <tr>
                            <td><?php echo $busca['data_inicial'] ?></td>
                            <td><?php echo $busca['data_final'] ?></td>
                        </tr>
                    </table>
                <?php endif; ?>
                <hr>
                <?php if (!empty($financas)): ?>
                    <h4 class="text-right">Valor Total: <?php echo $this->formatDinheiroView($valor_total) ?></h4>
                    <h3 class="text-right">Total: <?php echo count($financas) > 1 ? count($financas) . ' registros encontrados' : count($financas) . ' registro encontrado' ?>.</h3>
                    <table class="table">
                        <tr>
                            <th>#</th>
                            <th>Descrição</th>
                            <th>Data</th>
                            <th>Valor</th>
                        </tr>
                        <?php
                        $qtd = 1;
                        foreach ($financas as $financa):
                            ?>
                            <tr>
                                <td><?php echo $qtd ?></td>
                                <td><?php echo!empty($financa['descricao']) ? $financa['descricao'] : '' ?></td>
                                <td><?php echo!empty($financa['descricao']) ? $this->formatDateView($financa['data']) : '' ?></td>
                                <td><?php echo!empty($financa['descricao']) ? $this->formatDinheiroView($financa['valor']) : '' ?></td>
                            </tr>
                            <?php
                            ++$qtd;
                        endforeach;
                        ?>
                    </table>
                <?php endif; ?>
            </div>

        </div>
    </body>
</html>