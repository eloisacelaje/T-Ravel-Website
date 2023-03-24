<?php
require_once "config/database.php";

if(!isset($_SESSION["loggedin"])){
    header("location: login.php");
    exit;
}

    $getPackages = "SELECT * FROM packages";
    $result = $link->query($getPackages);
    $i = 0;
    // $name = [];
    // $description = [];
    // $star = [];
    // $cost = [];
    // if($result->num_rows > 0){
    //     while($row = $result->fetch_assoc()){
    //         $name[$i] = $row['name'];
    //         $description[$i] = $row['Description'];
    //         $star[$i] = $row['Star'];
    //         $cost[$i] = $row['image'];

    //         $i++;
    //     }
    // }
    
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Travel and Tour Agency</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<!--  start of header section  -->
<header>

    <a href="#" class="logo"><span>T</span>ravel</a>

    <nav class="navbar">
        <a href="#home">Home</a>
        <a href="#book">Book</a>
        <a href="#packages">Packages</a>
        <a href="#services">Services</a>
        <a href="#gallery">Gallery</a>
        <a href="#review">Review</a>
        <a href="#contact">Contact</a>
    </nav>

    <div class="icons">
        <i class="fas fa-search" id="ntr-search"></i>
        <i class="fas fa-power-off" id="logout-btn" onclick="self.location = 'logout.php';"></i>
    </div>

