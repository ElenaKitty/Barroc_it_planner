function showTruncate()
{
    modal = null;
    //Haal de juiste modal binnen
    modal = document.getElementById("truncateModal");
    var span = document.getElementById("truncateClose");
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