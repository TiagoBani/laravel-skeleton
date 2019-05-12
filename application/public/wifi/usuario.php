<?php
require('autorization.php');

if (!empty($_POST['subscription']) && !empty($_POST['birthday'])) {
    if (Autorization::validate($_POST['subscription'], $_POST['birthday'])) {
        header("location: https://portaldoise:8443/portal/SelfRegistration.action?from=LOGIN&partnerClass=".$_POST['subscription']."&partnerFunction=".$_POST['birthday']);
    } else
        header("location: failed.php");

    die();
}
?>
<html>
<head>
        <!-- Latest JQuery compiled and minified -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="https://raw.githubusercontent.com/igorescobar/jQuery-Mask-Plugin/master/src/jquery.mask.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <title>Login de acesso</title>
    </head>
    <body>
        <div class="container" style="margin: 5% auto">
            <div class="rows">
                <div class="col-md-6 offset-md-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="text-center">
                                <div class="col-sm-12">
                                <img src="http://www.iamspe.sp.gov.br/wp-content/themes/iamspe/images/logo.png">
                                </div>
                                <div class="col-sm-12" style="margin: 1%;">
                                    <h5><span>Favor informar numero da carterinha e data de nascimento</span></h5>
                                </div>
                            </div>        
                        </div>
                        <div class="card-body">
                            <form action="<?= $_SERVER['PHP_SELF'] ?>">
                                <div class="rows text-center">
                                    <div class="cols-md-12">
                                        <div class="form-group form-inline">
                                            <div class="col-sm-3 offset-1">
                                                <label for="subscription">Carterinha de inscrição</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id='subscription' name='subscription' type="number" minlength="6" maxlength="10" required class="form-control" style="max-width: 155%;"/>
                                            </div>
                                        </div>
                                        <div class="form-group form-inline">
                                            <div class="col-sm-3 offset-1">
                                                <label for="birthday">Data de nascimento</label>
                                            </div>
                                            <div class="col-sm-6">
                                                <input id='birthday' name='birthday' type="date" required class="form-control"
                                                       value="1900-01-01" min="1900-01-01" max="2025-12-30" pattern="[0-9]{4}-[0-9]{2}-[0-9]{2}" style="max-width: 155%;"/>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success">Enviar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
