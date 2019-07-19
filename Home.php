<?php
session_start();
if(isset($_SESSION['owner']))
{
$s=$_SESSION['owner'];
$s_id=$_SESSION['id'];
}
else
{
$s="";
$s_id="";
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    
	
    <link rel="shortcut icon" href="images/white.jpg" type="imag/icon"/>
    <title>Pesipedia</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet"/>
	 <link href="sticky-footer.css" rel="stylesheet"/>
 
	<link rel="stylesheet" type="text/css" href="not_style.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="not_script.js"></script>

 
    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet"/>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css"/>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	
    <script src="jquery-1.10.2.js"></script>
    <script src="jquery-ui.js"></script>
	<!--This is to Enable Tabbing Action-->
		<link rel="stylesheet" href="dist/css/bootstrap-theme.min.css"/>
		<!--<script src="jquery-1.11.2.min.js"></script>-->
		<script src="dist/js/bootstrap.min.js"></script>
		<style type="text/css">
			{
				.bs-example
				margin: 20px;
	     	}
			
			ul
			{
				list-style-type: none;
				padding: 0 0 0 10px;
			} 

			#headings
			{
				color:#39483d;
	
			}

			#searchbut 
			{
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid #39483d;
                background-color:#39483d;
                color:#fafafa;

			}		
		
			#searchbut:hover
			{
                background-color:#fafafa;
                color:#39483d;
			}
				
			#tags
			{
                padding:8px 15px;
                background:rgba(50, 50, 50, 0.2);
                border:0px solid #dbdbdb;
			}				

			#message
			{
				resize:none;
			}
			
			
			
			
		</style>	
		
		
		<!--Additional CSS design to  style forms and buttons--> 
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
   
   .creation
			{
			margin-bottom: 20px;
			color: #999;
			}
			
	</style>
	
	

		
	<!--Ends Tabbing Action-->

   <script type="text/javascript">
   session_id=String(<?php echo json_encode($s_id);?>);
   
   $(document).ready(function()
   {
		if(session_id!="")
		{
			<?php 
			include ('notify.php');
			?>
		
			votes_count=String(<?php echo json_encode($vote_notify_count);?>);
			voters_name_array=String(<?php echo json_encode($voters_name);?>).split(",");
			voted_type_array=String(<?php echo json_encode($vote_type);?>).split(",");
			voted_category_main_array=String(<?php echo json_encode($voted_category_main);?>).split(",");
			voted_comment_id_array=String(<?php echo json_encode($voted_comment_id);?>).split(",");
			
			//------------------------------------------------------------------------------------------------
			replies_count=String(<?php echo json_encode($replied_notify_count);?>)
			replier_name_array=String(<?php echo json_encode($replier_name);?>).split(",");
			replied_category_main_array=String(<?php echo json_encode($replied_category_main);?>).split(",");
			replied_comment_id_array=String(<?php echo json_encode($replied_comment_id);?>).split(",");
			replied_notify_change_id_array=String(<?php echo json_encode($replied_notify_change_id);?>).split(",");
			//------------------------------------------------------------------------------------------------

				for(vot=0;vot<votes_count;vot++)
				{
					var div=document.createElement("div");
					div.className="alert alert-info";
					div.id=voted_category_main_array[vot];
					div.name=voted_comment_id_array[vot];
					div.notify_stat_change=voted_comment_id_array[vot];
					div.innerHTML="<strong>"+voters_name_array[vot]+"</strong>"+" has voted "+"<strong>"+voted_type_array[vot]+"</strong>"+" for your comment under "+"<strong>"+voted_category_main_array[vot]+"</strong>";
					$("#notificationsBody").append(div);
				}
				
				for(rep=0;rep<replies_count;rep++)
				{
					var div=document.createElement("div");
					div.className="alert alert-info";
					div.id=replied_category_main_array[rep];
					div.name=replied_comment_id_array[rep];
					div.notify_stat_change=replied_notify_change_id_array[rep];
					div.innerHTML="<strong>"+replier_name_array[rep]+"</strong>"+" has "+"<strong>"+"replied"+"</strong>"+" to your comment under "+"<strong>"+replied_category_main_array[rep]+"</strong>";
					$("#notificationsBody").append(div);
				}
				
				$("#notification_count").text(parseInt(votes_count)+parseInt(replies_count));
				$(".alert-info").on("click",function(){
					alert($(this).prop("id"));
					alert($(this).prop("name"));
					alert($(this).prop("notify_stat_change"));
					var queryString1 = "?id=" +$(this).prop("id")+"&child_id="+$(this).prop("notify_stat_change")+"&parent_id="+$(this).prop("name");
					var request = new XMLHttpRequest();
					request.open("GET", "title_notify.php"+queryString1, true);
					request.send(null);
					document.location.href="RFC.php#"+$(this).prop("name");
					});
			
		
		}
   }
   );
   
   
   
   
   function contact()
   {
	var new_label=document.getElementById("myModalLabel");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal");
		var display_dep_selected=event.currentTarget;
		display_dep_selected.focus=false;
   }
   
   
   
   
function init()
  { 
 
	$(document).ready(function(){
	for(iter=0;iter<10000;iter++)
	{
	$(".glyphicon-bell").animate({'left':'-1px'},200);
	$(".glyphicon-bell").animate({'left':'0px'},200);
	$(".glyphicon-phone-alt").animate({'top':'-2px'},50);
	$(".glyphicon-phone-alt").animate({'top':'0px'},50);
	}
	
		
	}); 
	 
	 
    signout=document.getElementById("signout");
    signout.style.display="none";

    notification=document.getElementById("notification_li");
	notification.style.display="none";
	
    home=document.getElementById("Home");
    username=document.getElementById("username");
   // navbar_brand=document.getElementById("navbar-brand");

    signin=document.getElementById("signin");
    signup=document.getElementById("signup");
        
   
  session=String(<?php echo json_encode($s);?>);
    if(session!="")
    {

      signin.style.display="none";
	  signup.style.display="none";
      signout.style.display="inherit";
	  notification.style.display="inherit";
      username.innerHTML="Hi ";
	  span_glyphicon=document.createElement("span");
	  username_fragment=document.createElement("span");
	  span_glyphicon.className="glyphicon glyphicon-user";
	  username_fragment.innerHTML=" "+session;
	  username.appendChild(span_glyphicon);
	  username.appendChild(username_fragment);
	  username.style.fontFamily="Magneto";
	  //navbar_brand.style.fontSize="150%";
	  username.style.fontSize="70%";
	  username.className="creation";
    }
	else
	{
	  
	  username.innerHTML="Welcome ";
	  span_glyphicon=document.createElement("span");
	  username_fragment=document.createElement("span");
	  span_glyphicon.className="glyphicon glyphicon-user";
	  username_fragment.innerHTML="  Guest";
	  username.appendChild(span_glyphicon);
	  username.appendChild(username_fragment);
	  username.style.fontFamily="Magneto";
	  //navbar_brand.style.fontSize="150%";
	  username.style.fontSize="70%";
	  username.className="creation";
		
	}
	
  }
  
  
</script>
<script>


function ajax_call()
 {
	var modal_user=document.getElementById("user").value;
	var modal_pass=document.getElementById("pass1").value;
	var xhr= new XMLHttpRequest();
		xhr.onreadystatechange= function(){
		if(xhr.readyState==4 && xhr.status==200)
			{	
				var status_sign_in=xhr.responseText;
				if(status_sign_in=="Invalid Credentials!!")
				alert(status_sign_in);
				else
				alert("Successful Login");
				
			}
			}
		xhr.open("GET","modal-sign_in.php?modal_user="+modal_user+ "&modal_pass=" +modal_pass, false);
		xhr.send();
		document.location.href="RFC.php";
 }
 



function checksession()
 {
	if(session=="")
    {
		var new_label=document.getElementById("myModalLabel1");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body1");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal1");
		var display_dep_selected=event.currentTarget;
		display_dep_selected.focus=false;
		
	}
	
 }



  $(function() {
    $.ajax({
       data: { q: $("#tags").val()},
     url:"autocompletetry.php",
     type:"post",
     dataType:'json',
     success:function(html){
         $("#tags").autocomplete({
            position: {offset: "0 -10px"},
            source: html
         });
     },
   

    });

});
  function set_title(event){
    var tbcontent=document.getElementById("tags").value;
    var xhr= new XMLHttpRequest();
    xhr.onreadystatechange= function(){
	if(xhr.readyState==4 && xhr.status==200)
			{
				return true;
			}
	}
    xhr.open("POST","session_setter.php?title="+tbcontent, true);
    xhr.send();
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
	
	
	
	
function contact_sub()
{
 	var contact_name=document.getElementById("contact_name").value;
	var contact_email=document.getElementById("contact_email").value;
	var contact_phone=document.getElementById("contact_phone").value;
	var contact_message=document.getElementById("contact_message").value;
	var xhr= new XMLHttpRequest();
		xhr.onreadystatechange= function(){
		if(xhr.readyState==4 && xhr.status==200)
			{	
				alert("Thank you! We will get back to you..");
				
			}
			}
		xhr.open("GET","contact_us.php?contact_name="+contact_name+ "&contact_email=" +contact_email+ "&contact_phone=" +contact_phone+ "&contact_message=" +contact_message, false);
		xhr.send();
		document.location.href="RFC.php";
 
}	
</script>

	
	
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
          <a class="navbar-brand" id="navbar-brand" style="font-family:Rockwell;" href="Home.php"><span style="font-size:150%">Pesipedia</span> &nbsp &nbsp <span id="username"></span></a>
        </div>
		 
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <li id="Home"><a href="#"><span class="glyphicon glyphicon-home"></span>Home</a></li>
          <li><a href="Sign In.php" id="signin"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
          <li><a href="Sign Up.php" id="signup"><span class="glyphicon glyphicon-plus"></span>Sign Up</a></li>
          <li ><a href="RFC.php"><span class="glyphicon glyphicon-list-alt"></span>RFC</a></li>
		  <li id="notification_li">
			
			<a href="#" id="notificationLink"><span class="glyphicon glyphicon-bell"></span>Notifications<span id="notification_count">0</span></a>
			<div id="notificationContainer">
			<div id="notificationTitle">Notifications</div>
			<div id="notificationsBody" class="notifications">
			</div>
			<div id="notificationFooter"><a href="#">See All</a></div>
			</div>

     	  </li>
		  
		  <li><a onclick="contact()"  id="contact_id"><span class="glyphicon glyphicon-phone-alt"></span>Contact Us</a></li>
          <li ><a href="signout.php" id="signout" ><span class="glyphicon glyphicon-off"></span>Logout</a></li>
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
      <form id="autocomplete" onsubmit="return set_title()" action="RFC.php" method="post">
			<input id="tags" type="text" placeholder="Search..." name="textboxcontent"/>
      <input id="searchbut" type="submit" name="searchbtn" value=">>"></input>
	  <br><br>
  
  <div class="alert alert-success">
	<strong><span class="glyphicon glyphicon-info-sign"></span>Hey Guys.......</strong><p>
	Welcome to <strong>Pesipedia.</strong><p>
	<p>Since this a crowd sourced site we are requesting you people to please follow these following guidelines for data entry into this site,
	Please be as genuine as possible while data entry as it will be validated by other people in the form of votes and if your data is not
	found genuine it is possible that your comment/opinion will be discarded<span class="glyphicon glyphicon-ban-circle"></span>.</p>
	<p>Please follow the above guidelines and make the best use of this site..Cheers....</p>
</div>          
 

  <!--<label for="tags">Tags: </label>
  <input id="tags" name="textboxcontent"/>
  <input type="submit" name="searchbtn" value="search"/>
-->

 </form>
 
        
        </div>
        
		</div>
		
          
        </div>
		
		
		  
		  
		  
			
		 
	<!--###################################################################################################################################-->



<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><strong>Contact Us Form</strong></h4>
      </div>
      <div class="modal-body" id="modal-body">
	  
		<div class="tab-content">
		<br>
		<div class="alert alert-success">
      <center>
      <form class="form-signin" method="POST" onsubmit="contact_sub()">
        <input type="text" id="contact_name" name="contact_name"  class="form-control" placeholder="Full Name" required autofocus>
        <input type="email" id="contact_email" name="contact_email"  class="form-control" placeholder="Email Address" required>
        <input type="text" id="contact_phone" name="contact_phone"  class="form-control" placeholder="Phone Number" required>
        <textarea id="contact_message" name="contact_message" rows="8" cols="80" class="form-control" placeholder="Your Message"  required></textarea>
        <button class="btn btn-lg btn-primary btn-block" type="submit" name="contact_submit" id="contact_submit" >Submit Form</button>
      </form>
	 
 </center>

        
        </div>
        
		</div>
		
          
         
      </div>
      <div class="modal-footer">
        <label>Thanks you for your Interest</label>
      </div>
    </div>
  </div>
</div>	
	
	<!--###################################################################################################################################-->
  
  		  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1">Please Sign In To Perform This Action</h4>
      </div>
      <div class="modal-body" id="modal-body1">
	  
		<div class="tab-content">
		<br>
		<div class="article">
      <center>
      <form class="form-signin" method="POST" onsubmit="ajax_call()">
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
			<input type="text" id="user" name="user"  class="form-control" placeholder="User Id" required autofocus>
        </div>
		<div class="form-group input-group">
			<span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
			<input type="password" name="pass1" id="pass1"  onfocusout="confirmpass()"  class="form-control" placeholder="Password" onkeyup="fade()" required>
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
          <li><a href="Sign In.php" id="signin">Sign In</a></li>
          <li><a href="Sign Up.php" id="signup">Sign Up</a></li>
          <li ><a href="RFC.php">RFC</a></li>
		  
          <li><a onclick="contact()">Contact Us</a></li>
          <li ><a href="signout.php" id="signout" >Logout</a></li>
      </ul>
      </div>
    </footer>

		
  </body>
</html>
			