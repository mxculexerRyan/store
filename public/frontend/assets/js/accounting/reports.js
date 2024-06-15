function getDate(){
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;
    var reportcard = document.getElementById('reportcard');
    var dispStart = document.getElementById('dispStart');
    var generalOrders = document.getElementById('general_orders');
    var generalOrdersTotal = document.getElementById('general_orders_total');
    var salesOrders = document.getElementById('sales_orders');
    var purchasesOrders = document.getElementById('purchases_orders');
    var DebtOrders = document.getElementById('bebt_orders');
    var CreditOrders = document.getElementById('credit_orders');
    var expensesOrders = document.getElementById('expenses_orders');
    reportcard.classList.remove('d-none');

    $.ajax({
        type: 'GET',
        url: '/reportsdata',
        data: {sDate: startDate, eDate: endDate},
        success: function(data){
            dispStart.innerHTML = data.msg[0];
            dispEnd.innerHTML = data.msg[1];
            generalOrders.innerHTML = data.msg[2][0].count
            // generalOrdersTotal.innerHTML = (data.msg[2][0].sum);
            salesOrders.innerHTML = data.msg[3];
            purchasesOrders.innerHTML = data.msg[4];
            DebtOrders.innerHTML = data.msg[5];
            CreditOrders.innerHTML = data.msg[6];
            expensesOrders.innerHTML = data.msg[7];
            console.log(data.msg[2]);
        }
    });
}