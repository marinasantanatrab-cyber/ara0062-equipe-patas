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

A pasta `frontend/` está organizada da seguinte maneira:

```text
frontend/
├── css/
│   └── estilo.css       # Folha de estilos customizada (layout, cores, tipografia e responsividade)
├── js/
│   └── script.js        # Lógica de interatividade (validações, máscaras e comportamento dinâmico)
└── index.html           # Estrutura principal da página (vitrine, seções e formulário)
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
- **Formulário de Contato / Atendimento:** Coleta de dados com validação no cliente antes do envio para o endpoint backend (`processa-contato.php`).
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
1. Coloque o repositório na pasta raiz do seu servidor local (ex: `htdocs/` no XAMPP).
2. Certifique-se de que o servidor Apache e o MySQL estejam ativos.
3. Acesse pelo navegador:
   ```text
   http://localhost/ara0062-equipe-patas-main/estrutura-modelo/Stark%20Shop/frontend/index.html
   ```

---

##  Integração com o Backend

- O formulário de contato realiza uma requisição `POST` direcionada para `../backend/processa-contato.php`.
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
