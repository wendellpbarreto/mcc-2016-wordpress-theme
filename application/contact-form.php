<?php
	require 'vendor/autoload.php';
	use Mailgun\Mailgun;

	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mgClient = new Mailgun('key-aab9a47513cacc56683fcae13f1e6d0f');
        $domain = "sandboxd39b248c7bf94925a7180a6117193c70.mailgun.org";
        $from = "postmaster@sandboxd39b248c7bf94925a7180a6117193c70.mailgun.org";
		$to = "assessoriamccufrn@gmail.com";

		$fields = array(
			array('Nome', 'person-name'),
			array('E-mail', 'e-mail'),
			array('Mensagem', 'message'),
			);

		$html = 'Este email foi enviado a partir do formulário de contato do Portal MCC UFRN.<br><br>';

        foreach ($fields as $index=>$field) {
            if ($_POST[$field[1]] != '') {
                $html .= '<br><strong>' . $field[0] . ':</strong> ' . $_POST[$field[1]];
            }
        }

		$subject = 'Formulário de Contato ' . $_POST['e-mail'] . ' | Portal MCC UFRN';

		$result = $mgClient->sendMessage($domain, array('from' => $from, 'to' => $to, 'subject' => $subject, 'html' => $html));
	}
?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && $result->http_response_code) : ?>
	<script>
		swal({
			title: "Enviado!",
			text: "Sua mensagem foi enviada com sucesso, agora é só aguardar e nós iremos responder o mais rápido possível.",
			type: "success",
			confirmButtonText: "Entendi!"
		}
		);
	</script>
<?php elseif ($_SERVER['REQUEST_METHOD'] == 'POST' && !$result->http_response_code) : ?>
	<script>
		swal({
			title: "Ops :(",
			text: "Infelizmente ocorreu um erro no envio da sua mensagem, pedimos que tente novamente mais tarde ou envie um e-mail diretamente para sinmed@sinmedrn.org.br",
			type: "error",
			confirmButtonText: "Entendi!"
		}
		);
	</script>
<?php endif ?>

<form id="contact-form" action="" method="post" class="form validate-this-form">
	<header>
		<p>Preenchar o formário abaixo e envie sua mensagem pra gente!</p>
	</header>

	<div class="form-group">
		<input id="person-name" name="person-name" type="text" placeholder="Nome" class="form-control" required>
	</div>
	<div class="form-group">
		<input id="phone" name="phone" type="text" placeholder="Telefone" class="form-control" required>
	</div>
	<div class="form-group">
		<input id="e-mail" name="e-mail" type="email" placeholder="E-mail" class="form-control" required>
	</div>
	<div class="form-group">
		<textarea name="message" id="message" cols="30" rows="10" placeholder="Mensagem" class="form-control" required></textarea>
	</div>
	<div class="form-group">
		<button class="btn" type="submit">Enviar Mensagem</button>
	</div>
</form>
