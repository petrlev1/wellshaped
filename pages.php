<?php
include ($_SERVER["DOCUMENT_ROOT"]."/Lib/php/func.object.php");

include ($_SERVER["DOCUMENT_ROOT"]."/Lib/php/main.object.php");

$main = new main();

if (!isset($_GET["page"]) || $_GET["page"]=="")
{
	$page = "83";
}
else $page = $_GET["page"];

$topics = $main->get_record($main->pre."pages",$page,"topics");

$sql_q = "SELECT * FROM ".$main->pre."pages WHERE publ='0' AND topics='$topics' AND pages=''";
$sql_res = $main->q($sql_q);
$rows = mysql_fetch_array($sql_res);
	
$pages_name = $rows["pages_name"];

if ($page=="catalog" && isset($id) && !isset($cid))
{
	$title = $main->upfirst($main->get_record($main->pre."pages",$id,"pages_name"));
	$keywords = "";
    $description = "";
}
elseif ($page=="catalog" && isset($id) && isset($cid))
{
	$title = $main->upfirst($main->get_record("catalog_".$id,$cid,"cat_title"));
	$keywords = "";
    $description = "";
}
elseif($page=="search")
{
	$title = "Поиск";
	$keywords = "";
    $description = "";

	$page_name = "Поиск";
}
elseif ($page=="299")
{
	isset($gpage) && $gpage!=="" ?
		$gpagename = " - ".$main->get_record("photosgal",$gpage,"galname") : $gpagename = "";
	
	$page_name = "Фотогалерея".$gpagename;

	$title = "Фотогалерея";
	$keywords = "";
    $description = "";
}
elseif ($page=="smap")
{
	$page_name = "Карта сайта";
	$title = "Карта сайта";
	$keywords = "";
    $description = "";
}
elseif ($page=="news")
{
	$page_name = "Новости";
	$title = "Новости";

	if (isset($_GET["new"]) && $_GET["new"]!=="")
	{
		$title = "Новости. ".$main->get_record($main->pre."news",$_GET["new"],"news_title");
	    $keywords = $main->get_record($main->pre."news",$_GET["new"],"news_keywords");
	    $description = $main->get_record($main->pre."news",$_GET["new"],"news_description");
	    $page_name = "Новости";
	}
	
}

else{
	if (isset($_GET["pid"]) && $_GET["pid"]!=="")
	{
		$title = $main->get_record($main->pre."pages",$_GET["pid"],"title");
		$keywords = $main->get_record($main->pre."pages",$_GET["pid"],"keywords");
		$description = $main->get_record($main->pre."pages",$_GET["pid"],"description");
		
		if (isset($_GET["spid"]) && $_GET["spid"]!=="")
			{
			$title = $main->get_record($main->pre."pages",$_GET["spid"],"title");
			$keywords = $main->get_record($main->pre."pages",$_GET["spid"],"keywords");
			$description = $main->get_record($main->pre."pages",$_GET["spid"],"description");
			}
	}
	else
	{
$title = $rows["title"];
$keywords = $rows["keywords"];
$description = $rows["description"];


	}
	$big_desc = $rows["big_desc"];

$page_name = mysql_result(mysql_query("SELECT pages_name FROM ".$main->pre."pages WHERE topics='$topics' AND pages=''"),"pages_name");
}
?>
<!DOCTYPE html>
<html class="csstransforms no-csstransforms3d csstransitions desktop landscape"><head>
  
	    
   
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
     
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<meta name="keywords" content="<?php echo $keywords; ?>" />
  <meta name="description" content="<?php echo $description; ?>">
 
  <title><?php echo $title; ?></title>

  <link rel="stylesheet" href="/index_files/vm-ltr-common.css" type="text/css">
  <link rel="stylesheet" href="/index_files/vm-ltr-site.css" type="text/css">
  <link rel="stylesheet" href="/index_files/vm-ltr-reviews.css" type="text/css">
  <link rel="stylesheet" href="/index_files/jquery.css" type="text/css">
  <link rel="stylesheet" href="/index_files/modal.css" type="text/css">
  <link rel="stylesheet" href="/index_files/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="/index_files/tmpl.css" type="text/css">
  <link rel="stylesheet" href="/index_files/media_003.css" type="text/css">
  <link rel="stylesheet" href="/index_files/media_002.css" type="text/css">
  <link rel="stylesheet" href="/index_files/media_004.css" type="text/css">
  <link rel="stylesheet" href="/index_files/media.css" type="text/css">
  <link rel="stylesheet" href="/index_files/style.css" type="text/css">
  <link rel="stylesheet" href="/index_files/style_003.css" type="text/css">
  <link rel="stylesheet" href="/index_files/ext.css" type="text/css">
  <link rel="stylesheet" href="/index_files/ext_002.css" type="text/css">
  <link rel="stylesheet" href="/index_files/new.css" type="text/css">
  <script src="/index_files/atrk.js" async="" type="text/javascript"></script><script src="/index_files/analytics.js" async=""></script><script src="/index_files/jquery_005.js" type="text/javascript"></script>
  <script src="/index_files/jquery-noconflict.js" type="text/javascript"></script>
  <script src="/index_files/jquery-migrate.js" type="text/javascript"></script>
  <script src="/index_files/mootools-core.js" type="text/javascript"></script>
  <script src="/index_files/core.js" type="text/javascript"></script>
  <script src="/index_files/mootools-more.js" type="text/javascript"></script>
  <script src="/index_files/modal.js" type="text/javascript"></script>
  <script src="/index_files/vmsite.js" type="text/javascript"></script>
  <script src="/index_files/jquery_003.js" type="text/javascript" defer="defer"></script>
  <script src="/index_files/vmprices.js" type="text/javascript" defer="defer"></script>
  <script src="/index_files/bootstrap.js" type="text/javascript"></script>
  <script src="/index_files/jquery_002.js" type="text/javascript"></script>
  <script src="/index_files/touch.js" type="text/javascript"></script>
  <script src="/index_files/scripts.js" type="text/javascript"></script>
  <script src="/index_files/allScripts.js" type="text/javascript"></script>
  <script src="/index_files/engine.js" type="text/javascript"></script>
  <script src="/index_files/update_cart.js" type="text/javascript"></script>
  <script src="/index_files/camera.js" type="text/javascript"></script>
  <script src="/index_files/easing-v1.js" type="text/javascript"></script>
  <script src="/index_files/script.js" type="text/javascript"></script>
  <script src="/index_files/jquery.js" type="text/javascript"></script>
  <script src="/index_files/jquery_004.js" type="text/javascript"></script>
  <script type="text/javascript">

		jQuery(function($) {
			SqueezeBox.initialize({});
			SqueezeBox.assign($('a.modal').get(), {
				parse: 'rel'
			});
		});
