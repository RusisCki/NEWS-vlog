<header >
        <?php
        include_once "System/Mysession.php";
        if (Checkset("username")) {
                $name = Getset("username") ;
                echo "
                <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <marquee behavior='scroll' direction='left' class='customtextmar'>
                        Welcome Our Member " .$name. "
                        </marquee>
                </div> " ;
        }else{
                echo "
                <div class='alert alert-success alert-dismissible'>
                        <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                        <marquee behavior='scroll' direction='left' class='customtextmar'>
                        Register Now and See More Post!
                        </marquee>
                </div> " ;
        }
        ?>
        
</header>