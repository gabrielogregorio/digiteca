# TABELAS
### TABELA ADMINISTRADOR
```sql
CREATE TABLE ADMINISTRADOR (
    LOGIN VARCHAR(20),
    SENHA VARCHAR(50)
);
```

### TABELA USUARIOS

```sql
CREATE TABLE USUARIOS (
    CPF VARCHAR(11) PRIMARY KEY,
    NOME varchar(100),
    SOBRENOME varchar(100),
    EMAIL VARCHAR(100),
    TELEFONE VARCHAR(14),
    DATA_NASCIMENTO DATE
)
```

### TABELA LIVROS
```sql
    create table LIVROS (
        ISBN VARCHAR(13) PRIMARY KEY,
        AUTOR varchar(50),
        TITULO VARCHAR(100),
        DESCRICAO varchar(1000),
        GENERO varchar(20),
        UNIDADES_DISPONIVEIS INT,
        EDITORA varchar(50),
        ANO_PUBLICACAO DATE
    )
```

### TABELA EMPRESTIMOS
```sql
CREATE TABLE EMPRESTIMO(
    ID INT PRIMARY KEY AUTO_INCREMENT,
    LIVRO_ISBN VARCHAR(13),
    CPF_PESSOA VARCHAR(11),
    DATA_EMPRESTADO DATE,
    TEMPO_EMPRESTIMO INT,
    STATUS_LIVRO VARCHAR(15),
    FOREIGN KEY (CPF_PESSOA) REFERENCES USUARIOS(CPF),
    FOREIGN KEY (LIVRO_ISBN) REFERENCES LIVROS(ISBN)
)
```


-----

### INSERINDO UM ADMINISTRADOR
```sql
INSERT INTO ADMINISTRADOR
(LOGIN, SENHA)
VALUES
('admin@admin.com', 'admin')
```

-----

### INSERINDO USUÁRIOS
```sql
INSERT INTO USUARIOS
(CPF, NOME, SOBRENOME, EMAIL, TELEFONE, DATA_NASCIMENTO)
VALUES
('63643107021', 'Bruno', 'Henrique', 'bruno.henrique@fatec.sp.gpv.br',     17997342385,'19980102'),
('49521803010', 'Severino', 'Santos', 'severino.santos@fatec.sp.gpv.br',   17997325734,'19950305'),
('05839927066', 'Bruno', 'Juan', 'bruno.juan@fatec.sp.gpv.br',             17997567372,'19930312'),
('24573258035', 'Nelson', ' Thales', 'nelson.thales@fatec.sp.gpv.br',      18997327453,'19970207'),
('58515540029', 'Gabriel', 'Gregorio', 'gabriel.gregorio@fatec.sp.gpv.br', 18997362421,'20010122')
```

### ATUALIZANDO USUARIOS
```sql
UPDATE USUARIOS
SET NOME = 'BRUNO'
WHERE CPF = '63643107021';
```

------

### INSERINDO OS LIVROS
```sql
INSERT INTO LIVROS
(ISBN, AUTOR, TITULO, DESCRICAO, GENERO, UNIDADES_DISPONIVEIS, EDITORA, ANO_PUBLICACAO)
VALUES
('9802345257834', 'josé de alencar', 'Iracema', 'Iracema, ícone do indianismo romântico, teve sua primeira publicação em 1865 e figura até hoje entre as principais obras literárias brasileiras. De autoria de José de Alencar, cujo projeto artístico envolvia a consolidação de uma cultura nacional, Iracema é uma narrativa de fundação, ou seja, seu eixo temático principal versa sobre a criação de uma identidade cultural, um texto que se orienta para representar a origem da nacionalidade brasileira.', 'Romantismo', 5, 'RENOVAR', '19900201'),
('1231231244735', 'josé de alencar', 'O Guarani', 'Em uma fazenda no interior do Rio de Janeiro, moram D. Antônio de Mariz e sua família, formada pela esposa D. Lauriana, o filho D. Diogo e a filha Cecília. A casa abriga ainda a mestiça Isabel (na verdade, filha bastarda de D. Antônio), apaixonada pelo moço Álvaro, que, no entanto, só tinha olhos para Cecília. O índio Peri, que salvou certa vez Cecília de ser atingida por uma pedra, permaneceu no lugar a pedido da moça, morando em uma cabana. Peri passa a se dedicar inteiramente à satisfação de todas as vontades de Cecília, a quem chama simplesmente de Ceci. Acidentalmente, D. Diogo mata uma índia aimoré. Como vingança, a família', 'Romantismo', 2, 'BRASILEIRA', '20010723'),
('7234165353453', 'Júlio Verne', 'Vinte Mil Léguas Submarinas', 'Em 1866, o Professor Pierre M. Aronnax e seu assistente Conseil, que estão em São Francisco para pesquisar relatos de um monstro marinho gigante atacando navios no Oceano Pacífico, são convidados a participar de uma expedição para procurar a criatura. Durante a busca, eles e o arpoador Ned Land são lançados ao mar durante um ataque, acabando por descobrir que o monstro é na verdade um submarino pilotado pelo brilhante, mas assombrado, Capitão Nemo.', 'Aventura', 12, 'Reeditora', '20150908')
```

### INSERINDO MAIS OS LIVROS
```sql
INSERT INTO LIVROS
(ISBN, AUTOR, TITULO, DESCRICAO, GENERO, UNIDADES_DISPONIVEIS, EDITORA, ANO_PUBLICACAO)
VALUES

('7533746477234', 'Mário de Andrade', 'Macunaíma', 'Macunaíma e a renovação da linguagem literária. Publicado em 1928, numa tiragem de apenas oitocentos exemplares (Mário de Andrade não conseguira editor), Macunaíma, o herói sem nenhum caráter, é uma das obras pilares da cultura brasileira.', 'Drama', 20, 'Brasil edidocs', '20190102')
```

### EXEMPLO ATUALIZANDO UM LIVRO
```sql
UPDATE LIVROS
SET TITULO = 'NOME TITULO'
WHERE ISBN = '9802345257834';
```

------

### INSERINDO UM NOVO EMPRESTIMO
```sql
INSERT INTO EMPRESTIMO
(LIVRO_ISBN, CPF_PESSOA, DATA_EMPRESTADO, TEMPO_EMPRESTIMO, STATUS_LIVRO)
VALUES 
('7533746477234', '63643107021', '20200705', 3, 'NÃO DEVOLVIDO'),
('7234165353453', '49521803010', '20200705', 5, 'NÃO DEVOLVIDO'),
('7234165353453', '63643107021', '20200704', 5, 'NÃO DEVOLVIDO'),
('7533746477234', '58515540029', '20200703', 5, 'NÃO DEVOLVIDO'),
('1231231244735', '24573258035', '20200703', 5, 'NÃO DEVOLVIDO'),
('1231231244735', '05839927066', '20200702', 5, 'NÃO DEVOLVIDO'),
('9802345257834', '05839927066', '20200627', 2, 'NÃO DEVOLVIDO'),
('9802345257834', '24573258035', '20200626', 14, 'NÃO DEVOLVIDO'),
('7234165353453', '24573258035', '20200625', 7, 'NÃO DEVOLVIDO'),
('1231231244735', '58515540029', '20200624', 9, 'NÃO DEVOLVIDO')
```

### EXEMPLO ATUALIZANDO UM EMPRESTIMO
```sql
UPDATE EMPRESTIMO
SET STATUS_LIVRO = 'DEVOLVIDO'
WHERE ID = 2;
```
