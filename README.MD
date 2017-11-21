Layout do arquivo de Importaçào

authors.txt
{
  "firstName": "Nome",
  "lastName": "Sobrenome"
}

books.txt
A aplicação tem um campo onde pode-se adicionar o ID do Autor, nesse caso
o layout ficaria:
{
  "title": "Inferno"
}
Ao deixar o campo de ID vazio o layout passa a ser 
{
  "title": "Inferno"
  "authorId": id <numero-inteiro>
}


Ambiente de desenvolvimento:
- composer
- node
- bower
- git
- gulp
- codeigniter

-instalar node.js
-instalar composer

- instalando ci 
   composer create-project bcit-ci/codeigniter "nome-do-projeto" --prefer-dist

- instalando bower
   npm install -g bower

-instalando bootstrap  
   bower init
   bower install --save bootstrap

-instalando gulp 
   npm install -g gulp
   npm install gulp gulp-jshint gulp-uglify gulp-concat gulp-rename --save-dev

-iniciando repositório local
   git init
   <configurações de usuário>
   git add --all
   git commit -m "Primeiro Commit do projeto expbibliapp"
   git remote add origin git@github.com:MadsonSouza/expbibliapp.git
   git push -u origin master

