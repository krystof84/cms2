<?php require_once APPPATH . 'views/admin/include/header.php'; ?>

<a href="<?php echo base_url('admin/users/create') ?>">Nowy użytkownik</a>

<h1>Użytkownicy (<?php echo count($users);?>)</h1>
<?php foreach ($users as $user): ?>
    <p><?php echo $user->id.' - '.$user->name.' - '.$user->email; ?></p>
<?php endforeach ?>

<?php require_once APPPATH . 'views/admin/include/footer.php'; ?>
</body>
</html>