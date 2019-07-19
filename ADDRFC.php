<?php
session_start();
if(isset($_SESSION['owner']))
$s=$_SESSION['owner'];
else
$s="";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	
    <link rel="shortcut icon" href="images/white.jpg" type="imag/icon"/>
    <title>Pesipedia</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	 <link href="sticky-footer.css" rel="stylesheet">


    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet">

    <link href="signin.css" rel="stylesheet">
		<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
	<!--This is to Enable Tabbing Action-->
		<link rel="stylesheet" href="dist/css/bootstrap-theme.min.css">
		<script src="jquery-1.11.2.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
		<style type="text/css">
			{
				.bs-example
				margin: 20px;
	     	}
			ul
			{
				list-style-type: none;
				padding: 0 0 0 20px;
			} 

			#headings
			{
				color:#39483d;
	
			}
			
			.ta8a 
			{
				border: 2px solid #765942;
				border-radius: 10px;
				height: 60px;
				width: 230px;
			}
						
		</style>	
	<!--Ends Tabbing Action-->

   <script type="text/javascript">
   finall="";
   linkable = new Array;
   check = new Array;
session=String(<?php echo json_encode($s);?>);
   
var x = document.getElementById("pass1");
var y = document.getElementById("pass2");
var emp = document.getElementById('empty');
var check = document.getElementById('check');
var fav =  document.getElementById('fav');
var select= document.getElementById('select');
var pass1 = document.getElementById('pass1');
var pass2 = document.getElementById('pass2');


function init()
{

username=document.getElementById("session_add_rfc");
username.innerHTML=session;

}



function link()
{
	if(event.keyCode==32 )
	{
		textval=document.getElementById("data");
		para=textval.value;
		words=para.split(" ");
		lastindex=words.length-1;
		//alert(words[lastindex]);
		lastword=words[lastindex];
		 

		request = new XMLHttpRequest();
		var queryString = "?word=" + words[lastindex];
		request.open("GET", "autolink.php"+queryString, true);
		request.send(null);
	
	    request.onreadystatechange = function()
	    {
			if(request.readyState == 4)
			{
				t=request.responseText;
				array2=t.split("@");
				name=array2[0];
				val=array2[1];
				linkable[name]=val;

		
			}
		}


	}
}





function fu()
		{
			div=document.getElementById("divpop");
			for(key in linkable)
			{   if(linkable[key]=="yes")
				{		
				ch=document.createElement("input");
				dv=document.createElement("a");
				br=document.createElement("br");
				ch.setAttribute("type","checkbox");
				ch.id=key;
				ch.class=key;
				dv.innerHTML=key;
				ch.value=key;
				div.appendChild(ch);
				div.appendChild(dv);
				div.appendChild(br);
				//alert(ch.type);
  	
				}
			
			}
			//but=document.createElement("input");
			//but.type="button";
			//but.value="Submit";
			//but.setAttribute("onClick","generatelink()",true);
			
			//div.appendChild(but);

			event.currentTarget.setAttribute("data-toggle", "modal");
			event.currentTarget.setAttribute("data-target", "#openModal");
		
		}



function generatelink()
{	for(name in linkable)
	{
		if(x=document.getElementById(name))
		{
			if(x.checked)
				linkable[name]="yea";
		
		    
		}
	}
	for(key in linkable)
{	
	if(linkable[key] == "yea") 	
		finall=finall+" <a href=# id="+key+" onclick= sessionsetfunc()>"+key+"</a>";

	else 
		finall=finall +" "+ key;
}
textid=document.getElementById("data");
textid.value=finall;
form=document.getElementById("leavereply");
form.submit();

}




function formReset() {
    document.getElementById("myform").reset();
}


function infodisp1() 
{
	var usrinfo = document.getElementById('usr');
	usrinfo.style.display = 'block';
}

function infodisp2() 
{
	var usrinfo = document.getElementById('usr');
	usrinfo.style.display = 'none';
}


