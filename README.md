# Atlas ETL

O Atlas ETL é um projeto de engenharia de dados desenvolvido com o objetivo de demonstrar, de forma prática, a construção de um pipeline completo de ETL (Extract, Transform, Load), utilizando tecnologias modernas e boas práticas de desenvolvimento backend.

---

## Aviso

Este projeto foi criado com fins educacionais e para demonstração de conhecimento técnico em engenharia de dados, backend e arquitetura de software.
Não se trata de um sistema em produção.

---

## Objetivo

O Atlas ETL tem como objetivo:

* Extrair dados de fontes públicas relacionadas a países e moedas
* Transformar e normalizar esses dados
* Armazenar os dados de forma estruturada em um banco relacional
* Disponibilizar os dados para consultas analíticas via API

---

## Arquitetura

O projeto segue o padrão clássico de ETL:

### 1. Extract (Extração)

Responsável por buscar dados de APIs externas.

### 2. Transform (Transformação)

Responsável por:

* Normalização de dados
* Validação
* Padronização de formatos
* Enriquecimento de informações

### 3. Load (Carga)

Responsável por persistir os dados no banco de dados.

---

## APIs Utilizadas

O projeto utilizará APIs públicas com dados relacionados ao mesmo domínio (geografia e economia global):

* REST Countries API

  * Informações de países
  * População
  * Região
  * Moedas
  * Idiomas

* Exchange Rate API

  * Taxas de câmbio
  * Conversão de moedas

---

## Tecnologias Utilizadas

### Backend

* PHP
* Laravel

### Banco de Dados

* SQLite (ambiente de desenvolvimento, simples e sem necessidade de configuração)
* PostgreSQL (opcional para evolução do projeto ou uso em produção)

### Processamento

* Laravel Queues (filas assíncronas)
* Laravel Scheduler (agendamento de tarefas)

### Outras ferramentas

* Composer
* Docker (opcional)
* Redis (opcional para filas)

---

## Conceitos Aplicados

* ETL (Extract, Transform, Load)
* Arquitetura em camadas
* Clean Code
* Design Patterns (Strategy, Factory)
* Processamento assíncrono
* Integração com APIs externas
* Modelagem relacional

---

## Estrutura do Pipeline

O pipeline será dividido em etapas:

1. Job de Extração

   * Consome APIs externas
   * Armazena dados brutos (staging)

2. Job de Transformação

   * Limpeza e validação
   * Normalização de entidades (país, moeda, região)

3. Job de Carga

   * Persistência no banco final
   * Relacionamento entre entidades

---

## Modelagem Inicial (Exemplo)

* countries
* currencies
* exchange_rates
* regions

---

## Funcionalidades Esperadas

* Consolidação de dados de múltiplas fontes
* Relacionamento entre países e moedas
* Consulta de dados estruturados
* Base para análises futuras

---

## Possíveis Consultas

* Países por região
* Moedas mais valorizadas
* Comparação populacional
* Relação país x moeda

---

## Melhorias Futuras

* Monitoramento e logs avançados
* Testes automatizados
* Versionamento de dados
* Dashboard (frontend)
* Integração com ferramentas de BI

---

## Autor

Projeto desenvolvido por Daniel Dias, como parte de estudo e evolução profissional em engenharia de software e dados.

---

## Considerações Finais

O Atlas ETL foi projetado para ser simples na execução, mas robusto em conceitos, servindo como base para projetos maiores e mais complexos no futuro.
