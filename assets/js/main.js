'use strict';
window.addEventListener('load', function(){
    var blockbtn= document.querySelectorAll(".h3bloq");
    var elementbloq= document.querySelectorAll(".elementbloq");

    console.log(blockbtn);
    console.log(elementbloq);
/*
    function getBom(){

        if(window.innerWidth<=900){

            blockbtn.forEach(function(item){
                console.log(item);
                item.style.display ="block";
            });

            elementbloq.forEach(function(item){
                console.log(item);
                item.style.display ="none";
            });
        }else{

             blockbtn.forEach(function(item){
                console.log(item);
                item.style.display ="none";
            });

            elementbloq.forEach(function(item){
                console.log(item);
                item.style.display ="block";
            });
        }
    }
    window.addEventListener('resize', getBom);
    */
    
    $( "#buscadorbtn" ).click(function() {
       $("#buscadorbtn").css({ display: "none" });
       $("#buscador").css({ display: "block" });
    });
    $( "#buscadorClose" ).click(function() {
       $("#buscador").css({ display: "none" });
       $("#buscadorbtn").css({ display: "block" });
    });
    
    $( "#loginbtn" ).click(function() {
       $("#loginbtn").css({ display: "none" });
       $("#login").css({ display: "block" });
    });
    $( "#loginClose" ).click(function() {
       $("#login").css({ display: "none" });
       $("#loginbtn").css({ display: "block" });
    });
    
    $( "#registerbtn" ).click(function() {
       $("#registerbtn").css({ display: "none" });
       $("#register").css({ display: "block" });
    });
    $( "#registerClose" ).click(function() {
       $("#register").css({ display: "none" });
       $("#registerbtn").css({ display: "block" });
    });
    
    $( "#userLogbtn" ).click(function() {
       $("#userLogbtn").css({ display: "none" });
       $("#userLog").css({ display: "block" });
    });
    $( "#userLogClose" ).click(function() {
       $("#userLog").css({ display: "none" });
       $("#userLogbtn").css({ display: "block" });
    });
    
    
    $( ".fa-bars" ).click(function() {
        
        var headerColor= document.querySelector("#cabecera");
        var principal= document.querySelector("#principal");
            console.log(headerColor.style.background);
        if(headerColor.style.background === "black"){
            headerColor.style.background ="rgba(0,0,0,0.8)";
            principal.style.zIndex ="1";
        }else{
            headerColor.style.background ="black";
            principal.style.zIndex ="-1";
        }
    });
    
    
    $( ".editcommentbtn" ).click(function() {
        var cambio= document.querySelector(".cambio");
        console.log(cambio);
        console.log(cambio.innerHTML);
      
        
    });
    
    
});