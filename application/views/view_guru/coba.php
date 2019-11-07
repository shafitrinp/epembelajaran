<!DOCTYPE html>

<body><?php foreach ($biodata as $b) { ?>
        <table class="table table-bordered table-hover">
            <tbody>
                <tr>
                    <input type="file" name="photo" id="uploadphoto" style="visibility: hidden;">
                    <td>ID</td>
                    <td><input name="id_guru" class="form-control" type="text" value="<?php echo $b['nama']; ?>" readonly style="background-color: transparent; border: hidden;">
                    </td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td><input name="nama" class="form-control" type="text" value="<?php echo $b['nama']; ?>" readonly style="background-color: transparent; border: hidden;"></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input name="email" class="form-control" type="email" value="<?php echo $b['nama']; ?>" readonly style="background-color: transparent; border: hidden;"></td>
                </tr>
            </tbody>
        </table>
    <?php }; ?>
</body>