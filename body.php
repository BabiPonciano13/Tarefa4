<body style="background-color: #BAC0C1;">
       
            <nav class="navbar navbar-inverse" role="navigation">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li><a href='/curso_alpha.php'>CURSO ALPHA</a></li>
                            <li><a href='/alunos.php'>Alunos</a></li>
                            <li><a href='/professores.php'>Professores</a></li>
                            <?php if ($_SESSION['admin'] == 'true'): ?>
                            <li><a href='/usuarios.php'>Usuários</a></li>
                             <?php endif; ?>
                            <li><a href="/logout.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        
      