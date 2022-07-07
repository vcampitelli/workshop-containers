#
# Primeira etapa: build
#
FROM maven:3.8-openjdk-18 AS builder

WORKDIR /usr/src/app

# Instalando dependências
COPY pom.xml ./
RUN ["mvn", "dependency:go-offline", "-B"]

# Copiando aplicação
COPY ./src ./src

# Gerando o .jar
RUN ["mvn", "clean", "package"]

#
# Segunda etapa: rodando a aplicação
#
FROM openjdk:18-alpine

WORKDIR /app

# Copiando o .jar e as dependências
# https://medium.com/holisticon-consultants/dont-build-fat-jars-for-docker-applications-6252a5571248
COPY --from=builder ["/usr/src/app/target/App.jar", "/usr/src/app/target/dependency-jars", "./"]

CMD ["java", "-jar", "./App.jar"]
