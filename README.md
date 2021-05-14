<h1 align="center">Teste Fernando Medrado</h1>
<p align="center">Desafio EAUX</p>
<h4 align="center">
    🚧  Para configuração 🚀 atender aos requisitos abaixo, qualquer dúvida pode ligar a vontade 61 98646-7366 também Watsapp  🚧

    Necessário PHP 7.3 ou superior.
    Apache ou NGINX sugiro usar o XAMP por conter versão do PHP mais atual.
        https://www.apachefriends.org/pt_br/download.html
    Larável 8 ou superior
        https://laravel.com/docs/4.2
    Composer
        https://getcomposer.org/download/
</h4>

Diretórios 
==========

+ app/Business -> diretório raiz para regras de negócio, modelo e demais validações extras.
+ app/Business/Adapter -> local para classes de acesso externo, como LDAP, SMS, cliente REST, etc.
+ app/Business/Converter -> conversores de entidade de request para modelos.
+ app/Business/Models -> entidades persistentes. Não deve vazar do diretório Business em nenhuma circustância.
+ app/Business/Repository -> classe de acesso a dados. Para cada modelo persistente há uma entrada neste diretório.
+ app/Http/Controllers -> classes de regras de tela e chamadas ao Business. Apenas rotas sem regra de negócio em nenhuma circustância.
+ app/Http/Requests -> abstrai os dados e validações das requests e respostas JSON.
+ tests/Feature -> testes de controlador, acessando regras e mockando repository e adapter quando houver
+ database/migrations -> versionamento de script de banco.
+ resources/views -> páginas blade.
+ public/js -> arquivos JS das paginas.

Metodos
=======
Seguirei a nomeclatura padrão, não do Larável, para os metódos CRUD, como:

+ listar -> abertura da tela
+ atualizar -> criação/atualização
+ visualizar -> detalhe
+ deletar -> deletar

Rodar o projeto Local
===============
No arquivo .env que está na raiz do projeto configurar o banco de dados e criar o banco de dados antes de rotar as migrates:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=desafioeaux
DB_USERNAME=root
DB_PASSWORD=

===============
+ composer require laravel/ui --dev
+ composer install
+ php artisan key:generate
+ php artisan migrate
+ npm install
+ npm run dev

+ acesse http://localhost/public/projeto
+ caso tenha habilitado o modulo Auth do larável, calma não criemos pânico, na criação do banco de dados foi inserido um usuário:
usuário: email@eaux.com.br
senha: 123456789
