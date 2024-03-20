

<?php
require 'Product.php';
require 'Cart.php';

session_start();

$cart = new Cart;
$productsInCart = $cart->getCart();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; // Converta para inteiro para garantir que seja um número
    $cart->remove($id);
    header('Location: mycart.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
    <script src="script.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>

<header>

<nav>

  <img class="logo" src="merc.png" alt="imagem do logo">

  <div class="navEsquerda">
    <img src="localizacao.png" alt="" width="30px" height="30px">
    <a href=""> Informe seu <br>Cep</a>
  </div>

  <button id="btn-menu-humburguer" onclick="dispararMenu('menu-humburguer')">☰</button>

  <div id="menu-humburguer">
    <div class="header-menu">
      <img src="https://cdn-icons-png.flaticon.com/512/5987/5987462.png" alt="">
      <div class="texto-menu">
        <p>Kauan Afonso da Silva</p>
        <p>Meu perfil</p>
      </div>
    </div>

    <div class="nav">
      <a href=""><i class="fa fa-home" style="font-size:24px"></i> Categorias</a>
      <a href=""><span style='font-size:24px;'>&#9873;</span>Ofertas</a>
      <a href=""><span style='font-size:24px;'>&#9742;</span> Vender</a>
      <a href=""><i class="fa fa-heart" style="font-size: 22px;"></i>Contato</a>
      <a href=""><span style='font-size:24px;'>&#9728;</span>Crie sua conta</a>
      <a href=""><span style='font-size:24px;'>&#9983;</span>Entre</a>
      <a href=""><span style='font-size:24px;'>&#9951;</span> Compras</a>
      <a href="carrinho.html"><span style='font-size:24px;'>&#9729;</span> Carrinho</a>
    </div>

    <span style='font-size:100px;'>&#9924;</span>

    <button id="fecharMenu" onclick="dispararMenu('menu-humburguer')">
      &#10006;</button>

  </div>

  <div class="input">
    <input type="search" placeholder="Buscar mais Produtos, marcas ee muito mais">
  </div>



  <div class="meioNav">
    <a href="">Categorias</a>
    <a href="">Ofertas</a>
    <a href="">Vender</a>
    <a href="">Contato</a>
  </div>

  <div class="direitaNav">
    <a href="">Crie sua conta</a>
    <a href="">Entre</a>
    <a href="">Compras</a>
  </div>


</nav>

</header>


<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Produto</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Preço</th>
            <th scope="col">Subtotal</th>
            <th scope="col">Remover</th>
        </tr>
    </thead>
    <tbody>
        <?php if (count($productsInCart) <= 0): ?>
            <tr>
                <th scope="row" colspan="6">Nenhum Produto no Carrinho</th>
            </tr>
        <?php else: ?>
            <?php foreach ($productsInCart as $id => $product): ?>
                <tr>
                    <th scope="row"><?php echo $id; ?></th>
                    <td><?php echo $product->getName(); ?></td>
                    <td><input type="text" value="<?php echo $product->getQuantity() ?>"></td>
                    <td>R$ <?php echo number_format($product->getPrice(), 2, ",", "."); ?></td>
                    <td>R$ <?php echo number_format($product->getPrice() * $product->getQuantity(), 2, ',', '.'); ?></td>
                    <td><a href="?id=<?php echo $id; ?>">Remover</a></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th scope="row" colspan="4"></th>
                <td><strong>Total:</strong></td>
                <td>R$ <?php echo number_format($cart->getTotal(), 2, ",", ','); ?></td>
            </tr>
        <?php endif; ?>
    </tbody>
</table>


<?php 
print_r($quantity)
?>


<footer style="height:100%; margin-top:300px;">

  <div>
    <a href="">Trabalhe conosco</a>
    <a href="">Contato</a>
    <a href="">Acessibilidade</a>
    <a href="">informações sobre seguro</a>
    <a class="linkParaCel" href="">Carrinho</a>
    <a class="linkParaCel" href="">Entre</a>

  </div>

</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>

