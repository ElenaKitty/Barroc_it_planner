function arrangeButtons()
{
    var eightHrButtons = document.getElementsByClassName("eightHrButton");

    for(x=0; x<div.length; x++) {
     div[x].style.opacity = (10-x)/10;
    }
}
function showMeeting($department, $increment)
{
    modal = null;
    //Haal de juiste modal binnen (Werkt niet)(pakt alleen de eerste inplaats van de bijbehorende)
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
//toggle of de agenda zichtbaar is of niet
function showAgenda()
{
    panel = document.getElementById("mailPanel");
    agenda = document.getElementById("studentAgenda")
    studentContent = document.getElementById("studentContent");
    navigation = document.getElementById("navigation");

    studentContent.style.justifyContent = "space-between";
    navigation.style.margin = "3.3rem 0 0 1.6rem";

    var FinancesHead = document.getElementById("Finances");
    var FinancesText = document.getElementById("Finances1");
    var SalesHead = document.getElementById("Sales");
    var SalesText = document.getElementById("Sales1");
    var DevelopmentHead = document.getElementById("Development");
    var DevelopmentText = document.getElementById("Development1");
    var ManagerHead = document.getElementById("Manager");
    var ManagerText = document.getElementById("Manager1");
    if (agenda.style.display == "flex")
    {
        agenda.style.display = "none";
    }
    else 
    {
        agenda.style.display = "flex";
    }
    panel.style.display = "none";
    FinancesHead.style.display = "none";
    FinancesText.style.display = "none";
    SalesHead.style.display = "none";
    SalesText.style.display = "none";
    DevelopmentHead.style.display = "none";
    DevelopmentText.style.display = "none";
    ManagerHead.style.display = "none";
    ManagerText.style.display = "none";
}
//toggle of de mails zichtbaar zijn of niet
function showMails()
{
    panel = document.getElementById("mailPanel");
    agenda = document.getElementById("studentAgenda")
    studentContent = document.getElementById("studentContent");
    navigation = document.getElementById("navigation")

    agenda.style.display = "none";
    if (panel.style.display == "flex")
    {
        navigation.style.margin = "3.3rem 0 0 1.6rem";
        studentContent.style.justifyContent = "space-between";
        panel.style.display = "none";
    }
    else 
    {
        navigation.style.margin = "3.3rem 0 0 0";
        studentContent.style.justifyContent = "space-around";
        panel.style.display = "flex";
    }

}
function updateAgenda()
{
    calendar = document.getElementById('date');
    date = calendar.value;
    location.reload();
    return date;
    
}
