function overImage(img){
    img.style.width = "125%"; 
    
}

function outImage(img){
    img.style.width = "75%"; 
}

var timeSubs;
function openSubs() {
    timeSubs = setInterval(function() {
        document.getElementById("pop-subscribe").style.display='block';
        poped = true;
        
    }, 3000); 
}

function closeSubs() {
    clearInterval(timeSubs);
    document.getElementById("pop-subscribe").style.display="none";
}
function addNews(){
    document.getElementById("more-items1").style.display= "block";
    document.getElementById("more-items2").style.display= "block";

}

