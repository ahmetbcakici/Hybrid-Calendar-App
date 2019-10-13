<?php
// if (isset($_COOKIE)) {
//     unset($_COOKIE['il']);
//     setcookie('il', '', time() - 3600, '/'); // empty value and old timestamp
// }

include("funcs.php");
$conn = mysqli_connect($host, $username, $pass, $db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");

function gonder()
{
    global $host, $username, $pass, $db;
    $conn = mysqli_connect($host, $username, $pass, $db);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    mysqli_set_charset($conn, "utf8");

    setcookie('il', $_POST["il"], time() + (10 * 365 * 24 * 60 * 60));
    setcookie('ilce', $_POST["ilce"], time() + (10 * 365 * 24 * 60 * 60));
    $temp_ilce = $_POST["ilce"];
    $sql = "SELECT id FROM ilceler WHERE ilce = '$temp_ilce'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            setcookie('city_id', $row["id"], time() + (10 * 365 * 24 * 60 * 60));
        }
        header("Location: vakit.php");
    } else {
        echo "0 veri";
    }
    // header("Location : vakit.php");
}

if (isset($_COOKIE['il'])) {
    if (isset($_SERVER['HTTP_REFERER'])) {
        if ($_SERVER['HTTP_REFERER'] == "http://localhost/MYPROJ_turktakvimhybrid/vakit.php") {
            if (isset($_POST["gonder"])) { //sehir secilmisse
                gonder();
            }
        } else {
            if (isset($_POST["gonder"])) { //sehir secilmisse
                gonder();
            }
        }
    } else
        header("Location: vakit.php");
} else {
    if (isset($_POST["gonder"])) { //sehir secilmisse
        gonder();
    }
}




if (isset($_POST['selected_city'])) {
    $il = $_POST['selected_city'];
    $sql = "SELECT ilce FROM ilceler WHERE il = '$il'";
    $result = mysqli_query($conn, $sql);
    $ilceler = array();
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($ilceler, $row['ilce']);
        }
    }
    echo json_encode($ilceler);
    exit;
}
?>

<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=0,maximum-scale=1,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        /* @media only screen and (min-width:800px) {
            body {
                font-size: 20px;
                color: red;
            }

            #container {
                width: 100%;
                height: auto;
                margin: 0;
            }
        } */

        body {
            font-family: 'Open Sans', sans-serif;
            text-align: center;
        }

        #container {
            margin: auto;
            width: 400px;
            /* border: 1px solid gray; */
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="container">
        <h1>Türkiye Takvimi</h1>
        <a href="vakit.php">VAKIT SAYFASI</a>
        <form action="" method="post">
            <select id="il" name="il">
                <?php
                $sql = "SELECT il FROM iller";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $temp = $row['il'];
                        echo "<option value='$temp'>" . $temp . "</option>";
                    }
                }
                ?>
            </select>
            <select name="ilce" id="ilce"></select>
            <input type="submit" name="gonder" id="tamam" value="Tamam">
        </form>
    </div>

    <div id="result"></div>

    <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#ilce").hide();
            $("#tamam").hide();
            $("#il").change(function() {
                $("#ilce").show();
                $("#tamam").show();
                $("#ilce").empty();
                $.ajax({
                    data: {
                        'selected_city': $("#il").val()
                    },
                    method: 'post',
                    dataType: 'json',
                    cache: false,
                    success: function(result) {
                        for (var i = 0; i < result.length; i++) {
                            console.log(result[i]);
                            $('#ilce').append("<option>" + result[i] + "</option>");
                        }
                    }
                });
            });
        });
    </script>
</body>

</html>