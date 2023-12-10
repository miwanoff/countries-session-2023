function verify(f) {
    if (f.login.value == "") {
      //alert("Input login!");
      document.getElementById("massage").innerHTML = "Input login!";
      return false;
    }
    let pass = f.pass.value;
    if (pass == "") {
      //alert("Input login!");
      document.getElementById("massage").innerHTML = "Input login!";
      return false;
    }
    let reg = /^\w{3,8}$/;
    if (!reg.test(pass)) {
      document.getElementById("massage").innerHTML = "Input correct password!";
      return false;
    }
    return true;
  }
  