#Cria uma imagem baseada no Alpine com o php instalado
FROM php:alpine
#Cria e entra na pasta /app
WORKDIR /app
#Copia tudo (".") dentro da pasta atual ("aqui no app")
COPY . .
#mantem rodando em segundo plano por tempo indeterminado
CMD ["sleep","infinity"]