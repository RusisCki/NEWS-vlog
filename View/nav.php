<nav class="navbar navbar-expand-sm navbar-dark bgnav">
    <div class="container-fluid ms-3">
        <a class="navbar-brand customtext" href="index.php"><img src="Asset\Design\photo_2024-12-19_19-44-21-removebg-preview.png" alt="" class="navimg "></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse customflex" id="mynavbar">
            <ul class="navbar-nav p-2 me-4">
                
                <li class="nav-item customtext">
                    <a class="nav-link customtext" href="filterpost.php?sid=1">Polity</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link customtext" href="filterpost.php?sid=2">IT</a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link customtext" href="filterpost.php?sid=3">Healthy</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link customtext " href="filterpost.php?sid=4">Social</a>
                </li>
                
                <li class="nav-item dropdown ">
                    <a class="customtext nav-link dropdown-toggle " href="#" role="button" data-bs-toggle="dropdown">
                        <?php
                        if (Checkset("username")) {
                            echo Getset("username");
                        } else {
                            echo "Member";
                        }
                        ?>
                    </a>
                    <ul class="dropdown-menu bg-dark bg-opacity-75">
                        <?php
                        if (Checkset("username")) {
                            echo "<li><a class='dropdown-item customtext' href='logout.php'>LogOut</a></li>";
                            
                                if (Getset("username") == "Tanxx") {
                                    echo '<li>
                                <a href="admin.php" class="dropdown-item customtext">Post Insert</a></li> ';
                                    
                                }
                            
                        } else {
                            echo "
                                <li><a class='dropdown-item customtext' href='register.php'>Resister</a></li>
                        <li><a class='dropdown-item customtext' href='login.php'>Login</a></li>
                            ";
                        }
                        ?>
                
                    </ul>
                </li>
            </ul>

        </div>
    </div>
</nav>