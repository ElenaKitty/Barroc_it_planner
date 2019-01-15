function showMeeting($department, $increment)
{
    modal = null;
    //Haal de juiste modal binnen
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
    agenda = document.getElementById("panelAgenda")
    content = document.getElementById("panelContent");
    if(document.getElementById("Finances"))
        var FinancesHead = document.getElementById("Finances");
    if(document.getElementById("Finances1"))
        var FinancesText = document.getElementById("Finances1");
    if(document.getElementById("Sales"))
        var SalesHead = document.getElementById("Sales");
    if(document.getElementById("Sales1"))
        var SalesText = document.getElementById("Sales1");
    if(document.getElementById("Development"))
        var DevelopmentHead = document.getElementById("Development");
    if(document.getElementById("Development1"))
        var DevelopmentText = document.getElementById("Development1");
    if(document.getElementById("Manager"))
        var ManagerHead = document.getElementById("Manager");
    if(document.getElementById("Manager1"))
        var ManagerText = document.getElementById("Manager1");


      //kijk of navigation en docentNavigatio niet null is
    if(document.getElementById("navigation") != null)
        navigation = document.getElementById("navigation");
    if(document.getElementById("docentNavigation") != null)
        docentNavigation = document.getElementById("docentNavigation");

    content.style.justifyContent = "space-between";
      //kijk of navigation en docentNavigatio niet null is
    if(document.getElementById("navigation")  != null)
        navigation.style.margin = "3.3rem 0 0 1.6rem";
    if(document.getElementById("docentNavigation") != null)
        docentNavigation.style.margin = "0 0 0 1.6rem";

    if (agenda.style.display == "flex")
    {
        agenda.style.display = "none";
    }
    else 
    {
        agenda.style.display = "flex";
        panel.style.display = "none";
        if(document.getElementById("Finances"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("Finances1"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("Sales"))
            SalesHead.style.display = "none";
        if(document.getElementById("Sales1"))
            SalesText.style.display = "none";
        if(document.getElementById("Development"))
            DevelopmentHead.style.display = "none";
        if(document.getElementById("Development1"))
            DevelopmentText.style.display = "none";
        if(document.getElementById("Manager"))
            ManagerHead.style.display = "none";
        if(document.getElementById("Manager1"))
            ManagerText.style.display = "none";  
    }
    panel.style.display = "none";
}
//toggle of de mails zichtbaar zijn of niet
function showMails()
{
    panel = document.getElementById("mailPanel");
    agenda = document.getElementById("panelAgenda")
    content = document.getElementById("panelContent");
    if(document.getElementById("Finances"))
        var FinancesHead = document.getElementById("Finances");
    if(document.getElementById("Finances1"))
        var FinancesText = document.getElementById("Finances1");
    if(document.getElementById("Sales"))
        var SalesHead = document.getElementById("Sales");
    if(document.getElementById("Sales1"))
        var SalesText = document.getElementById("Sales1");
    if(document.getElementById("Development"))
        var DevelopmentHead = document.getElementById("Development");
    if(document.getElementById("Development1"))
        var DevelopmentText = document.getElementById("Development1");
    if(document.getElementById("Manager"))
        var ManagerHead = document.getElementById("Manager");
    if(document.getElementById("Manager1"))
        var ManagerText = document.getElementById("Manager1");

    //kijk of navigation en docentNavigatio niet null is
    if(document.getElementById("navigation") != null)
        navigation = document.getElementById("navigation");
    if(document.getElementById("docentNavigation") != null)
        docentNavigation = document.getElementById("docentNavigation");

    agenda.style.display = "none";
    if (panel.style.display == "flex")
    {
        //kijk of navigation en docentNavigatio niet null is
        if(document.getElementById("navigation") != null)
            navigation.style.margin = "3.3rem 0 0 1.6rem";
        if(document.getElementById("docentNavigation") != null)
            docentNavigation.style.margin = "0 0 0 1.6rem";
        content.style.justifyContent = "space-between";
        panel.style.display = "none";
        if(document.getElementById("Finances"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("Finances1"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("Sales"))
            SalesHead.style.display = "none";
        if(document.getElementById("Sales1"))
            SalesText.style.display = "none";
        if(document.getElementById("Development"))
            DevelopmentHead.style.display = "none";
        if(document.getElementById("Development1"))
            DevelopmentText.style.display = "none";
        if(document.getElementById("Manager"))
            ManagerHead.style.display = "none";
        if(document.getElementById("Manager1"))
            ManagerText.style.display = "none";
    }
    else 
    {
        //kijk of navigation en docentNavigatio niet null is
        if(document.getElementById("navigation")  != null)
            navigation.style.margin = "3.3rem 0 0 0";
        if(document.getElementById("docentNavigation")  != null)
            docentNavigation.style.margin = "0";
        content.style.justifyContent = "space-around";
        panel.style.display = "flex";
    }

}