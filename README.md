# Projeto ARA0062 - Stark Shop

## Assunto
Pet shop e clínica veterinária completa com agendamento de banho, tosa, hotel, creche, consultas e vacinação.

##  Sobre o Projeto
Website institucional e sistema de agendamento/contato para o Pet Shop e Clínica Veterinária **Stark Shop**.

---

##  Equipe

| Nome Completo | Matrícula | Usuário GitHub |
| :--- | :--- | :--- |
| [Marina Pinheiro Santana] (Líder) |  202603158772 | marinasantanatrab-cyber|
| [Raquel Pacheco Mendes] | 202602255639 |  RaquelMendes-tech |
| [Matheus Salazar Pereira] | 202602188643 | salazarbh56-coder|
| [Izabelle Duarte Rodrigues] | 202601388576 | Izabelled|
| [Priscila Da Costa Pereira] | 202602529645 | traxxas33-collab |

---
#  Stark Shop - Frontend

Interface web do projeto **Stark Shop**, desenvolvida com foco em simplicidade, responsividade e experiência do usuário para navegação em catálogo de produtos e envio de mensagens via formulário de contato.

---

##  Estrutura de Arquivos

O projeto está organizado da seguinte maneira:

```text
frontend/
├── css/
│   ├── estilo.css       # Folha de estilos customizada (layout, cores, tipografia e responsividade)
│   └── tema-claro.css   # Variáveis de cor do tema claro
├── js/
│   └── script.js        # Validação do formulário antes do envio
└── index.html           # Estrutura principal da página (serviços, preços e formulário)
backend/
├── config/
│   └── conexao.php      # Conexão PDO com o banco stark_shop
├── controllers/
│   ├── processa-contato.php  # Recebe o formulário e grava com INSERT
│   └── mensagens.php         # Lista as mensagens do banco com SELECT
└── sql/
    └── banco.sql        # Cria o banco stark_shop e a tabela mensagens
```

---

##  Tecnologias Utilizadas

- **HTML5:** Semântica web, acessibilidade e estruturação dos componentes.
- **CSS3:** Estilização moderna, layout responsivo (Flexbox/Grid), transições e variáveis CSS.
- **JavaScript (ES6+):** Manipulação da DOM, validações de entrada no formulário e requisições/integrações com o backend.

---

##  Funcionalidades

- **Navegação & Header:** Barra de navegação intuitiva com links rápidos pelas seções da loja.
- **Vitrine de Produtos:** Exibição de cards de produtos com títulos, descrições, preços e botões de ação.
- **Formulário de Contato / Atendimento:** Coleta de dados com validação no cliente antes do envio para o endpoint backend (`backend/controllers/processa-contato.php`).
- **Design Responsivo:** Adaptado para telas mobile, tablets e desktops.

---

##  Como Executar

### 1. Pré-requisitos
Para visualizar a interface estática, basta qualquer navegador moderno (Chrome, Firefox, Edge, etc.).  
Para testar a integração completa com o formulário/PHP, é necessário rodar sobre um servidor web local (como Apache via **XAMPP**, **WampServer** ou PHP Built-in Server).

### 2. Acessando via Live Server (VS Code)
1. Abra a pasta do projeto no **VS Code**.
2. Instale a extensão **Live Server**.
3. Clique com o botão direito sobre `frontend/index.html` e selecione **"Open with Live Server"**.

### 3. Acessando via Servidor Local (com Backend PHP)
1. Coloque a pasta `ara0062-equipe-patas` dentro de `C:\xampp\htdocs\`.
2. No painel do XAMPP, ligue o **Apache** e o **MySQL**.
3. Abra `http://localhost/phpmyadmin`, vá na aba **Importar** e importe o arquivo `backend/sql/banco.sql` (ele cria o banco `stark_shop` e a tabela `mensagens`).
4. Acesse pelo navegador:
   ```text
   http://localhost/ara0062-equipe-patas/frontend/
   ```
5. As mensagens gravadas aparecem em:
   ```text
   http://localhost/ara0062-equipe-patas/backend/controllers/mensagens.php
   ```

---

##  Integração com o Backend

- O formulário de contato realiza uma requisição `POST` direcionada para `../backend/controllers/processa-contato.php`.
- Certifique-se de que as credenciais do banco de dados estejam configuradas em `backend/config/conexao.php`.

---

##  Equipe

Projeto desenvolvido pelo grupo **Equipe Patas** na disciplina ARA0062.
# Stark Shop

Site institucional do Stark Shop, um pet shop, com serviços, tabela de preços e agendamento.

---

## Identidade Visual

