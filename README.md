
# 🔒 Sistema Login 

Um **desafio de programação** completo para implementar um sistema de autenticação seguro com PHP e MySQL, incluindo:

✅ **Login e Cadastro de Usuários**

✅ **Validação de Dados**

✅ **Criptografia de Senhas (password_hash)**

✅ **Proteção contra SQL Injection**

✅ **Sessões Seguras**

✅ **Painel Administrativo**

# 📌 Objetivo do Desafio

Desenvolver um sistema de autenticação que:

* Valide credenciais (usuário/senha)

* Armazene senhas de forma segura (hash)

* Proteja rotas (área restrita)

* Forneça feedback claro (mensagens de erro/sucesso)

# ✨ Funcionalidades Implementadas

## 🔐 Autenticação


* Login com verificação de credenciais
* Cadastro de novos usuários com senha criptografada
* Logout seguro (destruição de sessão)

## 🛡️ Segurança

* Proteção contra SQL Injection (MySQLi + prepared statements)

* Limite de tentativas de login (bloqueio temporário)

* Sessões protegidas (session_regenerate_id)

##  📱 Interface

* Design responsivo (mobile e desktop)
* Mensagens de erro/sucesso claras
* Formulários validados (front-end e back-end)



## ⚙️ Stack utilizada

**Front-end:** HTML5, CSS3

**Back-end:** PHP 8+, MySQLi

**Segurança:** password_hash(), proteção SQL Injection



## 📥Instalação

1️⃣ Clone o repositório 
~~~
git clone https://github.com/seu-usuario/sistema-login.git
cd sistema-login
~~~

2️⃣ Configure o banco:

~~~Mysqli
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL
);
~~~
3️⃣ Edite `conexao.php` com seus dados

~~~php
$host = "localhost";
$usuario = "root";
$senha = "";
$database = "login";

~~~

4️⃣ Acesse no navegador:

 🌐 ``http://localhost/sistema-login``
 
## 📷 Screenshots e demonstração em vídeo


| Descrição da Imagem | Visualização |
|---------------------|-------------|
| Tela de Login       | ![image](https://github.com/user-attachments/assets/27fb1f34-c82c-460d-9949-1fb875d4eb01)|
| Página de Cadastro  | ![image](https://github.com/user-attachments/assets/6b28ddb2-dc88-481f-a49d-7f96d71a6f76)|
| Painel Administrativo |![image](https://github.com/user-attachments/assets/f6b92efa-1692-406a-8570-4bbfeb920fe2)|

▶️ [Clique para assistir no YouTube](https://youtu.be/7SgKESE-GOk)


# 👨💻 Créditos 

Desenvolvido por **Arthur Ferreira**












