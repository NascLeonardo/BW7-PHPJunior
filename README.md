Como política da nossa empresa, todo candidato a uma vaga precisa realizar um teste prático de conhecimento. Segue instruções do teste abaixo:

Criar um sistema simples para gerenciamento de aluguel de carros
•	Precisa ter acesso restrito por login e senha;
•	Precisa ter um cadastro dos veículos;
•	Precisa ter uma lista com os veículos cadastrados e nessa lista uma indicação se o veículo está alugado ou disponível;
•	Nessa lista de veículos devem ser possíveis editar o cadastro de um veículo, excluir o veículo e marcar se o veículo foi alugado;
•	Quando o veículo alugado for devolvido, tem que ser possível marcar o veículo como disponível novamente;

Informações adicionais
•	Você deve criar o banco de dados e as tabelas necessárias para esse sistema;
•	Nos informe a versão do PHP utilizada na programação;
•	O layout não será levado em consideração, entretanto, sugerimos a utilização do Bootstrap;
•	O código, se for feito orientado a objetos, será considerado um diferencial;

Envie seu código e banco de dados para o e-mail suporte@bw7.com.br até o dia 18/08/2021 às 18h.

O não envio do código acima, será entendido que você desistiu de concorrer a vaga.

Boa sorte!

#### ####

Versão do PHP 8.1.8

Informações adicionais:
*   Essa Solução considera a pasta BW7Teste como a pasta raiz para o schema de URL aplicado no roteamento das páginas.
*   O Banco de dados utilizado foi o MySQL, o SQL para criação da tabela se encontra em BW7Teste/mysql_query/CREATE_TABLES.SQL.
*   As tabelas não são criadas automaticamente pelo sistema, por favor criar as tabelas previamente.
*   Definir as informações da string de conexão para o banco de dados no arquivo BW7Teste/DAO/BaseDAO.php, na função conn, linhas 18,19,20.
*   Caso seja necessario alterar o nome do banco de dados, altere no arquivo BW7Teste/mysql_query/CREATE_TABLES.SQL linha 1
    e no arquivo BW7Teste/DAO/BaseDAO.php linha 21.
*   Esse sistema foi desenvolvido em um ambiente linux ubuntu, e executado utilizando o servidor embutido, rodando a função php -S 0.0.0.0:5001, para inicializar.
*   O ponto inicial deste sistema pode ser considerado tanto o arquivo BW7Teste/Login.php ou o BW7Teste/SignUp.php,
    caso o servidor esteja executando corretamente qualquer requisição para outra página na pasta root redirecionará para a página de login inicialmente até que haja um usuário autenticado.
*   Todas as paginas "views" do sistema se encontram na pasta root, os arquivos php nas pastas DAO, Controller e Model não são views e não retornam um corpo html,
    acessar tais páginas pelo navegador não retornará nenhuma ação.


Informação sobre o sistema:
    Como foi requisitado, foi desenvolvido um sistema de gerenciamento de veículo, aonde um usuário precisá se autenticar no sistema para poder gerenciar tais veículos, as
    ações de cadastro, exclusão, edição e alteração do estado de disponibilidade do veículo foram implementadas, para a completude do sistema requisitado também foi desenvolvido funções de pesquisas de veículos, cadastro de usuário e de login de usuário.    
    O Sistema foi desenvolvido utilizando a metodologia de arquitetura MVC e o paradigma de orientação a objeto.
    O Sistema foi desenvolvido utilizando a biblioteca Bootstrap 5 através de CDN.



Caso de uso:
    Um possível usuário pode se cadastrar no sistema e após isso acessar sua pagina inicial aonde ele possui acesso a uma lista de todos seus veículos cadastrados e um campo de pesquisa.
    O usuário pode, através da barra de navegação, acessar a página de cadastro de veículos para cadastrar novos veículos, um por vez, ao cadastrar um veículo ele é levado de volta para a página inicial.
    O usuário pode também, através da barra de navegação, realizar seu logout, encerrando sua sessão.
    As informações sobre os veículos cadastrados são apresentados em cards na tela inicial, em tais cards o usuário pode visualizar o nome, marca e placa do veículo, além de, de forma destacada, ver a disponibilidade do veículo.
    Através do card de cada veículo, o usuário também pode alterar a disponibilidade do veículo, invertendo a atual, excluir o veículo de sua lista, ou editar as informações do veículo.
    Clicar no link de alteração leva o suasório para a página de alteração, aonde um formulário já preenchido com as informações atuais do veículo é apresentado, o usuário pode alterar o nome, a placa ou marca do veículo.

Schema de URL para as views:
*   /BW7Teste/Login.php Página de Login
*   /BW7Teste/SignUp.php Página de cadastro
*   /BW7Teste/Index.php Página de Listagem de veículos e pesquisa
*   /BW7Teste/EditarVeiculo.php?IDVeiculo=0 Página de Edição de veículos, IDVeiculo=0, equivale ao Veículo que será alterado, o numero no final precisa ser um Id válido
*   /BW7Teste/CadastroVeiculo.php Página de cadastro