### Paleta de Cores
* *Vinho (#a5231d)*: Cor primária da marca. Transmite cuidado, carinho e confiança — valores essenciais para o tutor ao confiar seu pet aos cuidados da equipe.
* *Preto (#101112)*: Cor de fundo e suporte visual. Confere elegância, sofisticação e a percepção de um serviço premium, além de destacar o vinho da marca.
* *Off-White (#f3f0eb)*: Cor dos textos e elementos de leitura. Reduz a fadiga ocular em relação ao branco puro e garante contraste nítido sobre o fundo escuro.

### Tipografia
* *Playfair Display (Títulos)*: Tipografia serifada clássica que evoca sofisticação, requinte e um toque artesanal no cuidado com os animais.
* *DM Sans (Corpo)*: Fonte sans-serif geométrica, moderna e limpa, projetada especificamente para garantir legibilidade ideal em telas.

### Acessibilidade e Contraste (WebAIM)
A conformidade visual segue as diretrizes WCAG:
* *Branco sobre Vinho: razão de contraste de **7,3:1* (supera o nível AAA para texto normal).
* *Off-White sobre Preto: razão de contraste de **16,4:1* (supera com folga o mínimo recomendado de 4,5:1).

## JavaScript

**Formulário:** "Fale Conosco / Agendamento" (`frontend/index.html`, seção `#contato`), conferido por `frontend/js/script.js` no evento `submit`, antes de enviar. Quando uma regra é quebrada, o envio é cancelado (`preventDefault`) e o aviso aparece na página; com tudo certo, os dados seguem para o PHP.

O formulário tem `novalidate`: quem confere os campos obrigatórios é o JavaScript, e cada erro aparece no parágrafo logo abaixo do campo com problema (`#erro-nome`, `#erro-pet`, `#erro-mensagem`).

**Regras (uma por linha):**
* Nome do tutor, nome do pet e mensagem: não podem ficar vazios.
* Nome do tutor: espaços duplos são removidos (`while`) e precisa ter entre 3 e 60 letras (`if` com `||`).
* Nome do tutor: não pode ter números (`for` com `break`, na função `temNumero`).
* Nome do pet: precisa ter entre 2 e 30 letras (`else if` com `||`).
* Assunto "Consulta veterinária": a mensagem precisa ter pelo menos 20 caracteres (`else if` com `&&`).
* Assunto "Agendar um serviço": a mensagem precisa ter pelo menos 10 caracteres (`else if` com `&&`).
* A dica (placeholder) da mensagem muda conforme o assunto escolhido (`switch` no evento `change`).

## PHP

**Arquivo:** `backend/controllers/processa-contato.php`, chamado pelo `action` do formulário com `method="POST"`.

**O que ele faz:**
* Lê os campos `nome`, `pet`, `assunto` e `mensagem` com `$_POST` (com `?? ""` para não dar erro se nada vier).
* Grava a mensagem na tabela `mensagens` com `INSERT`, usando a conexão PDO e `prepare` com `?`, e mostra o número que o banco deu (`lastInsertId()`).
* Acerta o fuso para `America/Sao_Paulo` e registra a data e a hora do envio com `date()`.
* Conta os caracteres da mensagem com `mb_strlen()` e calcula quantos sobraram do limite de 500.
* Troca o `value` do assunto pelo texto que a pessoa leu (`switch`).
* Passa tudo o que veio do formulário por `htmlspecialchars()` antes de mostrar na página.
* Devolve uma página de agradecimento com o mesmo CSS do site.

## Banco de dados

**Arquivo:** `backend/sql/banco.sql`, que cria o banco `stark_shop` e a tabela `mensagens` (`id`, `nome`, `pet`, `assunto`, `mensagem`, `criado_em`).

* `backend/config/conexao.php` abre a conexão PDO, incluída pelos outros arquivos do backend com `require`.
* `backend/controllers/processa-contato.php` grava cada envio do formulário com `INSERT` e `prepare`.
* `backend/controllers/mensagens.php` lê a tabela com `SELECT ... ORDER BY id DESC` e monta uma linha da tabela HTML para cada registro com `foreach`. Nada está escrito à mão: uma linha nova no banco aparece na tela.

---

## Quem fez o quê

### Marina Pinheiro Santana (líder) · `marinasantanatrab-cyber`
* `<head>` e `<header>` do `index.html` (metadados, fontes e cabeçalho).
* Variáveis de cor e fonte (`:root`) em `estilo.css` e o tema claro (`tema-claro.css`).
* Validação do formulário em `frontend/js/script.js`.
* Backend: `processa-contato.php`, `conexao.php` (PDO), `banco.sql` e a tela `mensagens.php`.

### Raquel Pacheco Mendes · `RaquelMendes-tech`
* README do projeto (descrição, estrutura e identidade visual).
* Estilos de botão, rodapé, títulos, tabela e layout geral em `estilo.css`.
* Organização das pastas `frontend/` e `backend/` no repositório.

### Matheus Salazar Pereira · `salazarbh56-coder`
* Estilos do cabeçalho, dos títulos `h1` e `h2` e da navegação em `estilo.css`.

### Izabelle Duarte Rodrigues · `Izabelled`
* Formulário de contato no `index.html`.
* Estilos do formulário em `estilo.css` (`fieldset`, `legend`, `label`, campos e `textarea`).

### Priscila Da Costa Pereira · `traxxas33-collab`
* Tabela de Preços (`#valores`) no `index.html`.
* Primeira versão da página e revisão dos estilos do formulário em `estilo.css`.
