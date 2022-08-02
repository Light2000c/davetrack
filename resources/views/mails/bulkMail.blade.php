<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Joined our team.</title>
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</head>

<style>
    body {
        background-color: #8ec640;
    }
</style>

<body>
    <div class="container ">
        <div class="d-flex justify-content-center">
            <div class="row col-lg-7 bg-light mt-5 ms-1 me-1">
                <div class="d-flex justify-content-center mb-2 mt-2">
                    <img src="/logo/davetracklogo ggg 2Artboard 1@2x.png" alt="">
                </div>
                <div class="mt-5">
                    <h4 style="font-weight: bolder;">Davetrack Technologies</h4>

                    <p>Hi {{ $username }}</p>

                    <h4>{{ $details['title'] }}</h4>
                    <p>{{ $details['message'] }}</p>


                    <hr>
                    <p class="text-start">Davetrack Technologies is always at your service, <strong>Thanks</strong></p>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
