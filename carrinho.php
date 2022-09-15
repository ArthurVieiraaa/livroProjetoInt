<!DOCTYPE html>
<html lang="pt-br">
<head>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
		<title>Carrinho de Compras</title>
		<link rel="stylesheet" href="assets/style/estilo.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
		<link rel="shortcut icon" href="imgs/logoicon.png" type="image/x-icon">
</head>
<body>
    <div class="models">
        <div class="models-item">
            <a href="">
                <div class="models-item--img">
                    <img src="">
                </div>
                <div class="models-item--add">+</div>
            </a>
            <div class="models-item--price">R$ --</div>
            <div class="models-item--nome">--</div>
            <div class="models-item--desc">--</div>
        </div>
        <div class="cart--item">
            <img src="">
            <div class="cart--item--qtarea">
                <button class="cart--item-qtmenos">-</button>
                <div class="cart--item-qt">1</div>
                <button class="cart--item-qtmais">+</button>
            </div>
        </div>
    </div>
    <header>
        <div class="menu-openner">
            <span>0</span>
            <span class="material-icons">shopping_cart</span>
        </div>
    </header>
    <main>
        <h1>Modelos</h1>
        <div class="modelo-area"></div>
    </main>
    <aside>
        <div class="cart--area">
            <div class="menu-closer">
                <span class="material-icons">close</span>
            </div>
            <h1>Seus Modelos</h1>
            <div class="cart"></div>
            <div class="cart--details">
                <div class="cart--totalitem subtotal">
                    <span>Subtotal</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--totalitem desconto">
                    <span>Desconto (-10%)</span>
                    <span>R$ --</span>
                </div>
                <div class="cart--finalizar">Finalizar a compra</div>
            </div>
        </div>
    </aside>
    <div class="modelsWindowArea">
        <div class="modelWindowsBody">
            <div class="modelsInfo--cancelMobileButton">Voltar</div>
            <div class="modelsBig">
                <img src="">
            </div>
            <div class="modelsInfo">
                <h1>--</h1>
                <div class="modelsInfo--desc">--</div>
                <div class="modelsInfo--sizearea">
                    <div class="modelsInfo--sector">Escala</div>
                    <div class="modelsInfo--sizes">
                        <div ata-key="0" class="modelsInfo--size">1/72<span>--</span></div>
                        <div ata-key="1" class="modelsInfo--size">1/48<span>--</span></div>
                        <div ata-key="2" class="modelsInfo--size selected">1/32<span>--</span></div>
                    </div>
                </div>
                <div class="modelsInfo--pricearea">
                    <div class="modelsInfo--sector">Preço</div>
                    <div class="modelsInfo--price">
                        <div class="modelsInfo--actualPrice">R$ --</div>
                        <div class="modelsInfo--qtarea">
                            <button class="modelsInfo--qtmenos">-</button>
                            <div class="modelsInfo--qt">1</div>
                            <button class="modelsInfo--qtmais">+</button>
                        </div>
                    </div>
                </div>
                <div class="modelsInfo--addButton">Adicionar ao carrinho</div>
                <div class="modlsInfo--cancelButton">Cancelar</div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="..java/models.js"></script>
    <script type="text/javascript" src="..java/global.js"></script>
</body>
</html>