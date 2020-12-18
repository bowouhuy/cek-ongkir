
<?php
    include "controller/CoreController.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    </head>
<body>
    <div class="container">

        <h1>Pilih Kota</h1>
        <select class="form-select" aria-label="Default select example">
        <?php
            $ch = new api();
            $array_kota = $ch->daftar_kota();
            $kota = $array_kota["rajaongkir"]["results"];

            foreach ($kota as $row) {
        ?>
                <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>

        <?php
            }
            
            // var_dump($kota);
            ?>
            </select>

            <h1>Pilih Provinsi</h1>
            <select class="form-select" aria-label="Default select example">
            <?php
            $ch = new api();
            $array_prov = $ch->daftar_provinsi();
            $provinsi = $array_prov["rajaongkir"]["results"];

            foreach ($provinsi as $row) {
        ?>
                <option value="<?php echo $row['province_id']; ?>"><?php echo $row['province']; ?></option>

        <?php
            }
            
            // var_dump($kota);
            ?>
            </select>
    </div>
</body>
</html>