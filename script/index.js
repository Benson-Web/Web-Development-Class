function openNav() {
    document.getElementById("sidenav").style.width = "100%";
    document.getElementById("bars").style.display = "none";
}

function closeNav() {
    document.getElementById("sidenav").style.width = "0";
    document.getElementById("bars").style.display = "block";

}


function aboutUs(){
    document.getElementById("about").style.height = "100%";
    document.getElementById("about").style.padding = "30x";
    document.getElementById("info").style.display = "block";
    document.getElementById("close").style.display = "block";
    closeNav();
}

function closeAbout(){
    document.getElementById("about").style.height = "0";
    document.getElementById("about").style.padding = "0";
    document.getElementById("info").style.display = "none";

        
    document.getElementById("close").style.display = "none";
}

function openContacts() {
    var open = document.getElementById("contactDetails");

    open.style.height = "250px";
}

function closeContacts() {
    document.getElementById("contactDetails").style.height = "0";
}
        


window.addEventListener('load',function(){
    document.querySelector('body').classList.add("loaded")  
  });
  