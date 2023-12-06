<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog - Página Inicial</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px; /* Ajuste para o navbar fixo no topo */
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Blog</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php
                        echo $this->Html->link('sign up', ['controller' => 'Users', 'action' => 'add']);
                        echo $this->Html->link('login', ['controller' => 'Users', 'action' => 'login']);
                        echo $this->Html->link('dashboard', ['action' => 'dashboard']);
                        



                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container">
        <div class="row">
            <!-- Posts -->
            <div class="col-md-8">
                <h2>Posts Recentes</h2>
                <!-- Exemplo de Post -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <h3>Título do Post</h3>
                        <p>Conteúdo do post. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                    </div>
                </div>

                <!-- Adicione mais posts aqui -->

            </div>

            <!-- Barra Lateral -->
            <div class="col-md-4">
                <h2>Sidebar</h2>
                <!-- Conteúdo da barra lateral -->
                <div class="well">
                    <p>Algumas informações na barra lateral.</p>
                </div>

                <!-- Adicione mais conteúdo da barra lateral aqui -->

            </div>
        </div>
    </div>

    <!-- Rodapé -->
    <footer class="footer">
        <div class="container">
            <p>Rodapé do Blog</p>
        </div>
    </footer>

    <!-- Scripts Bootstrap e jQuery (necessários para funcionalidades como o navbar responsivo) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</body>
</html>

