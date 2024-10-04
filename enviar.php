<?php
// Incluindo os arquivos principais do PHPMailer
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturando os dados do formulário
    $nome = $_POST['nome'];
    $cargo = $_POST['cargo'];
    $empresa = $_POST['empresa'];
    $cnpj = $_POST['cnpj'];
    $setor = $_POST['setor'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $data = $_POST['data'];
    $urgencia = $_POST['urgencia'];
    $observacoes = $_POST['observacoes'];

    // Criando uma nova instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configurações do servidor SMTP
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; // Exemplo com Gmail
        $mail->SMTPAuth   = true;
        $mail->Username   = 'noreply.ynconsultorialogistica@gmail.com';  // Substitua pelo seu e-mail
        $mail->Password   = 'Ynconsullog2024';            // Substitua pela sua senha ou senha de app
        $mail->SMTPSecure = 'tls';                 
        $mail->Port       = 587;

        // Configurações do e-mail
        $mail->setFrom('noreply.ynconsultorialogistica@gmail.com, 'Novo Cadastro');
        $mail->addAddress('yuribrlive@gmail.com', 'Consultoria Logística');

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = 'Nova Solicitação de Consultoria';
        $mail->Body    = "<h1>Nova Solicitação de Consultoria</h1>
                          <p><strong>Nome do Solicitante:</strong> $nome</p>
                          <p><strong>Cargo:</strong> $cargo</p>
                          <p><strong>Nome da Empresa:</strong> $empresa</p>
                          <p><strong>CNPJ:</strong> $cnpj</p>
                          <p><strong>Setor/Área de Solicitação:</strong> $setor</p>
                          <p><strong>Telefone de Contato:</strong> $telefone</p>
                          <p><strong>E-mail do Solicitante:</strong> $email</p>
                          <p><strong>Data da Solicitação:</strong> $data</p>
                          <p><strong>Urgência:</strong> $urgencia</p>
                          <p><strong>Observações Adicionais:</strong> $observacoes</p>";

        // Enviar e-mail
        $mail->send();
        echo 'Solicitação enviada com sucesso!';
    } catch (Exception $e) {
        echo "A solicitação não pôde ser enviada. Erro: {$mail->ErrorInfo}";
    }
}
?>
