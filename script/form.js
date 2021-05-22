var currentTab = 0;
showTab(currentTab);

function showTab(n) {
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";

    if (n==0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline"
    }

    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    }else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
}

function nextPrev(n) {
    var x = document.getElementsByClassName("tab");

    if (n == 1 && !validateForm()) {
        return false;
    }
    x[currentTab].style.display = "none";

    currentTab += n;

    if (currentTab >= x.length) {
        document.getElementById("regForm").submit();
        return false
    }

    showTab(currentTab);
}
function validateForm() {
    var fname = document.getElementById("fname").value;
    var lname = document.getElementById("lname").value;
    var pnumber = document.forms["regForm"]["pnumber"].value;
    var validName = /^[a-zA-Z \-]+$/;
    var valiNumber = /^\d{10}$/;

    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");


    for (i = 0; i < y.length; i++) {
        if (y[i].value == "") {
            alert("Please fill the empty fields");
            valid = false;
        }

    }
    
   if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }

    if (!validName.test(fname)) {
        alert("Invalid name. Only letters are acceptable");
        valid = false;
    }
    if (!validName.test(lname)) {
        alert("Invalid name. Only letters are acceptable");
        valid = false;
    }

    return valid;
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
      x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class to the current step:
    x[n].className += " active";
  }

  function openForm(){
    document.getElementById("form").style.display = "block";
}
  function closeForm(){
    document.getElementById("form").style.display = "none";
    closeModal();
}

  function openModal() {   
    document.getElementById("modal").style.display = "block";
  }
  function closeModal() {   
    document.getElementById("modal").style.display = "none";
  }