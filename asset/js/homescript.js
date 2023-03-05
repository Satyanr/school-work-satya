const loadpage = document.getElementById("loadpage");


//Load Page 
function load(){
    var timer = 0;
    var intervaltime = setInterval(timerload, 200);

    function timerload(){
        if (timer >= 5) {
            loadpage.style.display = "none";
            clearInterval(intervaltime);
        } else {
            timer++;
        }
    }
  }