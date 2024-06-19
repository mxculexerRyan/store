function getDate(){
    var startDate = document.getElementById('start_date').value;
    var endDate = document.getElementById('end_date').value;
    var reportcard = document.getElementById('reportcard');
    var dispStart = document.getElementById('dispStart');
    var purch_eq = document.getElementById('purch_eq');
    var expenses_orders = document.getElementById('expenses_orders');
    var sales_orders = document.getElementById('sales_orders');
    var discountData = document.getElementById('discount_data');
    var gros_stat = document.getElementById('gros_stat');
    var gros_value = document.getElementById('gros_value');
    var pdebts = document.getElementById('pdebts');
    var pcredits = document.getElementById('pcredits');
    var account = document.getElementById('account');
    reportcard.classList.remove('d-none');

    $.ajax({
        type: 'GET',
        url: '/reportsdata',
        data: {sDate: startDate, eDate: endDate},
        success: function(data){
            if(data.msg[2][0].count > 0){ var purch = (parseFloat(data.msg[2][0].sum));}else{var purch = data.msg[2][0].count;}
            if(data.msg[3][0].count > 0){ var exp = (parseFloat(data.msg[3][0].sum));}else{var exp = data.msg[3][0].count;}
            if(data.msg[4][0].count > 0){ var sale = (parseFloat(data.msg[4][0].sum));}else{var sale = data.msg[4][0].count;}
            if(data.msg[5][0].count > 0){ var disc = (parseFloat(data.msg[5][0].sum));}else{var disc = data.msg[5][0].count;}
            if(data.msg[8][0].count > 0){ var receivable = (parseFloat(data.msg[8][0].sum));}else{var receivable = data.msg[8][0].count;}
            console.log(exp);

            var debt = (data.msg[6][0].debtsum) - (data.msg[6][0].paysum);
            var credit = (data.msg[7][0].creditsum) - (data.msg[7][0].paysum);

            dispStart.innerHTML = data.msg[0];
            dispEnd.innerHTML = data.msg[1];
            purch_eq.innerHTML = purch.toLocaleString('en-US');
            expenses_orders.innerHTML = exp.toLocaleString('en-US');
            sales_orders.innerHTML = sale.toLocaleString('en-US');
            discountData.innerHTML = disc.toLocaleString('en-US');
            pdebts.innerHTML = debt.toLocaleString('en-US');
            pcredits.innerHTML = credit.toLocaleString('en-US');
            account.innerHTML = receivable.toLocaleString('en-US');

            if((purch + exp + disc) < (sale)){
                gros_value.classList.add('text-success');
                gros_value.classList.remove('text-danger');
                gros_stat.innerHTML = 'Gross Profit';
                gros_value.innerHTML = (((sale) - (purch + exp+ disc)).toLocaleString('en-US'));
            }else{
                gros_value.classList.add('text-danger');
                gros_stat.innerHTML = 'Gross Loss';
                gros_value.innerHTML = ((purch + exp+ disc)- (sale)).toLocaleString('en-US');
            }
        }
    });
}