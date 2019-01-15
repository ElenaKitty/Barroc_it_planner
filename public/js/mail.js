function toggleFinances($department, $department1)
{
    if(document.getElementById($department))
        var FinancesHead = document.getElementById($department);
    if(document.getElementById($department1))
        var FinancesText = document.getElementById($department1);
    if(document.getElementById("SalesHead*"))
        var SalesHead = document.getElementById("SalesHead*");
    if(document.getElementById("SalesText*"))
        var SalesText = document.getElementById("SalesText*");
    if(document.getElementById("DevelopmentHead*"))
        var DevelopmentHead = document.getElementById("DevelopmentHead*");
    if(document.getElementById("DevelopmentText*"))
        var DevelopmentText = document.getElementById("DevelopmentText*");
    if(document.getElementById("ManagerHead*"))
        var ManagerHead = document.getElementById("ManagerHead*");
    if(document.getElementById("ManagerText*"))
        var ManagerText = document.getElementById("ManagerText*");
    if (FinancesHead.style.display == "block" && FinancesText.style.display == "block")
    {
        FinancesHead.style.display = "none";
        FinancesText.style.display = "none";
    }
    else 
    {
        if(document.getElementById($department))
            FinancesHead.style.display = "block";        
        if(document.getElementById($department1))
            FinancesHead.style.display = "block";        
        if(document.getElementById("SalesHead*"))
            SalesHead.style.display = "none";
        if(document.getElementById("SalesText*"))
            SalesText.style.display = "none";
        if(document.getElementById("DevelopmentHead*"))
            DevelopmentHead.style.display = "none";
        if(document.getElementById("DevelopmentText*"))
            DevelopmentText.style.display = "none";
        if(document.getElementById("ManagerHead*"))
            ManagerHead.style.display = "none";
        if(document.getElementById("ManagerText*"))
            ManagerText.style.display = "none";
    }
}
function toggleSales($department, $department1)
{

    if(document.getElementById("FinancesHead*"))
        var FinancesHead = document.getElementById("FinancesHead*");
    if(document.getElementById("FinancesText*"))
        var FinancesText = document.getElementById("FinancesText*");
    if(document.getElementById($department))
        var SalesHead = document.getElementById($department);
    if(document.getElementById($department1))
        var SalesText = document.getElementById($department1);
    if(document.getElementById("DevelopmentHead*"))
        var DevelopmentHead = document.getElementById("DevelopmentHead*");
    if(document.getElementById("DevelopmentText*"))
        var DevelopmentText = document.getElementById("DevelopmentText*");
    if(document.getElementById("ManagerHead*"))
        var ManagerHead = document.getElementById("ManagerHead*");
    if(document.getElementById("ManagerText*"))
        var ManagerText = document.getElementById("ManagerText*");
    if (SalesHead.style.display == "block" && SalesText.style.display == "block")
    {
        SalesHead.style.display = "none";
        SalesText.style.display = "none";
    }
    else 
    {
        if(document.getElementById("FinancesHead*"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("FinancesText*"))
            FinancesText.style.display = "none";        
        if(document.getElementById($department))
            SalesHead.style.display = "block";
        if(document.getElementById($department1))
            SalesText.style.display = "block";
        if(document.getElementById("DevelopmentHead*"))
            DevelopmentHead.style.display = "none";
        if(document.getElementById("DevelopmentText*"))
            DevelopmentText.style.display = "none";
        if(document.getElementById("ManagerHead*"))
            ManagerHead.style.display = "none";
        if(document.getElementById("ManagerText*"))
            ManagerText.style.display = "none";
    }
}
function toggleDevelopment($department, $department1)
{
    if(document.getElementById("FinancesHead*"))
        var FinancesHead = document.getElementById("FinancesHead*");
    if(document.getElementById("FinancesText*"))
        var FinancesText = document.getElementById("FinancesText*");
    if(document.getElementById("SalesHead*"))
        var SalesHead = document.getElementById("SalesHead*");
    if(document.getElementById("SalesText*"))
        var SalesText = document.getElementById("SalesText*");
    if(document.getElementById($department))
        var DevelopmentHead = document.getElementById($department);
    if(document.getElementById($department1))
        var DevelopmentText = document.getElementById($department1);
    if(document.getElementById("ManagerHead*"))
        var ManagerHead = document.getElementById("ManagerHead*");
    if(document.getElementById("ManagerText*"))
        var ManagerText = document.getElementById("ManagerText*");
    if (DevelopmentHead.style.display == "block" && DevelopmentText.style.display == "block")
    {
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
    }
    else 
    {
        if(document.getElementById("FinancesHead*"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("FinancesText*"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("SalesHead*"))
            SalesHead.style.display = "none";
        if(document.getElementById("SalesText*"))
            SalesText.style.display = "none";
        if(document.getElementById($department))
            DevelopmentHead.style.display = "block";
        if(document.getElementById($department1))
            DevelopmentText.style.display = "block";
        if(document.getElementById("ManagerHead*"))
            ManagerHead.style.display = "none";
        if(document.getElementById("ManagerText*"))
            ManagerText.style.display = "none";
    }
}
function toggleManager($department, $department1)
{
    if(document.getElementById("FinancesHead*"))
        var FinancesHead = document.getElementById("FinancesHead*");
    if(document.getElementById("FinancesText*"))
        var FinancesText = document.getElementById("FinancesText*");
    if(document.getElementById("SalesHead*"))
        var SalesHead = document.getElementById("SalesHead*");
    if(document.getElementById("SalesText*"))
        var SalesText = document.getElementById("SalesText*");
    if(document.getElementById($department))
        var DevelopmentHead = document.getElementById($department);
    if(document.getElementById($department1))
        var DevelopmentText = document.getElementById($department1);
    if(document.getElementById("ManagerHead*"))
        var ManagerHead = document.getElementById("ManagerHead*");
    if(document.getElementById("ManagerText*"))
        var ManagerText = document.getElementById("ManagerText*");
    if (DevelopmentHead.style.display == "block" && DevelopmentText.style.display == "block")
    {
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
    }
    else 
    {
        if(document.getElementById("FinancesHead*"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("FinancesText*"))
            FinancesHead.style.display = "none";        
        if(document.getElementById("SalesHead*"))
            SalesHead.style.display = "none";
        if(document.getElementById("SalesText*"))
            SalesText.style.display = "none";
        if(document.getElementById($department))
            DevelopmentHead.style.display = "block";
        if(document.getElementById($department1))
            DevelopmentText.style.display = "block";
        if(document.getElementById("ManagerHead*"))
            ManagerHead.style.display = "none";
        if(document.getElementById("ManagerText*"))
            ManagerText.style.display = "none";
    }
}