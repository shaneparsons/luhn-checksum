<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Luhn Checksum</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <?php
    $processed = false;

    if (!empty($_POST)) {
        require_once 'src/Luhn.php';
        $luhn = new Luhn($_POST['number']);
        $valid = $luhn->isValid();
        $message = $luhn->getMessage();
        $processed = true;
    }
    ?>

    <div class="d-flex p-4">
        <form method="post">
            <div class="input-group mb-3">
                <input type="number" class="form-control" name="number" aria-label="Number" placeholder="Number" min="0" required>
                <button class="btn btn-outline-secondary" type="submit">Check</button>
            </div>
            <?php if ($processed) : ?>
                <?php if ($valid) : ?>
                    <div class="alert alert-success">
                        <?php echo $message ?>
                    </div>
                <?php else : ?>
                    <div class="alert alert-danger">
                        <?php echo $message ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>