function check_for_redundency()
{

var parent_repeat=document.getElementById('parentid').value;
var entered_topic=document.getElementById('topic').value;
var entered_topic_clean=document.getElementById('topic');
//alert(parent_repeat);

		var xhr=new XMLHttpRequest();
		xhr.onreadystatechange=function(){
		if(xhr.readyState==4 && xhr.status==200)
			{	
				var response=xhr.responseText;
				if(response==1)
				{
					//alert("In");
					var mini_span=document.createElement("span");
					mini_span.innerHTML=entered_topic;
					mini_span.style.color="green";
					
					var mini_span1=document.createElement("span");
					mini_span1.innerHTML=" already created!!! Please use that";
					mini_span1.style.color="red";
					
					span=document.getElementById("repeat_info");
					span.innerHTML="Sorry Topic: ";
					span.style.color="red";
					span.appendChild(mini_span);
					span.appendChild(mini_span1);
					entered_topic_clean.value="";
					entered_topic_clean.focus();
					setTimeout(color_change,3000);
					
				}
				
				else if(response==2)
				{
				
				}

				else
				{
					span=document.getElementById("repeat_info");
					
					var mini_span=document.createElement("span");
					mini_span.innerHTML=entered_topic;
					mini_span.style.color="green";
					
					var mini_span1=document.createElement("span");
					mini_span1.innerHTML=" also exists under the ";
					mini_span1.style.color="red";
					
					var mini_span2=document.createElement("span");
					mini_span2.innerHTML="HIERARCHY ";
					mini_span2.style.color="green";
					 
					var mini_span3=document.createElement("span");
					mini_span3.innerHTML=response;
					mini_span3.style.color="blue";
					
				/*	var mini_span3=document.createElement("span");
					mini_span3.innerHTML="(Did you mean This!!)";
					mini_span3.style.color="green";
				*/	
					span.innerHTML="Suggestion: ";
					span.style.color="red";
					span.appendChild(mini_span);
					span.appendChild(mini_span1);
					span.appendChild(mini_span2);
					span.appendChild(mini_span3);
					//span.appendChild(mini_span3);
					//entered_topic_clean.value="";
					//entered_topic_clean.focus();
				}

				
			}
			}
		xhr.open("GET","Redundancy.php?parent_id="+parent_repeat+ "&topic=" +entered_topic, true);
		xhr.send();

}

function color_change()
{
		span=document.getElementById("repeat_info");
		span.innerHTML="Else Type In A Different One!!";
		span.style.color="green"
}

function span_clear()
{
		span=document.getElementById("repeat_info");
		span.innerHTML="";

}

</script>


	<script type="text/javascript">
	var ar;

	
	function create()
{
		ulchild=document.createElement("ul")
	for(i=0;i<ar.length/2+1;i++)
	{
		if(i == ar.length/2)
		{
				li =document.createElement("li");
		input=document.createElement("span");
		
		//input.type="button";
		input.className="glyphicon glyphicon-plus-sign";
		//input.style.background="#dbeddb";
		anchor=document.createElement("a");
		if(session=="")
		{
		anchor.onclick=checksession;
		}
		if(session!="")
		{
		anchor.href="ADDRFC.php?parentid="+x.id;
		}
		anchor.innerHTML="Add here";
		
		anchor.target="_parent";
		li.id=ar[i];
		li.appendChild(input);
		li.appendChild(anchor);
		ulchild.appendChild(li);
			
		}
		else{
		li =document.createElement("li");
		input=document.createElement("span");
		anchor=document.createElement("a");
		
		
		temp=ar[i];
		//alert(ar[i]);
		anchor.href="RFC.php";
		anchor.innerHTML=ar[i];
		anchor.target="_parent";
		anchor.setAttribute('onclick','sessionSet()');
		
		//input.type="button";
		//input.style.background="#dbeddb";
		input.addEventListener("click",function (event)
{	


	x=event.currentTarget;
	ul1=x.parentNode;
	if(x.className=="glyphicon glyphicon-triangle-top")
	{
		x.className="glyphicon glyphicon-tasks";
		clear=ul1.childNodes[2];
		//alert(clear.innerHTML);
		while (clear.firstChild) 
			{
				clear.removeChild(clear.firstChild);
			}
		clear.parentNode.removeChild(clear);
	}
	else
	{
		x.className="glyphicon glyphicon-triangle-top";
		getChild(x.id)
	}},true);
		/*$(input).click(function () {
                expand();
            });*/
		input.id=ar[i+ar.length/2];
		input.className="glyphicon glyphicon-tasks";
		li.id=ar[i];
		
		li.appendChild(input);
		li.appendChild(anchor);
		
		ulchild.appendChild(li);
	}}
	
	ul1.appendChild(ulchild);
	};	
///////////////////////////////
function expand(event)
{	


	x=event.currentTarget;
	ul1=x.parentNode;
	if(x.className=="glyphicon glyphicon-triangle-top")
	{	
		//alert(x.className);
		x.className="glyphicon glyphicon-tasks";
		clear=ul1.childNodes[2];
		//alert(clear.innerHTML);
		while (clear.firstChild) 
			{
				clear.removeChild(clear.firstChild);
			}
		clear.parentNode.removeChild(clear);
	}
	else
	{
		//alert(x.className);
		x.className="glyphicon glyphicon-triangle-top";
		getChild(x.id)
	}}


