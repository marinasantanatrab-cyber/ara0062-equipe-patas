// ===========================================================================
// STARK SHOP - script.js
// Ciclo 7: o formulário confere antes de enviar.
// Ciclo 8: o envio só é cancelado quando há problema; com tudo certo,
//          os dados seguem para o PHP (backend/controllers/processa-contato.php).
// Trabalho final: campos obrigatórios conferidos pelo JS e erro perto do campo.
// ===========================================================================

console.log("O script.js está ligado.");

const formulario = document.querySelector("form");
const aviso = document.querySelector("#aviso");
const campoNome = document.querySelector("#nome");
const campoPet = document.querySelector("#pet");
const campoAssunto = document.querySelector("#assunto");
const campoMensagem = document.querySelector("#mensagem");

// for + break: olha letra por letra e para no primeiro número
function temNumero(texto) {
  let achou = false;
  for (let i = 0; i < texto.length; i++) {
    if ("0123456789".includes(texto[i])) {
      achou = true;
      break;
    }
  }
  return achou;
}

// while: tira os espaços duplos, quantos houver
function tirarEspacosDuplos(texto) {
  while (texto.includes("  ")) {
    texto = texto.replace("  ", " ");
  }
  return texto;
}

// cada campo tem o seu parágrafo de erro logo abaixo dele (no index.html)
const erroNome = document.querySelector("#erro-nome");
const erroPet = document.querySelector("#erro-pet");
const erroMensagem = document.querySelector("#erro-mensagem");

// apaga os erros da tentativa anterior (vazio, o .aviso some pelo CSS)
function limparErros() {
  erroNome.textContent = "";
  erroPet.textContent = "";
  erroMensagem.textContent = "";
  aviso.textContent = "";
}

// submit: cada regra quebrada cancela o envio com preventDefault
// e escreve o erro embaixo do campo com problema;
// no "Tudo certo" não há preventDefault, e o formulário vai para o PHP.
// O form tem novalidate: quem confere os campos obrigatórios é o JavaScript.
function conferirFormulario(evento) {
  limparErros();

  let nome = tirarEspacosDuplos(campoNome.value.trim());
  campoNome.value = nome;

  let pet = tirarEspacosDuplos(campoPet.value.trim());
  campoPet.value = pet;

  const mensagem = campoMensagem.value.trim();

  if (nome === "") {
    evento.preventDefault();
    erroNome.textContent = "Preencha o nome do tutor.";
    campoNome.focus();
  } else if (nome.length < 3 || nome.length > 60) {
    evento.preventDefault();
    erroNome.textContent = "O nome do tutor precisa ter entre 3 e 60 letras.";
    campoNome.focus();
  } else if (temNumero(nome)) {
    evento.preventDefault();
    erroNome.textContent = "O nome do tutor não pode ter números.";
    campoNome.focus();
  } else if (pet === "") {
    evento.preventDefault();
    erroPet.textContent = "Preencha o nome do pet.";
    campoPet.focus();
  } else if (pet.length < 2 || pet.length > 30) {
    evento.preventDefault();
    erroPet.textContent = "O nome do pet precisa ter entre 2 e 30 letras.";
    campoPet.focus();
  } else if (mensagem === "") {
    evento.preventDefault();
    erroMensagem.textContent = "Escreva a sua mensagem.";
    campoMensagem.focus();
  } else if (campoAssunto.value === "consulta" && mensagem.length < 20) {
    evento.preventDefault();
    erroMensagem.textContent = "Conte os sintomas do pet (mínimo 20 caracteres).";
    campoMensagem.focus();
  } else if (campoAssunto.value === "agendamento" && mensagem.length < 10) {
    evento.preventDefault();
    erroMensagem.textContent = "Diga o serviço e o dia desejado (mínimo 10 caracteres).";
    campoMensagem.focus();
  } else {
    // sem preventDefault aqui: o envio segue para o PHP
    aviso.textContent = "Tudo certo! Enviando…";
  }
}

formulario.addEventListener("submit", conferirFormulario);

// ---------------------------------------------------------------------------
// switch: a dica (placeholder) da mensagem muda conforme o assunto
// ---------------------------------------------------------------------------
function trocarDica() {
  switch (campoAssunto.value) {
    case "duvida":
      campoMensagem.placeholder = "Qual é a sua dúvida?";
      break;
    case "agendamento":
      campoMensagem.placeholder = "Qual serviço (banho, tosa, vacina…) e qual dia?";
      break;
    case "consulta":
      campoMensagem.placeholder = "Conte os sintomas do pet e desde quando.";
      break;
    default:
      campoMensagem.placeholder = "Escreva a sua mensagem.";
  }
}

campoAssunto.addEventListener("change", trocarDica);
trocarDica();
