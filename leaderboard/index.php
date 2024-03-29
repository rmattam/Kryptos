<?php
session_start();
ini_set('session.cookie_lifetime',  0);
$_SESSION['leader']=rand(1,48);
?>
<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Wall Of Fame</title>
		<link rel="icon" type="image/png" href="../images/favicon.png" />
		<link rel="stylesheet" type="text/css" href="css/default.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />
		<script src="js/modernizr.custom.js"></script>
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  		ga('create', 'UA-54537876-1', 'auto');
  		ga('send', 'pageview');
		</script>
		<style>
			@font-face {
    			font-family: myfont;
    			src: url(font.otf);
				}
			#leader_body{
					font-family: myfont;
					background-image: url('images/bglead0.png');
    				background-repeat: repeat;
    				background-color: #a3cbc4;
			}

			div.leader_outer{
				width:100%;
				-webkit-box-shadow: 10px 10px 13px 1px rgba(61,61,61,0.82);
-moz-box-shadow: 10px 10px 13px 1px rgba(61,61,61,0.82);
box-shadow: 10px 10px 13px 1px rgba(61,61,61,0.82);
			}
			section.leader_pos{
				height:70px;
				background-color: white;
			}
			h1.leader_pos_num{
				position:relative;
				top:10px; 
				text-align: center;
				font-size: 38px;
				color:#F9BF3B; 
			}
			img.leader_center_img{
				position: relative;
				margin-left:auto;
				margin-right:auto; 
				border-radius:50px;
				top:20px;
			}
			p.leader_name{
				position: relative;
				text-align: center;
				font-size:230%; 
				font-weight:thin; 
				color:white;
				top:30px;
			}
			p.leader_level{
				position: relative;
				text-align: center;
				 color:#f2f2f2; 
				font-size:200%;
				top:10px;
				border:0px;
				border-top: 2px;
				border-bottom: 2px;
				border-color:white ;
				border-style: dashed;
				padding: 3px;
				background-color: rgba(246, 71, 71,0.8);
			}
			</style>
	</head>
	<body id="leader_body">
		<div id="loadingpage" style="display:visible; position:absolute; left:0%; top:0%; z-index:100; background-color:white;  height:100%; width:100%;">
    		<img src="../logo/loader.gif" style="position:relative;display:block;  top:35%; margin-left:auto; margin-right:auto;">
 		</div>
		<section>
		<p style="text-align:center; color:#fff; font-size:400%;">WALL OF FAME</p>
		<div style="position: absolute;top: 5%; margin-right:5%; left:82%;"class="hi-icon-effect-9 hi-icon-effect-9a">
					<a href="../validate.php" class="hi-icon hi-icon-images"><img style="position:relative; left:-2px;"src="images/cross.png"></a>
	    </div>
	    </section>
		<div class="container">
			<ul class="grid" id="grid">
			</ul>
		</div>
		<script src="js/masonry.pkgd.min.js"></script>
		<script src="js/imagesloaded.js"></script>
		<script src="js/classie.js"></script>
		<script src="js/AnimOnScroll.js"></script>
		<script type="text/javascript" src="js/jquery-1.6.js"></script>
		<script>
		$(document).ready(function(){
			$.ajax({
                url: '../leader.php',
                success: function(data, status){
                	var obj=JSON.parse(data);
        			var i=0,j,k,l;
        			//things to change each time
        			var heights=[380,390,400,410,420,430,440,450,460,470,480,490,500];
        			var colors=["#2ecc71","#3498db","#9b59b6","#e67e22","#e74c3c","#f1c40f","#1abc9c","#16a085","#27ae60","#2980b9","#9b59b6","#f39c12","#d35400","#c0392b"];
        			var effect=[3,4,5,6,7];
        			var backgrnd=[0,1,2];
        			n=Math.floor(Math.random()*3);
        			$("#leader_body").css("background-image","url('images/bglead"+backgrnd[n]+".png')");
        			m=Math.floor(Math.random()*5);
        			$("#grid").addClass("effect-"+effect[m]);
        			/*while(i<100)
        			{
        			j=Math.floor(Math.random()*13);
        			k=Math.floor(Math.random()*14);
        			l=Math.floor(Math.random()*48)+1;
        			$("#grid").append("<li><div class='leader_outer' style='height:"+heights[j]+"px;background-color:"+colors[k]+";'><section class='leader_pos'><h1 class='leader_pos_num'>"+(i+1)+"</h1></section><section><img class='leader_center_img' src='images/100px/"+l+".png'></section><p class='leader_name'>"+"Ajay Jacob John"+"</p><p class='leader_level'>"+"Level: 23"+"</p></div></li>");
        			i++;
        			}*/
        			while(obj[i]!=undefined)
        			{

        			j=Math.floor(Math.random()*13);
        			k=Math.floor(Math.random()*14);
        			l=Math.floor(Math.random()*48)+1;
        			

        			<?php
        			if(isset($_SESSION['username']))
        			{
        			?>

        			if(<?php echo $_SESSION['level'];?>==62)
        			{
        			if(<?php echo $_SESSION['username'];?>==obj[i].fbid)
        			{l=<?php echo $_SESSION['leader'];?>;}
        			}

        			<?php
        			}
        			?>

        			$("#grid").append("<li><div class='leader_outer' style='height:"+heights[j]+"px;background-color:"+colors[k]+";'><section class='leader_pos'><h1 class='leader_pos_num'>"+(i+1)+"</h1></section><section><img class='leader_center_img' src='images/100px/"+l+".png'></section><p class='leader_name'>"+obj[i].firstname+" "+obj[i].lastname+"</p><p class='leader_level'>"+obj[i].levelid+"</p></div></li>");
        			i++;
        			}
        			new AnimOnScroll( document.getElementById( 'grid' ), {
					minDuration : 0.4,
					maxDuration : 0.7,
					viewportFactor : 0.2
					} );
        		},
        		error: function(){
        		alert("There was an error in passing....please excuse us.");
        		}
    		});
		});

		$(window).load(function(){
	$("#loadingpage").css("display","none");
		});
		</script>
	</body>
</html>