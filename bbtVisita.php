<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1">
	<title>Biblioteca - Home</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
	<link rel="shortcut icon" href="imgs/logoicon.png" type="image/x-icon">
	<link rel="preconnect" href="https://fonts.googleapis.com" />
	<link
		href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap"
		rel="stylesheet" />
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" />
	<link
		href="https://fonts.googleapis.com/css2?family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
		rel="stylesheet" />
	<link rel="stylesheet" href="assets/style/globals.css" />
	<link rel="stylesheet" href="assets/style/styles.css" />
	<link rel="stylesheet" href="assets/style/estilo.css">
</head>

<body>
	<nav class="rf3siq6p3t">
		<div class="rf3siq6p3t-container">
			<div class="rf3siq6p3t-logo">
				<a href="#">
					<h3>Book's <i class="fa-solid fa-book-bookmark"></i></h3>
				</a>
			</div>
			<div class="rf3siq6p3t-toggle" id="ui5r6qlhla">
				<span class="u0hpid7tli"></span>
				<span class="u0hpid7tli"></span>
				<span class="u0hpid7tli"></span>
			</div>
			<ul class="rf3siq6p3t-menu">
				<li class="rf3siq6p3t-item">
					<a href="#" class="rf3siq6p3t-links active"><i class="fa-solid fa-house"></i>Inicio</a>
				</li>
				<li class="rf3siq6p3t-item">
					<div class="navbar"><span class="cart-icon"> shopping_cart </span></div>
				</li>
				<li class="rf3siq6p3t-item">
					<input type="search" placeholder="Search...">
				</li>


			</ul>
		</div>
	</nav>
	<div class="d530rfrj0dj">
		<div class="c9932401">
			<h1>Bem vindo(a) a nossa <span>Biblioteca Virtual</span></h1>
		</div>
	</div>
	<div class="h1lify9bj9">
		<div class="c9932401">
			<h1>Livros <span>disponíveis</span></h1>

			<footer class="sy0tkj9wro">

				<!--<div class="sy0tkj9wro-container">
				<div class="sy0tkj9wro-i logo">-->

				<div class="container">

					<?php
					include "include/MySql.php";

					$sql = $pdo->prepare("SELECT * FROM livros");
					if ($sql->execute()) {
						$info = $sql->fetchAll(PDO::FETCH_ASSOC);

						foreach ($info as $key => $values) {
							$imagem = $values['imagem'];
							echo '<div class="products-list">';

							echo '<div class="product">';
							echo '<div class="product__image">';
							echo '<img src="data:image/jpg;charset=utf8;base64,' . base64_encode($imagem) . '"/><br>';
						}
					}
					?>

					<!-- Cart -->
					<div class="cart">
						<!-- Cart Close -->
						<div class="cart__close">
							<span class="close-icon"> close </span>
						</div>
						<!-- End Cart Close -->

						<!-- Cart Content -->
						<div class="cart__content">
							<!-- Cart Products -->
							<div class="cart__products">
								<!-- Cart Empty -->
								<div class="cart__empty" data-empty-cart>
									<img src="assets/imgs/emptycart.png" />
									<div class="empty__title">Your bag is empty</div>

									<div class="empty__subtitle">
										Looks like you haven’t added any items to the bag yet. Start
										shopping to fill it in.
									</div>
								</div>
								<!-- End Card Empty -->

								<!-- Card Total Items -->
								<div class="cart__total-items" data-not-empty-cart>
									<span class="cart__total-label"> Total Items: </span>
									<span class="cart__total-value"> 0 </span>
								</div>
								<!-- End Card Total Items -->
							</div>
							<!-- End Cart Products -->

							<!-- Cart Actions -->
							<div class="cart__actions">
								<button class="cart__button" data-empty-cart>start shopping</button>
								<button class="cart__button cart__button-secondary" data-not-empty-cart>
									go to checkout
								</button>
								<div class="cart__summary" data-not-empty-cart>
									<!-- Summary Item -->
									<div class="summary__item">
										<div class="summary__label">Subtotal:</div>
										<div class="summary__value" data-subtotal>$0.00</div>
									</div>
									<!-- End Summary Item -->

									<!-- Summary Item -->
									<div class="summary__item">
										<div class="summary__label">Shipping:</div>
										<div class="summary__value">$0.00</div>
									</div>
									<!-- End Summary Item -->

									<!-- Summary Item -->
									<div class="summary__item">
										<div class="summary__label">Discount:</div>
										<div class="summary__value">$0.0</div>
									</div>
									<!-- End Summary Item -->

									<!-- Summary Item -->
									<div class="summary__item">
										<div class="summary__label">Grand Total:</div>
										<div class="summary__value" data-grand-total>$0.00</div>
									</div>
									<!-- End Summary Item -->
								</div>
							</div>
							<!-- End Cart Actions -->
						</div>
						<!-- End Cart Content -->
					</div>
					<!-- End Cart -->
				</div>
				<!-- End Container -->

		</div>
	</div>

	<footer class="sy0tkj9wro">
		<div class="sy0tkj9wro-container">
			<div class="sy0tkj9wro-i logo">
				<a href="#">
					<h3>Book's <i class="fa-solid fa-book-bookmark"></i></h3>
				</a>
			</div>
			<div class="sy0tkj9wro-i">
				<p>Nossa equipe - <span>@Vieiraaa (Arthur)</span> | <span>@Cruz (Gabriel)</span> | <span>@LipeeeSZ
						(Felipe Vieira)</span> | <span>@Galdino (Henrique)</span></p>
			</div>
			<div class="sy0tkj9wro-i">
				<p>Developer website - <a target="_blank" href="https://instagram.com/arthurvieiraaa">@Arthur</a> | <a
						target="_blank" href="https://instagram.com/gabriel_cruzz_">@Gabriel</a> | <a target="_blank"
						href="https://instagram.com/felipelatki">@Felipe</a> | <a target="_blank"
						href="https://instagram.com/galdino__0">@Henrique</a></p>
			</div>
		</div>
	</footer>

	<div class="sle9wi13jb">
		<p>Copyright © 2022 - <span id="s234sad2"></span>. Todos os direitos reservados.</p>
	</div>

	<script src="assets/javascript/global.js"></script>
	<script src="assets/javascript/app.js"></script>
</body>

</html>