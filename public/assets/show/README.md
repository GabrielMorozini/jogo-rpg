# Dice War 🎲⚔️

**Dice War** é um jogo de combate RPG por turnos executado diretamente no terminal. Este projeto foi desenvolvido inteiramente em **PHP** como um exercício prático para o treinamento e consolidação de conceitos de **Programação Orientada a Objetos (POO)**.

---

## 🚀 Funcionalidades e Requisitos do Jogo

O projeto cumpre rigorosamente os seguintes requisitos de jogabilidade e arquitetura:

* **Combate 1x1 por Turnos:** Uma partida rápida e focada entre exatamente 2 jogadores, onde as ações alternam a cada turno até que um seja derrotado.
* **Customização:** Permite digitar um nome personalizado para cada um dos dois players no início da execução.
* **3 Classes Distintas:** Cada jogador escolhe entre três personagens com características, atributos e habilidades únicas que influenciam diretamente a estratégia:
  * **Berserker:** Guerreiro implacável focado em força física.
  * **Mago:** Mestre das artes arcanas com vasta reserva de energia.
  * **Arqueiro:** Atirador ágil baseado em precisão e esquiva.
* **Mecânicas de Combate Clássicas:**
  * **Pontos de Vida (HP):** Geridos com uma barra visual no terminal. O HP nunca ultrapassa o valor máximo inicial e, se chegar a 0, o personagem é derrotado.
  * **Defesa:** Atributo que reduz mecanicamente o dano recebido.
  * **Mana:** Recurso consumido ao usar habilidades especiais. Começa com um valor padrão e recupera uma quantidade fixa a cada turno.
* **Ações por Turno:** A cada rodada, o jogador da vez pode escolher entre **Atacar**, **Defender** ou usar a sua **Habilidade Especial**.
* **Sistema de Dados (D20):** Utiliza a rolagem de um dado virtual de 1 a 20 (`rand(1,20)`) para determinar o sucesso, falhas ou efeitos críticos das ações, trazendo o fator sorte e dinamismo do RPG de mesa.
* **Interface Dinâmica:** Limpeza automática de tela para manter a fluidez visual no terminal, histórico de ações detalhado ("*Berserker atacou Mago causando 15 de dano! Now Mago has 45 HP*") e uma tela de vitória que exibe o vencedor, a quantidade de turnos que a partida durou e os pontos de vida restantes.

---

## 🎨 Design e Créditos Visuais

Como o jogo roda no terminal, o design visual baseia-se em artes e referências culturais adaptadas para exibição em texto:
* **Mago:** Inspirado no icônico personagem *Keeper* (O Guardião das Sete Chaves) das capas dos álbuns da lendária banda alemã de Power Metal **Helloween**.
* **Berserker:** Baseado em artes conceituais de guerreiros disponíveis na web.
* **Arqueiro:** Projetado originalmente por um usuário da comunidade do Reddit.

---

## 🛠️ Conceitos de POO Praticados

Durante o desenvolvimento deste software, foram aplicados os seguintes pilares e padrões da Orientação a Objetos:
* **Classes e Objetos:** Criação e instanciação de estruturas isoladas para gerir entidades.
* **Encapsulamento:** Atributos de status (como vida, mana, buffers e nerfs) protegidos e manipulados através de métodos da própria classe.
* **Associação/Composição:** A classe `Player` possui uma propriedade tipada que carrega um objeto da classe `Personagens` (`public Personagens $personagem`), separando o controlador da folha de estatísticas.
* **Métodos Construtores:** Inicialização e consistência de dados assim que os objetos são alocados em memória.

---

## 📦 Como Executar o Jogo

Certifica-te de que tens o PHP instalado no teu ambiente técnico (CLI).

1. Clona este repositório:
   ```bash
   git clone (https://github.com/G3programmer/dice-war.git)
   ```
2. Navega até a pasta do projeto:
   ```bash
   cd dice-war
   ```
3. Executa o arquivo principal do jogo:
    ```bash
    php index.php
    ```