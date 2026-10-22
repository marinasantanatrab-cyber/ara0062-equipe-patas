// ===========================================================================
// STARK SHOP - script.js
// Ciclo 7: o formulário confere antes de enviar.
// Ciclo 8: o envio só é cancelado quando há problema; com tudo certo,
//          os dados seguem para o PHP (backend/controllers/processa-contato.php).
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

// submit: cada regra quebrada cancela o envio com preventDefault;
// no "Tudo certo" não há preventDefault, e o formulário vai para o PHP
function conferirFormulario(evento) {
  let nome = tirarEspacosDuplos(campoNome.value.trim());
  campoNome.value = nome;

  let pet = tirarEspacosDuplos(campoPet.value.trim());
  campoPet.value = pet;

  const mensagem = campoMensagem.value.trim();

  if (nome.length < 3 || nome.length > 60) {
    evento.preventDefault();
    aviso.textContent = "O nome do tutor precisa ter entre 3 e 60 letras.";
  } else if (temNumero(nome)) {
    evento.preventDefault();
    aviso.textContent = "O nome do tutor não pode ter números.";
  } else if (pet.length < 2 || pet.length > 30) {
    evento.preventDefault();
    aviso.textContent = "O nome do pet precisa ter entre 2 e 30 letras.";
  } else if (campoAssunto.value === "consulta" && mensagem.length < 20) {
    evento.preventDefault();
    aviso.textContent = "Conte os sintomas do pet (mínimo 20 caracteres).";
  } else if (campoAssunto.value === "agendamento" && mensagem.length < 10) {
    evento.preventDefault();
    aviso.textContent = "Diga o serviço e o dia desejado (mínimo 10 caracteres).";
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
