<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog PHP Test</title>
    <link rel="stylesheet" href="bootstrap-5.3.2-dist/css/bootstrap.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="CSS/customtext.css">
</head>

<body>
    <?php
    session_start();
    include_once "System/Mysession.php";
    include_once "View/nav.php";
    include_once "View/header.php";
    include_once "System/postgenerator.php";
    if (Checkset("username")) {
    $rows = GetpostCount (2) ;
    }else{
        $rows = GetpostCount (1) ;
    }
    $start = 0 ;
    if (isset ($_GET['start'])){
        $start = $_GET['start'] ;
    }
    ?>
    <div class="container">
        
        <div id="demo" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators ">
                <button type="button" class="rounded-circle bg-dark active" data-bs-target=#demo
                    data-bs-slide-to="0" style="width :15px; height : 15px;">

                </button>
                <button type="button" class="rounded-circle bg-dark " data-bs-target=#demo
                    data-bs-slide-to="1" style="width :15px; height : 15px;">
                </button>
                <button type="button" class="rounded-circle bg-dark " data-bs-target=#demo
                    data-bs-slide-to="2" style="width :15px; height : 15px;">
                </button>
                <button type="button" class="rounded-circle bg-dark " data-bs-target=#demo
                    data-bs-slide-to="3" style="width :15px; height : 15px;">
                    <button type="button" class="rounded-circle bg-dark " data-bs-target=#demo
                        data-bs-slide-to="4" style="width :15px; height : 15px;">
                    </button>
                </button>
            </div>

            <div class="carousel-inner  ">
                <div class="carousel-item active">
                    <img src="Asset\images\1734353111_German.avif" class="d-block " width="100%" height="400px">
                    <h2 class="text-dark text-center  py-3 pb-5 ">ဂျာမနီလက်ယာစွန်း နိုင်ငံရေးခေါင်းဆောင် NATO အဖွဲ့ရပ်တည်ချက်ကို မေးခွန်းထုတ်
                    </h2>
                </div>
                <div class="carousel-item">
                    <img src="Asset\images\1734525204_မျက်စိနာတာက-မကူးစက်အောင်-ဘယ်လိုကာကွယ်ကြမလဲ.jpg" class="d-block" width="100%" height="400px">
                    <h2 class="text-dark text-center  py-3 pb-5 ">မျက်စိနာတာက ကြည့်ရုံနဲ့ ကူးစက်တတ်လား!
                    </h2>
                </div>
                <div class="carousel-item">
                    <img src="Asset\images\1734526595_image-9.png" class="d-block" width="100%" height="400px">
                    <h2 class="text-dark text-center  py-3 pb-5 ">အနာဂတ် အိုလံပစ်အားကစားသမားလောင်းလျာ တွေကို AI နည်းပညာနဲ့ ရွေးချယ်လာနိုင်မှာလား?
                    </h2>
                </div>
                <div class="carousel-item">
                    <img src="Asset\images\1735821199_01-gettyimages-2169320024.jpg" class="d-block" width="100%" height="400px">
                    <h2 class="text-dark text-center  py-3 pb-5 ">လူ ၁၅ ဦးသေဆုံးတဲ့ နယူးအောလင်းတိုက်ခိုက်မှု IS အဖွဲ့ကို အားကျပြီးလုပ်တဲ့လုပ်ရပ်လို့ဆို
                    </h2>
                </div>
                <div class="carousel-item">
                    <img src="Asset\images\1734611142_Elomus.avif" class="d-block" width="100%" height="400px">
                    <h2 class="text-dark text-center  py-3 pb-5 ">ထရမ့်အစိုးရဆီကနေ အီလွန် မတ်စ် ဘာအကျိုးအမြတ်တွေ ရလာနိုင်သလဲ?
                    </h2>
                </div>
            </div>

            <button class="carousel-control-prev " type="button" data-bs-target="#demo" data-bs-slide="prev">
                <span class="carousel-control-prev-icon bg-dark bg-opacity-25"></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                <span class="carousel-control-next-icon bg-dark bg-opacity-25"></span>
            </button>
        </div>

        <div class="row">
            </aside>
            <article class="col-md-12 ">
                <div class="row">
                    <?php
                    $result = "";
                    if (Checkset("username")) {
                        $result = AllPost(2,$start);
                    } else {
                        $result = AllPost(1,$start);
                    }
                    foreach ($result as $post) {
                        $pid = $post['id'];
                        echo '
                                            <div class="col-md-3 ms-5 m-3 p-3 ">
                        <div class="card" style="width:350px">
                            <div class="card-body">
                                <h4 class="card-title">' . $post['postitle'] . '</h4>
                                <img src="Asset/images/' . $post['imglink'] . '" alt="" class="card-img-top imgindex">
                                <p class="card-text">' . substr($post['content'], 0, 200) . '...</p>
                                <a href="postdetail.php?pid=' . $pid . '" class="btn btn-sm btn-outline-primary float-end ">Details</a>
                            </div>
                        </div>
                    </div>
                        ';
                    }
                    ?>
                </div>
            </article>
        </div>
    </div>
    <div class="container">
    <div class="col-md-4 offset-md-4">
        <nav aria-label="Page navigation container example row">
            <ul class="pagination">
                <?php
                $t = 0;
                $currentStart = isset($_GET['start']) ? (int)$_GET['start'] : 0;

                if ($currentStart > 0) {
                    $prevStart = max(0, $currentStart - 6); 
                    echo '<li class="page-item"><a class="page-link family2 p-3" href="index.php?start=' . $prevStart . '">Prev</a></li>';
                } else {
                    echo '<li class="page-item disabled"><a class="page-link family2 p-3" href="#">Prev</a></li>';
                }

                
                for ($i = 0; $i < $rows; $i += 6) {
                    $t++;
                    $activeClass = ($i === $currentStart) ? 'active' : ''; 
                    echo '<li class="page-item ' . $activeClass . '"><a class="page-link family2 p-3" href="index.php?start=' . $i . '">' . $t . '</a></li>';
                }

                
                if ($currentStart + 6 < $rows) {
                    $nextStart = $currentStart + 6; 
                    echo '<li class="page-item"><a class="page-link family2 p-3" href="index.php?start=' . $nextStart . '">Next</a></li>';
                } else {
                    echo '<li class="page-item disabled"><a class="page-link family2 p-3" href="#">Next</a></li>';
                }
                ?>
            </ul>
        </nav>
    </div>
</div>

    <?php include_once "View/footer.php"; ?>
</body>

</html>