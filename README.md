<p><h1 align="center">Meus contatos</h1></p>

# Sobre #

Aplicação CRUD para armazenamento de contatos utilizando o framework Laravel na versão 8.0. Front-end utilizando ReactJS, Redux e Bootstrap.

# Requisitos #

- A aplicação foi desenvolvida com o Wampserver 3.2.3 executando o MySQL 5.7.31 na porta 3306.
- Composer 
- Node 

# Instalação #
- Execute ```git clone https://github.com/geankaminski/laravel-react-contacts.git```
- Execute ```cd laravel-react-contacts```
- Execute ```composer install```
- Crie a base de dados ```contacts```
- Altere o arquivo .env com informações do seu banco de dados
- Execute ```php artisan key:generate```
- Execute ```npm install``` e na sequência ```npm run watch```
- Em outro terminal execute ```php artisan migrate --seed```
- Execute ```php artisan serve```
