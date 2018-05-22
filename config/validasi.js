
 function checkPass() {
    var pass_1 = document.getElementById('password_lama');
    var pass_2 = document.getElementById('password_baru');
    var message = document.getElementById('pesan');
    var warnabenar = "#66cc66";
    var warnasalah = "#ff6666";
    if(pass_1.value == pass_2.value){
        document.validasi_form.daftar_process.disabled=false;
        pass_2.style.backgroundColor = warnabenar;
        message.style.color = warnabenar;
        message.innerHTML = ""
    }else{
        document.validasi_form.daftar_process.disabled = true;
        alert("Password tidak Cocok!");
        pass_2.style.backgroundColor = warnasalah;
        message.style.color = warnasalah;
        message.innerHTML = "!"
    }
}
