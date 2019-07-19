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
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    
	
    <link rel="shortcut icon" href="images/white.jpg" type="imag/icon"/>
    <title>Pesipedia</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">
	
	<!-- Tabbing Action for Structured And Unstructured Entry-->
		<link href="dist/css/bootstrap.min.css" rel="stylesheet">
    	<script src="jquery-1.11.2.min.js"></script>
		<script src="dist/js/bootstrap.min.js"></script>
<!-- Tabbing ends here-->
	<link rel="stylesheet" type="text/css" href="not_style.css">
	<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="not_script.js"></script>
    <!-- Custom styles -->
    <link href="dashboard.css" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="jquery-1.10.2.js"></script>
    <script src="jquery-ui.js"></script>
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
				padding: 0 0 0 10px;
			} 

			#headings
			{
				color:#39483d;
	
			}

			.searchbut {
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid #39483d;
                background-color:#39483d;
                color:#fafafa;

		}		
.searchbutchange {
                position:relative;
                padding:6px 15px;
                left:-8px;
                border:2px solid #39483d;
                background-color:#39483d;
                color:#fafafa;

    }

		
.searchbut:hover  {
                background-color:#fafafa;
                color:#39483d;
				}
#data
			{
				resize:none;
			}
			
			.footer_text
		{
		
			left:800px;
			
		}
		
		
		
		
		#footer_anchor
		{
			color:#39483d;
		}
		
		.creation
		{
			margin-bottom: 20px;
			color: #999;
		}
		
		
		</style>	
	<!--Ends Tabbing Action-->

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
   
   .ta8a {
	border: 2px solid #765942;
	border-radius: 10px;
	height: 60px;
	width: 230px;
	}
	
	.ta8b {
	border:2px dashed #D1C7AC;
	height: 60px;
	width: 900px;
	}
	
	.ta10
	{
	border: 3px double #CCCCCC;
	width: 230px;
	height: 60px;
	}
	
	</style>
<?php 
include ('searchpage.php');
?>

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
					document.location.reload();
					});
			
		
		}
   }
   );
 
 
 
 
 
 
 function sessionsetfunc()
 {   
 	x=event.currentTarget;
 	request = new XMLHttpRequest();
	alert(x.id);
	var queryString = "?id=" +x.id;
	request.open("GET", "listSessionset.php"+queryString, true);
	request.send(null);
	
	window.location="RFC.php";
   

 }
 
 
 
 function contact()
   {
	var new_label=document.getElementById("myModalLabel1");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body1");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal1");
		var display_dep_selected=event.currentTarget;
		display_dep_selected.focus=false;
   }
   
 
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
		var new_label=document.getElementById("myModalLabel");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal");
		var display_dep_selected=event.currentTarget;
		display_dep_selected.focus=false;
		
	}
	
 }
 
 
