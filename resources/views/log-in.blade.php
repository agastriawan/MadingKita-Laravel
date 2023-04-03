<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mading Kita</title>


    <link rel="stylesheet" href="css/font-awsome.css">
    <link rel="stylesheet" class="js-color-style" href="css/color/color-1.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="body">

    <!-- main wrapper start -->
    <div class="main-wrapper">

        <!-- header start  -->
        <header class="header">
            <div class="container">
                <div class="header-main d-flex justify-content-between align-items-center">
                    <div class="header-logo">
                        <a href="index.html"><span>Mading</span>Kita.</a>
                    </div>
                    <button type="button" class="header-hamburger-btn js-header-menu-toggler">
                        <span></span>
                    </button>
                    <div class="header-backdrop js-header-backdrop"></div>
                    <nav class="header-menu js-header-menu">
                        <button type="button" class="header-close-btn js-header-menu-toggler">
                            <i class="fas fa-times"></i>
                        </button>
                        <ul class="menu">
                            <li class="menu-item"><a href="index.html">Home</a></li>
                            <li class="menu-item menu-item-has-children">
                                <a href="">Courses <i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="course.html">course</a></li>
                                    <li class="sub-menu-item"><a href="course-detail.html">course detail</a></li>
                                </ul>
                            </li>
                            <li class="menu-item menu-item-has-children">
                                <a href="" class="js-toggle-sub-menu">Pages <i class="fas fa-chevron-down"></i></a>
                                <ul class="sub-menu js-sub-menu">
                                    <li class="sub-menu-item"><a href="log-in.html">log in</a></li>
                                    <li class="sub-menu-item"><a href="sign-up-detail.html">sign up</a></li>
                                </ul>
                            </li>
                            <li class="menu-item"><a href="contact.html">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>

        <!-- breadcrumb start -->
        <div class="breadcrumb-nav">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Log in</li>
                    </ol>
                </nav>
            </div>
        </div>
        <!-- breadcrumb end -->

        <!-- login section start -->
        <div class="login-section sectio-padding">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-7 col-lg-6 col-xl-5">
                        <div class="login-form box">
                            <h2 class="form-title text-center">Log In to Your Account</h2>
                            <form action="">
                                <div class="form-group">
                                    <input type="text" class="form-control " placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control " placeholder="Password">
                                </div>
                                <button type="submit" class="btn btn-theme btn-block btn-form col-lg-12"> Log
                                    in</button>
                                <p class="text-center mt-4 mb-0">Don't have an account ? <a
                                        href="sign-up-detail.html">Sign Up</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- login section end -->

        <div class="footer-bottom">
            <div class="container">
                <p class="m-0 py-4 text-center">copyright &copy;2022 Mading Kita</p>
            </div>
        </div>
        </footer>

        <!-- header end -->
    </div>
    <!-- main wrapper end -->



    <script src="js/main.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>