<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] != "admin"){
   	  header("location: 404.php");
   }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="css/normalize.min.css">
		<link rel="shortcut icon" type="image/jpg" href="img/fav.png">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Open+Sans:wght@300;400&family=Roboto:wght@100;300;400&family=Ubuntu:wght@300;400&display=swap" rel="stylesheet">
		 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
		<title>Green University of Bangladesh</title>
	</head>
	<body>
		<div class="container" id="style-1">
			<!-- Header section -->
			<div class="header">
				<header class="head-section">
					<div class="logo"><img src="img/logo.svg" alt="logo" width="80px" height="auto" /></div>
					<h1 class="hTitle">Green University of Bangladesh <br><sub class="sub"> <i>GUB Management System</i> </sub></h1>
				</header>
			</div>
			<!-- Navigation System -->
			<div class="navbar">
				<a href="#"><i class="fa fa-user"></i> Profile</a>
				<a href="#"><i class="fa fa-cogs"></i> Manage</a>
				<a href="#"><i class="fa fa-book"></i> Exam</a>
				<a href="logout.php"><i class="fa fa-arrow-circle-o-up"></i> Logout</a>
			</div>
			
			<!-- main content area -->
			<div class="content">
		       <div class="report">
		       	  <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero accusamus voluptates perspiciatis, quidem accusantium nam nemo, iure distinctio perferendis. Consectetur, debitis, porro doloribus nisi soluta nihil nemo ullam eum tempora!</p>
		       	  <p>Non aliquam sed, numquam temporibus debitis ex itaque deserunt voluptatum sit fugit quam minima reprehenderit atque, perspiciatis enim facilis repellendus praesentium fugiat, nemo odio, quos. Odit maiores veniam itaque earum.</p>
		       	  <p>Vero unde cupiditate sint officia perspiciatis eius sunt similique, aspernatur quaerat blanditiis ullam provident soluta laborum reiciendis ipsam tempora voluptates sed voluptatem maxime, tempore nisi pariatur, veniam dolorum rerum illum.</p>
		       	  <p>Facilis nobis ipsa voluptate obcaecati beatae aut amet, provident aperiam accusamus numquam, officia laboriosam, temporibus dolore nostrum. Totam itaque dolore rerum molestiae impedit aut, accusamus, fugiat, provident, tempora recusandae nihil.</p>
		       	  <p>Ducimus similique sit, quos pariatur facere qui at reiciendis quia eum expedita, inventore cupiditate, dolor. Quibusdam ex, vero perspiciatis dicta itaque, harum reprehenderit dolor ducimus. Quasi, vitae saepe eos quam?</p>
		       	  <p>Pariatur nisi laudantium odio. Sit omnis, perferendis minus sapiente, magnam saepe voluptates esse laudantium porro commodi dignissimos vel facere provident excepturi totam perspiciatis recusandae. Quos vitae illum sed, a enim.</p>
		       	  <p>Officia soluta quaerat doloremque iure voluptatibus. Ad, corporis commodi cumque animi placeat, eveniet non mollitia, ullam molestias minima quos quia voluptatum voluptatem temporibus assumenda nisi. Provident alias odio sunt nihil.</p>
		       	  <p>Reprehenderit expedita, cupiditate veritatis quod accusamus culpa aliquid delectus, quam nemo. Reprehenderit magnam nobis facere nesciunt dicta recusandae, ducimus autem velit aut aliquam deserunt? Nihil officiis reprehenderit, pariatur? Provident, quos.</p>
		       	  <p>Natus cupiditate tenetur reprehenderit quidem magni voluptates nesciunt reiciendis ut, facere voluptatem iste assumenda soluta iusto non, maiores vero eius nulla obcaecati libero, expedita, nisi laudantium ratione incidunt. Quam, ipsum.</p>
		       	  <p>Autem, doloremque sequi obcaecati ipsa velit pariatur sit culpa? Ducimus adipisci saepe, nisi et recusandae numquam quis voluptatibus tempore dolorum iusto ex culpa earum, nesciunt, molestiae quibusdam. Facere, accusamus quaerat!</p>
		       	  <p>Aliquam minus laborum, non doloribus vel consequatur distinctio sapiente et. Doloribus molestias voluptates a, id itaque, excepturi quis hic laborum unde impedit dolorum explicabo iure quas tenetur maiores natus repudiandae.</p>
		       	  <p>Cumque facilis ad quod reiciendis tempore, in hic maxime eum consequuntur sed enim pariatur rem, dolorem labore tempora. Amet incidunt non est eos blanditiis, rerum voluptatibus veniam alias reprehenderit, delectus.</p>
		       	  <p>Temporibus ad in facere, accusantium tempora? Dignissimos maiores nulla omnis ipsam qui doloremque ex itaque sunt aspernatur soluta corporis animi ad, recusandae pariatur veritatis, earum excepturi aliquid, quia hic, est!</p>
		       	  <p>Sit possimus laborum blanditiis minus. Quae, iusto. In ullam non inventore totam illum? Possimus corporis quasi quisquam maxime in error fuga doloremque eveniet, et? Enim illo fugit nisi, inventore ipsam.</p>
		       	  <p>Quas adipisci, pariatur consequuntur repellendus? In laboriosam itaque, enim nostrum minus provident aliquid placeat recusandae quo incidunt minima maiores iusto ducimus tempore perspiciatis. Error, libero sapiente atque odit maxime, quod?</p>
		       	  <p>Tempora, architecto tempore, natus magni voluptas accusantium assumenda alias enim esse officia, numquam aut saepe dicta quam? Molestiae nemo commodi voluptatibus necessitatibus, deleniti id ut quidem totam repellendus! Eligendi, aliquid!</p>
		       	  <p>Explicabo, natus! Veritatis ducimus perferendis eligendi aspernatur, consequatur officiis quam amet unde, reprehenderit eum quidem id earum facilis, quisquam? Id quaerat, itaque quae impedit quam corporis voluptatem sequi debitis, ratione.</p>
		       	  <p>Distinctio officia, consectetur sint consequatur voluptatem molestias, aliquid nulla, esse odio optio cumque nesciunt. Sit harum tempora dolores et laudantium ea expedita? Ratione ea quod vitae culpa pariatur nostrum suscipit.</p>
		       	  <p>Placeat provident omnis dolores, eveniet dolorem veritatis quibusdam pariatur facere nam consequatur unde itaque, dicta, deserunt minus quia aspernatur odio autem. Nisi autem, ad. Sapiente, quia, nesciunt. Sequi, pariatur excepturi!</p>
		       	  <p>Officia, assumenda mollitia, dolorem error eveniet nulla repudiandae, quaerat, qui labore quam dolores dignissimos aliquid laboriosam cum laborum sit veritatis corporis id suscipit voluptatem in. Veniam eveniet libero, quo aliquam?</p>
		       	  <p>Delectus aliquid facilis consequatur similique dolore nesciunt ratione incidunt fugiat recusandae iusto quidem, molestiae alias culpa laborum autem nihil quaerat architecto. Sequi sit velit voluptates mollitia dicta, perspiciatis officiis consequuntur.</p>
		       	  <p>Dignissimos animi recusandae incidunt cum excepturi delectus nobis quam harum aliquam provident. Quam laborum tenetur facilis, soluta magnam rerum est iusto porro obcaecati unde cupiditate dignissimos officiis veniam provident architecto.</p>
		       	  <p>Libero, illum dolore, quo, quos nam necessitatibus assumenda eos earum, hic placeat esse ab corporis iure sed. Ipsam veritatis unde, maiores. Rem nisi molestias voluptates omnis sit a iure animi.</p>
		       	  <p>Tempora ex praesentium excepturi at amet quos distinctio voluptatibus alias magnam consequatur blanditiis illo, aspernatur nam nulla exercitationem! Nobis modi magnam iste iusto enim, minus. Cumque voluptates, quod hic. Sequi.</p>
		       	  <p>Unde praesentium aliquid cupiditate possimus, perspiciatis enim. Ex totam incidunt cum accusantium quod ratione qui voluptate ipsum repellendus, autem cupiditate molestias possimus, modi eius distinctio dicta eos, accusamus alias iure!</p>
		       	  <p>Veritatis ullam possimus placeat unde, maxime ab incidunt, itaque ad! Magni amet eos magnam illum nobis, exercitationem hic aliquid possimus ab eum reprehenderit ad aspernatur corrupti odit voluptatum incidunt obcaecati.</p>
		       	  <p>Similique exercitationem ex, placeat eaque, dignissimos eos illo repellat nulla sequi possimus eveniet debitis sint rem nisi voluptas alias, atque pariatur consequuntur. Facilis esse dolorum autem similique praesentium ad. Repudiandae!</p>
		       	  <p>Quam eaque, ab adipisci. Esse, aspernatur amet! Quia, eaque! Ratione, rerum porro suscipit quos omnis accusamus dolorem atque similique cupiditate laudantium? Amet doloribus quasi labore unde corrupti optio veniam a!</p>
		       	  <p>Quo reiciendis odit voluptate vero aperiam provident consequuntur consequatur, ea sit! Ab fugit, aliquid maxime cum dignissimos, libero excepturi voluptatem enim! Veniam qui aliquid corporis fugiat ut facilis dolores maxime!</p>
		       	  <p>Optio, ad modi vitae dolore beatae, nostrum in, ipsa tempora deleniti possimus quod tenetur soluta pariatur nam dicta autem odit, ducimus facere inventore repellat praesentium ea necessitatibus iusto. Voluptatem, culpa!</p>
		       	  <p>Voluptate iure officia dolorem debitis et, nihil? Neque commodi odit, quae quisquam accusantium iure sunt distinctio quam. Quos deserunt corrupti, beatae labore officia amet possimus suscipit, repellendus, autem blanditiis vel.</p>
		       	  <p>Omnis, inventore velit facilis obcaecati, quidem debitis ipsa explicabo unde assumenda, nam repudiandae beatae id. Quos expedita fugiat, sunt. Unde est adipisci ducimus, inventore reprehenderit dicta laudantium cumque possimus quod!</p>
		       	  <p>Veniam repellat deleniti nesciunt voluptatem, ut sed fugiat sapiente tempore eius animi tenetur similique temporibus, enim eos placeat! Cupiditate dolores repellat iusto, explicabo molestias maiores voluptates fugiat id voluptas ipsam?</p>
		       	  <p>Velit, voluptatum! Impedit, modi qui in dolorem voluptatum fugiat, exercitationem, eius esse quae corporis et nobis tenetur, blanditiis. Soluta ad quae, quam. Quas dolorem, ullam ut itaque nostrum nobis, aut!</p>
		       </div>

			</div>
		</div>
	</body>