jQuery.noConflict()
  </script>


	



<link href="/index_files/css.css" rel="stylesheet" type="text/css"><style type="text/css">


body
{
	font-family: Arial, Helvetica, sans-serif;	font-size: 12px;	}

a
{
	}

a:hover,
a.selected
{
	}


/**************************************************************************************/
/*   Forms																			  */


input,
button,
select,
textarea
{
	font-family: Arial, Helvetica, sans-serif;}


/**************************************************************************************/
/*   Headings and Titles															  */


h1,
h2,
h3,
h4,
h5
{
    font-family: Arial, Helvetica, sans-serif;}

h1
{
		}

h2
{
		}

h3
{
			
}

h4
{
			
}

h5
{
			
}


/**************************************************************************************/
/*   Lists																			  */


.categories-module li a,
.archive-module li a
{
	}

.categories-module li a:hover,
.archive-module li a:hover
{
	}


/**************************************************************************************/
/*   Buttons																		  */


a.btn,
a.readmore,
.btn_info,
.btn-info,
.btn-group button.btn,
.mod-newsflash a.readmore,
.btn-primary,
.btn_primary,
.contentpane .button
{
			

	}

a.btn:hover,
.btn_info:hover,
.btn-info:hover,
.btn_info:active,
.btn-info:active,
.btn_info.active,
.btn-info.active,
.btn_info.disabled,
.btn-info.disabled,
.btn_info[disabled],
.btn-info[disabled],
.btn-primary:hover,
.btn_primary:hover,
.btn-primary:active,
.btn_primary:active,
.btn-primary.active,
.btn_primary.active,
.btn-primary.disabled,
.btn_primary.disabled,
.btn-primary[disabled],
.btn_primary[disabled],
.mod-newsflash a.readmore:hover,
.contentpane .button:hover
{
				
}


/**************************************************************************************/
/*   Header Row		  																  */




#header-row .moduletable.call-now
{
	}

#header-row .moduletable.call-now div
{
    font-family: Arial, Helvetica, sans-serif;}

#header-row .logo
{
	float: left;
	line-height: 60px;
	min-width: 240px;
}

