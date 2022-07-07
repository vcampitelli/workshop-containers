FROM node:18-alpine

# Diretório base da nossa aplicação
WORKDIR /app

# Instalando dependências do Node
COPY ["package.json", "yarn.lock", "./"]
RUN yarn install

# Copia o resto dos arquivos
COPY . ./

# Expõe a porta 3000 e inicializa a aplicação
EXPOSE 3000
CMD ["yarn", "start"]
