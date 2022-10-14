<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário | GN</title>
    <style>
        .box{
            color: white;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            background-color: rgba(0, 0, 0, 0.6);
            padding: 15px;
            border-radius: 15px;
            width: 20%;
            margin-top: 200px;
        }
        fieldset{
            border: 3px solid dodgerblue;
        }
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: dodgerblue;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            background: none;
            border: none;
            border-bottom: 1px solid white;
            outline: none;
            color: white;
            font-size: 15px;
            width: 100%;
            letter-spacing: 2px;
        }
        .labelInput{
            position: absolute;
            top: 0px;
            left: 0px;
            pointer-events: none;
            transition: .5s;
        }
        .inputUser:focus ~ .labelInput,
        .inputUser:valid ~ .labelInput{
            top: -20px;
            font-size: 12px;
            color: dodgerblue;
        }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-image: linear-gradient(to right,rgb(0, 92, 197), rgb(90, 20, 220));
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #submit:hover{
            background-image: linear-gradient(to right,rgb(0, 80, 172), rgb(80, 19, 195));
        }
    </style>
</head>
<body>
    <div class="box">
        <form action="">
            <fieldset>
                <legend><b>Cadastro de Receita</b></legend>
                <br>
                <div class="inputBox">
                    <input type="number" name="identificacao" id="identificacao" class="inputUser" required>
                    <label for="identificacao" class="labelInput">Nº Id. Receita</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="nome" id="nome" class="inputUser" required>
                    <label for="nome" class="labelInput">Nome da Receita</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="dataEmissao">Data de Emissão</label>
                    <input type="date" name="dataEmissao" id="dataEmissao" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <label for="dataVencimento">Data de Vencimento</label>
                    <input type="date" name="dataVencimento" id="dataVencimento" class="inputUser" required>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="text" name="email" id="email" class="inputUser" required>
                    <label for="email" class="labelInput">Email</label>
                </div>
                <br><br>
                <div class="inputBox">
                    <input type="tel" name="telefone" id="telefone" class="inputUser" required>
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>
                <p>Forma de Pagamento:</p>
                <input type="radio" id="dinheiro" name="formapagamento" value="dinheiro" required>
                <label for="dinheiro">Dinheiro</label>
                <br>
                <input type="radio" id="pix" name="formapagamento" value="pix" required>
                <label for="pix">Pix</label>
                <br>
                <input type="radio" id="boleto" name="formapagamento" value="boleto" required>
                <label for="boleto">Boleto</label>
                <br>
                <input type="radio" id="credito" name="formapagamento" value="credito" required>
                <label for="credito">Cartão no Crédito</label>
                <br>
                <input type="radio" id="debito" name="formapagamento" value="debito" required>
                <label for="debito">Cartão no Débito</label>
                <br>
                <input type="radio" id="link" name="formapagamento" value="link" required>
                <label for="link">Link de pagamento</label>
                <br>
                <input type="radio" id="outro" name="formapagamento" value="outro" required>
                <label for="outro">Outro</label>
                <br><br>
                <div class="inputBox">
                    <input type="number" name="valor" id="valor" class="inputUser" required>
                    <label for="valor" class="labelInput">Valor</label>
                </div>
                <br><br>
                <input type="submit" name="submit" id="submit">
            </fieldset>
        </form>
    </div>
</body>
</html>