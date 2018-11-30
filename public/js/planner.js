function showMeeting($department, $increment)
{
    modal = null;
    //Haal de juiste modal binnen (Werkt niet)(pakt alleen de eerste inplaats van de bijbehorende)
    console.log("Department: " + $department);
    console.log($department[0]);
    console.log("Increment: " + $increment);
    console.log($department + "Modal" + $increment);
    if(document.getElementById($department + "Modal" + $increment) != null)
    {
        modal = document.getElementById($department + "Modal" + $increment);
        var className = document.getElementById($department + "Modal" + $increment).getAttribute("class");
        //haal de juiste span erbij die de modal sluit
        if(className == "SalesModal" + $increment)
            var span = document.getElementById("salesClose" + $increment);
        else if(className == "ManagerModal" + $increment)
            var span = document.getElementById("managerClose" + $increment);
        else if(className == "DevelopmentModal" + $increment)
            var span = document.getElementById("developmentClose" + $increment);
        else if(className == "FinancesModal" + $increment)
            var span = document.getElementById("financesClose" + $increment);
        console.log(modal);
    }

    modal.style.display = "block";
    //sluit de modal als je op (X) drukt
    span.onclick = function() 
    {
        modal.style.display = "none";
    }
    window.onclick = function(event) 
    {
        if (event.target == modal) 
        {
            modal.style.display = "none";
        }
    }
}
function arrangeButtons()
{
    
}