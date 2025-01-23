const mortgageCalc = {
    mortgageAmount: {
        height: 500000,
        years: 20,
        annualInterest: 3.5
    },
    monthlyRepaymentAmount: {
        monthlyRepayment: 2500,
        years: 20,
        annualInterest: 3.5
    }
}

const mortgageAmountHeight = document.getElementById("mortgageAmount-height");
const mortgageYears = document.getElementById("mortgageAmount-years");
const mortgageAnnualInterest = document.getElementById("mortgageAmount-annual-interest");

mortgageAmountHeight.textContent = mortgageCalc.mortgageAmount.height;

console.log("kaki");