<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="<?= base_url(); ?>/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/css/styles.css">

    <title><?= $title; ?></title>
</head>

<body>

    <?php if (logged_in()) : ?>
        <?= $this->include('layout/navbar-admin'); ?>
    <?php else : ?>
        <?= $this->include('layout/navbar'); ?>
    <?php endif; ?>

    <?= $this->renderSection('content'); ?>


    <script>
        let marker = document.querySelector('#marker');
        let item = document.querySelectorAll('nav ul li');

        function indikator(e) {
            marker.style.left = e.offsetLeft + "px";
            marker.style.width = e.offsetWidth + "px";
        }

        item.forEach(link => {
            if (link.querySelector('a').innerHTML === link.querySelector('a').getAttribute('data-nav')) {
                link.querySelector('a').classList.toggle('active');
            }

            link.addEventListener('mouseenter', (e) => {
                indikator(e.target);
            })
        });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->

    <script src="<?= base_url(); ?>/js/sweetalert2.all.min.js"></script>
    <!-- Optional: include a polyfill for ES6 Promises for IE11 -->
    <script src="//cdn.jsdelivr.net/npm/promise-polyfill@8/dist/polyfill.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="<?= base_url(); ?>/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="/bootstrap/js/popper.min.js"></script> -->
    <!-- <script src="/bootstrap/js/bootstrap.min.js"></script> -->

    <!-- my javascript -->
    <script src="<?= base_url(); ?>/js/script.js"></script>
    <!-- my javascript akhir -->


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script> -->

    <!-- Option 2: Separate Popper and Bootstrap JS -->

    <!-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script> -->


</body>

</html>