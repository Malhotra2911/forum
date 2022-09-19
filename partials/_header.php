<?php
session_start();




echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="container-fluid">
    <a class="navbar-brand" href="/forum">iDiscuss</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
        aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/forum">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">About</a>            
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                    data-bs-toggle="dropdown" aria-expanded="false">
                    Top Categories
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">';

                $sql = "SELECT category_name, category_id FROM `categories` LIMIT 3";
                $result = mysqli_query($conn,$sql);
                while($row = mysqli_fetch_assoc($result)){   
                    echo '<li><a class="dropdown-item" href="threadlist.php?catid='.$row['category_id'].'">'.$row['category_name'].'</a></li>';
                }

                echo '</ul>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/forum/contact.php">Contact</a>
            </li>
        </ul>
        <div class="mx-2">
            <ul class="nav navbar-nav navbar-right">';

            if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
                echo '<li><form class="d-flex" method="get" action="search.php"> 
                <input class="form-control me-2" name="search" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success mx-2" type="submit">Search</button>
                <P class="text-light my-2 mx-2" style="display:inline-block; overflow:hidden; width-space:nowrap; width:100%;">Welcome '. $_SESSION['useremail'] .' </p> 
                <li><a href="partials/_logout.php" role="button" class="btn btn-outline-success ml-2">Logout</a></li>
                </form></li>';
            }
            else{
                echo '<li><form class="d-flex">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-success mx-2" type="submit">Search</button>
                </form></li>
            <li><button class="btn btn-outline-success ml-2" data-bs-toggle="modal" data-bs-target="#loginModal">Log In</button></li>
            <li><button class="btn btn-outline-success mx-2" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</button></li>';
        }
                
            echo '</ul>
        </div>
    </div>
</div>
</nav>';

include 'partials/_loginModal.php';
include 'partials/_signupModal.php';
if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']=="true"){
    echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
    <strong>Success!</strong> You can now login.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}
?>

<?php
    echo '<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasExampleLabel">About</h5>
            <button type="button" class="btn-close text-reset bg-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
            iDiscuss provides an online exchange of information between people about a particular topic. 
            It provides a venue for questions and answers and may be monitored to keep the content appropriate. 
            Also called a "discussion board" or "discussion group," an iDiscuss is similar 
            to an Internet newsgroup, but uses the Web browser for access. 
            Before the Web, text-only forums were common on bulletin boards and proprietary online services. 
            However, Internet forums include all the extras people expect from the Web, including images, videos, downloads 
            and links, sometimes functioning as a mini-portal on the topic.
            </div>
        </div>
    </div>';
    ?>