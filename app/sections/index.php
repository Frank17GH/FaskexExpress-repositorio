<?php 
    include(__MOD__."home/.Model.php"); 
    $obj = new Mod();
    $error=0;
    if (isset($_SESSION['fasklog'])) {
        header("location: ".__HOME__);
    }
    if (isset($_POST['user'],$_POST['pass'])) {
        $result = $obj->users($_POST['user'],$_POST['pass']);
        if ($result) {
            $_SESSION['fasklog'] = $result;
            header("location: ".__HOME__);
        }else{
            $error=1;
        }
    }
?>

<html lang="en-us"> 
    <head>
        <meta charset="utf-8">
        <title>[ Acceso ] | <?php echo __RAZON__ ?></title>    
        <meta name="description" content=""> 
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo  __REC__?>css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo __REC__?>fonts/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo  __REC__?>css/smartadmin-production.min.css">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="apple-mobile-web-app-status-bar-style" content="black">
    </head>
    <body class="" onkeydown=" if (event.ctrlKey && event.keyCode==32){fComb(1);}">
        <script>var _mod='<?php echo __MOD__ ?>';</script>
        <div id="content" style="background-color: #444; background-size: 100% 100%;background-repeat: no-repeat;height:100%">
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-4 hidden-xs hidden-sm"></div>
                <article class="col-xs-12 col-sm-12 col-md-9 col-lg-4" style="padding: 45px">
                   <div class="well no-padding">
                        <form action="" method="post" id="login-form" class="smart-form client-form" novalidate="novalidate">
                            <header>
                                <center>
                                    <b style="font-size: 36px"><?php echo __COM__ ?></b>
                                </center>
                                
                            </header>
                            <fieldset>
                                <section>
                                    <label class="label">Usuario</label>
                                    <label class="input"> 
                                        <i class="icon-append fa fa-user"></i>
                                        <input type="email" name="user" autofocus="" autocomplete="no">
                                        <b class="tooltip tooltip-top-right">
                                            <i class="fa fa-user txt-color-teal"></i> Ingrese su Usuario
                                        </b>
                                    </label>
                                </section>
                                <section>
                                    <label class="label">Contraseña</label>
                                    <label class="input"> 
                                        <i class="icon-append fa fa-lock"></i>
                                        <input type="password" name="pass">
                                        <b class="tooltip tooltip-top-right">
                                            <i class="fa fa-lock txt-color-teal"></i> Ingrese su Contraseña
                                        </b> 
                                    </label>
                                    <div class="note">
                                        <a href="forgotpassword.html">Olvide mi clave?</a>
                                    </div>
                                </section>
                                <section>
                                    <label class="checkbox">
                                        <input type="checkbox" name="remember" checked="">
                                        <i></i>Mantenerme en linea
                                    </label>
                                </section>
                            </fieldset>
                            <footer>
                                <button class="btn btn-primary" style="background-color: #f83;    border: 1px solid #f83;">
                                    Ingresar
                                </button>
                            </footer>
                        </form>
                    </div><center><b><code>Copyright © 2020 <a href="www.byproyet.com">#</a>. Todos los derechos reservados.</code></b></center>
                </article>
        </div>
        
        <div id="avc"></div>
        <div id="div-alerta" style="display: none"></div>
    </body> 
</html>