#header-row .logo,
#header-row .logo a,
#header-row .logo a:hover
{
	font-family: Arial, Helvetica, sans-serif;	font-size: 48px;	font-style: normal;	font-weight: bold;	color: #4DBCBB;}

#header-row .logo span.slogan
{
	left: 5px;
	top: 0px;
	font-family: 'PT Sans', Arial, serif !important;	font-size: 12px;	font-style: normal;	font-weight: normal;	color: #161616;	
}


/**************************************************************************************/
/*   Footer
/**************************************************************************************/
/**************************************************************************************/


#footer-row ul.nav li a
{
	}

#footer-row ul.nav li a:hover
{
	}

#copyright-menu li a,
#copyright-menu li.current a,
#copyright-menu li.active a
{
	}

#copyright-menu li a:hover
{
	}


</style>
    <link rel="stylesheet" href="/index_files/ext_004.css" type="text/css">
    <link rel="stylesheet" href="/index_files/ext_003.css" type="text/css">
    
    
</head>

<body class="com_virtuemart view-virtuemart task- itemid-101 body__home simple-title inback">
<div class="wrapper">
	     
		<!-- HEADER ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->    
		
            
        <div id="header-row">
        	<div class="wrapper">
                <div class="container">
                    <div class="row">
                        <header>
                            <div id="logo" class="span4">
                                                                <a href="/">
                                    <img src="/images/logo.jpg" alt="" height=150>
                                </a>
								 
																   <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<font size=3><b>Тел.: +7 (968) 561-02-16</b></font>
                                                            
                            </div>
														                            <div class="moduletable navigation  span8"><div class="moduletable-wrapper">

<style type="text/css">

#as-menu,
#as-menu ul.as-menu ul
{
	background-color: #;
	border-radius: 0px;
	
	}

#as-menu ul.as-menu > li > a,
#as-menu ul.as-menu > li > span
{
	font-size: 12px;
	2px;	font-family: 'PT Sans', Arial, serif !important;	color: #;
}

#as-menu ul.as-menu > li.active > a,
#as-menu ul.as-menu > li.asHover > a,
#as-menu ul.as-menu > li.current > a,
#as-menu ul.as-menu > li.active > span,
#as-menu ul.as-menu > li.asHover > span,
#as-menu ul.as-menu > li.current > span,
#as-menu ul.as-menu > li > a:hover,
#as-menu ul.as-menu > li > span:hover,
#as-menu ul.as-menu ul li a:hover,
#as-menu ul.as-menu ul li span:hover,
#as-menu ul.as-menu ul li.active > a,
#as-menu ul.as-menu ul li.asHover > a,
#as-menu ul.as-menu ul li.active > span,
#as-menu ul.as-menu ul li.asHover > span
{
	color: #;
}

#as-menu ul.as-menu ul
{
	width: 191px;
	-webkit-border-radius: 0px;
	-moz-border-radius: 0px;
	border-radius: 0px;	
	-webkit-border-bottom-right-radius: 0px;
	-moz-border-radius-bottomright: 0px;
	border-bottom-right-radius: 0px;
	-webkit-border-bottom-left-radius: 0px;
	-moz-border-radius-bottomleft: 0px;
	border-bottom-left-radius: 0px;
}

#as-menu ul.as-menu ul li a,
#as-menu ul.as-menu ul li span
{
	font-size: 12px;
	2px;	font-family: 'PT Sans', Arial, serif !important;	color: #;
}

#as-menu ul.as-menu li li:hover ul,
#as-menu ul.as-menu li li.asHover ul,
#as-menu ul.as-menu li li li:hover ul,
#as-menu ul.as-menu li li li.asHover ul
{
	left: 191px;
}


</style>
<!--[if (gt IE 9)|!(IE)]><!-->
<script type="text/javascript">
    jQuery(function(){
        jQuery('.as-menu').mobileMenu({});
    })
</script>
<!--<![endif]-->


<?php include($_SERVER["DOCUMENT_ROOT"]."/menu.php"); ?>



<script type="text/javascript">
	jQuery(function(){
		jQuery('ul.as-menu').asmenu({
			hoverClass:    'asHover',         
		    pathClass:     'overideThisToUse',
		    pathLevels:    1,    
		    delay:         500, 
		    speed:         'normal',   
		    autoArrows:    false, 
		    dropShadows:   true, 
		    disableHI:     false, 
		    onInit:        function(){},
		    onBeforeShow:  function(){},
		    onShow:        function(){},
		    onHide:        function(){}
		});
	});
</script></div></div>
							                        </header>
                    </div>
                </div>
            </div>
        </div>
    
		      
        </div>
        
		

		        
        <!-- Featured - Row  Wrapper ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
        
                           <div style="margin-left: 100px; ">
<?php
if (isset($_GET["spid"]) && $_GET["spid"]!=="")
{
?>
						   <a href="/" style="color: #B4B4B4;">Главная</a>&nbsp;&nbsp;<font color="#B4B4B4" size=1>/</font>&nbsp;&nbsp;<a href=# style="color: #B4B4B4;">Виды массажа</a>&nbsp;&nbsp;<font color="#B4B4B4" size=1>/</font>&nbsp;&nbsp;<a href=# style="color: #B4B4B4;"><?php echo $main->get_record($main->pre."pages",$_GET["spid"],"pages_name"); ?></a>
<?php
}
elseif (isset($_GET["page"]) && $_GET["page"]=="news")
{
	?>
<a href="/" style="color: #B4B4B4;">Главная</a>&nbsp;&nbsp;<font color="#B4B4B4" size=1>/</font>&nbsp;&nbsp;<a href="/pages.php?page=news" style="color: #B4B4B4;">Новости</a>
	<?php
}else

{
?>
 <a href="/" style="color: #B4B4B4;">Главная</a>&nbsp;&nbsp;<font color="#B4B4B4" size=1>/</font>&nbsp;&nbsp;<a href=# style="color: #B4B4B4;"><?php echo $main->get_record($main->pre."pages",$_GET["page"],"pages_name"); ?></a>
<?php 
}
?>
						   
						   </div>
        
		           
           <div style="margin-left: 10%; margin-top: 30px; width: 70%;">
		   
		   
		   
		   <?php


						$empts = array();

if (isset($_POST["goform"]) && $_POST["goform"]=="1")
{



	

	if ($_POST["fio"]=="") $empts[] = "Вы не представились!";
	if ($_POST["email"]=="") $empts[] = "Вы не заполнили E-mail!";
	if ($_POST["kup"]=="") $empts[] = "Вы не написали письмо";



if (count($empts)>0)
{
	echo "<div id=\"wind\">";

	echo "<font color=red><b>Внимание!</b></font><br>";

	foreach ($empts as $value)
	{
		echo $value."<br>";
	}
	
	echo "</div><script>setTimeout('closepop()', 4000);</script>";
}

else {



	$fio = strip_tags(trim($_POST["fio"]));
	
	$email = strip_tags(trim($_POST["email"]));
	
	$kup = strip_tags(trim($_POST["kup"]));

        $subject = '=?CP-1251?B?'.base64_encode('От посетителя sioni777.ru').'?=';  


	

	$headers = "From: $email\nContent-type: text; charset=windows-1251\n";

	if (mail("timalev@mail.ru",$subject ,"Имя: $fio\nE-mail: $email\nПисьмо: $kup\n\n",$headers))
	{



		print "<div id=\"wind\">Спасибо!<br> Ваше сообщение нами получено, мы постараемся ответить в ближайшее время!<br><br><button type=\"button\" value=\"закрыть\" onclick=\"closepop();\">Закрыть</button></div><script>setTimeout('closepop()', 4000);</script><br><br>";
	}else print 0;

}


}

{

				switch ($page)
				{
					
					case "299":
						include("gallery.php");
					break;

		
					case "feedback":
						include ("form.php");
					break;

					case "news":
						if (isset($_GET["new"]) && $_GET["new"]!=="")
					{
						include($_SERVER["DOCUMENT_ROOT"]."/new.php");
					}else
						include ($_SERVER["DOCUMENT_ROOT"]."/news.php");
					break;

					case "search":
						if (isset($incat) && $incat==1)
						include("search.php");
					    else include("search2.php");
					break;

					default:
						echo "<br>";

						
						if (isset($_GET["pid"]) && $_GET["pid"]!=="")
							{
							if (isset($_GET["spid"]) && $_GET["spid"]!=="")
								{
								echo $main->get_record($main->pre."pages",$_GET["spid"],"big_desc");
								}
							else echo $main->get_record($main->pre."pages",$_GET["pid"],"big_desc");
							}
						 else {
							 strlen($big_desc)== "" ? $cont = "Извините, раздел находится в стадии наполнения .." : $cont = $main-> showvids($big_desc);

							 echo $cont;
						 }		
				}

				if (isset($_GET["page"]) && $_GET["page"]=="88")
{
include("map.html");

}
}
?></div>
              
<br><br><br><br><br><br>

      
                
       
       	<!-- End off Featured - Row  Wrapper ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~  -->
       
         
       
        	   
             <div id="header-top-row">
                <div class="container">

                 <table border=0 width=100%>
                  <tr>
					<td> <b>Наш адрес:</b> Красногорский р-н, п. Нахабино, ул. Чкалова д.5. <br>Запись по телефону 8-968-561-02-16<br><a href="/map.html" target=_blank>Схема проезда</a>
					</td>
					<td valign=top align=right><a href="http://wdac.ru" target=_blank style="color: #000;">Разработка сайта - WDAC</a></td>
                  </tr>
                  </table>
                </div>
            </div>
                
	
   
   
            
        
    


</body></html>