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
			<style type="text/css">
	#size
	{
	width:100px;
	height:150px;
	}
	
	.form-signin
	{
    max-width: 330px;
    padding: 15px;
    margin: 0 auto;
    }

	.form-signin .form-signin-heading,
    .form-signin .checkbox 
	{
     margin-bottom: 10px;
    }
  
   .form-signin .checkbox
   {
    font-weight: normal;
   }
   
   .form-signin .form-control 
   {
    position: relative;
    height: auto;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    padding: 10px;
    font-size: 16px;
   }
   
   .form-signin .form-control:focus 
   {
    z-index: 2;
   }
   
   
	</style>
	
		</style>	
	<!--Ends Tabbing Action-->

  <script type="text/javascript">
  
session=String(<?php echo json_encode($s);?>);

function confirmpass () 
{
		var pass1 = document.getElementById('pass1');
var pass2 = document.getElementById('pass2');

	
	
	if(pass1.value != pass2.value)
    {
    	pass1.value="";
    	pass2.value="";
    	pass1.focus();
    }
    
}



function isnum(evt)
			{
			evt=(evt)?evt:window.event;
			var charCode=(evt.which)?evt.which:evt.keyCode;
			if(charCode>31 && (charCode<48 || charCode>57))
			{
			return false;
			}
			return true;
			}
function close()
			{
			window.close();
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
	
	
function checksession()
 {
	if(session=="")
    {
		var new_label=document.getElementById("myModalLabel");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal");
		var display_dep_selected=event.currentTarget;
		display_dep_selected.focus=false;
		
	}
	
 }
	
	
function ajax_call()
 {
	var modal_user=document.getElementById("user_mod").value;
	var modal_pass=document.getElementById("pass1_mod").value;
	var xhr= new XMLHttpRequest();
		xhr.onreadystatechange= function(){
		if(xhr.readyState==4 && xhr.status==200)
			{	
				var status_sign_in=xhr.responseText;
				if(status_sign_in=="Invalid Credentials!!")
				alert(status_sign_in);
				else
				{
				alert("Successful Login");
				
				}
			}
			}
		xhr.open("GET","modal-sign_in.php?modal_user="+modal_user+ "&modal_pass=" +modal_pass, false);
		xhr.send();
		document.location.href="Home.php";
 }

</script>

	
	
 </head>

  
  
  
  
  
  
  
  <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="Home.php">Pesipedia</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="Home.php">Home</a></li>
            <li><a href="Sign In.php">Sign In</a></li>
            <li><a href="Sign Up.php">Sign Up</a></li>
            <li><a href="RFC.php">RFC</a></li>
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
      <form class="form-signin" id="myform" method="post" action="insert.php"   >
        
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input class="form-control" type="text" name="user" placeholder="First Middle Last" autocomplete='off' required autofocus/>
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="pass1" id="pass1"  class="form-control" placeholder="Password"  required/>
		</div>
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="pass2" id="pass2" onblur="confirmpass()" placeholder="Confirm Password"  class="form-control" required/>
		</div>
		
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-earphone"></span></span>
			<input type="text" name="phone" id="phone" title="Enter your 10 digit contact number" class="form-control" placeholder="Phone Number" onkeypress="return isnum(event)" maxlength="10" required />
		</div>
		
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span></span>
			<input type="email" name="email" id="email" title="Like abc@gmail.com" class="form-control" placeholder="Email" required />
		</div>
		
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" id="submit">Sign Up</button>
      </form>
	  
 </center>
        
        </div>
        
		</div>
		
          
        </div>
		
		
		   
		  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Please Sign In To Perform This Action</h4>
      </div>
      <div class="modal-body" id="modal-body">
	  
		<div class="tab-content">
		<br>
		<div class="article">
      <center>
      <form class="form-signin" method="POST" onsubmit="ajax_call()">
	  <div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" id="user_mod" name="user_mod"  class="form-control" placeholder="User Id" required autofocus>
      </div>
	  <div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="pass1_mod" id="pass1_mod"  onfocusout="confirmpass()"  class="form-control" placeholder="Password" onkeyup="fade()" required>
      </div>  
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="sign_in" id="sign_in" >Sign in</button>
      </form>
	  <tr>
	<td><a href="Sign Up.php">Click to Register</a></td>
	<td>&nbsp;&nbsp;&nbsp;<a href="#">Forgot Password</a></td>
</tr>
 </center>

        
        </div>
        
		</div>
		
          
         
      </div>
      <div class="modal-footer">
        <label>Registration Is Free</label>
      </div>
    </div>
  </div>
</div>

<!--###################################################################################################################################-->
		 
		  
		  
			
		 
		 
		  
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
			