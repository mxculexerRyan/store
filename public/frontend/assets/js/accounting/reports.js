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
    var markup_data = document.getElementById('markup_data');
    var stockData = document.getElementById('stockData');
    var overflow = document.getElementById('overflow');
    var stockDef = document.getElementById('stockDef');
    var replace = document.getElementById('replace');
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
            if(data.msg[9][0].count > 0){ var markup = (parseFloat(data.msg[9][0].sum));}else{var markup = data.msg[9][0].count;}
            if(data.msg[10][0].count > 0){ var stock = (parseFloat(data.msg[10][0].sum));}else{var stock = data.msg[10][0].count;}
            if(data.msg[11][0].count > 0){ var over = (parseFloat(data.msg[11][0].sum));}else{var over = data.msg[11][0].count;}
            if(data.msg[12][0].count > 0){ var deff = (parseFloat(data.msg[12][0].sum));}else{var deff = data.msg[12][0].count;}
            if(data.msg[13][0].count > 0){ var rep = (parseFloat(data.msg[13][0].sum));}else{var rep = data.msg[13][0].count;}
            if(data.msg[14][0].count > 0){ var within = (parseFloat(data.msg[14][0].sum));}else{var within = data.msg[14][0].count;}
            // console.log(exp);

            var debt = (data.msg[6][0].debtsum) - (data.msg[6][0].debtpay);
            var credit = (data.msg[7][0].creditsum) - (data.msg[7][0].credpay);

            dispStart.innerHTML = data.msg[0];
            dispEnd.innerHTML = data.msg[1];
            purch_eq.innerHTML = (purch + rep).toLocaleString('en-US');
            expenses_orders.innerHTML = exp.toLocaleString('en-US');
            sales_orders.innerHTML = (sale + within + over).toLocaleString('en-US');
            discountData.innerHTML = disc.toLocaleString('en-US');
            pdebts.innerHTML = debt.toLocaleString('en-US');
            pcredits.innerHTML = credit.toLocaleString('en-US');
            account.innerHTML = receivable.toLocaleString('en-US');
            markup_data.innerHTML = markup.toLocaleString('en-US');
            stockData.innerHTML = (stock + rep - deff).toLocaleString('en-US');
            // overflow.innerHTML = over.toLocaleString('en-US');
            // stockDef.innerHTML = (deff - rep).toLocaleString('en-US');
            // replace.innerHTML = rep.toLocaleString('en-US');

            // if((purch + exp + disc + deff) < (sale + stock + over)){
            if((purch + exp+ disc + deff - rep) < (sale + stock + over + within)){
                gros_value.classList.add('text-success');
                gros_value.classList.remove('text-danger');
                gros_stat.innerHTML = 'Gross Profit';
                gros_value.innerHTML = (((sale + stock + over + within) - (purch + exp+ disc + deff)).toLocaleString('en-US'));
            }else{
                gros_value.classList.add('text-danger');
                gros_stat.innerHTML = 'Gross Loss';
                gros_value.innerHTML = ((purch + exp + disc + deff)- (sale + stock + over + within)).toLocaleString('en-US');
            }
        }
    });
}