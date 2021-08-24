function encode(obj) {
  var pwdObj = document.getElementById('pwd');
  str = pwdObj.value;
  var encoded = "";
  str = btoa(str);
  str = btoa(str);
  for (i=0; i<str.length;i++) {
    var a = str.charCodeAt(i);
    var b = a ^ 10; // bitwise XOR with any number, e.g. 123
    encoded = encoded+String.fromCharCode(b);
  }
  encoded = btoa(encoded);
  document.getElementById("pwd").value = encoded;
  //console.log(encoded);
}

function encode_upd_pass(id1, id2, id3) {
  var pwdObj = [id1, id2, id3];
  var len = pwdObj.length;
  for (var j = 0; j < len; j++)
  {
  str = document.getElementById(pwdObj[j]).value;
  var encoded = "";
  str = btoa(str);
  str = btoa(str);
  for (i=0; i<str.length;i++) {
    var a = str.charCodeAt(i);
    var b = a ^ 10; // bitwise XOR with any number, e.g. 123
    encoded = encoded+String.fromCharCode(b);
  }
  encoded = btoa(encoded)+'1$aA';
  document.getElementById(pwdObj[j]).value = encoded;
}
}


function encode_dl_passport(id1, id2) {  
  var pwdObj = [id1, id2];
  var len = pwdObj.length;

  for (var j = 0; j < len; j++)
  {
    
  str = document.getElementById(pwdObj[j]).value;
  var encoded = "";
  str = btoa(str);
  str = btoa(str);
  for (i=0; i<str.length;i++) {
    var a = str.charCodeAt(i);
    var b = a ^ 10; // bitwise XOR with any number, e.g. 123
    encoded = encoded+String.fromCharCode(b);
  }
  encoded = btoa(encoded)+'1$aA';
  document.getElementById(pwdObj[j]).value = encoded;
  //just for checking r
}
}