/////////////////////////////////////
function getChild()
{
	name=arguments[0];
	//alert(name);
	request = new XMLHttpRequest();
	id=name;
	var queryString = "?id=" + id;
	request.open("GET", "phplist.php"+queryString, true);
	request.send(null);
	
    request.onreadystatechange = function(){
		if(request.readyState == 4){
			t=request.responseText;
			if(t!="invalid"){
			ar=t.split(",");
			ar.pop();
			create();
			}
			else
			{
				alert("error");
			}
}}
	
}
////////////////////////////
function sessionSet()
{
	x=event.currentTarget;
	ul1=x.parentNode;
	//alert(ul1.id);
	
	var queryString = "?id=" +ul1.id;
	request.open("GET", "listSessionset.php"+queryString, true);
	request.send(null);
   
	}
</script>

	<?php 
$parentid=$_GET['parentid'];
echo $parentid;
?>

	
 </head>

  
  
  
  
  
  
  
  <body onload="init()">

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Home.php"><span style="font-size:150%">Pesipedia</span> &nbsp &nbsp <span style="font-family:Magneto;font-size:70%">Hi <span class="glyphicon glyphicon-user"></span>&nbsp <span id="session_add_rfc"></span></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
            <li><a href="Sign In.php"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
            <li><a href="Sign Up.php"><span class="glyphicon glyphicon-plus"></span>Sign Up</a></li>
            <li><a href="RFC.php"><span class="glyphicon glyphicon-list-alt"></span>RFC</a></li>
          </ul>
          
        </div>
      </div>
    </nav>
<!-- Top Nav Bar Ends here -->

<!-- Side Nav Bar Code starts here -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          
		  
		  
		  
		  <ul class="nav nav-sidebar">
		  <h3 id="headings" >Topics</h3>
		  <ul id="head">
	<li id="tech"><span class="glyphicon glyphicon-tasks" id="12361"  onclick="expand(event)" ></span><span target="_parent" >Technology</span></li>
	
</ul>
			
		  </ul>	
        </div>
		<!-- Side Nav Ends here -->
		
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
		
		<div class="tab-content">
		<br>
		<img src="images/hbg_img.jpg" alt="img" class="hbgimg" width="895" height="328"/>
	<br><br><br>
<div class="article">
          
		  <center>
          <h2 >Add A new Topic</h2>
		  <form class="form-signin" action="phpinsertcode.php" method="post" id="leavereply">
         
            <label for="Topic Name">Topic Name</label>
            <input id="topic" name="topic" class="ta8a" style="font-size:16px;" onblur="check_for_redundency()" onchange="span_clear()" required><span id="repeat_info"></span></input>
            <br>
			<label for="message">Your Comment</label>
            <textarea id="data" name="data" rows="8" cols="50" class="ta8a" onkeydown="link()" required></textarea>
         <input type="hidden" name="parentid" id="parentid" value=<?php echo $parentid; ?>>
		  
           <input type="button" class="btn btn-lg btn-primary btn-block" style="width:220px" value="Add Topic" onclick="fu()" />
            </form>
			
			
	  
		  </center>
        </div>        
		</div>
		
		
		<!--#####################################################################################################################################-->

<div class="modal fade" id="openModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Select the words to Create Links</h4>
      </div>
      <div class="modal-body" id="modal-body">
	  
		<div class="tab-content">
		<br>
		<div class="article">
		<center>
			<div id="divpop"></div>
	  
		</center>
		
		<center>
		<input type="button" value="Submit" onClick="generatelink()"/>	
        </center>
		
        </div>
        
		</div>
		
          
         
      </div>
      
    </div>
  </div>
</div>

<!--####################################################################################################################################-->

          
        </div>
		
		
		  
		  
		  
			
		 
		 
		  
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        
      <ul class="nav navbar-nav ">
	  
        <li class="active"><a href="#">Home</a></li>
        <li><a href="Sign In.php">Sign In</a></li>
        <li><a href="Sign Up.php">Sign Up</a></li>
		<li ><a href="RFC.php">RFC</a></li>
        <li><a href="#">Contacts</a></li>
        <li ><a href="signout.php" id="signout" >Logout</a></li>
      </ul>
      </div>
    </footer>

		
  </body>
</html>
			