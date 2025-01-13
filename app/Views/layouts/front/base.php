<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Beranda</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/assets/owl.theme.default.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        .carousel-item img {
            height: 500px;
            /* Atur tinggi banner di sini */
            object-fit: cover;
        }

        .owl-carousel .item {
            display: flex;
            justify-content: center;
        }

        .card {
            width: 100%;
            /* Atur lebar card */
            height: 100%;
            /* Atur tinggi card sesuai kebutuhan */
        }

        .card-img-top {
            height: 400px;
            /* Set fixed height for the image */
            object-fit: cover;
            /* Membuat gambar tidak terdistorsi */
        }

        .card-body {
            height: 350px;
            /* Tentukan tinggi area konten */
            overflow: hidden;
            /* Menyembunyikan konten yang melebihi batas */
        }

        .gallery-item {
            position: relative;
            overflow: hidden;
        }

        .gallery-item img {
            width: 100%;
            height: auto;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.1);
        }

        .gallery-item .title {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            color: white;
            text-align: center;
            padding: 10px;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .gallery-item:hover .title {
            opacity: 1;
        }
    </style>
</head>

<body>
    <?= $this->include('layouts/front/nav'); ?>

    <div class="wrapper bg-light">

        <!-- Banner Slider Section -->
        <?= $this->renderSection('content') ?>


        <!-- Footer Section -->
        <?= $this->include('layouts/front/footer'); ?>

        <!-- Ensure to replace 'YOUR_GOOGLE_MAPS_API_KEY' with your actual Google Maps API key -->

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/owl.carousel@2.3.4/dist/owl.carousel.min.js"></script>
    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true, // Mengulang carousel
                margin: 10, // Jarak antar item
                nav: true, // Menampilkan tombol navigasi
                responsive: {
                    0: {
                        items: 1 // Menampilkan 1 item untuk layar kecil
                    },
                    600: {
                        items: 3 // Menampilkan 3 item untuk layar menengah
                    },
                    1000: {
                        items: 4 // Menampilkan 4 item untuk layar besar
                    }
                }
            });
        });
    </script>
</body>

</html>