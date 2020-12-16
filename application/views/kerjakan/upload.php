<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>
    <style>
        .card {
            /* Add shadows to create the "card" effect */
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
            padding-top: 5px;
        }

        /* On mouse-over, add a deeper shadow */
        .card:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);

        }

        /* Add some padding inside the card container */
        .container {
            padding: 2px 16px;
        }

        .logo {
            margin-right: 5px;
            margin-left: 10px;
            max-width: 50px;
        }

        body {
            padding: 10px;
        }

        .jarak {
            height: 3px;
            background-color: black;
            size: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }

        .jawaban {
            margin-left: 30px;
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div>
        <img class="logo" src="<?= base_url('assets/properti/logo.png') ?>">
        <label> jawablah pertanyaan di bawah ini</label>
    </div>
    <hr class="jarak">
    <?php
    $i = 1;
    foreach ($pertanyaan as $r) : ?>
        <div class="card">

            <div class="container">
                <label>No : <?= $i++ ?></label>
                <p><?= $r['soal'] ?></p>
                <!-- <div class="jawaban">
                    <input type="checkbox">
                    <label for="vehicle1"> a. <?= $r['a'] ?></label><br>
                    <input type="checkbox">
                    <label for="vehicle2"> b. <?= $r['b'] ?></label><br>
                    <input type="checkbox">
                    <label for="vehicle3"> c. <?= $r['c'] ?></label><br>
                    <input type="checkbox">
                    <label for="vehicle3"> d. <?= $r['d'] ?></label><br>
                    <input type="checkbox">
                    <label for="vehicle3"> e. <?= $r['e'] ?></label><br>
                </div> -->
            </div>
        </div>

    <?php
    endforeach ?>
</body>

</html>