
$(document).ready(function(){
    
    const appDates = document.querySelectorAll(".app-date");
    
    appDates.forEach(appDate => {
        let now = new Date();
        let weekLater = now.getDate() + 7;
        let maxDate = new Date();
        maxDate.setDate(weekLater)
        maxDate = getFormatedDate(maxDate);
    
        minDate = getFormatedDate(now);
        appDate.setAttribute("min", minDate);
        appDate.setAttribute("max", maxDate);
    })

});



function getFormatedDate(date){
    date = date.toISOString().split(":");
    date.pop();
    date = date.join(":");
    return date;
}



