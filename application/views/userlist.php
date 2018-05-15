<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
 <?php require_once 'partials/header.php'?>
<body>

<div class="container">
    <h4 class="col-md-12 text-right" style="margin-top: 50px;">Listagem de usuários</h4>

    <div class="row" style="margin: 20px 0">
        <?php require_once 'partials/menu.php' ?>
    </div>

    <table id="table" class="table">
        <thead>
        <tr>
            <th data-id="id" data-width="40px">ID do usuário</th>
            <th data-orderable="true" data-id="fullname">Nome</th>
            <th data-id="treated_datetime">Data de cadastro</th>
        </tr>
        </thead>
    </table>
</div>

</body>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.16/b-1.5.1/b-colvis-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
<script src="/application/public/js/dtables.js"></script>
<script src="/application/public/js/userlist.js"></script>
</html>