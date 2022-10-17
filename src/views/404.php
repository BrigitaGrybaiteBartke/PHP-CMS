<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <h1 class="mt-5 text-center">404 error</h1>
        <div class='mt-3 row d-flex align-items-center'>
            <div class="text-center">
                <h3>Sorry, the page not found</h3>
                <span>The link you followed probably broken or the page has been removed.</span>
            </div>
        </div>

        <!-- Back to homepage button -->
        <div class="mt-5 d-flex flex-row justify-content-start align-items-center mb-3">
            <div>
                <a href="<?php print('./') ?>" class='btn btn-light me-2'>Back to Home page</a>
            </div>

        </div>

    </div>
</body>

</html>