<?php
require_once('connection.php');

?>
<!DOCTYPE html>
<html>

<head>
    <title>Formulário Teste</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@400;500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>



    <div>
        <form action="" method="post" id="formulario">
            <div class="container ">

                <div class="row align-items-center justify-content-around">
                    <div class="col-sm-5 ">
                        <h1 class="mt-4 ">Formulário Teste</h1>
                        <p class="mb-4 ">Preencha todos os campos corretamente</p>

                        <label class="mb-2" for="name"><b>Nome Completo</b></label>
                        <input class="form-control mb-2" id="name" type="text" name="name" required>
                        <br>
                        <label class="mb-2" for="email"><b>Endereço de E-mail</b></label>
                        <input class="form-control mb-2" id="email" type="email" name="email" required>
                        <div class="email-response"></div>
                        <br>
                        <label class="mb-2" for="cpf"><b>CPF</b></label>
                        <input class="form-control mb-2" id="cpf" type="text" name="cpf" required>
                        <div class="cpf-response"></div>

                        <div class=" mt-4 text-center">
                            <button class="btn btn-success col-10 py-2 " type="submit" id="register"
                                name="enviar">Enviar</button>
                        </div>
                    </div>
                    <div class=" col-md-6">
                        <table id="myTable" class=" table mt-5 pt-3">
                            <thead>
                                <tr>
                                    <th scope="col">Nome Completo</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">CPF</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>

                </div>
            </div>
        </form>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.12/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
    $(document).ready(function() {

        $('#cpf').mask('999.999.999-99');

        jQuery.validator.addMethod("cpf", function(value, element) {
            value = jQuery.trim(value);

            value = value.replace('.', '');
            value = value.replace('.', '');
            cpf = value.replace('-', '');
            while (cpf.length < 11) cpf = "0" + cpf;
            var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
            var a = [];
            var b = new Number;
            var c = 11;
            for (i = 0; i < 11; i++) {
                a[i] = cpf.charAt(i);
                if (i < 9) b += (a[i] * --c);
            }
            if ((x = b % 11) < 2) {
                a[9] = 0
            } else {
                a[9] = 11 - x
            }
            b = 0;
            c = 11;
            for (y = 0; y < 10; y++) b += (a[y] * c--);
            if ((x = b % 11) < 2) {
                a[10] = 0;
            } else {
                a[10] = 11 - x;
            }

            var retorno = true;
            if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) retorno =
                false;

            return this.optional(element) || retorno;

        }, "Informe um CPF válido");

    });

    $(function() {
        $("#formulario").validate({
            rules: {
                name: {
                    required: true,
                    minlength: 4
                },
                email: {
                    required: true
                },
                cpf: {
                    cpf: true,
                    required: true,

                }
            },
            messages: {
                name: {
                    required: "Por favor, informe seu nome",
                    minlength: "O nome deve ter pelo menos 4 caracteres"
                },
                email: {
                    required: "É necessário informar um e-mail",
                    email: "Entre um endereço de e-mail válido"
                },
                cpf: {
                    cpf: "CPF inválido",
                    required: "É necessário informar um CPF válido"

                }
            },

            submitHandler: function() {

            }
        });

    });





    $(function() {
        $('#register').click(function(e) {

            var valid = this.form.checkValidity();

            if (valid) {


                var name = $('#name').val();
                var email = $('#email').val();
                var cpf = $('#cpf').val();

                e.preventDefault();

                $.ajax({
                    type: 'POST',
                    url: 'process.php',
                    data: {
                        name: name,
                        email: email,
                        cpf: cpf
                    },
                    success: function(data) {
                        Swal.fire({
                            'title': 'Successful',
                            'text': data,
                            'type': 'success'
                        })

                        row = `<tr>
                            <td>${name}</td>
                            <td>${email}</td>
                            <td>${cpf}</td>
                            </tr>`
                        $('#myTable tbody').append(row);

                    },
                    error: function(data) {
                        Swal.fire({
                            'title': 'Errors',
                            'text': 'There were errors while saving the data.',
                            'type': 'error'
                        })
                    }
                });



                $("#formulario")[0].reset();
            } else {

            }
        });
    });

    $.ajax({
        type: "GET",
        url: "process.php",
        success: function(data) {



            let rows = JSON.parse(data)


            for (let prop in rows) {
                let row = rows[prop]
                console.log(row)
            }
            rows.forEach((infos) => {
                row = `<tr>
					<td>${infos.name}</td>
					<td>${infos.email}</td>
					<td>${atob(infos.cpf)}</td>
					</tr>`
                $('#myTable tbody').append(row)

            })

        }
    });
    </script>
</body>

</html>