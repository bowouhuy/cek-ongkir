
<?php
    include "controller/CoreController.php";

    // mengdefiniskan variabel dan diset kosong
    $origin = $destination = $weight = $courier = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $origin     = $_POST["origin"];
    $destination    = $_POST["destination"];
    $weight  = $_POST['weight'];
    $courier      = $_POST['courier'];
    }

    $api = new api();
    $array_kota = $api->daftar_kota();
    $kota = $array_kota["rajaongkir"]["results"];
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
    <div class="container-md mt-5 col-11">
        <div class="card mb-3">
            <div class="card-body" >
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-2 col-form-label">Kota Asal</label>
                        <div class="col-sm-10">
                            <select name="origin" class="form-select" aria-label="Default select example">
                                <option selected="selected">Pilih</option>
                                <?php
                                    foreach ($kota as $row) {
                                ?>
                                        <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <small id="nama-alert" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">Kota Tujuan</label>
                        <div class="col-sm-10">
                            <select name="destination" class="form-select" aria-label="Default select example">
                                <option selected="selected">Pilih</option>
                                <?php

                                    foreach ($kota as $row) {
                                ?>
                                        <option value="<?php echo $row['city_id']; ?>"><?php echo $row['city_name']; ?></option>
                                <?php
                                    }
                                ?>
                            </select>
                            <small id="tanggal-alert" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="nama" class="col-sm-2 col-form-label">Berat (gram)</label>
                        <div class="col-sm-10">
                            <input name="weight" type="text" class="form-control" id="inputNama2">
                            <small id="nama2-alert" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <div class="mb-1 row">
                        <label for="inputNama" class="col-sm-2 col-form-label">Kurir</label>
                        <div class="col-sm-10">
                            <select name="courier" class="form-select" aria-label="Default select example">
                                <option value="jne">JNE</option>
                                <option value="tiki">TIKI</option>
                                <option value="pos">POS Indonesia</option>
                            </select>
                            <small id="tanggal2-alert" class="form-text text-danger"></small>
                        </div>
                    </div>
                    <input type="submit" value="Hitung" id="submit" class="btn btn-primary mt-2 col-12 btn-hitung">
                </form>
                <?php 
                    // echo var_dump()
                    if($origin !=""){

                        $array_result = $api->cost($origin, $destination, $weight, $courier);
                        $result = $array_result["rajaongkir"]["results"][0]["costs"];
                        // var_dump($result);          
                        // var_dump($result);

                        foreach($result as $a) {
                            echo $a["service"].' ';
                            echo $a["description"].'<br>';

                            foreach($a["cost"] as $b){
                                echo $b["etd"].' hari <br>';
                                echo 'Rp. '.$b["value"].'<br>';

                            }
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>