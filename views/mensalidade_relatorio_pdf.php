
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
                <h2>Relatório dos Cooperados</h2>
                <table class="table">
                    <tr>
                        <th>Categoria</th>
                        <th>Status</th>
                        <th>Por</th>
                        <th>Busca</th>
                    </tr>
                    <tr>
                        <td><?php echo $busca['tipo'] ?></td>
                        <td><?php echo $busca['status'] ?></td>
                        <td><?php echo $busca['por'] ?></td>
                        <td><?php echo $busca['campo'] ?></td>
                    </tr>
                </table>
                <hr>


                <?php if (!empty($cooperados)) : ?>
                    <h3 class="text-right">Total: <?php echo count($cooperados) > 1 ? count($cooperados) . ' registros encontrados' : count($cooperados) . ' registro encontrado' ?>.</h3>
                    <?php foreach ($cooperados as $cooperado): ?>
                        <h3> <?php echo!empty($cooperado['nome_completo']) ? $cooperado['nome_completo'] : ''; ?>  <?php echo!empty($cooperado['nz']) ? "- NZ " . $cooperado['nz'] : ''; ?> </h3>
                        <table class="table">
                            <tr>
                                <th>Ano</th>
                                <th>Janeiro</th>
                                <th>Fevereiro</th>
                                <th>Março</th>
                                <th>Abril</th>
                                <th>Maio</th>
                                <th>Junho</th>
                                <th>Julho</th>
                                <th>Agosto</th>
                                <th>Setembro</th>
                                <th>Outubro</th>
                                <th>Novembro</th>
                                <th>Dezembro</th>
                                <th>Total</th>
                            </tr>

                            <?php
                            if (isset($cooperado['mensalidades']) && !empty($cooperado['mensalidades'])):
                                $total = 0;
                                foreach ($cooperado['mensalidades'] as $mensalidade):
                                    $total = $mensalidade['janeiro'] + $mensalidade['fevereiro'] + $mensalidade['marco'] + $mensalidade['abril'] + $mensalidade['maio'] + $mensalidade['junho'] + $mensalidade['julho'] + $mensalidade['agosto'] + $mensalidade['setembro'] + $mensalidade['outubro'] + $mensalidade['novembro'] + $mensalidade['dezembro'];
                                    ?>
                                    <tr>
                                        <td><?php echo!empty($mensalidade['ano']) ? $mensalidade['ano'] : '' ?></td>
                                        <td><?php echo!empty($mensalidade['janeiro']) ? $this->formatDinheiroView($mensalidade['janeiro']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['fevereiro']) ? $this->formatDinheiroView($mensalidade['fevereiro']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['marco']) ? $this->formatDinheiroView($mensalidade['marco']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['abril']) ? $this->formatDinheiroView($mensalidade['abril']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['maio']) ? $this->formatDinheiroView($mensalidade['maio']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['junho']) ? $this->formatDinheiroView($mensalidade['junho']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['julho']) ? $this->formatDinheiroView($mensalidade['julho']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['agosto']) ? $this->formatDinheiroView($mensalidade['agosto']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['setembro']) ? $this->formatDinheiroView($mensalidade['setembro']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['outubro']) ? $this->formatDinheiroView($mensalidade['outubro']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['novembro']) ? $this->formatDinheiroView($mensalidade['novembro']) : '' ?></td>
                                        <td><?php echo!empty($mensalidade['dezembro']) ? $this->formatDinheiroView($mensalidade['dezembro']) : '' ?></td>
                                        <td class="table-acao">
                                            <?php echo!empty($total) ? $this->formatDinheiroView($total) : '' ?>
                                        </td>
                                    </tr>
                                    <?php
                                endforeach;
                            endif;
                            ?>

                        </table>

                        <?php
                    endforeach;
                endif;
                ?>
            </div>

        </div>
    </body>
</html>