</header>

    <!-- home section -->
        <section class="home" id="home">
            <div class="content">
                <h3>Adventure is worthwhile</h3>
                <p>Discover new places. with us, adventure awaits</p>
                <a href="#" class="btn">discover more</a>
            </div>


            <div class="video-container">
                <video src="images/vid-1.mp4" id="video-slider" loop autoplay muted></video>
            </div>

        </section>
    <!-- end of home section -->

    <!-- start of book section-->
        <section class="book" id="book">

            <h1 class="heading">
                <br>
                <span>b</span>
                <span>o</span>
                <span>o</span>
                <span>k</span>
                <span class="space"></span>
                <span>n</span>
                <span>o</span>
                <span>w</span>
                <span>!</span>
            </h1>
            
            <div class="row">

                <div class="image">
                    <img src="images/book-img.png" alt="">
                </div>
            
                <form action="action.php" method="post">
                    <?php if(isset($_SESSION['statusF'])){
                        ?>
                        <div class="alert alert-danger">
                            <strong>Failed!</strong> <?php echo $_SESSION['statusF'];?>
                        </div>
                        <?php unset($_SESSION['statusF']); 
                    }?>
                    <?php if(isset($_SESSION['status'])){
                        ?>
                        <div class="alert alert-success">
                            <strong>Success!</strong> <?php echo $_SESSION['status'];?>
                        </div>
                        <?php unset($_SESSION['status']); 
                    }
                    ?>
                    <div class="inputBox">
                        <h3>where to</h3>
                        <input type="text" placeholder="place name" name="place" value="<?php  if(isset($_SESSION['place'])) echo $_SESSION["place"];  unset($_SESSION['place']); ?>">
                    </div>
                    <div class="inputBox">
                        <h3>how many</h3>
                        <input type="number" placeholder="number of guests" name="numOfgue" value="<?php  if(isset($_SESSION['guest'])) echo $_SESSION['guest'];  unset($_SESSION['guest']); ?>"> 
                    </div>
                    <div class="inputBox">
                        <h3>arrivals</h3>
                        <input type="date" name="arrival">
                    </div>
                    <div class="inputBox">
                        <h3>leaving</h3>
                        <input type="date" name="leaving">
                    </div>
                    <input type="submit" class="btn" value="book now" name="booking">
                    <br>
                    <br>
                    
                </form>
                
            </div>
        </section>
    <!-- end of book section -->

    <!-- start of packages section -->

    <section class="packages" id="packages">

        <h1 class="heading">
            <span>p</span>
            <span>a</span>
            <span>c</span>
            <span>k</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span>s</span>
        </h1> <br>

        <div class="box-container">
            <?php
                if($result->num_rows > 0){
                while($row = $result->fetch_assoc()){
                    ?>
                    <div class="box">
                    <img src="<?php echo $row['image']; ?>" alt="">
                    <div class="content">
                        <h3> <i class="fas fa-map-marker-alt"></i> <?php echo $row['name']; ?></h3>
                        <p><?php echo $row['Description']; ?></p>
                        <div class="stars">
                            <?php
                            for ($x=1; $x <= $row['Star']; $x++) { 
                                echo '<i class="fas fa-star"></i>';
                            }
                            if($row['Star'] < 5){
                                for ($x; $x <=5; $x++) { 
                                    echo '<i class="far fa-star"></i>';
                                }
                            }
                            ?>
                        </div>
                        <div class="price"> $90.00 <span>$<?php echo $row['Cost']; ?>.00</span></div>
                        <a href="action.php?id=<?php echo $row['ID']?>" class="btn">book now</a><br><br>
                    </div>
                </div>
                    <?php
                }
            }
    ?>
    </section>

    <!-- end of packages section -->

    <!-- services section -->

    <section class="services" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1> <br><br>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-hotel"></i>
                <h3>affordable hotels</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

            <div class="box">
                <i class="fas fa-utensils"></i>
                <h3>foods and drinks</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

            <div class="box">
                <i class="fas fa-bullhorn"></i>
                <h3>safety guides</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

            <div class="box">
                <i class="fas fa-globe-asia"></i>
                <h3>around the world</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

            <div class="box">
                <i class="fas fa-plane"></i>
                <h3>fastest travel</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

            <div class="box">
                <i class="fas fa-hiking"></i>
                <h3>adventures</h3>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Modi non porro autem sint vero fugit, est necessitatibus at ullam assumenda atque exercitationem, id molestias, ad quia ab enim delectus ea?</p>
            </div>

        </div>

    </section>
    <!-- end of services section -->

    <!-- gallery section -->

    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>g</span>
            <span>a</span>
            <span>l</span>
            <span>l</span>
            <span>e</span>
            <span>r</span>
            <span>y</span>
        </h1> <br>

        <div class="box-container">
            
            <!-- gallery 1-->
            <div class="box">
                <img src="images/g-1.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 2-->
            <div class="box">
                <img src="images/g-2.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 3-->
            <div class="box">
                <img src="images/g-3.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 4-->
            <div class="box">
                <img src="images/g-4.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 5-->
            <div class="box">
                <img src="images/g-5.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 6-->
            <div class="box">
                <img src="images/g-6.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 7-->
            <div class="box">
                <img src="images/g-7.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>
            
            <!-- gallery 8-->
            <div class="box">
                <img src="images/g-8.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

            <!-- gallery 9-->
            <div class="box">
                <img src="images/g-9.jpg" alt="">
                <div class="content">
                    <h3>amazing places</h3>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Culpa quis at minus atque a voluptatem id ad quos quas magni.</p>
                    <a href="#" class="btn">see more</a>
                </div>
            </div>

        </div>

    </section>

    <!-- end of gallery section -->

    <!-- start of review section -->

    <section class="review" id="review">

        <h1 class="heading">
            <span>r</span>
            <span>e</span>
            <span>v</span>
            <span>i</span>
            <span>e</span>
            <span>w</span>
        </h1> <br>

        <div class="swiper review-slider">

            <div class="swiper-wrapper">

                <!-- review 1 -->
                <div class="slider">
                    <div class="box">
                        <img src="images/pic1.png" alt="">
                        <h3>Kim Two</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur porro vitae reprehenderit eum nisi totam, repellendus delectus dolorem, ab ducimus velit architecto ex consectetur laborum voluptas ea iure, et numquam.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- review 2 -->
                <div class="slider">
                    <div class="box">
                        <img src="images/pic2.png" alt="">
                        <h3>Carl Max</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur porro vitae reprehenderit eum nisi totam, repellendus delectus dolorem, ab ducimus velit architecto ex consectetur laborum voluptas ea iure, et numquam.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- review 3 -->
                <div class="slider">
                    <div class="box">
                        <img src="images/pic3.png" alt="">
                        <h3>Mae Cel</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur porro vitae reprehenderit eum nisi totam, repellendus delectus dolorem, ab ducimus velit architecto ex consectetur laborum voluptas ea iure, et numquam.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

                <!-- review 4 -->
                <div class="slider">
                    <div class="box">
                        <img src="images/pic4.png" alt="">
                        <h3>John Deo</h3>
                        <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Pariatur porro vitae reprehenderit eum nisi totam, repellendus delectus dolorem, ab ducimus velit architecto ex consectetur laborum voluptas ea iure, et numquam.</p>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </section>

    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

    <!-- end of review section -->

    <!-- start of contact section -->
    <section class="contact" id="contact">

        <h1 class="heading">
            <span>c</span>
            <span>o</span>
            <span>n</span>
            <span>t</span>
            <span>a</span>
            <span>c</span>
            <span>t</span>
        </h1> <br>        

        <div class="row">
            <div class="image">
                <img src="images/contact-img.png" alt="">
            </div>

            <form action="">
                <div class="inputBox">
                    <input type="text" placeholder="name">
                    <input type="email" placeholder="email">
                </div>
                <div class="inputBox">
                    <input type="number" placeholder="number">
                    <input type="text" placeholder="subject">
                </div>
                <textarea placeholder="message" name="" id="" cols="30" rows="10"></textarea>
                <input type="submit" class="btn" value="send">
            </form>
        </div>

    </section>
    <!-- end of contact section -->

    <!-- start of brand section -->

    <section class="brand-container">

        <div class="swiper brand-slider">
            <div class="swiper-wrapper">

                <div class="swiper-slide">
                    <img src="images/1.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/2.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/3.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/4.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/5.jpg" alt="">
                </div>
                <div class="swiper-slide">
                    <img src="images/6.jpg" alt="">
                </div>
                
            </div>
        </div>

    </section>

    <!-- end of brand section -->

    <!-- start of footer section -->

    <section class="footer">

        <div class="box-container">

            <div class="box">
                <h3>about us</h3>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Omnis quod hic ea quas eius incidunt fuga blanditiis molestiae? Consequuntur, reiciendis.</p>
            </div>
            <div class="box">
                <h3>branch locations</h3>
                <a href="#">India</a>
                <a href="#">USA</a>
                <a href="#">Japan</a>
                <a href="#">South Korea</a>
                <a href="#">Mexico</a>
            </div>
            <div class="box">
                <h3>quick links</h3>
                <a href="#">home</a>
                <a href="#">book</a>
                <a href="#">packages</a>
                <a href="#">services</a>
                <a href="#">gallery</a>
                <a href="#">review</a>
                <a href="#">contact</a>
            </div>
            <div class="box">
                <h3>follow us</h3>
                <a href="#">facebook</a>
                <a href="#">instagram</a>
                <a href="#">twitter</a>
            </div>

        </div>

        <h1 class="credit"> created by <span> SilentSpokesperson </span> </h1>

    </section>

    <!-- end of footer section -->





    <script src="js/script.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

</body>
</html>