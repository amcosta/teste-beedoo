<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<?php require_once 'partials/header.php'?>

<body>

<div class="container">

    <h4 class="col-md-12 text-right" style="margin-top: 50px;">Welcome to <?= $team['name'] ?> test!</h4>

    <div class="row" style="margin: 20px 0">
        <?php require_once 'partials/menu.php' ?>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1 class="display-4">Beedoo test</h1>
                    <p>Segue um breve resumo deste teste e mais abaixo temos cards de "erros" gerados propositalmente que precisam ser solucionados.</p>
                    <p>Estes erros são baseados em nosso cotidiano como: Análise de queries, Datatables, Javascript, Banco de dados (MySQL).</p>
                    <p>Sabemos que existem diferentes formas de resolver um problema, utilize a que considerar mais adequada, considerando que não será avaliada a forma correta ou errada, mas sim como foi pensado na solução. Sinta-se livre para alterar qualquer parte do código e a estrutura do banco se achar necessário. Além disso, envie apenas escrito outras possíveis soluções que você pensou e o motivo pelo qual não usou.</p>
                    <p class="lead">Estrutura do teste</p>
                    <ul>
                        <li>O sistema é baseado em "TIMES", considerando que um usuário só pode pertencer a um time</li>
                        <li>Um time não pode ter acesso as informações de outro time</li>
                        <li>Um time pode ter vários grupos e um usuário pode pertencer a diversos grupos dentro de seu time</li>
                        <li>Todo post tem um autor</li>
                    </ul>
                    <p class="lead">Obrigado por destinar seu tempo para fazer este teste.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <img class="card-img-top" src="https://picsum.photos/400?random" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card #1</h5>
                <p class="card-text">Estão sendo exibidos mais posts do que existem.</p>
                <a href="/posts" class="btn btn-primary">Go -></a>
            </div>
        </div>

        <div class="col-md-4">
            <img class="card-img-top" src="https://picsum.photos/399?random" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card #2</h5>
                <p class="card-text">O Datatables está com problema para ordenar por Data de Criação</p>
                <a href="/users" class="btn btn-primary">Go -></a>
            </div>
        </div>

        <div class="col-md-4">
            <img class="card-img-top" src="https://picsum.photos/398?random" alt="Card image cap">
            <div class="card-body">
                <h5 class="card-title">Card #3</h5>
                <p class="card-text">Crie uma tela de listagem de Grupos</p>
                <a href="/groups" class="btn btn-primary">Go -></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>