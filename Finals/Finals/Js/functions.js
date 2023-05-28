
//Receipt
function printPage() {
  window.print();
}
function addBtnInv(){
  var Inv_input = $("#InvTrow").clone().appendTo("#InvTbody");
  $(Inv_input).find("input").val('');
  $(Inv_input).removeClass("d-none");

}
function delBtnInv(Inv_input){
  $(Inv_input).parent().parent().remove();
}

function Calc(Inv_input){
  var index = $(Inv_input).parent().parent().index();
  var amnt = document.getElementsByName("amnt")[index].value;
  Total();
}
function Total(){
  var sum = 0;
  var amntInputs = document.getElementsByName("amnt"); // Updated variable name to avoid confusion
  for (let index = 0; index < amntInputs.length; index++) {
      var amnt = amntInputs[index].value; // Updated variable name to avoid redeclaration
      sum = +(sum) + +(amnt);
  }
  document.getElementById("Inv_AmntDue").value = sum;
}

//PDF
function generatePDF(){
    const element = document.getElementById("AddInvoice");

    html2pdf()
    .from(element)
    .save();

}

// Add click event listener to the generate PDF button
document.getElementById("generatePDFBtn").addEventListener("click", function() {
  generatePDF();
});


