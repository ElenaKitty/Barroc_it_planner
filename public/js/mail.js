function toggleFinances()
{
    var FinancesHead = document.getElementById("Finances");
    var FinancesText = document.getElementById("Finances1");
    var SalesHead = document.getElementById("Sales");
    var SalesText = document.getElementById("Sales1");
    var DevelopmentHead = document.getElementById("Development");
    var DevelopmentText = document.getElementById("Development1");
    var ManagerHead = document.getElementById("Manager");
    var ManagerText = document.getElementById("Manager1");
    if (FinancesHead.style.display == "block" && FinancesText.style.display == "block")
    {
        FinancesHead.style.display = "none";
        FinancesText.style.display = "none";
    }
    else 
    {
        FinancesHead.style.display = "block";
        FinancesText.style.display = "block";
        SalesHead.style.display = "none";
        SalesText.style.display = "none";
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
        ManagerHead.style.display = "none";
        ManagerText.style.display = "none";
    }
}
function toggleSales($department, $department1)
{
    var FinancesHead = document.getElementById("Finances");
    var FinancesText = document.getElementById("Finances1");
    var SalesHead = document.getElementById("Sales");
    var SalesText = document.getElementById("Sales1");
    var DevelopmentHead = document.getElementById("Development");
    var DevelopmentText = document.getElementById("Development1");
    var ManagerHead = document.getElementById("Manager");
    var ManagerText = document.getElementById("Manager1");
    if (SalesHead.style.display == "block" && SalesText.style.display == "block")
    {
        SalesHead.style.display = "none";
        SalesText.style.display = "none";
    }
    else 
    {
        FinancesHead.style.display = "none";
        FinancesText.style.display = "none";
        SalesHead.style.display = "block";
        SalesText.style.display = "block";
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
        ManagerHead.style.display = "none";
        ManagerText.style.display = "none";
    }
}
function toggleDevelopment($department, $department1)
{
    var FinancesHead = document.getElementById("Finances");
    var FinancesText = document.getElementById("Finances1");
    var SalesHead = document.getElementById("Sales");
    var SalesText = document.getElementById("Sales1");
    var DevelopmentHead = document.getElementById("Development");
    var DevelopmentText = document.getElementById("Development1");
    var ManagerHead = document.getElementById("Manager");
    var ManagerText = document.getElementById("Manager1");
    if (DevelopmentHead.style.display == "block" && DevelopmentText.style.display == "block")
    {
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
    }
    else 
    {
        FinancesHead.style.display = "none";
        FinancesText.style.display = "none";
        SalesHead.style.display = "none";
        SalesText.style.display = "none";
        DevelopmentHead.style.display = "block";
        DevelopmentText.style.display = "block";
        ManagerHead.style.display = "none";
        ManagerText.style.display = "none";
    }
}
function toggleManager($department, $department1)
{
    var FinancesHead = document.getElementById("Finances");
    var FinancesText = document.getElementById("Finances1");
    var SalesHead = document.getElementById("Sales");
    var SalesText = document.getElementById("Sales1");
    var DevelopmentHead = document.getElementById("Development");
    var DevelopmentText = document.getElementById("Development1");
    var ManagerHead = document.getElementById("Manager");
    var ManagerText = document.getElementById("Manager1");
    if (ManagerHead.style.display == "block" && ManagerText.style.display == "block")
    {
        ManagerHead.style.display = "none";
        ManagerText.style.display = "none";
    }
    else 
    {
        FinancesHead.style.display = "none";
        FinancesText.style.display = "none";
        SalesHead.style.display = "none";
        SalesText.style.display = "none";
        DevelopmentHead.style.display = "none";
        DevelopmentText.style.display = "none";
        ManagerHead.style.display = "block";
        ManagerText.style.display = "block";
    }
}