function init2()
  { 
  
    signout=document.getElementById("signout");
    notification=document.getElementById("notification_li");
    signout.style.display="none";
    notification.style.display="none";
    home=document.getElementById("Home");
    contact_place=document.getElementById("contact_us");
    username=document.getElementById("username");

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
<script type="text/javascript">


  $(document).ready(function(){
	for(iter=0;iter<10000;iter++)
	{
	$(".glyphicon-question-sign").animate({'top':'-10px'},400);
	$(".glyphicon-question-sign").animate({'top':'0px'},400);
	$(".glyphicon-bell").animate({'left':'-1px'},200);
	$(".glyphicon-bell").animate({'left':'0px'},200);
	$(".glyphicon-phone-alt").animate({'top':'-2px'},50);
	$(".glyphicon-phone-alt").animate({'top':'0px'},50);
	}
	
	$(".badge").hover(function(){
	$(this).toggleClass('before');
	if($(this).hasClass('before'))
	{
	$(this).animate({'right':'-10px'});
	}
	else
	{
	$(this).animate({'right':'0px'});
	}

	
	});
	
	});




function init()
{
	//alert("Hello");
	//alert("hi");
	init2();
	
  title=String(<?php echo json_encode($_SESSION['title']);?>);
  headding=document.getElementById("headername");
	headding.innerHTML=title;
	headding.style.textDecoration="underline";
	document.getElementById('uploaded').addEventListener('change', handleFileSelect, false);
  badge_count=document.getElementById("badge");
  //alert(title);
//  hiddentitle=document.getElementById("hidden_title_field");
//  hiddentitle.value=title;
  pagetitle=document.getElementById("pagetitle");
  pagetitle.innerHTML=title;
 // pagetitle.style.font="italic bold 30px arial,serif";
  
    comment_id=String(<?php echo json_encode($search_id1);?>);
  own=String(<?php echo json_encode($search_owner); ?>);
  down_up=String(<?php echo json_encode($search_down_up);?>) ;     
      dat=String(<?php echo json_encode($search_data);?>);
      flag=String(<?php echo json_encode($flag);?>);
     tim=String(<?php echo json_encode($search_TimeOfComment);?>);
	 prop=String(<?php echo json_encode($search_property);?>);
	 vote_result=String(<?php echo json_encode($vote_result);?>);
	 replies_count=String(<?php echo json_encode($replies_count);?>);
	 ownarray=own.split(",");
   comment_id_array=comment_id.split(",");
      down_uparray=down_up.split(",");
	  flagarray=flag.split(",");
       dat=dat.substring(0, dat.length - 1);
        datarray=dat.split("@,");
	  timarray=tim.split(",");
    proparray=prop.split(",");
    vote_result_array=vote_result.split(",");
    replies_count_array=replies_count.split(",");
  layout=document.getElementById("factsection");
	
  badge_count.innerHTML=datarray.length;
	
  for(i=0;i<datarray.length;i++){
    foo(comment_id_array[i],ownarray[i],down_uparray[i],proparray[i],datarray[i],timarray[i],flagarray[i],vote_result_array[i],replies_count_array[i]);
  }
  
  

  
  
}



function up(event){

	if(session=="")
    {
		var new_label=document.getElementById("myModalLabel");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal");
	}
	
  while(event.target.parentElement.flag){ var idnum=parseInt(event.target.original_id);
    
    cnt=document.getElementById("CountedClicks"+idnum);
	//alert("idnume="+idnum);
		//alert("likes="+cnt.likes);
    cnt.likes+=1;
    

    var selected_button=event.currentTarget;
    //alert(selected_button);
    var child_nodes=selected_button.parentNode.childNodes;
    
    var selected_comment_id=child_nodes[1].id;
		//alert("comment_id="+selected_comment_id);
		//alert("New likes="+cnt.likes);
    var type_of_vote="up";
    //alert(selected_comment_id);
	//alert(cnt.likes);
	//alert(type_of_vote);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
			//if(xmlhttp.readyState==4)
				//alert("Success");
			
        }
        xmlhttp.open("POST", "voteclick.php?q=" + selected_comment_id + "&r=" + cnt.likes + "&s=" + type_of_vote , true);
        xmlhttp.send();
    
  
  
  
 
    cnt.innerHTML=cnt.likes+"likes";
    selected_button.src="images/upped.png";
	corresponding_down_id="downvotes"+selected_button.original_id;
	corresponding_down_button=document.getElementById(corresponding_down_id);
	//corresponding_down_button.src="images/downed.png";
    event.target.parentElement.flag=0;
  }
  
  }
  

