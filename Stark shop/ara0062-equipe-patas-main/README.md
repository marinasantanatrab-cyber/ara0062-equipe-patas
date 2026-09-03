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
