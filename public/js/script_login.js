function verOcultarSenha(){
  let icon = document.getElementById('icon');
  let password = document.getElementById('senha');

  if(password.type === "password"){ 
    password.type = "text";
    icon.src = "public/imagem/aberto.png";
  }else{
    password.type = "password";
    icon.src = "public/imagem/olho.png";
  }
}