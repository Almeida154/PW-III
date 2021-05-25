<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/util.css">
        <link rel="stylesheet" href="css/main.css">
        <title>Contatos</title>
    </head>
    <body>
        <div class="form-style-5">
            <h1 class="m-b-20 fs-25">Novo contato?</h1>
            <form ajax="true" id="form" action="controllers/insertMessage.php" method="POST" autocomplete="off" onsubmit="return validateForm()">
                <input autocomplete="nope" maxlength="30" type="text" name="name" placeholder="Nome" required>
                <input autocomplete="nope" maxlength="30" type="text" name="email" placeholder="Email" required>
                <input autocomplete="nope" maxlength="30" type="text" name="subject" placeholder="Assunto" required>
                <textarea autocomplete="nope" maxlength="100" name="message" placeholder="Mensagem" resiza required></textarea>
                <input type="submit" value="Adicionar"/>
            </form>
            <a class="m-t-20 fs-15 flex-c linkao" href="contacts.php">Visualizar contatos</a>
        </div>

        <script type="text/javascript" src="http://code.jquery.com/jquery-3.0.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script>

            var formValues = [
                document.forms["form"]["name"],
                document.forms["form"]["email"],
                document.forms["form"]["subject"],
                document.forms["form"]["message"]
            ]

            var errorsContent = [
                'O nome deve ter ao menos 5 crctrs!',
                'O email deve ter ao menos 8 crctrs!',
                'O assunto deve ter ao menos 10 crctrs!',
                'A mensagem deve ter ao menos 15 crctrs!'
            ]

            var ajaxSend = true

            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            function verifies(){
                var rules = [5, 8, 10, 15]
                var errors = [false, false, false, false]
                var hasError = false

                for(let i = 0; i < rules.length; i++){
                    if((formValues[i].value).length < rules[i]) errors[i] = true
                }
                
                for(let i = 0; i < errors.length; i++){
                    if(errors[i]) hasError = true;
                }

                //return = (hasError) ? errors[] : true
                
                if(hasError) return errors
                else return true
            }

            function validateForm(){
                if(verifies() === true){
                    return true;
                } else {
                    ajaxSend = false
                    for(let i = verifies().length; i > -1 ; i--){
                        if(verifies()[i]){
                            Toast.fire({
                                icon: 'error',
                                title: errorsContent[i]
                            })
                            formValues[i].value = ''
                        }
                    }
                    return false
                }
            }

            $('form[ajax=true]').submit(function(e) {
                e.preventDefault()
                
                var form_data = $(this).serialize()
                var form_url = $(this).attr("action")
                var form_method = $(this).attr("method").toUpperCase()

                if(ajaxSend){
                    $.ajax({
                        url: form_url, 
                        type: form_method,      
                        data: form_data,     
                        cache: false,
                        success: 
                            Toast.fire({
                                icon: 'success',
                                title: 'Cadastrado!'
                            })
                    })
                } else ajaxSend = true

                if(verifies() === true){
                    for(let i = 0; i < formValues.length; i++){
                        formValues[i].value = ''
                    }   
                }
    
            })

        </script>

    </body>
</html>