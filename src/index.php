<?php
$date = new DateTime();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Infoeste 2024 - Criação de APIs com Express</title>
    <style>
        body {
            background-color: #f8f9fa;
            color: #333;
        }

        pre {
            background-color: #272b30;
            color: #f8f9fa;
            font-family: 'Courier New', Courier, monospace;
            overflow-x: auto;
        }

        .accordion-button {
            font-weight: bold;
        }

        .accordion-button .fw-bold {
            margin-right: 0.5rem;
        }

        footer {
            background-color: #212529;
            color: #f8f9fa;
            padding: 1rem;
        }

        .theme-toggle {
            position: fixed;
            top: 1rem;
            right: 1rem;
            z-index: 1000;
        }
    </style>
</head>

<body>
    <!-- Botão para alternar entre temas -->
    <button id="themeToggle" class="btn btn-outline-secondary theme-toggle">Alternar Tema</button>

    <div class="container d-flex flex-column min-vh-100 justify-content-center py-5">
        <!-- Título centralizado -->
        <header class="text-center mb-5">
            <h1 class="display-4">Criação de APIs com Express - <?php echo $date->format('Y') ?></h1>
        </header>

        <!-- Seção de links com espaçamento -->
        <section class="row justify-content-around text-center">
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">Slides</h2>
                        <a href="/download.php?arq=0" class="btn btn-primary mt-3" target="_blank">Download Slides</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="h5">Repositório</h2>
                        <a href="/download.php?arq=1" class="btn btn-primary mt-3">Download Arquivo</a>
                    </div>
                </div>
            </div>
        </section>
        <hr class="my-5">

        <!-- Seção de Passo a Passo -->
        <section>
            <div class="text-center mb-4">
                <h2>Passo a Passo para Execução do Projeto</h2>
            </div>
            <pre class="bg-dark text-white p-4 rounded">
# Passo 1: Descompacte o arquivo baixado
# Passo 2: Navegue até a pasta do projeto no terminal
cd caminho/do/projeto

# Passo 3: Abra a pasta do projeto no Visual Studio Code (opcional)
code .

# Passo 4: Instale as dependências do projeto
npm install

# Passo 5: Execute o projeto
npm run dev

