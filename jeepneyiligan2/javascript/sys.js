function openMenu() {
    document.getElementById("sideMenu").style.width = "400px";
    document.getElementById("map").style.marginLeft = "400px";
    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
  }
  
  function closeMenu() {
    document.getElementById("sideMenu").style.width = "0";
    document.getElementById("map").style.marginLeft= "0";
    document.body.style.backgroundColor = "white";
  }
  