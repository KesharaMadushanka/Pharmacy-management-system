
//emp registration view load
$(document).ready(function () {

    $('#addEmp').click(function () {
        $('#loadView').load('emp/registerEmp.php');
    });



})

//view emplist load
$(document).ready(function () {
    $('#viewEmp').click(function () {
        $('#loadView').load('emp/empList.php');
    });
})

//view login management
$(document).ready(function () {
    $('#login').click(function () {
        $('#loadView').load('emp/manageLogin.php');
    });
})

//add medicine load
$(document).ready(function () {
    $('#addMed').click(function () {
        $('#loadView').load('medicine/addMedicine.php');
    });
})


//view medicine price load
$(document).ready(function () {
    $('#medPrice').click(function () {
        $('#loadView').load('medicine/medPrice.php');
    });
})

//view medicine buying price load
$(document).ready(function () {
    $('#medBuyingPrice').click(function () {
        $('#loadView').load('medicine/medBuyingPrice.php');
    });
})


//view emplist load on card
$(document).ready(function () {
    $('#empCard').click(function () {
        $('#loadView').load('emp/empList.php');
    });
})

//view total sales income load on card
$(document).ready(function () {
    $('#totalSales').click(function () {
        $('#loadView').load('dashboardCards/totalSales.php');
    });
})

//view profit load on card
$(document).ready(function () {
    $('#profit').click(function () {
        $('#loadView').load('dashboardCards/profit.php');
    });
})

//view expire stocks load on card
$(document).ready(function () {
    $('#exp').click(function () {
        $('#loadView').load('dashboardCards/exp.php');
    });
})

//view low stocks load on card
$(document).ready(function () {
    $('#lowStock').click(function () {
        $('#loadView').load('dashboardCards/lowStock.php');
    });
})

//view users load on card
$(document).ready(function () {
    $('#users').click(function () {
        $('#loadView').load('dashboardCards/users.php');
    });
})