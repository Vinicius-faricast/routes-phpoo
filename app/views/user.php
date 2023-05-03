<?php $this->layout('master', ['title' => $title]) ?>

<h1>User</h1>


<form action="/user/update" method="post">
    <?php echo flash('firstName', 'color:red') ?>
    <input type="text" name="firstName" value="Vinicius">

    <?php echo flash('lastName') ?>
    <input type="text" name="lastName" value="Farias">
    
    <?php echo getToken() ?>

    <?php echo flash('email') ?>
    <input type="text" name="email" value="vini@hotmail.com">

    <?php echo flash('password') ?>
    <input type="password" name="password" value="123456">

    <button type="submit">Atualizar</button>
</form>

