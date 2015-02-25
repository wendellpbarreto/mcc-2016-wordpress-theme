<form action="" class="contact__form" method="post">
    <div class="contact__form-identifiers medium-8 large-8 columns animated fade-in-left">
        <input type="text" name="name" placeholder="Nome"/>
        <input type="text" name="email" placeholder="E-mail"/>
        <input type="text" name="phone" placeholder="Telefone"/>
    </div><!-- div class='contact__form-identifiers' -->
    <div class="contact__form-message medium-12 large-12 columns animated fade-in-right">
        <textarea name="message" id="message" cols="30" rows="8" placeholder="Mensagem"></textarea>
    </div><!-- div class='contact__form-message large-12' -->
    <div class="contact__form-buttons column text-right animated fade-in-right">
        <button type="submit">Enviar</button>
    </div><!-- div class='contact__form-buttons' -->
</form><!-- form class='contact__form' -->
<?php
    // require 'vendor/autoload.php';
    // use Mailgun\Mailgun;
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $mg = new Mailgun("key-8a417fb26d05c330546e230a024eb954");
        $domain = "sandboxfb99291a8d38482294fd95eb2894f4ba.mailgun.org";
        # Now, compose and send your message.
        $result = $mg->sendMessage($domain, array('from'    => $_POST['email'],
                                        'to'      => 'abdo.farret@gmail.com',
                                        'subject' => 'Contato Abdo Farret | '.$_POST['name'].' | '.$_POST['phone'],
                                        'text'    => $_POST['message'] ));
        if ($result->http_response_code) {
            ?>
                <br />
                <br />
                <div class="row">
                    <div class="column">
                        <p>
                            Sua mensagem foi enviada com sucesso.
                        </p>
                    </div><!-- div.col-xs-12 -->
                </div><!-- div.row -->
            <?php
        }
    }
?>
