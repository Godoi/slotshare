# 🐘 Lab Modern PHP (WSL2 + Docker)

[![CI](https://github.com/Godoi/lab-modern-php/actions/workflows/ci.yml/badge.svg)](https://github.com/Godoi/lab-modern-php/actions)
[![Codecov](https://codecov.io/gh/Godoi/lab-modern-php/branch/main/graph/badge.svg?token=9LE4A4DL4J)](https://codecov.io/gh/Godoi/lab-modern-php)
[![Template](https://img.shields.io/badge/template-GitHub-555?logo=github)](https://github.com/Godoi/lab-modern-php/generate)

[![PHP 8.2](https://img.shields.io/badge/PHP-8.2-777BB4?logo=php&logoColor=white)](https://www.php.net/releases/8.2/en.php)
[![Xdebug 3.3](https://img.shields.io/badge/Xdebug-3.3-8C34C2?logo=xdebug&logoColor=white)](https://xdebug.org/announcements/2023-12-04)
[![Nginx](https://img.shields.io/badge/Nginx-1.25+-5EAF4A?logo=nginx&logoColor=white)](https://nginx.org)
[![MySQL 8.0](https://img.shields.io/badge/MySQL-8.0-4479A1?logo=mysql&logoColor=white)](https://dev.mysql.com/doc/refman/8.0/en/)
[![PHPUnit 10.5](https://img.shields.io/badge/PHPUnit-10.5-ED4040?logo=phpunit&logoColor=white)](https://phpunit.de)
[![Composer 2.7+](https://img.shields.io/badge/Composer-2.7+-8C5A8D?logo=composer&logoColor=white)](https://getcomposer.org)

> 🧪 **Este é um template de projeto**. Use-o como base para novos projetos PHP modernos — com ambiente Docker totalmente funcional em minutos.

---

## 🚀 Por que usar este template?

✅ **Totalmente isolado** com Docker Compose  
✅ **Pronto para debug** (Xdebug 3.3 no VS Code)  
✅ **Testes com cobertura** (PHPUnit 10.5 + Codecov)  
✅ **Otimizado para WSL2** (melhor performance que VMs)  
✅ **Neutro e reutilizável** — funciona com PHP puro, Laravel, Symfony, Slim…

---

## 🛠️ Pré-requisitos

- ✅ Windows 10/11 com **WSL2** (Ubuntu 22.04+ recomendado)  
- ✅ **Docker Desktop** com integração ao WSL2 ativada  
  > 💡 Dica: mantenha seu projeto **dentro do WSL** (`/home/user/...`), **nunca em `/mnt/c/...`** — evita lentidão de I/O.

---

## 🌱 Criar novo projeto (30 segundos)

1. Clique em **[Use this template](https://github.com/Godoi/lab-modern-php/generate)**  
2. Dê um nome (ex: `meu-app-php`) e crie  
3. Clone e inicie:

```bash
git clone git@github.com:seu-usuario/meu-app-php.git
cd meu-app-php

# Suba o ambiente
docker-compose up -d --build

# Instale dependências
docker-compose run --rm cli composer install

# Acesse: http://localhost:8080
```
---

## Saída esperada:  
✅ PHP 8.2.29  
✅ Xdebug 3.3.0  
✅ pdo_mysql  
✅ MySQL: 8.0.39  
🧮 2 + 3 = 5  
  
## 🧪 Testes e cobertura  
**Rode testes**  
./bin/test  

**Gere relatório HTML**   
./bin/test --coverage-html build/coverage  

**Abra no navegador (WSL2)**   
explorer.exe build/coverage/index.html  

## 🐞 Debug no VS Code
**Instale:** PHP Debug  
**Crie** .vscode/launch.json (já incluso no template)  
**Coloque breakpoints** em src/  
**Inicie** "Listen for Xdebug (web)"  
**Recarregue** http://localhost:8080  