# Pronto! O projeto estará rodando localmente.
            </pre>
        </section>
        <hr class="my-5">

        <!-- Seção de Endpoints -->
        <section>
            <div class="text-center mb-4">
                <h2>Endpoints</h2>
            </div>
            <div class="accordion accordion-flush" id="accordionEndpoints">
                <!-- Rota GET - /usuarios/listar -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                            <span class="fw-bold text-success">GET</span> - /usuarios/listar
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionEndpoints">
                        <div class="accordion-body">
                            Endpoint para listar todos os usuários cadastrados.
                            <p>Retorno com status 200 se bem-sucedido:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": true,
    "data": [
        {
            "usu_id": 1,
            "usu_nome": "Fulano",
            "usu_email": "fulano@gmail.com",
            "usu_idade": 25
        },
        {
            "usu_id": 2,
            "usu_nome": "Ciclano",
            "usu_email": "ciclano@gmail.com",
            "usu_idade": 30
        }
    ]
}
                            </pre>
                            <p>Caso não existam dados, retornará a seguinte mensagem com status 404:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": false,
    "msg": "Nenhum usuário encontrado."
}
                            </pre>
                            <p>Configuração no Postman:</p>
                            <ul>
                                <li><strong>Método:</strong> GET</li>
                                <li><strong>URL:</strong> http://seuapi.com/usuarios/listar</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Rota GET - /usuarios/buscar/:id -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingTwo">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="fw-bold text-success">GET</span> - /usuarios/buscar/:id
                        </button>
                    </h2>
                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionEndpoints">
                        <div class="accordion-body">
                            Endpoint para buscar um usuário específico pelo ID.
                            <p>Retorno com status 200 se o usuário for encontrado:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": true,
    "data": {
        "usu_id": 1,
        "usu_nome": "Fulano",
        "usu_email": "fulano@gmail.com",
        "usu_idade": 25
    }
}
                            </pre>
                            <p>Caso o usuário não seja encontrado, retornará a seguinte mensagem com status 404:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": false,
    "msg": "Usuário não encontrado."
}
                            </pre>
                            <p>Configuração no Postman:</p>
                            <ul>
                                <li><strong>Método:</strong> GET</li>
                                <li><strong>URL:</strong> http://seuapi.com/usuarios/buscar/:id</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Rota POST - /usuarios/criar -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingThree">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            <span class="fw-bold text-warning">POST</span> - /usuarios/criar
                        </button>
                    </h2>
                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionEndpoints">
                        <div class="accordion-body">
                            Endpoint para criar um novo usuário.
                            <p>Enviar um objeto JSON no corpo da requisição (body) com os seguintes campos:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "nome": "Nome do usuário",
    "email": "email@exemplo.com",
    "idade": 25
}
                            </pre>
                            <p>Retorno com status 201 ao criar o usuário com sucesso:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": true,
    "msg": "Usuário criado com sucesso!"
}
                            </pre>
                            <p>Caso ocorram erros, retornará a seguinte mensagem com status 400:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": false,
    "msg": "Erro ao criar o usuário."
}
                            </pre>
                            <p>Configuração no Postman:</p>
                            <ul>
                                <li><strong>Método:</strong> POST</li>
                                <li><strong>URL:</strong> http://seuapi.com/usuarios/criar</li>
                                <li><strong>Body:</strong> Selecionar "raw" e escolher "JSON" no dropdown.</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Rota DELETE - /usuarios/deletar/:id -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFour">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                            <span class="fw-bold text-danger">DELETE</span> - /usuarios/deletar/:id
                        </button>
                    </h2>
                    <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionEndpoints">
                        <div class="accordion-body">
                            Endpoint para deletar um usuário específico pelo ID.
                            <p>Retorno com status 200 ao deletar o usuário com sucesso:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": true,
    "msg": "Usuário deletado com sucesso!"
}
                            </pre>
                            <p>Caso o usuário não seja encontrado, retornará a seguinte mensagem com status 404:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": false,
    "msg": "Usuário não encontrado."
}
                            </pre>
                            <p>Configuração no Postman:</p>
                            <ul>
                                <li><strong>Método:</strong> DELETE</li>
                                <li><strong>URL:</strong> http://seuapi.com/usuarios/deletar/:id</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- Rota PUT - /usuarios/atualizar -->
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingFive">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                            <span class="fw-bold text-primary">PUT</span> - /usuarios/atualizar
                        </button>
                    </h2>
                    <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#accordionEndpoints">
                        <div class="accordion-body">
                            Endpoint para atualizar as informações de um usuário.
                            <p>Enviar um objeto JSON no corpo da requisição (body) com os seguintes campos:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "id": 1,
    "nome": "Nome do usuário atualizado",
    "email": "email@exemplo.com",
    "idade": 30
}
                            </pre>
                            <p>Retorno com status 200 ao atualizar o usuário com sucesso:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": true,
    "msg": "Usuário atualizado com sucesso!"
}
                            </pre>
                            <p>Caso o usuário não seja encontrado ou ocorra algum erro, retornará a seguinte mensagem com status 404:</p>
                            <pre class="bg-dark text-white p-3 rounded">
{
    "ok": false,
    "msg": "Erro ao atualizar o usuário."
}
                            </pre>
                            <p>Configuração no Postman:</p>
                            <ul>
                                <li><strong>Método:</strong> PUT</li>
                                <li><strong>URL:</strong> http://seuapi.com/usuarios/atualizar</li>
                                <li><strong>Body:</strong> Selecionar "raw" e escolher "JSON" no dropdown.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <footer class="text-center">
        <p>&copy; Rodrigo de Oliveira, Infoeste 2024</p>
    </footer>

    <!-- Script para alternar o tema -->
    <script>
        document.getElementById('themeToggle').addEventListener('click', function() {
            document.body.classList.toggle('bg-black');
            document.body.classList.toggle('text-white');
            document.body.classList.toggle('bg-light');
            document.body.classList.toggle('text-dark');
        });
    </script>
</body>

</html>