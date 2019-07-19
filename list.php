<?php session_start();?>
<!DOCTYPE html>
<html>
<head><title> </title>
<style>
ul{
 list-style-type: none;
  padding: 0 0 0 20px;
} 
#headings{
	color:blue;
	
}
a{
	color:#642EFE;
}
</style>
<script type="text/javascript" src="jquery-1.11.2.min.js"></script>
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
		input=document.createElement("input");
		
		input.type="button";
		
		anchor=document.createElement("a");
		anchor.href="ADDRFC.php?parentid="+x.id;
		anchor.innerHTML="Add one here";
		anchor.target="_parent";
		li.id=ar[i];
		li.appendChild(input);
		li.appendChild(anchor);
		ulchild.appendChild(li);
			
		}
		else{
		li =document.createElement("li");
		input=document.createElement("input");
		anchor=document.createElement("a");
		
		
		temp=ar[i];
		//alert(ar[i]);
		anchor.href="RFC.php";
		anchor.innerHTML=ar[i];
		anchor.target="_parent";
		anchor.setAttribute('onclick','sessionSet()');
		
		input.type="button";
		input.addEventListener("click","expand()",true);
		$(input).click(function () {
                expand();
            });
		input.id=ar[i+ar.length/2];
		input.value="+";
		li.id=ar[i];
		
		li.appendChild(input);
		li.appendChild(anchor);
		
		ulchild.appendChild(li);
	}}
	
	ul1.appendChild(ulchild);
	};	
///////////////////////////////
function expand()
{	


	x=event.currentTarget;
	ul1=x.parentNode;
	if(x.value=="-")
	{
		x.value="+";
		clear=ul1.childNodes[2];
		while (clear.firstChild) 
			{
				clear.removeChild(clear.firstChild);
			}
		clear.parentNode.removeChild(clear);
	}
	else
	{
		x.value="-";
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
<h3 id="headings" >Topics</h3>
</head>
<body style="background:#FAFAFA;">
<ul id="head">
	<li id="tech"><input type="button" id="12345" value="+" onclick="expand()"></input><a target="_parent" href="RFC.php?Technology">Tech</a></li>
	
</ul>	



</body>
</html>