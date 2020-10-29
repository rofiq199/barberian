<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?= base_url() ?>Auth/proses_register" method="POST" enctype="multipart/form-data">
        <input type="text" name="username">
        <input type="text" name="nama">
        <input type="email" name="email">
        <input type="text" name="no">
        <input type="password" name="password">
        <!-- <input type="file" name="foto" id=""> -->
        <input type="submit" value="Register">
    </form>
</body>

</html>