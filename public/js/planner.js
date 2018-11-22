function showMeeting($department)
{
    // Get the modal
    var modal = document.getElementById($department + "Modal");
    console.log($department);
    console.log(modal);
    // Get the <span> element that closes the modal
    if(modal == "SalesModal" || modal == "salesModal")
        var span = document.getElementsByClassName("close")[0];
    else if(modal == "ManagerModal"  || modal == "managerModal")
        var span = document.getElementsByClassName("close")[1];
    else if(modal == "DevelopmentModal"  || modal == "developmentModal")
        var span = document.getElementsByClassName("close")[2];
    else if(modal == "FinancesModal"  || modal == "financesModal")
        var span = document.getElementsByClassName("close")[3];

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