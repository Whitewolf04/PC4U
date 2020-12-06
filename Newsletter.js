function overImage(img){
    img.style.width = "125%"; 
    
}

function outImage(img){
    img.style.width = "75%"; 
}

var timeSubs;
function openSubs() {
    timeSubs = setInterval(function() {
         document.getElementById("pop-subscribe").style.display="block";
    }, 3000);
}

function closeSubs() {
    clearInterval(timeSubs);
    document.getElementById("pop-subscribe").style.display="none";
}

