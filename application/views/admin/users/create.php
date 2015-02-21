<?php require_once APPPATH . 'views/admin/include/header.php'; ?>
<a href="<?php echo base_url('admin/users/index')?>">Lista użytkowników</a>
<h1>Nowy użytkownik</h1>

<?php echo form_open(); ?>

<input type="text" name="name" placeholder="imie"/><br/>
<input type="text" name="email" placeholder="email"/><br/>
<input type="password" name="password" placeholder="hasło"/><br/>
<input type="password" name="passconf" placeholder="powtórz hasło"/><br/>

<input type="submit" value="dodaj"/>

<?php echo form_close(); ?>

<?php require_once APPPATH . 'views/admin/include/footer.php'; ?>
</body>
</html>