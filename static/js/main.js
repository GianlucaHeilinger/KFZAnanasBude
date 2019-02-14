<<<<<<< HEAD
function giveActualDate() {      
    try{
        document.getElementById('gebdat').valueAsDate = new Date();
    }catch(err1){}

    try{
    document.getElementById('kundeseit').valueAsDate = new Date();
    }catch(err2){}

    try{
    document.getElementById('ReparaturDatum').valueAsDate = new Date();
    }catch(err3){}
=======
function giveActualDate() {        
    document.getElementById('ReparaturDatum').valueAsDate = new Date();   
    document.getElementById('gebdat').valueAsDate = new Date();
    document.getElementById('kundeseit').valueAsDate = new Date();
    
>>>>>>> e96457264fdf1adb6fd4b623c290adffacab5e48
}