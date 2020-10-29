function validasi(form){
  if(form.pass.value.length == 0) {
    alert("Masukkan password Anda");
    return false;
  }
  if(form.pass.value.length < 6){
    alert("password harus sedikitnya 6 karakter");
    return false;
  }
  for (var i = 0; i < form.pass.value.length; i ++){
    var ch = form.pass.value.charAt(i);
    if((ch < "A" || ch > "Z") && (ch < "a" || ch > "z") && (ch < "0" || ch > "9")){
      alert("password memuat karakter - karakter ilegal");
      return false;
    }
  }
  alert("password OK!");
  return true;
}