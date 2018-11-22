function showMeeting($department)
{
    // Get the modal
    var modal = document.getElementById($department + "Modal");
    var className = document.getElementById($department + "Modal").getAttribute("class")
    // Get the <span> element that closes the modal
    if(className == "SalesModal")
        var span = document.getElementById("salesClose");
    else if(className == "ManagerModal")
        var span = document.getElementById("managerClose");
    else if(className == "DevelopmentModal")
        var span = document.getElementById("developmentClose");
    else if(className == "FinancesModal" )
        var span = document.getElementById("financesClose");

    modal.style.display = "block";
    // When the user clicks on <span> (x), close the modal
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