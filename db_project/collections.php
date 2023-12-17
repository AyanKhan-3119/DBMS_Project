<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="assets/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/collections.css">
    <title>AIA Watches Collection Page</title>
</head>
<body>
    <?php 
    
    include('components/header.php');

    ?>
    <div class="banner">
        <div class="content"><p>AIA  WATCHES</p></div>
    </div>
        <main>
            <div class="menu">
                <ul class="men">
                    <li><a href="#GS">Gold Series</a></li>
                    <li><a href="#WS">Wisco Series</a></li>
                    <li><a href="#MS">Master Series</a></li>
                    <li><a href="#CS">Classic Series</a></li>
                </ul>
                <p id="GS">&#8212; Gold Series &#8212;</p>
                <div class="featured__container grid">
                    <?php

                        $gold_prod = get_products($conn, "gold");
                        while ($row = $gold_prod->fetch_row()) {
                            ?>
                                <article class="featured__card">
                                    <form action="api/cart/add.php" method="POST">
                                        <span class="featured__tag">Sale</span>
                                        <img src="<?php echo $row[2]; ?>" alt="" class="featured__img">
                                        <div class="featured__data">
                                            <h3 class="featured__title"><?php echo $row[1]; ?></h3>
                                            <span class="featured__price">$<?php echo $row[4]; ?></span>
                                        </div>
                                        <button type="submit" name="ADD_TO_CART" class="button featured__button">ADD TO CART</button>
                                        <input type="hidden" name="product_id" value="<?php echo $row[0]; ?>">
                                    </form>
                                </article>
                            <?php
                        }
                    ?>
  
                </div>
                <p id="WS">&#8212; Wisco Series &#8212;</p>
                <div class="featured__container grid">
                <?php

                    $gold_prod = get_products($conn, "wisco");
                    while ($row = $gold_prod->fetch_row()) {
                        ?>
                            <article class="featured__card">
                                <form action="api/cart/add.php" method="POST">
                                    <span class="featured__tag">Sale</span>
                                    <img src="<?php echo $row[2]; ?>" alt="" class="featured__img">
                                    <div class="featured__data">
                                        <h3 class="featured__title"><?php echo $row[1]; ?></h3>
                                        <span class="featured__price">$<?php echo $row[4]; ?></span>
                                    </div>
                                    <button type="submit" name="ADD_TO_CART" class="button featured__button">ADD TO CART</button>
                                    <input type="hidden" name="product_id" value="<?php echo $row[0]; ?>">
                                </form>
                            </article>
                        <?php
                    }
                    ?>
                </div>
                <p id="MS">&#8212; Master Series &#8212;</p>
                <div class="featured__container grid">
                <?php

                    $gold_prod = get_products($conn, "master");
                    while ($row = $gold_prod->fetch_row()) {
                        ?>
                            <article class="featured__card">
                                <form action="api/cart/add.php" method="POST">
                                    <span class="featured__tag">Sale</span>
                                    <img src="<?php echo $row[2]; ?>" alt="" class="featured__img">
                                    <div class="featured__data">
                                        <h3 class="featured__title"><?php echo $row[1]; ?></h3>
                                        <span class="featured__price">$<?php echo $row[4]; ?></span>
                                    </div>
                                    <button type="submit" name="ADD_TO_CART" class="button featured__button">ADD TO CART</button>
                                    <input type="hidden" name="product_id" value="<?php echo $row[0]; ?>">
                                </form>
                            </article>
                        <?php
                    }
                    ?>
                </div>
                <p id="CS">&#8212; Classic Series &#8212;</p>
                <div class="featured__container grid">
                <?php

                    $gold_prod = get_products($conn, "classic");
                    while ($row = $gold_prod->fetch_row()) {
                        ?>
                            <article class="featured__card">
                                <form action="api/cart/add.php" method="POST">
                                    <span class="featured__tag">Sale</span>
                                    <img src="<?php echo $row[2]; ?>" alt="" class="featured__img">
                                    <div class="featured__data">
                                        <h3 class="featured__title"><?php echo $row[1]; ?></h3>
                                        <span class="featured__price">$<?php echo $row[4]; ?></span>
                                    </div>
                                    <button type="submit" name="ADD_TO_CART" class="button featured__button">ADD TO CART</button>
                                    <input type="hidden" name="product_id" value="<?php echo $row[0]; ?>">
                                </form>
                            </article>
                        <?php
                    }
                    ?>
                </div>
        </main>
        <footer id="last_section">
            <div class="footer-container">
                <div class="footer-section get_in_touch">
                  <p>Get In Touch</p>
                  <ul class="get">
                    <li><a href="mailto:aiawatches@gmail.com?Subject=Contact" class="fa fa-envelope"></a> aiawatches@gmail.com</li>
                    <li><a href="#" class="fa fa-facebook"><i> AIA Watches</i></a></li>
                    <li><a href="#" class="fa fa-phone"></a> +92 333 1234567</li>
                    <li><a href="#" class="fa fa-instagram"><i> AIA Watches</i></a></li>
                  </ul>
                </div>
                <div class="footer-section customer_support">
                  <p>Customer Support</p>
                  <ul class="customer">
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Return & Exchange Policy</a></li>
                    <li><a href="#">Shipping & Handling Policy</a></li>
                  </ul>
                </div>
                <div class="footer-section information">
                  <p>Information</p>
                  <ul class="info">
                    <li><a href="">About Us</a></li>
                    <li><a href="#">Reviews & Blogs</a></li>
                    <li><a href="#">FAQs</a></li>
                    <li><a href="#">Terms And Condition</a></li>
                  </ul>
                </div>
              </div>
        </footer>    

    <a href="#" class="scrollup" id="scroll-up"><i class='bx bx-up-arrow-alt scrollup__icon' ></i></a>
    <script src="assets/js/swiper-bundle.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>