function down(event){

	if(session=="")
    {
		var new_label=document.getElementById("myModalLabel");
		new_label.style.textDecoration="underline";
		var display_modal_body=document.getElementById("modal-body");

		event.currentTarget.setAttribute("data-toggle", "modal");
		event.currentTarget.setAttribute("data-target", "#myModal");
	}
	
    while(event.target.parentElement.flag){ var idnum=parseInt(event.target.original_id);
        cnt=document.getElementById("CountedClicks"+idnum);
		//alert("idnume="+idnum);
		//alert("Old likes="+cnt.likes);
        cnt.likes-=1;
        

        var selected_button=event.currentTarget;
        
        var child_nodes=selected_button.parentNode.childNodes;
        
        var selected_comment_id=child_nodes[1].id;
		//alert("comment_id="+selected_comment_id);
		//alert("New likes="+cnt.likes);
        var type_of_vote="down";
        
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
			//alert("True");
        }
        xmlhttp.open("POST", "voteclick.php?q=" + selected_comment_id + "&r=" + cnt.likes + "&s=" + type_of_vote , true);
        xmlhttp.send();
      
      
      
      
        selected_button.src="images/downed.png";
        cnt.innerHTML=cnt.likes+"likes";
		corresponding_up_id="upvotes"+selected_button.original_id;
		corresponding_up_button=document.getElementById(corresponding_up_id);
		//corresponding_up_button.src="images/upped.png";
        event.target.parentElement.flag=0;
      }
    }

function foo(comment_id_par,owner_par,down_up_par,prop_par,data_par,tim_par,flag_par,vote_result_par,replies_count_par){

//alert(data_par);
comment=document.createElement("div");
comment.style.marginTop=20+"px"; 
comment.flag=parseInt(flag_par);
tim=document.createElement("div");
tim.factcontent=tim_par;
//tim.innerHTML="Created On: "+tim.factcontent;
tim.style.position="relative";
tim.style.fontFamily="Algerian"
tim.style.left="70%";
tim.className="creation";
gly=document.createElement("span");
gly.className="glyphicon glyphicon-pushpin";
tim.appendChild(gly);

gly1=document.createElement("span");
gly1.className="glyphicon glyphicon-time";
tim.appendChild(gly1);

tim_text=document.createElement("span");
tim_text.innerHTML=": "+tim.factcontent;
tim.appendChild(tim_text);



data=document.createElement("pre");
data.reply_flag=false;
data.style.fontFamily="Berlin Sans FB";
data.style.fontSize="80%";
//data.style.fontSize="14px";
data.style.border="0";
if(!((prop_par=="null")||!prop_par)){
  data.factcontent= "<h2>"+prop_par+":</h2>"+data_par; }
  else{
data.factcontent=data_par;
}
data.innerHTML=data.factcontent;
data.id=comment_id_par;







counter=document.createElement("span");
counter.className="label label-info";
counter.id="CountedClicks"+i;
counter.innerHTML=parseInt(down_up_par)+" likes";
counter.likes=parseInt(down_up_par);
upvotes=document.createElement("input");
upvotes.type="image";
upvotes.src="images/up.png";
upvotes.style.height="40px";
upvotes.style.width="40px";
upvotes.id="upvotes"+i;
upvotes.original_id=i;
//upvotes.className="before";

//upvotes.className="jquery_up_class";
//alert(upvotes.original_id);
//alert(i);
//upvotes.value=">>";
//upvotes.className="searchbut";
upvotes.style.position="relative";
$(document).ready(function(){
$(upvotes).hover(function(){
$(this).toggleClass('before');
if($(this).hasClass('before'))
{
$(this).animate({'top':'-10px'});
$(this).closest("div").children("span").fadeOut();
$(this).closest("div").children("span").fadeIn();
}
else
{
$(this).animate({'top':'0px'});
}
});

});

if(comment.flag==0)
{
	if(vote_result_par=="up")
	upvotes.src="images/upped.png";
  //upvotes.className="searchbutchange";
  if(session!="")
  {
  upvotes.title="You Have Voted For This Comment Already!!";
  }
}

upvotes.style.left="10px";
upvotes.addEventListener("click",up);
downvotes=document.createElement("input");
downvotes.type="image";
downvotes.src="images/down.png";
downvotes.style.height="40px";
downvotes.style.width="40px";
downvotes.addEventListener("click",down);
downvotes.id="downvotes"+i;
downvotes.original_id=i;
//downvotes.value="<<";
//downvotes.className="searchbut";
downvotes.style.position="relative";
$(document).ready(function(){
$(downvotes).hover(function(){
$(this).toggleClass('before');
if($(this).hasClass('before'))
{
$(this).animate({'top':'10px'});
$(this).closest("div").children("span").fadeOut();
$(this).closest("div").children("span").fadeIn();
}
else
{
$(this).animate({'top':'0px'});
}
});

});




if(comment.flag==0)
{
	if(vote_result_par=="down")
	downvotes.src="images/downed.png";
  //downvotes.className="searchbutchange";
  if(session!="")
  {
  downvotes.title="You Have Voted For This Comment Already!!";
  }
}

comment.appendChild(tim);
comment.appendChild(data);
comment.appendChild(downvotes);
comment.appendChild(counter);
comment.appendChild(upvotes);
reply=document.createElement("a");
reply.id="reply"+i;
reply.innerHTML="Reply | ";
reply.onclick=clone;
reply.style.position="absolute";
reply.style.color="blue";
reply.style.left="80%";

reply_count=document.createElement("span");
reply_count.style.position="relative";
reply_count.id="reply_count"+comment_id_par;
reply_count.className="badge";

$(reply).hover(function(){

	$(this).children(".badge").animate({'right':'-10px'});
	
	$(this).children(".badge").animate({'right':'0px'});
	

	
	});
	
	
reply_count.innerHTML=replies_count_par;
reply.appendChild(reply_count);

comment.appendChild(reply);

layout.appendChild(comment);

}
function searchdb(){

searchword=document.getElementById("search");
//alert(searchword.value);
}

