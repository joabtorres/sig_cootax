<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Relatório Financeio</title>
        <style>
            .text-center{text-align: center;}
            .text-left{text-align: left;}
            .text-right{text-align: right;}
            .clear{clear: both;}
            .text-uppercase{text-transform: uppercase;}
            body{font-family: "Arial", sans-serif;}
            #container{ margin: 0 auto; padding: 10px;}
            .header{ border-bottom: 1px solid #cecece; padding-bottom: 5px;}
            .header *{margin:0;}
            .header table{	width: 100%;}
            .img-center{display: block; margin:  0 auto;}

            .section{padding: 10px 0;}
            .section table {width: 100%; margin-bottom: 10px; margin-top: 5px; }
            .section table, .section th, .section td {border: 1px solid black; border-collapse: collapse;}
            .section th, .section td {padding: 5px;text-align: left;}
            .section table.table tr:nth-child(even) {background-color: #eee;}
            .section table.table tr:nth-child(odd) {background-color:#fff;}
            .section table.table th {background-color: black;color: white;}
            .section table.table tr.footer th {background-color: #eee;color: black;}
            .section .title-table{margin: 0; padding:0; font-weight: normal}
        </style>
    </head>
    <body>
        <div id="container">
            <div class="header">
                <table>
                    <tr>
                        <td class="text-center">
                            <h2 class="text-center"><span class="text-uppercase"><?php echo $cidade['nome_siglas'] ?></span> - <?php echo $cidade['nome_completo'] ?></h2>
                            <p class="text-center"><?php echo $cidade['endereco'] ?> - CEP: <?php echo $cidade['cep'] ?></p>
                            <p class="text-center"><?php echo $cidade['url_site'] ?> | <?php echo $cidade['telefone'] ?> | <?php echo $cidade['email'] ?></p>
                            <p class="text-center">CNPJ <?php echo $cidade['cnpj'] ?></p>
                        </td>
                    </tr>
                </table>
            </div>
            <!-- fim header -->
            <div class="section">
                <h3 class="title-table text-center">Relatório Financeiro</h3>
                <?php if (isset($busca) && !empty($busca)): ?>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>De</th>
                                <th>Até</th>
                                <th>Modo de Exibição</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $busca['data_inicial'] ?></td>
                                <td><?php echo $busca['data_final'] ?></td>
                                <td><?php echo $busca['modo_exibicao'] == 1 ? 'Resumido' : 'Estendido' ?></td>
                            </tr>

                        </tbody>
                    </table>
                <?php endif; ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Gráfico</th>
                            <th>Resultado</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="<?php echo BASE_URL . '/uploads/financeiro/imagem.png' ?>" alt="grágico" class="img-center"></td>
                            <td>
                                <p>Entradas: <?php echo $this->formatDinheiroView($lucro['valor']); ?> </p>
                                <p>Saídas: <?php echo $this->formatDinheiroView($despesa['valor']); ?> </p>
                                <p>Investimentos: <?php echo $this->formatDinheiroView($investimento['valor']); ?></p>
                                <hr/>
                                <p>Saldo Final: <?php echo $this->formatDinheiroView($valor_total); ?> </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <?php
                if ($modo_exibicao == 2) :
                    if (!empty($financas['lucro'])):
                        ?>

                        <h3 class="title-table">Entradas</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descricao</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['lucro'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($lucro['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (!empty($financas['despesa'])): ?>

                        <h3 class="title-table">Saídas</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descricao</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['despesa'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($despesa['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                    <?php endif; ?>
                    <?php if (!empty($financas['investimento'])): ?>

                        <h3 class="title-table">Investimento</h3>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descricao</th>
                                    <th>Data</th>
                                    <th>Valor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $qtd = 1;
                                foreach ($financas['investimento'] as $financa):
                                    ?>
                                    <tr>
                                        <td><?php echo $qtd ?></td>
                                        <td><?php echo $financa['descricao'] ?></td>
                                        <td><?php echo $this->formatDateView($financa['data']) ?></td>
                                        <td><?php echo $this->formatDinheiroView($financa['valor']) ?></td>
                                    </tr>
                                    <?php
                                    $qtd++;
                                endforeach;
                                ?>
                                <tr class="footer">
                                    <th colspan="3" >Valor Total</th>
                                    <th><?php echo $this->formatDinheiroView($investimento['valor']) ?></th>
                                </tr>
                            </tbody>
                        </table>
                        <?php
                    endif;
                endif;
                ?>

                <!-- fim section -->
            </div>
            <!-- fim container -->
    </body>
</html>