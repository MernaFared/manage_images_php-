<?php
include "./admin/dbconnection.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalog-Z Bootstrap 5.0 HTML Template</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawesome/css/all.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <!--TemplateMo 556 Catalog-Z
https://templatemo.com/tm-556-catalog-z -->
</head>

<body>
    <!-- Page Loader -->
    <div id="loader-wrapper">
        <div id="loader"></div>

        <div class="loader-section section-left"></div>
        <div class="loader-section section-right"></div>

    </div>
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <i class="fas fa-film mr-2"></i>
                Catalog-Z
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link nav-link-1 active" aria-current="page" href="index.html">Photos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-2" href="videos.php">Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-3" href="about.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-4" href="contact.php">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="tm-hero d-flex justify-content-center align-items-center" data-parallax="scroll" data-image-src="img/hero.jpg">
        <form class="d-flex tm-search-form">
            <input class="form-control tm-search-input" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success tm-search-btn" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </form>
    </div>

        <div class="row tm-mb-90 tm-gallery">
        <?php
        $photosPerPage = 8;  
        $current_page = isset($_GET['page']) ? $_GET['page'] : 1;

        $offset = ($current_page - 1) * $photosPerPage;

        $select_query = "SELECT * FROM photos LIMIT $photosPerPage OFFSET $offset";
        $result_query = mysqli_query($mysqli, $select_query);

         $total_photos_query = "SELECT COUNT(*) as total FROM photos";
         $total_photos_result = mysqli_query($mysqli, $total_photos_query);
         $total_photos = mysqli_fetch_assoc($total_photos_result)['total'];
         $total_pages = ceil($total_photos / $photosPerPage);


        echo '<div class="container-fluid tm-container-content tm-mt-60">
        <div class="row mb-4">
            <h2 class="col-6 tm-text-primary">
                Latest Photos
            </h2>
            <div class="col-6 d-flex justify-content-end align-items-center">
                <form action="" class="tm-text-primary">
                    Page <input type="text" value="' . $current_page . '" size="1" class="tm-input-paging tm-text-primary"> of ' . $total_pages . '
                </form>
            </div>
        </div>
        </div>';
        // Display the photos
        while ($row = mysqli_fetch_assoc($result_query)) {
            // Your code to display each photo here
            $photo_id = $row['id'];
            $photo_date = $row['photo_date'];
            $photo_title = $row['title'];
            $image_path = $row['image_path'];
            $license = $row['license'];
            $dimension = $row['dimension'];
            $format = $row['format'];
            $active = $row['is_active'];
            $category_id = $row['category_id'];
            $timestamp = strtotime($photo_date);
            $formattedDate = date("d M Y", $timestamp);

            echo "<div class='col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 mb-5'>
            <figure class='effect-ming tm-video-item'>
            
                <img src='./admin/" . $row['image_path'] . "' alt='" . $photo_title . "' class='img-fluid'>
                <figcaption class='d-flex align-items-center justify-content-center'>
                    <h2> $photo_title</h2>
                    <a href='photo-detail.php?photo_id=$photo_id&category_id=$category_id'>View more</a>
                </figcaption>
            </figure>
            <div class='d-flex justify-content-between tm-text-gray'>
                <span class='tm-text-gray-light'>$formattedDate</span>
                <span>9,906 views</span>
            </div>
        </div>";
        }
        // Create pagination links
        echo '<div class="row tm-mb-90">';
        echo '<div class="col-12 d-flex justify-content-between align-items-center tm-paging-col">';

        if ($current_page > 1) {
            echo '<a href="index.php?page=' . ($current_page - 1) . '" class="btn btn-primary tm-btn-prev mb-2">Previous</a>';
        } else {
            echo '<a href="javascript:void(0);" class="btn btn-primary tm-btn-prev mb-2 disabled">Previous</a>';
        }

        echo '<div class="tm-paging d-flex">';
        for ($page = 1; $page <= $total_pages; $page++) {
            if ($page == $current_page) {
                echo '<a href="javascript:void(0);" class="active tm-paging-link">' . $page . '</a>';
            } else {
                echo '<a href="index.php?page=' . $page . '" class="tm-paging-link">' . $page . '</a>';
            }
        }
        echo '</div>';

        if ($current_page < $total_pages) {
            echo '<a href="index.php?page=' . ($current_page + 1) . '" class="btn btn-primary tm-btn-next">Next Page</a>';
        } else {
            echo '<a href="javascript:void(0);" class="btn btn-primary tm-btn-next disabled">Next Page</a>';
        }

        echo '</div>';
        echo '</div>';
        ?>
        </div> <!-- row -->
      
    </div> <!-- container-fluid, tm-container-content -->

    <footer class="tm-bg-gray pt-5 pb-3 tm-text-gray tm-footer">
        <div class="container-fluid tm-container-small">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">About Catalog-Z</h3>
                    <p>Catalog-Z is free <a rel="sponsored" href="https://v5.getbootstrap.com/">Bootstrap 5</a> Alpha 2 HTML Template for video and photo websites. You can freely use this TemplateMo layout for a front-end integration with any kind of CMS website.</p>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <h3 class="tm-text-primary mb-4 tm-footer-title">Our Links</h3>
                    <ul class="tm-footer-links pl-0">
                        <li><a href="#">Advertise</a></li>
                        <li><a href="#">Support</a></li>
                        <li><a href="#">Our Company</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-12 px-5 mb-5">
                    <ul class="tm-social-links d-flex justify-content-end pl-0 mb-5">
                        <li class="mb-2"><a href="https://facebook.com"><i class="fab fa-facebook"></i></a></li>
                        <li class="mb-2"><a href="https://twitter.com"><i class="fab fa-twitter"></i></a></li>
                        <li class="mb-2"><a href="https://instagram.com"><i class="fab fa-instagram"></i></a></li>
                        <li class="mb-2"><a href="https://pinterest.com"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                    <a href="#" class="tm-text-gray text-right d-block mb-2">Terms of Use</a>
                    <a href="#" class="tm-text-gray text-right d-block">Privacy Policy</a>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-7 col-12 px-5 mb-3">
                    Copyright 2020 Catalog-Z Company. All rights reserved.
                </div>
                <div class="col-lg-4 col-md-5 col-12 px-5 text-right">
                    Designed by <a href="https://templatemo.com" class="tm-text-gray" rel="sponsored" target="_parent">TemplateMo</a>
                </div>
            </div>
        </div>
    </footer>

    <script src="js/plugins.js"></script>
    <script>
        $(window).on("load", function() {
            $('body').addClass('loaded');
        });
    </script>
</body>

</html>