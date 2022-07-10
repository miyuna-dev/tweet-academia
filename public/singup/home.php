<?php 
	include_once('../../app/controller/sessions.php');
    include_once('../../app/controller/post.php');
    include_once('../../app/controller/tweets.php');
    include_once('../../app/controller/newusers.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- ICONS -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <script src="https://kit.fontawesome.com/6aeac0b67a.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- CSS -->
    <link rel="stylesheet" href="./CSS/styles.css" />
    <link rel="stylesheet" href="./CSS/main.css" />

    <title>TweetFox Dashboard</title>
</head>

<body>
    <nav>
        <div class="container">
            <h2 class="logo">
                <a href="home.php">TweetFox</a>
            </h2>
            <div class="search-bar">
                <form action="../../app/controller/search-users.php" method="POST">
                    <button type="submit"><i class="uil uil-search"></i></button>
                    <input type="search" id="search-user" name="search-user"
                        placeholder="Type here to find whatever you want, developers, anime fans" autocomplete="off">
                </form>
                <div class="display">
                    <div id="result-search">
                        <!-- The results will be displayed right here ! -->
                    </div>
                </div>
            </div>
            <div class="right-side">
                <a href="perfil.php"><img class="profile-picture" src="img/avatar/005-gamer.png" alt=""></a>
                <a href="../../app/controller/logout.php" for="tweet" class="btn btn-primary">Logout</label></a>
            </div>
        </div>
    </nav>

    <!---------------- MAIN ---------------->
    <main>
        <div class="container">
            <!---------------- LEFT ---------------->
            <div class="left">
                <a href="perfil.php" class="profile">
                    <div class="profile-picture">
                        <img src="img/avatar/default-user.png" alt="">
                    </div>
                    <div class="handle">
                        <h4><?=$_SESSION['firstname'] ." ". $_SESSION['lastname']?></h4>
                        <p class="text-muted">
                            <?=$_SESSION['username']?>
                        </p>
                    </div>
                </a>

                <!---------------- SIDEBAR ---------------->
                <div class="sidebar">
                    <a href="" class="menu-item active">
                        <span><i class="uil uil-home"></i></span>
                        <h3>Home</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><i class="uil uil-compass"></i></span>
                        <h3>Explore</h3>
                    </a>
                    <a href="" class="menu-item" id="notifications">
                        <span><i class="uil uil-bell"><small class="notification-count">99+</small></i></span>
                        <h3>Notifications</h3>
                        <!--- popup -->
                        <div class="notifications-popup">
                            <div>
                                <div class="profile-picture">
                                    <img src="img/avatar/default-user.png" alt="">
                                </div>
                                <div class="notification-body">
                                    <b>Gojo Sensei</b> and <b>2689 others</b> liked your tweet
                                    <small class="text-muted">1 HOUR AGO</small>
                                </div>
                            </div>

                            <div class="profile-picture">
                                <img src="img/avatar/default-user.png" alt="">
                            </div>
                            <div class="notification-body">
                                <b>Gojo Sensei</b> followed you
                                <small class="text-muted">1 DAY AGO</small>
                            </div>

                            <div>
                                <div class="profile-picture">
                                    <img src="img/avatar/default-user.png" alt="">
                                </div>
                                <div class="notification-body">
                                    <b>Gojo Sensei</b> tagged you on their post
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>

                            <div class="profile-picture">
                                <img src="img/avatar/default-user.png" alt="">
                            </div>
                            <div class="notification-body">
                                <b>Gojo Sensei</b> followed you back
                                <small class="text-muted">2 DAYS AGO</small>
                            </div>

                            <div>
                                <div class="profile-picture">
                                    <img src="img/avatar/default-user.png" alt="">
                                </div>
                                <div class="notification-body">
                                    <b>Gojo Sensei</b> followed you back
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>

                            <div>
                                <div class="profile-picture">
                                    <img src="img/avatar/default-user.png" alt="">
                                </div>
                                <div class="notification-body">
                                    <b>Gojo Sensei</b> followed you back
                                    <small class="text-muted">2 DAYS AGO</small>
                                </div>
                            </div>
                        </div>
                    </a>
                    <a href="" class="menu-item" id="messages-notifications">
                        <span><i class="uil uil-envelope-alt"><small
                                    class="notification-count msg">18</small></i></span>
                        <h3>Messages</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><i class="uil uil-bookmark"></i></span>
                        <h3>Bookmarks</h3>
                    </a>
                    <a href="" class="menu-item">
                        <span><i class="uil uil-chart-line"></i></span>
                        <h3>Analytics</h3>
                    </a>
                    <a href="" class="menu-item" id="theme">
                        <span><i class="uil uil-palette"></i></span>
                        <h3>Theme</h3>
                    </a>
                    <a href="../../app/controller/logout.php" class="menu-item">
                        <span><i class="uil uil-setting"></i></span>
                        <h3>Settings</h3>
                    </a>
                </div>
            </div>
            <!------------ END OF SIDEBAR -------------->

            <!---------------- MIDDLE ---------------->
            <div class="middle">

                <!---------------- TWEET POST ---------------->
                <form method="post" action="" class="tweet-post" id="form-tweet" enctype="multipart/form-data">
                    <div class="profile-picture">
                        <img src="img/avatar/005-gamer.png" alt="">
                    </div>
                    <div class="tweet-content">
                        <textarea name="tweet" id="field" cols="73" rows="5"></textarea>
                        <div id="charNum">0/140</div>
                        <div class="send-tweet">
                            <input type="file" class="input" name="mediafile">
                            <button name="tweetpost" value="tweetpost" class="btn btn-primary">Tweet</button>
                        </div>
                    </div>
                </form>

                <!---------------- TWEETS ---------------->
                <div class="tweets">
                    <!---------------- TWEET ONE ---------------->
                    <?php While($rowSql = $sqli->fetch_assoc()) {   ?>

                    <div class="tweet">
                        <div class="profile-picture">
                            <a href="profileusers.php?user=<?php echo $rowSql["id"]; ?>">
                                <img src="img/avatar/005-gamer.png" alt="">
                            </a>
                        </div>
                        <div class="head">
                            <div class="user">
                                <div class="name">
                                    <a href="profileusers.php?user=<?php echo $rowSql["id"]; ?>">
                                        <h3><?php echo $rowSql["firstname"]; ?></h3>
                                    </a>
                                    <a href="profileusers.php?user=<?php echo $rowSql["id"]; ?>">
                                        <p class="user-tag text-muted"><?php echo $rowSql["username"]; ?></p>
                                    </a>
                                </div>
                                <div class="create">
                                    <?php echo $rowSql["dateCreation"]; ?>
                                    <span class="edit">
                                        <i class="uil uil-ellipsis-h"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="caption">
                                <p><strong><?php echo $rowSql["text"]; ?></strong>
                                    <span class="harsh-tag"></span>
                                </p>
                            </div>

                            <div class="photo">
                                <img src="data:<?php echo $rowSql["type"] ?>;base64,<?php echo base64_encode($rowSql["media"]); ?>"
                                    alt="">
                            </div>

                            <div class="action-buttons">
                                <div class="comments">
                                    <span><i class="fa-regular fa-comment-dots"></i></span>
                                    <small>920</small>
                                </div>
                                <div class="retweet">
                                    <span><i class="fa-solid fa-retweet"></i></span>
                                    <small>17k</small>
                                </div>
                                <div class="likes">
                                    <span><i class="fa-regular fa-heart"></i></span>
                                    <small>48k</small>
                                </div>
                                <div class="share">
                                    <span><i class="uil uil-share-alt"></i></span>
                                </div>
                            </div>
                            <div class="comments text-muted">View all 277 comments</div>
                        </div>
                    </div>


                    <?php } ?>


                    <!---------------- TWEET ONE ---------------->

                </div>

            </div>
            <!---------------- RIGHT ---------------->
            <div class="right">
                <div class="messages">
                    <div class="heading">
                        <h4>Messages</h4><i class="uil uil-edit"></i>
                    </div>
                    <!-------- SEARCH BAR ----->
                    <div class="search-bar">
                        <i class="uil uil-search"></i>
                        <input type="search" placeholder="Search messages" id="message-search">
                    </div>
                    <!-------- MESSAGES CATEGORY -------->
                    <div class="category">
                        <h6 class="active">Primary</h6>
                        <h6 class="active">General</h6>
                        <h6 class="message-requests">Requests(7)</h6>
                    </div>
                    <!-------- MESSAGES CATEGORY -------->
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                        </div>
                        <div class="message-body">
                            <h5>Aoki Sakura</h5>
                            <p class="text-muted">Hello, I'm online</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Sumida Chieko</h5>
                            <p class="text-bold">Hello, I'm online</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Seki Hisashi</h5>
                            <p class="text-bold">Hello, I'm online</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Imai Chie</h5>
                            <p class="text-bold">Hello, I'm online</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Araki Reiko</h5>
                            <p class="text-bold">Hello, I'm online</p>
                        </div>
                    </div>
                    <div class="message">
                        <div class="profile-picture">
                            <img src="img/avatar/default-user.png" alt="">
                            <div class="active"></div>
                        </div>
                        <div class="message-body">
                            <h5>Kawai Yumiko</h5>
                            <p class="text-bold">Hello, I'm online</p>
                        </div>
                    </div>
                </div>
                <!-------- END OF MESSAGES -------->

                <!-------- FRIEND REQUESTS -------->
                <div class="friend-requests">
                    <h4>Requests</h4>
                    <div class="request">
                        <div class="info">
                            <div class="profile-picture">
                                <img src="img/background/sakura.jpg" alt="">
                            </div>
                            <div>
                                <h5>Hejia Bintu</h5>
                                <p class="text-muted">
                                    8 mutual friends
                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Accept
                            </button>
                            <button class="btn btn-primary">
                                Decline
                            </button>
                        </div>

                    </div>

                    <h4>New Users</h4>
                    <?php While($rowSqlii = $sqlii->fetch_assoc()) {   ?>
                    <div class="request">
                        <div class="info">
                            <div class="profile-picture">
                                <img src="img/background/sakura.jpg" alt="">
                            </div>
                            <div>
                                <h5><?php echo $rowSqlii["username"]; ?></h5>
                                <p class="text-muted">

                                </p>
                            </div>
                        </div>
                        <div class="action">
                            <button class="btn btn-primary">
                                Follow
                            </button>
                            <button class="btn btn-primary">
                                Unfollow
                            </button>
                        </div>



                    </div>
                    <?php } ?>
                </div>
            </div>

            <!-------- END OF RIGHT -------->
        </div>
    </main>

    <!-------- THEME CUSTOMIZATION -------->
    <div class="customize-theme">
        <div class="card">
            <h2>Customize your view</h2>
            <p class="text-muted">Manage your font size, color, and background.</p>

            <!-------- FONT SIZES -------->
            <div class="font-size">
                <h4>Font Size</h4>
                <div>
                    <h6>Aa</h6>
                    <div class="choose-size">
                        <span class="font-size-1"></span>
                        <span class="font-size-2"></span>
                        <span class="font-size-3 active"></span>
                        <span class="font-size-4"></span>
                        <span class="font-size-5"></span>
                    </div>
                    <h3>Aa</h3>
                </div>
            </div>

            <!-------- PRIMARY COLORS -------->
            <div class="color">
                <h4>Color</h4>
                <div class="choose-color">
                    <span class="color-1 active"></span>
                    <span class="color-2"></span>
                    <span class="color-3"></span>
                    <span class="color-4"></span>
                    <span class="color-5"></span>
                </div>
            </div>

            <!-------- BACKGOUND COLORS -------->
            <div class="background">
                <h4>Background</h4>
                <div class="choose-bg">
                    <div class="bg-1 active">
                        <span></span>
                        <h5 class="d-none" for="bg-1">Light</h5>
                    </div>
                    <div class="bg-2">
                        <span></span>
                        <h5 class="d-none" for="bg-2">Dim</h5>
                    </div>
                    <div class="bg-3">
                        <span></span>
                        <h5 class="d-none" for="bg-3">Night</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="./JS/caracteress.js"></script>
    <script src="./JS/search-users.js"></script>
    <script src="./JS/home.js"></script>
    <script src="./JS/themeModal.js"></script>
</body>

</html>