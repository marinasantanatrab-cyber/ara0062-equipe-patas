// ===========================================================================
// ARA0062 — comportamento da página
// Ligado ao index.html pela linha
// <script src="js/script.js" defer></script>
// ===========================================================================

// ---------------------------------------------------------------------------
// 6 · O formulário que confere antes de enviar (aula 07)
// ---------------------------------------------------------------------------
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

function conferirFormulario(evento) {
  evento.preventDefault();

  let nome = tirarEspacosDuplos(campoNome.value.trim());
  campoNome.value = nome;

  let pet = tirarEspacosDuplos(campoPet.value.trim());
  campoPet.value = pet;

  const mensagem = campoMensagem.value.trim();

  if (nome.length < 3 || nome.length > 60) {
    aviso.textContent = "O nome do tutor precisa ter entre 3 e 60 letras.";
  } else if (temNumero(nome)) {
    aviso.textContent = "O nome do tutor não pode ter números.";
  } else if (pet.length < 2 || pet.length > 30) {
    aviso.textContent = "O nome do pet precisa ter entre 2 e 30 letras.";
  } else if (campoAssunto.value === "consulta" && mensagem.length < 20) {
    aviso.textContent = "Conte os sintomas do pet (mínimo 20 caracteres).";
  } else if (campoAssunto.value === "agendamento" && mensagem.length < 10) {
    aviso.textContent = "Diga o serviço e o dia desejado (mínimo 10 caracteres).";
  } else {
    aviso.textContent = "Tudo certo! (No ciclo 8, isto vai para o PHP.)";
  }
}

formulario.addEventListener("submit", conferirFormulario);

// ---------------------------------------------------------------------------
// 7 · A dica da mensagem muda com o assunto (switch)
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
