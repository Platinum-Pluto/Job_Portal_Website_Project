function disableButton() {
    document.getElementById("myButton").disabled = true;
    document.getElementById("myButton").innerHTML = "Clicked";
    document.getElementById("applicationForm").submit();
}