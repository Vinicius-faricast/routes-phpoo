<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>
<form action="/user/update" method="post">

    <input type="text" name="firstName" value="Vinicius">
    <input type="text" name="lastName" value="Farias">
    <?php echo getToken(); ?>
    <input type="text" name="email" value="vini@hotmail.com">
    <input type="password" name="password" value="123456">

    <button type="submit">Atualizar</button>
</form>

