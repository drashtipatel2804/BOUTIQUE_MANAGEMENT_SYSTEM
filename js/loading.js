/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Other/javascript.js to edit this template
 */

var loader= document.getElementById("preloader");
window.addEventListener(load,function(){
    HH();
})

function loading(){
    loader=document.getElementById("preloader"); 
    loader.style.display="flex"; 
    loader.style.transitionDelay="2s";
  }
  function HH(){
    loader=document.getElementById("preloader"); 
    loader.style.display="none"; 
    loader.style.transitionDelay="2s";
  }
