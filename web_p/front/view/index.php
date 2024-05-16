
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spacey</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style2.css">
    <link rel="stylesheet" href="style3.css">
</head>
<body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <header>
        <h2 class="logo">LOgo</h2>
        <nav class="navigation">
            <a href="#">Home</a>
            <a href="#">Our Team</a>
            <a href="./dashSpaceship.php">News</a>
            <a href="#">Contact</a>
        </nav>
    </header>
    
    
   
    
    <canvas id="bg"></canvas>
    <div class="actionButton" id="bb1">hello</div>
    
        <div id="floatingText1">welcome to spacey 
            where every thing is possible
        </div>
    
    <div id="container">
        <img id="floatingImage" src="https://via.placeholder.com/100" alt="Floating Image">
    </div>
    
    <div class="carousel">
        <!-- list item -->
        <div class="list">
            <div class="item">
                <img src="../image/banner.png">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        <!-- lorem 50 -->
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/aa2.png">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/98.png">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/img4.jpg">
                <div class="content">
                    <div class="author">LUNDEV</div>
                    <div class="title">DESIGN SLIDER</div>
                    <div class="topic">ANIMAL</div>
                    <div class="des">
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ut sequi, rem magnam nesciunt minima placeat, itaque eum neque officiis unde, eaque optio ratione aliquid assumenda facere ab et quasi ducimus aut doloribus non numquam. Explicabo, laboriosam nisi reprehenderit tempora at laborum natus unde. Ut, exercitationem eum aperiam illo illum laudantium?
                    </div>
                    <div class="buttons">
                        <button>SEE MORE</button>
                        <button>SUBSCRIBE</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- list thumnail -->
        <div class="thumbnail">
            <div class="item">
                <img src="../image/banner.png">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/aa2.png">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/98.png">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
            <div class="item">
                <img src="../image/img4.jpg">
                <div class="content">
                    <div class="title">
                        Name Slider
                    </div>
                    <div class="description">
                        Description
                    </div>
                </div>
            </div>
        </div>
        <!-- next prev -->

        <div class="arrows">
            <button id="prev"></button>
            <button id="next">></button>
        </div>
        <!-- time running -->
        <div class="time"></div>
    </div>

    
    <script src="imagss.js"></script>

    <script src="app.js"></script>
    <script type="module" src="script.js"></script>

    <canvas id="bg3"></canvas>
    <script type="module" src="script2.js"></script>
    
    <style>
        @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600);
        html {
            background: rgb(5, 3, 55);
        }
        body {
            padding: 80px;
            font-family: 'Open Sans', sans-serif;
            font-size: 18px;
            font-weight: 800;
        }
        .promos {
            width: 1200px; /* Increased width */
            margin: 0 auto; /* Centering the container */
            margin-top: 50px;
        }
        .promo {
            width: 250px;
            background: #0F1012;
            color: #f9f9f9;
            float: left;
        }

        .deal {
            padding: 10px 0 0 0;
        }
        .deal span {
            display: block;
            text-align: center;
        }
        .deal span:first-of-type {
            font-size: 23px;
        }
        .deal span:last-of-type {
            font-size: 13px;
        }
        .promo .price {
            display: block;
            width: 250px;
            background: #292b2e;
            margin: 15px 0 10px 0;
            text-align: center;
            font-size: 23px;
            padding: 17px 0 17px 0;
        }
        ul {
            display: block;
            margin: 20px 0 10px 0;
            padding: 0;
            list-style-type: none;
            text-align: center;
            color: #999999;
        }
        li {
            display: block;
            margin: 10px 0 0 0;
        }
        button {
            border: none;
            border-radius: 40px;
            background: #292b2e;
            color: #f9f9f9;
            padding: 10px 37px;
            margin: 10px 0 20px 60px;
        }
        .scale {
            transform: scale(1.2);
            box-shadow: 0 0 4px 1px rgba(20, 20, 20, 0.8);
        }
        .scale button {
            background: #64AAA4;
        }
        .scale .price {
            color: #64AAA4;
        }
    </style>


<div class="promos">
    <?php 
    include '../../Controller/SpaceshipC.php';
    $SpaceshipC = new SpaceshipC();

    // Check if the object is successfully instantiated
    if ($SpaceshipC) {
        // Proceed with using the object
        $spaceshipLuggageData = $SpaceshipC->show_Spaceship();

        // Output the spaceship data
        foreach ($spaceshipLuggageData as $rec) {
            ?>
            <div class="promo">
                <div class="deal">
                    <span><?= $rec['Sp_model'] ?></span>
                    <span>This is really a good deal!</span>
                </div>
                <span class="price"><?= $rec['NbSp_place'] ?></span>
                <ul class="features">
                    <li><?= $rec['NbSp_voyage'] ?></li>
                    <li><?= $rec['description_SP'] ?></li>
                    <li>And more...</li>
                </ul>
                <a href="../../3D_model/New%20folder/webgl_loader_gltf.html">
                    <button>Go to 3D Model</button>
                </a>
            </div>
            <?php
        }
    } else {
        // Handle the case where instantiation failed
        echo "Error: SpaceshipC object not instantiated.";
    }
    ?>
</div>
    
    <script src="script3.js"></script>
    


    <canvas id="bg2"></canvas>
    <div class="event-container">
        <h3 class="year">2020</h3>
  
        <div class="event">
          <div class="event-left">
            <div class="event-date">
              <div class="date">8</div>
              <div class="month">Nov</div>
            </div>
          </div>
  
          <div class="event-right">
            <h3 class="event-title">Some Title Here</h3>
  
            <div class="event-description">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
              ratione.
            </div>
  
            <div class="event-timing">
              <img src="../image/time.png" alt="" /> 10:00 am
            </div>
          </div>
        </div>
  
        <div class="event">
          <div class="event-left">
            <div class="event-date">
              <div class="date">22</div>
              <div class="month">Dec</div>
            </div>
          </div>
  
          <div class="event-right">
            <h3 class="event-title">Some Title Here</h3>
  
            <div class="event-description">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
              ratione.
            </div>
  
            <div class="event-timing">
              <img src="../image/time.png" alt="" /> 10:45 am
            </div>
          </div>
        </div>
        <div class="event">
            <div class="event-left">
              <div class="event-date">
                <div class="date">22</div>
                <div class="month">Dec</div>
              </div>
            </div>
    
            <div class="event-right">
              <h3 class="event-title">Some Title Here</h3>
    
              <div class="event-description">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Accusamus,
                ratione.
              </div>
    
              <div class="event-timing">
                <img src="../image/time.png" alt="" /> 10:45 am
              </div>
            </div>
          </div>
  
        
      
      <script type="module" src="script2.js"></script>
    </div>

    
    

   
   
    
</body>

</html>
 