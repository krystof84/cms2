<!DOCTYPE html>
<html>
<head>
    <title>Title of the document</title>
</head>
<body>
<?php if($this->session->flashdata('alert') == true):?>
    <div>
        <?php echo $this->session->flashdata('alert')?>
    </div>
<?php endif; ?>
