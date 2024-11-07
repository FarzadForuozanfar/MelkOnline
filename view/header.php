<!DOCTYPE html>
<html lang="fa" dir="rtl">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="view/assets/images/logo.jpg" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Vendor assets -->
    <?php if (!(isset($_SESSION['house-title']))): ?>
        <?php echo ($_SESSION["titels"][$_SESSION["location"]]); ?>
    <?php else: ?>
        <?php echo ($_SESSION["house-title"]); ?>
    <?php endif; ?>
    <?php if ($_SESSION['location'] == "404"): ?>
        <link rel="stylesheet" type="text/css" href="view/assets/css/style.css">
    <?php endif; ?>
    <link href="view/assets/vendor/animate.css/animate.css" rel="stylesheet">
    <link href="view/assets/vendor/fontawesome-free/css/all.css" rel="stylesheet">
    <link href="view/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="view/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="view/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="view/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="view/assets/css/modal.css">

    <link rel="stylesheet" type="text/css" href="view/assets/css/bootstrap.rtl.css">
    <link rel="stylesheet" href="view/assets/css/faq.css">
    <link rel="stylesheet" href="view/assets/css/toolip.css">
    <link rel="stylesheet" href="view/assets/css/jcarousel.basic.css">
    <link rel="stylesheet" type="text/css" href="view/assets/css/main.css">
    <link rel="stylesheet" href="view/assets/css/owl.carousel.css">
    <link rel="stylesheet" href="view/assets/css/owl.theme.default.css">
    <script src="view/assets/vendor/sweetalert/main.js"></script>
    <!-- <link rel="stylesheet" href="view/assets/vendor/sweetalert/main.css"> -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: "top-end",
            showConfirmButton: false,
            timer: 5000,
            timerProgressBar: true,
            didOpen: (toast) => {
                toast.onmouseenter = Swal.stopTimer;
                toast.onmouseleave = Swal.resumeTimer;
            }
        });
    </script>
</head>

<body class="bg-dark dark-scroll">
    <?php
    include "view/sign_in_modal.php";
    ?>