<div id="section-container">
    <div class="row" >
        <div class="col-sm-12 col-md-12 col-lg-12" id="pagina-header">
            <h2>Motoristas Cadastrados no Aplicativo</h2>
            <ol class="breadcrumb">
                <li class="active"><a href="<?php echo BASE_URL ?>/home"><i class="fa fa-tachometer-alt"></i> Inicial</a></li>
                <li class="active"><i class="fa fa-users"></i> Motoristas Cadastrados no Aplicativo</li>
            </ol>
        </div>
    </div>
    <!--FIM pagina-header-->
    <div class="row">
        <div class="col-md-12 clear">
            <section class="panel panel-success">
                <header class="panel-heading">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                        <h4 class="panel-title"><i class="fa fa-search pull-left"></i> Painel de Busca <i class="fa fa-eye pull-right"></i></h4> </a>
                </header>
                <div id="collapseOne" class="panel-collapse collapse">
                    <article class="panel-body">
                        
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="iSelectBuscar">Por:</label>
                                        <select class="form-control" name="nSelectBuscar" id="iSelectBuscar">
                                            <option value="nz">NZ</option>
                                            <option value="nome">Nome</option>
                                            <option value="email">Email</option>
                                            <option value="status">Status</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="iCampo">Campo:  </label>
                                        <input type="text" class="form-control" name="nCampo" id="iCampo"/>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group"><br/>
                                        <button type="button" class="btn btn-warning" id="iBuscar" value="Buscar"><i class=" fa fa-search"></i>  Buscar</button>
                                    </div>
                                </div>
                            </div>
                        
                    </article>
                </div>
            </section>
        </div>
        <div class="col-md-12">
            <div class="alert alert-warning alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                Desculpe, não foi possível localizar nenhum registro!
            </div>
        </div>

        <div class = "col-md-12">
            <section class = "panel panel-black oculta" id="panel-lista-motoristas">
                <header class = "panel-heading">
                    <h4 class = "panel-title"><i class = "pull-left fa fa-users"></i>Motoristas</h4>
                </header>
                <article class="table-responsive">
                    <table class="table table-striped table-bordered table-hover table-condensed">
                        <thead><tr>
                                <th>NZ</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Veículo/Placa</th>
                                <th>Status</th>
                                <th>Ação</th>
                            </tr></thead>

                        <tbody id="content_motoristas">
                        </tbody>

                    </table>
                </article>
            </section>
        </div>
    </div>
    <!--FIM .ROW-->
</div>

<!--MODAL - ESTRUTURA BÁSICA-->
<section class="modal fade" id="modal_Excluir" tabindex="-1" role="dialog">
    <article class="modal-dialog modal-md" role="document">
        <section class="modal-content">
            <header class="modal-header bg-primary">
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 >Deseja remover este registro?</h4>
            </header>
            <article class="modal-body">
                <ul class="list-unstyled">
                    <li class="nome"></li>
                    <li class="email"></li>
                    <li class="nz"></li>
                </ul>
                <p class="text-justify text-danger"><span class="font-bold">OBS : </span> Ao clicar em "Excluir", este registro deixará de existir no aplicativo.</p>
            </article>
            <footer class="modal-footer">
                <a class="btn btn-danger pull-left removerMotorista" > <i class="fa fa-trash"></i> Excluir</a> 
                <button class="btn btn-default" type="button" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
            </footer>
        </section>
    </article>
</section>