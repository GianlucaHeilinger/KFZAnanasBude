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
}