
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8" />
        <link rel="shortcut icon" href="sasokaEm.png" />
        <link rel="stylesheet" type="text/css" href="style.css" />
        <title>Login</title>
    </head>
    
    <body id="home">
        <div class="rain">
            <div class="border start">
                
                <div id="formulario">
                <form action="verifica_login.php" method='post'>
                    <fieldset>
                    <label for="email">Email</label>
                    <input name="email" type="text" onkeyup="maiuscula(this)" placeholder="Email"/>
                    <label for="senha" >Senha</label>
                    <input name="senha" type="password" placeholder="Senha"/>
                    <input type="submit" value="LOGIN"/>
                    <input type="hidden" name="acao" value="fazer_login"/>
                    </fieldset>
                </form>
                </div>
                    
            </div>
        </div>

    </body>
</html>