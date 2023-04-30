FROM node:20-alpine
ENV NODE_ENV development

WORKDIR /app
COPY ["package.json", "package-lock.json", "./"]
RUN npm install -g vite && npm install --include=dev

COPY . ./

EXPOSE 5173
CMD ["npm", "run", "dev"]
