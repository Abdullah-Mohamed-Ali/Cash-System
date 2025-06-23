//    =============== variables ====================

//  =============== input =======================

let input200 = document.getElementById("input200");
let input100 = document.getElementById('input100');
let input50 = document.getElementById('input50');
let input20 = document.getElementById('input20');
let input10 = document.getElementById('input10');
let input5 = document.getElementById('input5');
let input1 = document.getElementById('input1');



//    ===============  output ===================
let value200 = document.getElementById("value200");
let value100 = document.getElementById('value100');
let value50 = document.getElementById('value50');
let value20 = document.getElementById('value20');
let value10 = document.getElementById('value10');
let value5 = document.getElementById('value5');
let value1 = document.getElementById('value1');

let cashBalance = document.getElementById('cashBalance');

let revenue = document.getElementById("revenue");
let visa = document.getElementById("visa");
let expenses = document.getElementById("expenses");
let netCash = document.getElementById("netCash");
let variance = document.getElementById("variance");

function cashValue(){
    let result200 = +input200.value * 200; 
    value200.innerHTML = result200;

    
    let result100 = +input100.value *100;
    value100.innerHTML = result100;

    let result50 = +input50.value * 50;
    value50.innerHTML = result50;

    let result20 = +input20.value * 20;
    value20.innerHTML = result20;

    let result10 = +input10.value * 10;
    value10.innerHTML = result10;

    let result5 = +input5.value * 5;
    value5.innerHTML = result5;

    let result1 = +input1.value * 1;
    value1.innerHTML = result1;

    let cashBalanceValue = +result200 + +result100 + +result50 + +result20 
    + +result10 + +result5 + +result1 ;
    cashBalance.innerHTML = cashBalanceValue;


    
    
    let netCashResult = +revenue.value - (+expenses.innerHTML + +visa.innerHTML) 
    
    netCash.innerHTML = netCashResult;

    let varianceResult = +cashBalanceValue - +netCashResult
    variance.innerHTML = varianceResult;
    if(variance.innerHTML < 0){
        variance.style.background = "red"
        variance.style.color =' #fff'

    }
    

    
}   

