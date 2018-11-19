 <?php require('database.php');?>
 <?php if(isset($_POST['btnlogin'])){
		$username=mysql_escape_string($_POST['login']);
		$password=mysql_escape_string($_POST['password']);
		if(!$_POST['login'] | !$_POST['password'])
		{
			echo ("<script language='javascript'>
					window.alert('You did not complete all of the required field')
					window.location.href='index.php'
					</script>");
			exit();			
		}
		$sql=mysql_query("SELECT * FROM mst_user WHERE login_id='$username' AND password='$password'");
		$data=mysql_fetch_array($sql);
		if(mysql_num_rows($sql) > 0)
		{
			$username1=$data['login_id'];
			$password1=$data['password'];
			$type=$data['type'];
			$name=$data['first_name'];
			$status=$data['state'];
			if($username==$username1 && $password==$password1){
				session_start();
				$_SESSION["login"]=$username1;
				if($status=='0'){
					echo ("<script language='javascript'>
					window.alert('You are not permitted for Login Please Contact to admin!.')
					window.location.href='index.php'
					</script>");
			exit();
				}else{
				if($type=='admin'){
					$_SESSION["login"]=$username1;
			echo ("<script language='javascript'>
					window.alert('Login Succesfully!.')
					window.location.href='admin.php'
					</script>");
			exit();
				}else if($type=='user'){
					$_SESSION["login"]=$username1;
					echo ("<script language='javascript'>
					window.alert('Login Succesfully!.')
					window.location.href='user.php'
					</script>");
			exit();
				}else{
					$_SESSION["login"]=$username1;
					echo ("<script language='javascript'>
					window.alert('Login Succesfully!.')
					window.location.href='editor.php'
					</script>");	
				}
			}
			}
		}
		else{
			echo ("<script language='javascript'>
					window.alert('Wrong username password combination.Please Re-enter')
					window.location.href='index.php'
					</script>");
			exit();	
		}
	}
	
	else
	{
			
	}
    ?>
 <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Smart Crack</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link href="css/animate.min.css" rel="stylesheet"> 
  <link href="css/font-awesome.min.css" rel="stylesheet">
  <link href="css/lightbox.css" rel="stylesheet">
  <link href="css/main.css" rel="stylesheet">
  <link id="css-preset" href="css/presets/preset1.css" rel="stylesheet">
  <link href="css/responsive.css" rel="stylesheet">

  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
  <![endif]-->
  
  <link href='http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700' rel='stylesheet' type='text/css'>
  <link rel="shortcut icon" href="images/favicon.ico">
  
  <script type="text/javascript">
                 function Captcha(){
                     var alpha = new Array('A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
                     var i;
                     for (i=0;i<6;i++){
                       var a = alpha[Math.floor(Math.random() * alpha.length)];
                       var b = alpha[Math.floor(Math.random() * alpha.length)];
                       var c = alpha[Math.floor(Math.random() * alpha.length)];
                       var d = alpha[Math.floor(Math.random() * alpha.length)];
                       var e = alpha[Math.floor(Math.random() * alpha.length)];
                       var f = alpha[Math.floor(Math.random() * alpha.length)];
                       var g = alpha[Math.floor(Math.random() * alpha.length)];
                      }
                    var code = a + ' ' + b + ' ' + ' ' + c + ' ' + d + ' ' + e + ' '+ f + ' ' + g;
                    document.getElementById("mainCaptcha").value = code
                  }
                  function ValidCaptcha(){
                      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
                      var string2 = removeSpaces(document.getElementById('txtInput').value);
                      if (string1 == string2){
                        return true;
                      }
                      else{        
                        return false;
                      }
                  }
                  function removeSpaces(string){
                    return string.split(' ').join('');
                  }
             </script> 
</head><!--/head-->

<body>

  <!--.preloader-->
  <div class="preloader"> <i class="fa fa-circle-o-notch fa-spin"></i></div>
  <!--/.preloader-->

  <header id="home">
    <div id="home-slider" class="carousel slide carousel-fade" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active" style="background-image: url(images/slider/1.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Welcome to <span>Smart Crack</span></h1>
            <p class="animated fadeInRightBig">Increase Your Knowledge With Us</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/2.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">Say Hello to <span>Smart Crack</span></h1>
            <p class="animated fadeInRightBig">A Popular Online Examination Website For Students</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
        <div class="item" style="background-image: url(images/slider/3.jpg)">
          <div class="caption">
            <h1 class="animated fadeInLeftBig">We are <span>Creative</span></h1>
            <p class="animated fadeInRightBig">Brilliant - Hard Working - Focused - Intelligent</p>
            <a data-scroll class="btn btn-start animated fadeInUpBig" href="#services">Start now</a>
          </div>
        </div>
      </div>
      <a class="left-control" href="#home-slider" data-slide="prev"><i class="fa fa-angle-left"></i></a>
      <a class="right-control" href="#home-slider" data-slide="next"><i class="fa fa-angle-right"></i></a>

      <a id="tohash" href="#services"><i class="fa fa-angle-down"></i></a>

    </div><!--/#home-slider-->
    <div class="main-nav">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">
            <!--<h1><img class="img-responsive" src="images/logo.png" alt="logo"></h1>-->
          </a>                    
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav navbar-right">                 
            <li class="scroll active"><a href="#home">Home</a></li>
            <li class="scroll"><a href="#services">Service</a></li> 
            <li class="scroll"><a href="#about-us">About Us</a></li>                     
            <li class="scroll"><a href="#portfolio">Portfolio</a></li>
            <li class="scroll"><a href="#team">Team</a></li>
            <li class="scroll"><a href="#Login">Login</a></li>
            <li class="scroll"><a href="#contact">Contact</a></li>       
          </ul>
        </div>
      </div>
    </div><!--/#main-nav-->
  </header><!--/#home-->
  <section id="services">
    <div class="container">
      <div class="heading wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
        <div class="row">
          <div class="text-center col-sm-8 col-sm-offset-2">
            <h2>Our Services</h2>
            <p>SmartCrack was established with an idea..... a philosophy...... of imparting higher education and skills of the highest standards to college students so that they may become effective managers / media and IT professionals. 
			We at SmartCrack believe that learning is a continuous and dynamic process and is not confined to classrooms, only.</p>
          </div>
        </div> 
      </div>
      <div class="text-center our-services">
        <div class="row">
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="service-icon">
              <i class="fa fa-home"></i>
            </div>
            <div class="service-info">
              <h3>Residential Services</h3>
              <p>Dorms and other campus housing options usually have resident advisers (RAs).Our college offer services for students with special circumstances.
			  </p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="450ms">
            <div class="service-icon">
              <i class="fa fa-heart"></i>
            </div>
            <div class="service-info">
              <h3>Counseling</h3>
              <p>If you're having a tough time coping with stress, speaking with a mental health counselor at Our college can help. </p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="550ms">
            <div class="service-icon">
              <i class="fa fa-medkit"></i>
            </div>
            <div class="service-info">
              <h3>Health Centers</h3>
              <p>The doctors and nurses at on-campus health centers provide medical services and education.Your college may have special services for commuters.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="650ms">
            <div class="service-icon">
              <i class="fa fa-smile-o"></i>
            </div>
            <div class="service-info">
              <h3>Religious Centers</h3>
              <p>At most colleges, you can get counseling from members of the clergy.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="750ms">
            <div class="service-icon">
              <i class="fa fa-money"></i>
            </div>
            <div class="service-info">
              <h3>Financial Aid Office</h3>
              <p>Financial aid officers can help explain your financing and loan options.</p>
            </div>
          </div>
          <div class="col-sm-4 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="850ms">
            <div class="service-icon">
              <i class="fa fa-wifi"></i>
            </div>
            <div class="service-info">
              <h3>Information Technology Support</h3>
              <p>As a college student, you'll rely on computers, Wi-Fi and other technologies.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#services-->
  <section id="about-us" class="parallax">
    <div class="container">
      <div class="row">
        <div class="col-sm-6">
          <div class="about-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>About us</h2>
            <p>Smart Crack, Vasant Kunj was established in 2003. Besides, in this year the Institute added two bachelor's degree programs in Business Administration and Computer Applications to the already running Bachelor Degree Programs in Journalism.</p>
            <p>The Institute has since then grown manifold, with creditable achievements in University Examination, Results and Placement. As a result of these achievements, the institute has been ranked among the top most institutes of GGS IP University by the Government of NCT of Delhi and other Third Party Agencies. The Institute also enjoys the distinction of being the first
			Undergraduate College in the NCT of Delhi to have been accredited by NAAC, an autonomous body under the University Grants Commission, Govt. of India.</p>
		  </div>
        </div>
        <div class="col-sm-6">
          <div class="our-skills wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
              <p class="lead">User Experiances</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="95">95%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="400ms">
              <p class="lead">Online Test</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="75">75%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="500ms">
              <p class="lead">Programming</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="60">60%</div>
              </div>
            </div>
            <div class="single-skill wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
              <p class="lead">Fun</p>
              <div class="progress">
                <div class="progress-bar progress-bar-primary six-sec-ease-in-out" role="progressbar"  aria-valuetransitiongoal="85">85%</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section><!--/#about-us-->

  <section id="portfolio">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
          <h2>Our Portfolio</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua ut enim ad minim veniam</p>
        </div>
      </div> 
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="300ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/1.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="400ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/2.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="500ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/3.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/4.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="700ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/5.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="800ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/6.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInRightBig" data-wow-duration="1000ms" data-wow-delay="900ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/7.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="folio-item wow fadeInLeftBig" data-wow-duration="1000ms" data-wow-delay="1000ms">
            <div class="folio-image">
              <img class="img-responsive" src="images/portfolio/8.jpg" alt="">
            </div>
            <div class="overlay">
              <div class="overlay-content">
                <div class="overlay-text">
                  <div class="folio-info">
                    <h3>Time Hours</h3>
                    <p>Design, Photography</p>
                  </div>
                  <div class="folio-overview">
                    <span class="folio-link"><a class="folio-read-more" href="#" data-single_url="portfolio-single.html" ><i class="fa fa-link"></i></a></span>
                    <span class="folio-expand"><a href="images/portfolio/portfolio-details.jpg" data-lightbox="portfolio"><i class="fa fa-search-plus"></i></a></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="portfolio-single-wrap">
      <div id="portfolio-single">
      </div>
    </div><!-- /#portfolio-single-wrap -->
  </section><!--/#portfolio-->

  <section id="team">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>The Team</h2>
          <p>Project teams need a reliable way of stay updated with the developments and the problems that may come up in a project's status as work proceeds on it towards completion.</p>
        </div>
      </div>
      <div class="team-members">
        <div class="row">
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="member-image">
                <img class="img-responsive" src="images/team/1.jpg" alt="CEO & Founder" width="284" height="311">
              </div>
              <div class="member-info">
                <h3>Arpit Aggarwal</h3>
                <h4>CEO &amp; Founder</h4>
                <p>Pursuing BCA in Jims college through IP University And completed Secondary &amp; Higher Secondary in XYZ School through CBSE Board.</p>
              </div>
              <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="500ms">
              <div class="member-image">
                <img class="img-responsive" src="images/team/2.jpg" alt="">
              </div>
              <div class="member-info">
                <h3>Pryangan Chowdhury</h3>
                <h4>UI/UX Designer</h4>
                <p>Pursuing BCA in Jims college through IP University And completed Secondary &amp; Higher Secondary in Aggarwal Public School through CBSE Board.</p>
              </div>
              <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="800ms">
              <div class="member-image">
                <img class="img-responsive" src="images/team/3.jpg" alt="">
              </div>
              <div class="member-info">
                <h3>Pran Chowdhury</h3>
                <h4>Developer</h4>
                <p>Pursuing BCA in Jims college through IP University And completed Secondary &amp; Higher Secondary in Aggarwal Public School through CBSE Board.</p>
              </div>
              <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="team-member wow flipInY" data-wow-duration="1000ms" data-wow-delay="1100ms">
              <div class="member-image">
                <img class="img-responsive" src="images/team/4.jpg" alt="">
              </div>
              <div class="member-info">
                <h3>Arpit Aggarwal</h3>
                <h4>Support Manager</h4>
                <p>Pursuing BCA in Jims college through IP University And completed Secondary &amp; Higher Secondary in XYZ School through CBSE Board.</p>
              </div>
              <div class="social-icons">
                <ul>
                  <li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                  <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                  <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
                  <li><a class="rss" href="#"><i class="fa fa-rss"></i></a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>            
    </div>
  </section><!--/#team-->

  <section id="features" class="parallax">
    <div class="container">
      <div class="row count">
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="300ms">
          <i class="fa fa-user"></i>
          <h3 class="timer">4000</h3>
          <p>Happy Students</p>
        </div>
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="500ms">
          <i class="fa fa-desktop"></i>
          <h3 class="timer">200</h3>                    
          <p>Modern Tests</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="700ms">
          <i class="fa fa-trophy"></i>
          <h3 class="timer">10</h3>                    
          <p>WINNING AWARDS</p>
        </div> 
        <div class="col-sm-3 col-xs-6 wow fadeInLeft" data-wow-duration="1000ms" data-wow-delay="900ms">
          <i class="fa fa-comment-o"></i>                    
          <h3>24/7</h3>
          <p>Fast Support</p>
        </div>                 
      </div>
    </div>
  </section><!--/#features-->


  <section id="Login">
    <div class="container">
      <div class="row">
        <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1200ms" data-wow-delay="300ms">
          <h2>Login Here</h2>
          <p>Sign in to continue to Smart Crack</p>
        </div>
      </div>
          	<table align="center" width="60%"><tr><td>
            <form class="form-horizontal" action="" method="post">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">Login ID</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="inputEmail3" placeholder="Login ID" name="login">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="inputPassword3" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default" name="btnlogin">Sign in</button>
    </div>
  </div>
</form></td></tr></table>
        <div class="load-more wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="500ms">
		  <a href="/SmartCrack/SignUP/signup.php"><button type="button" class="btn btn-default btn-loadmore"><i class="fa fa-user-plus"></i> New User Signup</button></a>
		  
        </div>                
      
    </div>
  </section><!--/#Login-->

  <section id="contact">
    <div id="google-map" class="wow fadeIn" data-latitude="28.519571" data-longitude="77.256974" data-wow-duration="1000ms" data-wow-delay="400ms"></div>
    <div id="contact-us" class="parallax">
      <div class="container">
        <div class="row">
          <div class="heading text-center col-sm-8 col-sm-offset-2 wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
            <h2>Contact Us</h2>
            <p>For more details or special requests, please contact us.</p>
          </div>
        </div>
        <div class="contact-form wow fadeIn" data-wow-duration="1000ms" data-wow-delay="600ms">
          <div class="row">
            <div class="col-sm-6">
              <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                <div class="row  wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="text" name="name" class="form-control" placeholder="Name" required>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group">
                      <input type="email" name="email" class="form-control" placeholder="Email Address" required>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" name="subject" class="form-control" placeholder="Subject" required>
                </div>
                <div class="form-group">
                  <textarea name="message" id="message" class="form-control" rows="4" placeholder="Enter your message" required></textarea>
                </div>                        
                <div class="form-group">
                  <button type="submit" class="btn-submit">Send Now</button>
                </div>
              </form>   
            </div>
            <div class="col-sm-6">
              <div class="contact-info wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                <h2>Smart Crack</h2>
				<p>Tughlakabad Extension, New Delhi 110019</p>
				<p>Affilated to Guru Gobind Singh Indraprastha University,New Delhi</p>
                <ul class="address">
                  <li><i class="fa fa-map-marker"></i> <span> Address:</span> RZ:2571 Street 28 Ravidash mandir </li>
                  <li><i class="fa fa-phone"></i> <span> Phone:</span> 08586036520  </li>
                  <li><i class="fa fa-envelope"></i> <span> Email:</span><a href="mailto:someone@yoursite.com"> pryangan.chowdhury@gmail.com</a></li>
                  <li><i class="fa fa-globe"></i> <span> Website:</span> <a href="#">www.SmartCrack.com</a></li>
                </ul>
              </div>                            
            </div>
          </div>
        </div>
      </div>
    </div>        
  </section><!--/#contact-->
  <footer id="footer">
    <div class="footer-top wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
      <div class="container text-center">
        <div class="footer-logo">
         <!--  <a href="index.html"><img class="img-responsive" src="images/logo.png" alt=""></a> -->
        </div>
        <div class="social-icons">
          <ul>
            <li><a class="envelope" href="#"><i class="fa fa-envelope"></i></a></li>
            <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li> 
            <li><a class="dribbble" href="#"><i class="fa fa-dribbble"></i></a></li>
            <li><a class="facebook" href="https://www.facebook.com/pryangan.chowdhury"><i class="fa fa-facebook"></i></a></li>
            <li><a class="linkedin" href="https://www.linkedin.com/in/pryangan-chowdhury-28a2a2a7?trk=nav_responsive_tab_profile_pic"><i class="fa fa-linkedin"></i></a></li>
            <li><a class="tumblr" href="https://www.tumblr.com/blog/pryanganchowdhury"><i class="fa fa-tumblr-square"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-bottom">
      <div class="container">
        <div class="row">
          <div class="col-sm-6">
            <p>&copy; 2016 Smart Crack.</p>
          </div>
          <div class="col-sm-6">
            <p class="pull-right">Designed by <a href="#">Pryangan &amp; Arpit</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>
<!-- Modal for signup form -->

</div>

  <script type="text/javascript" src="js/jquery.js"></script>
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
  <script type="text/javascript" src="js/jquery.inview.min.js"></script>
  <script type="text/javascript" src="js/wow.min.js"></script>
  <script type="text/javascript" src="js/mousescroll.js"></script>
  <script type="text/javascript" src="js/smoothscroll.js"></script>
  <script type="text/javascript" src="js/jquery.countTo.js"></script>
  <script type="text/javascript" src="js/lightbox.min.js"></script>
  <script type="text/javascript" src="js/main.js"></script>

</body>
</html>