level=0;
function clone(event)
{
level=1;
var parent=event.target.parentNode.getElementsByTagName("pre")[0];
if(parent.reply_flag==false)
{
parent.reply_flag=true;
reply_encapsulate=document.createElement("div");
reply_encapsulate.return_flag=parent.return_flag;
reply_comment=document.createElement("textarea");
reply_comment.className="ta8b";
reply_comment.id=parent.id+"reply_level"+level;
reply_comment.style.position="relative";
reply_comment.style.resize="none";
reply_comment.onclick=checksession;
reply_comment.style.left=parent.offsetLeft+level*40+"px";
reply_comment.style.width=0.9*parent.offsetWidth+"px";
reply_comment.placeholder="Leave a Reply ..";
reply_comment.required=true;
hr=document.createElement("hr");
reply_encapsulate.appendChild(hr)
reply_encapsulate.appendChild(reply_comment);
reply_encapsulate.style.display="none";

event.target.parentNode.appendChild(reply_encapsulate);
$(document).ready(function(){

$(reply_encapsulate).slideDown();
});
reply_button=document.createElement("button");
reply_button.className="btn btn-lg btn-info";
reply_button.innerHTML="Post";
reply_button.addEventListener("click",reply_button_click,false);
reply_button.style.position="relative";
reply_button.style.left=reply_comment.offsetWidth+"px";
br=document.createElement("br");
reply_encapsulate.appendChild(br)
reply_encapsulate.appendChild(reply_button);

var response = new XMLHttpRequest();
	response.onreadystatechange = function() {
			if(response.readyState==4)
			{
				answer=String(response.responseText);
				if(answer!="")
				{
					
					answer_array=answer.split("~");
					reply_comment_id_array=answer_array[0];
					reply_comment_data_array=answer_array[1];
					reply_comment_time_array=answer_array[2];
					
					reply_comment_id=reply_comment_id_array.split(",");
					reply_comment_data=reply_comment_data_array.split("@,");
					reply_comment_time=reply_comment_time_array.split(",");
					var x=document.getElementById(parent.id+"reply_level"+level);
					
					reply_comments_length=reply_comment_id.length-1;
					com_count=0;
					for(com_count=0;com_count<reply_comments_length;com_count++)
					{				
						reply_container=document.createElement("div");
						new_div=document.createElement("pre");
						new_div.reply_flag=false;
						new_div.id=reply_comment_id[com_count];
						new_div.style.fontFamily="Berlin Sans FB";
						new_time=document.createElement("div");
						new_time.style.fontSize="0.7em";
						new_time.style.fontFamily="Algerian";
						new_time.style.color="#999";
						new_time.style.position="relative";
						new_time.style.left=0.8*x.offsetWidth+"px";
						new_time.innerHTML="Replied on: "+reply_comment_time[com_count];
						new_reply=document.createElement("a");
						new_reply.innerHTML="Reply";
						new_reply.onclick=clone;
						new_reply.style.position="relative";
						new_reply.style.left=x.offsetWidth+"px";
						new_reply.style.fontSize="0.7em";
						new_reply.style.color="blue";
						new_div.className="ta10";
						new_div.style.position="relative";
						new_div.style.left=parent.offsetLeft+level*40+"px";
						new_div.style.width=x.offsetWidth+"px";
						new_div.innerHTML=reply_comment_data[com_count];
						reply_container.appendChild(new_time);
						reply_container.appendChild(new_div);
						reply_container.appendChild(new_reply);
						reply_encapsulate.appendChild(reply_container);
					}
				}
			}
        }
        response.open("POST", "reply_comment_fetch.php?q=" + parent.id , true);
        response.send();

}
else if(event.target.parentNode.getElementsByTagName("div")[1].style.display=="none")
{
	
	//event.target.parentNode.getElementsByTagName("div")[1].style.display="inline";
	$(document).ready(function(){
	$(event.target.parentNode.getElementsByTagName("div")[1]).slideDown();
	});
}
else
{
	
	//event.target.parentNode.getElementsByTagName("div")[1].style.display="none";
	$(document).ready(function(){
	$(event.target.parentNode.getElementsByTagName("div")[1]).slideUp();
	});
}

}

