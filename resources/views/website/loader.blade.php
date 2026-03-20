<!DOCTYPE html>

<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>@yield('title','Dashboard')</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

<style>

body{
margin:0;
font-family:system-ui,-apple-system,Segoe UI,Roboto,Ubuntu;
background:#f9fafb;
}

/* GLOBAL LOADER */

#globalLoader{
position:fixed;
top:0;
left:0;
width:100%;
height:100%;
background:rgba(255,255,255,0.95);
display:flex;
align-items:center;
justify-content:center;
z-index:9999;
flex-direction:column;
transition:opacity 0.4s ease;
}

.loader-content{
text-align:center;
}

.spinner{
width:60px;
height:60px;
border:6px solid #e5e7eb;
border-top:6px solid #3b82f6;
border-radius:50%;
animation:spin 1s linear infinite;
margin:auto;
margin-bottom:15px;
}

@keyframes spin{
0%{transform:rotate(0deg);}
100%{transform:rotate(360deg);}
}

.loader-text{
font-size:18px;
font-weight:600;
color:#374151;
}

.loader-sub{
font-size:14px;
color:#6b7280;
}

.hide-loader{
opacity:0;
pointer-events:none;
}

.page-container{
padding:20px;
}

</style>

</head>

<body>

<!-- GLOBAL LOADER -->

<div id="globalLoader">

<div class="loader-content">

<div class="spinner"></div>

<div class="loader-text">Please Wait</div>

<div class="loader-sub">Processing your request...</div>

</div>

</div>

<div class="page-container">

@yield('content')

</div>

<script>

// Hide loader when page fully loads
window.addEventListener("load", function(){
document.getElementById("globalLoader").classList.add("hide-loader");
});


// Show loader on link click
document.querySelectorAll("a").forEach(link => {

link.addEventListener("click", function(){

if(this.target !== "_blank" && !this.href.includes("#")){
document.getElementById("globalLoader").classList.remove("hide-loader");
}

});

});


// Show loader when forms submit
document.querySelectorAll("form").forEach(form => {

form.addEventListener("submit", function(){

document.getElementById("globalLoader").classList.remove("hide-loader");

});

});

</script>

</body>
</html>
