<?php require_once APPPATH . 'views/admin/include/header.php'; ?>

<a href="<?php echo base_url('admin/users/create') ?>">Nowy użytkownik</a>

<h1>Użytkownicy (<?php echo count($users);?>)</h1>
<?php foreach ($users as $user): ?>
    <div>
        <?php echo $user->id.' - '.$user->name.' - '.$user->email.' '; ?>
        <a href="<?php echo base_url('admin/users/edit/'.$user->id) ?>">Edytuj</a>
        <a href="<?php echo base_url('admin/users/delete/'.$user->id) ?>" onclick="return confirm('Czy na pewno usunąć?')">Usuń</a>
    </div>
<?php endforeach ?>

<?php require_once APPPATH . 'views/admin/include/footer.php'; ?>
</body>
</html>