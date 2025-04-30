<?php
session_start();
include('conexao.php');

$error_message = '';

if (isset($_POST['email']) && isset($_POST['senha'])) {
    if (strlen($_POST['email']) == 0) {
        $error_message = "Preencha seu e-mail";
    } elseif (strlen($_POST['senha']) == 0) {
        $error_message = "Preencha sua senha";
    } else {
        $email = $mysqli->real_escape_string($_POST['email']);
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM usuarios WHERE email = '$email'";
        $sql_query = $mysqli->query($sql_code) or die("Falha na execução do código SQL: " . $mysqli->error);

        if ($sql_query->num_rows == 1) {
            $usuario = $sql_query->fetch_assoc();

            if (password_verify($senha, $usuario['senha'])) {
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['email'] = $usuario['email'];
                
                header("Location: painel.php");
                exit;
            } else {
                $error_message = "Falha ao logar! Senha incorreta.";
            }
        } else {
            $error_message = "Falha ao logar! E-mail não encontrado.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        :root {
            --primary-color: #4361ee;
            --secondary-color: #3f37c9;
            --error-color: #f72585;
            --text-color: #2b2d42;
            --light-gray: #f8f9fa;
            --white: #ffffff;
            --success-color: #4cc9f0;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
        }
        
        body {
            background-color: var(--light-gray);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            color: var(--text-color);
        }
        
        .login-container {
            background-color: var(--white);
            border-radius: 12px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.08);
            width: 100%;
            max-width: 420px;
            padding: 40px;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .login-header {
            text-align: center;
            margin-bottom: 30px;
        }
        
        .login-header h1 {
            font-size: 28px;
            font-weight: 600;
            margin-bottom: 10px;
        }
        
        .login-form .form-group {
            margin-bottom: 20px;
        }
        
        .login-form input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            font-size: 16px;
            transition: all 0.3s;
        }
        
        .login-form input:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(67, 97, 238, 0.2);
        }
        
        .login-form button {
            width: 100%;
            padding: 14px;
            background-color: var(--primary-color);
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.3s;
            margin-top: 10px;
        }
        
        .login-form button:hover {
            background-color: var(--secondary-color);
        }
        
        .error-message {
            color: var(--error-color);
            text-align: center;
            margin: 15px 0;
            font-size: 14px;
            font-weight: 500;
        }
        
        .success-message {
            color: var(--success-color);
            text-align: center;
            margin: 15px 0;
            font-size: 14px;
            font-weight: 500;
        }
        
        @media (max-width: 480px) {
            .login-container {
                padding: 30px;
            }
            
            .login-header h1 {
                font-size: 24px;
            }
            
            .login-form input, 
            .login-form button {
                padding: 12px 14px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <h1>Acesse sua conta</h1>
        </div>
        
        <?php if(!empty($error_message)): ?>
            <div class="error-message"><?php echo $error_message; ?></div>
        <?php endif; ?>
        
        <?php if(isset($_GET['cadastro']) && $_GET['cadastro'] === 'sucesso'): ?>
            <div class="success-message">Cadastro realizado com sucesso! Faça login.</div>
        <?php endif; ?>
        
        <form class="login-form" action="" method="POST">
            <div class="form-group">
                <input type="email" name="email" placeholder="E-mail" required
                       value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
            </div>
            
            <div class="form-group">
                <input type="password" name="senha" placeholder="Senha" required>
            </div>
            
            <button type="submit">Entrar</button>
            
            <div style="text-align: center; margin-top: 20px;">
                <a href="cadastro.php" style="color: var(--primary-color); text-decoration: none;">Não tem conta? Cadastre-se</a>
            </div>
        </form>
    </div>
</body>
</html>