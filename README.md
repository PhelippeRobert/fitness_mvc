# 🏋️ Aplicativo de Desafios Fitness (MVC em PHP)

Este é um sistema desenvolvido em **PHP** utilizando o padrão **MVC**, com banco de dados **MySQL**, para gerenciar **Usuários, Desafios e Progresso**.

## 🚀 Funcionalidades
- CRUD de **Usuários** (criar, listar, editar, excluir)
- CRUD de **Desafios** (criar, listar, editar, excluir)
- CRUD de **Progresso** (registrar e atualizar o progresso dos usuários nos desafios)

## 📂 Estrutura de Pastas
/fitness_api
│── index.php              
│── .htaccess               
│
│── config/
│     └── Database.php      
│
│── generic/
│     ├── Autoload.php
│     ├── JWTHelper.php     
│     └── AuthMiddleware.php 
│
│── controller/
│     ├── UsuarioController.php
│     ├── DesafioController.php
│     ├── ProgressoController.php
│     └── LoginController.php
│
│── service/
│     ├── UsuarioService.php
│     ├── DesafioService.php
│     └── ProgressoService.php
│
└── dao/
      ├── UsuarioDAO.php
      ├── DesafioDAO.php
      └── ProgressoDAO.php


## ⚙️ Banco de Dados
Crie o banco no **phpMyAdmin**:

```sql
CREATE DATABASE fitness_db;

USE fitness_db;

CREATE TABLE usuarios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) UNIQUE NOT NULL
);

CREATE TABLE desafios (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(150) NOT NULL,
  descricao TEXT
);

CREATE TABLE progresso (
  id INT AUTO_INCREMENT PRIMARY KEY,
  usuario_id INT,
  desafio_id INT,
  progresso INT NOT NULL,
  FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
  FOREIGN KEY (desafio_id) REFERENCES desafios(id)
);
⚠️ Configure o Database.php com:

php
Copiar código
private static $user = "root";
private static $pass = "";
▶️ Como Rodar
Copie o projeto para C:\xampp\htdocs\fitness_mvc

Inicie Apache e MySQL no XAMPP

Crie o banco e as tabelas no phpMyAdmin

Acesse no navegador:
http://localhost/fitness_mvc/

👨‍💻 Equipe
Phelippe Robert Miranda Da Silva / RA:5160520
Arthur Cruz Oliveira / RA:5161008

Curso: ANÁLISE E DESENVOLVIMENTO DE SISTEMAS (ADS)

Disciplina: Aplicações para Internet

---

## 🔄 Como atualizar o `README.md` no GitHub
Se você já tem o repositório configurado no VS Code:

1. Edite o arquivo `README.md` localmente no VS Code.  
2. Salve (`Ctrl + S`).  
3. No terminal, rode:
   ```bash
   git add README.md
   git commit -m "Atualiza README com instruções de instalação e uso"
   git push origin main
(se sua branch for master, troque main por master).
