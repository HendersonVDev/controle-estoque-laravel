Painel Administrativo — Controle de Estoque (Laravel 12)

Aplicação web desenvolvida com Laravel 12, focada em um controle de estoque simples, acessível por um painel administrativo com autenticação.

Projeto criado com finalidade educacional e de portfólio, demonstrando organização backend, uso de migrations, seeders e boas práticas iniciais com o framework.

🎯 Objetivo

Demonstrar conhecimentos em:

Laravel (estrutura MVC)

Autenticação de usuários

Painel administrativo

Controle de estoque básico

Migrations e seeders

Organização de código

O sistema é simples e será evoluído futuramente com novas funcionalidades.

🧩 Funcionalidades

Login e logout

Acesso restrito ao painel administrativo

Cadastro e gerenciamento simples de estoque

Criação automática de usuário de teste via seeder

## 🖼️ Telas do Sistema

### Tela de Login
![Tela de Login](assets/readme/login.png)

### Dashboard
![Tela de Login](assets/readme/dashboard.png)

### Estoque
![Dashboard](assets/readme/estoque.png)


🔐 Acesso de Teste

Usuário criado automaticamente via seeder:

Email: admin@teste.com

Senha: 123456

⚙️ Execução Local
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve


Acesso ao sistema:

http://127.0.0.1:8000/login

🤖 Uso de Inteligência Artificial

Este projeto contou com apoio pontual de Inteligência Artificial como ferramenta de estudo e produtividade, utilizada principalmente para:

Esclarecimento de conceitos do framework Laravel

Apoio na tomada de decisões técnicas

Revisão de estrutura e boas práticas

Todo o código foi analisado, compreendido e ajustado manualmente, sendo o processo de desenvolvimento parte ativa do aprendizado.
A IA foi utilizada como ferramenta auxiliar, e não como substituição do desenvolvimento.

🚀 Status do Projeto

✅ Funcional
ℹ️ Projeto simples, em evolução
ℹ️ Desenvolvido exclusivamente para fins de portfólio

👤 Autor

Desenvolvido por Henderson Vieira

📄 Licença

Projeto de uso educacional e demonstrativo.