function reply_button_click(event)
{
	

	if(event.target.previousSibling.previousSibling.value!="")
	{	
	reply_comment_data=event.target.previousSibling.previousSibling.value;
	reply_comment_page_title=String(<?php echo json_encode($_SESSION['title']);?>);
	reply_comment_parent=event.target.parentNode.parentNode.childNodes[1].id;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange = function() {
			if(xmlhttp.readyState==4)
				{
				
				}
			
        }
        xmlhttp.open("POST", "test_reply.php?q=" + reply_comment_parent + "&r=" + reply_comment_page_title + "&s=" + reply_comment_data , true);
        xmlhttp.send();
	
	event.target.parentNode.parentNode.childNodes[1].reply_flag=false;
	event.target.parentNode.remove();
	}
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

	function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // files is a FileList of File objects. List some properties.
    var output = [];
    for (var i = 0, f; f = files[i]; i++) {
     if(f.size>10000000){   
      	resp=document.getElementById("fileresponse");
    	resp.innerHTML="File is too large, select a file lesser than 5MB";
    	return false;              
    }
    else
    { 	resp=document.getElementById("fileresponse");
    	resp.innerHTML="";
    return true;}
  }
  
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
          <a class="navbar-brand" style="font-family:Rockwell;" href="RFC.php" id="pagetitle1"><span id="pagetitle" style="font-family:Rockwell;font-size:150%">Pesipedia</span> &nbsp &nbsp  <span id="username"></span></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
           <li  id="Home"><a href="Home.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
          <li><a href="Sign In.php" id="signin"><span class="glyphicon glyphicon-log-in"></span>Sign In</a></li>
          <li><a href="Sign Up.php" id="signup"><span class="glyphicon glyphicon-plus"></span>Sign Up</a></li>
          <li><a href="RFC.php"><span class="glyphicon glyphicon-list-alt">RFC</a></li>
		  <li id="notification_li">
			
			<a href="#" id="notificationLink"><span class="glyphicon glyphicon-bell"></span>Notifications<span id="notification_count">0</span></a>
			<div id="notificationContainer">
			<div id="notificationTitle">Notifications</div>
			<div id="notificationsBody" class="notifications">
			</div>
			<div id="notificationFooter"><a href="#">See All</a></div>
			</div>

     	  </li>
          <li><a onclick="contact()" id="contact_us"><span class="glyphicon glyphicon-phone-alt"></span>Contact Us</a></li>
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
	<br>
	
	
	<h1 id=headername></h1>
	<div class="alert alert-success" role="alert">
		
		<p>
			<a href="#" ><strong> <span class="glyphicon glyphicon-comment"></span>Comments </strong>|&nbsp <span id="badge" style="position:relative" class="badge"></span></a><a href="#structure" style="position:absolute;left:80%;"><strong>Contribute<span class="glyphicon glyphicon-question-sign"></span></strong></a>
		</p>
    </div>
	<br>
	
<div class="article">
  <div class="content">
      <div id="factsection" class="content_resize"></div>
    <div class="content_resize">
      <div class="mainbar">
</div>
</div>
</div>
<div class="content_resize">

   <br>
	<ul class="nav nav-pills">
        <li class="active"><a data-toggle="tab"  href="#structure"><span class="glyphicon glyphicon-plus"></span>Structured Data Entry</a></li>
        <li><a data-toggle="tab" href="#un_structure"><span class="glyphicon glyphicon-plus"></span> UnStructured Data Entry</a></li>
        
    </ul>
	
	
	<div class="tab-content">
        <div id="structure" class="tab-pane fade in active">
		<form id="leavereply0" class="form-signin" method="POST"  onsubmit="return handleFileSelect()" action="addtosamepage.php" enctype="multipart/form-data">
           
             <input type="hidden" id="hidden_title_field" value=<?php echo json_encode($_SESSION['title']);?> name="title"/>
            <label for="message"><strong>Your Comment</strong></label><br>
            <label>Property: </label><input type="text" class="ta8a" id="propertykey" name="property" onclick="checksession()" required/><br>
            <label>Brief Description:</label><textarea class="ta8a" id="data" name="data" rows="2" cols="22" onclick="checksession()" required/></textarea>
        <br>
		<br>
		<input type="file" id="uploaded" name="fileToUpload" id="fileToUpload"><span id="fileresponse"></span>
		<input type="submit"  name="imageField" id="structured_submit" class="btn btn-lg btn-primary btn-block" style="width:220px" onclick="checksession()" class="send" />
		
      </form>
	
        </div>
		
		
        <div id="un_structure" class="tab-pane fade">
          <form id="leavereply" class="form-signin" method="POST" onsubmit="return handleFileSelect()"  action="addtosamepage.php"  enctype="multipart/form-data">
       
	        <input type="hidden" name="property" value="null"/>

            <input type="hidden" id="hidden_title_field" value=<?php echo json_encode($_SESSION['title']);?> name="title"/>
            <label for="message"><strong>Your Comment</strong></label>
            <textarea id="data" class="ta8a" name="data" rows="4" cols="22" onclick="checksession()" required></textarea>
             <input type="file" id="uploaded" name="fileToUpload"  id="fileToUpload"><span id="fileresponse"></span>
            <input type="submit" name="imageField" id="imageField" class="btn btn-lg btn-primary btn-block" style="width:220px" onclick="checksession()"  class="send" />
            <div class="clr"></div>
          
      </form>
        </div>
        
    </div>
	
	 
          
</div>	
        
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
		  
			
		 	<!--###################################################################################################################################-->



<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel1"><strong>Contact Us Form</strong></h4>
      </div>
      <div class="modal-body" id="modal-body1">
	  
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

		 
		  
      </div>
    </div>

     	
  </body>
</html>
			