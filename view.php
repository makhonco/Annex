<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <title>AnnexAcademy</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:400,300|Raleway:300,400,900,700italic,700,300,600">
  <link rel="stylesheet" type="text/css" href="css/jquery.bxslider.css">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/animate.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
  
</head>

<body>

  <div class="loader"></div>
  <div id="myDiv">
    <!--HEADER-->
    <div class="header">
      <div class="bg-color">
        <header id="main-header">
          <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
                <a class="navbar-brand" href="#">Annex<span class="logo-dec">Academy</span></a>
              </div>
              <div class="collapse navbar-collapse" id="myNavbar">
                <!-- class="nav navbar-nav navbar-right">
                  <li class="active"><a href="#main-header">Home</a></li>
                  <li class=""><a href="#login">Login</a></li>
                </ul-->
              </div>
            </div>
          </nav>
        </header>
        <div class="wrapper">
          <div class="container">
            <div class="row">
              <div class="banner-info text-center wow fadeIn delay-05s">
                <!--h1 class="bnr-title">We are at ba<span>ker</span></h1>
                <h2 class="bnr-sub-title">Starting a new journey!!</h2>
                <p class="bnr-para">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br> Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip <br>ex ea commodo consequat.</p>
                <div class="overlay-detail">
                  <a href="#feature"><i class="fa fa-angle-down"></i></a>
                </div-->
					<h1>Directory Contents</h1>

	<table class="sortable">
	    <thead>
		<tr>
			<th>Filename</th>
			<th>Type</th>
			<th>Size</th>
			
		</tr>
	    </thead>
	    <tbody><?php

	// Adds pretty filesizes
	function pretty_filesize($file) {
		$size=filesize($file);
		if($size<1024){$size=$size." Bytes";}
		elseif(($size<1048576)&&($size>1023)){$size=round($size/1024, 1)." KB";}
		elseif(($size<1073741824)&&($size>1048575)){$size=round($size/1048576, 1)." MB";}
		else{$size=round($size/1073741824, 1)." GB";}
		return $size;
	}

 	// Checks to see if veiwing hidden files is enabled
	/**if($_SERVER['QUERY_STRING']=="hidden")
	{$hide="";
	 $ahref="./";
	 $atext="Hide";}
	else
	{**/$hide=".";
	 $ahref="./?hidden";
	 $atext="Show";

	 // Opens directory
	 $myDirectory=opendir(".");

	// Gets each entry
	while($entryName=readdir($myDirectory)) {
	   $dirArray[]=$entryName;
	}

	// Closes directory
	closedir($myDirectory);

	// Counts elements in array
	$indexCount=count($dirArray);

	// Sorts files
	sort($dirArray);

	// Loops through the array of files
	for($index=0; $index < $indexCount; $index++) {

	// Decides if hidden files should be displayed, based on query above.
	    if(substr("$dirArray[$index]", 0, 1)!=$hide) {

	// Resets Variables
		$favicon="";
		$class="file";

	// Gets File Names
		$name=$dirArray[$index];
		$namehref=$dirArray[$index];

	// Gets Date Modified
		$modtime=date("M j Y g:i A", filemtime($dirArray[$index]));
		$timekey=date("YmdHis", filemtime($dirArray[$index]));


	// Separates directories, and performs operations on those directories
		if(is_dir($dirArray[$index]))
		{
				$extn="&lt;Directory&gt;";
				$size="&lt;Directory&gt;";
				$sizekey="0";
				$class="dir";

			// Gets favicon.ico, and displays it, only if it exists.
				if(file_exists("$namehref/favicon.ico"))
					{
						$favicon=" style='background-image:url($namehref/favicon.ico);'";
						$extn="&lt;Website&gt;";
					}

			// Cleans up . and .. directories
				if($name=="."){$name=". (Current Directory)"; $extn="&lt;System Dir&gt;"; $favicon=" style='background-image:url($namehref/.favicon.ico);'";}
				if($name==".."){$name=".. (Parent Directory)"; $extn="&lt;System Dir&gt;";}
		}

	// File-only operations
		else{
			// Gets file extension
			$extn=pathinfo($dirArray[$index], PATHINFO_EXTENSION);

			// Prettifies file type
			switch ($extn){
				case "png": $extn="PNG Image"; break;
				case "jpg": $extn="JPEG Image"; break;
				case "jpeg": $extn="JPEG Image"; break;
				case "svg": $extn="SVG Image"; break;
				case "gif": $extn="GIF Image"; break;
				case "ico": $extn="Windows Icon"; break;

				case "txt": $extn="Text File"; break;
				case "log": $extn="Log File"; break;
				case "htm": $extn="HTML File"; break;
				case "html": $extn="HTML File"; break;
				case "xhtml": $extn="HTML File"; break;
				case "shtml": $extn="HTML File"; break;
				case "php": $extn="PHP Script"; break;
				case "js": $extn="Javascript File"; break;
				case "css": $extn="Stylesheet"; break;

				case "pdf": $extn="PDF Document"; break;
				case "xls": $extn="Spreadsheet"; break;
				case "xlsx": $extn="Spreadsheet"; break;
				case "doc": $extn="Microsoft Word Document"; break;
				case "docx": $extn="Microsoft Word Document"; break;

				case "zip": $extn="ZIP Archive"; break;
				case "htaccess": $extn="Apache Config File"; break;
				case "exe": $extn="Windows Executable"; break;

				default: if($extn!=""){$extn=strtoupper($extn)." File";} else{$extn="Unknown";} break;
			}

			// Gets and cleans up file size
				$size=pretty_filesize($dirArray[$index]);
				$sizekey=filesize($dirArray[$index]);
		}

	// Output
	 echo("
		<tr class='$class'>
			<td><a href='./$namehref'$favicon class='name'>$name</a></td>
			<td><a href='./$namehref'>$extn</a></td>
			<td sorttable_customkey='$sizekey'><a href='./$namehref'>$size</a></td>
			
		</tr>");
	   }
	}
	?>

	    </tbody>
	</table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--/ HEADER-->
    
    
	
  </div>
  <script src="C:/wamp/www/Annex/js/jquery.min.js"></script>
  <script src="C:/wamp/www/Annex/js/jquery.easing.min.js"></script>
  <script src="C:/wamp/www/Annex/js/bootstrap.min.js"></script>
  <script src="C:/wamp/www/Annex/js/wow.js"></script>
  <script src="C:/wamp/www/Annex/js/jquery.bxslider.min.js"></script>
  <script src="C:/wamp/www/Annex/js/custom.js"></script>
  <script src="C:/wamp/www/Annex/contactform/contactform.js"></script>

</body>
</html>