</html>
<!-- Stylesheets -->
<style>
       {border: 1px solid red;}
body,html {font-family: 'Open sans'; background: #eee;}
/* handle very small devices < 320px*/
.container { background-color: #fff; box-shadow: 0 1px 2px 0 rgb(60 64 67 / 30%), 0 2px 6px 2px rgb(60 64 67 / 15%);}

.head-section              { border: 1px solid #f0f0f0;display: flex;flex-wrap: wrap;}
.head-section .logo        { }
.head-section .hTitle      { font-size: 1em;font-weight: 500;color: #2d8016;margin-top: 1em;font-family: 'ubuntu';}
.head-section .hTitle .sub { font-weight: 500;color: #3C6E1B;}

.navbar         {font-family: 'Roboto';font-weight: 300;background-color: purple; position: sticky; top: 0px;}
.navbar a       {color:#fff; text-decoration: none; padding: 10px; font-size: 14px;display:inline-block;  }
.navbar a:hover {background-color: #b31eb3; transition: all .3s; cursor: pointer;}

.container {width: 100%}
/* media queries*/
/* Very Small devices*/
@media (min-width: 320px){
	.container {width: 98%}
}
/*Smart Phones*/
@media (min-width: 481px){
    .container {width: 98%}
}
/* Table */
@media (min-width: 768px){
   .container {width: 80%;margin: 0 auto; height: 95vh; overflow-y: scroll; }
}
/*Desktop*/
@media (min-width: 1364px){
	.container {width: 75%; margin: 0 auto; height: 95vh; overflow-y: scroll; }
}


#style-1::-webkit-scrollbar-track{border-radius: 5px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar {width: 3px;background-color: #F5F5F5;}
#style-1::-webkit-scrollbar-thumb { border-radius: 10px;background-color: #555;}
</style>
<!-- Script -->
<script>
	 /* Header clock*/
     const line = document.querySelector(".sub"); function time(){line.innerHTML = "GUB Management System<br/>" + new Date().toLocaleString();};setInterval(time,1000);
</script>

