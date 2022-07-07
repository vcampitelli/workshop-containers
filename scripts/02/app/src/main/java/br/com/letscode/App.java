package br.com.letscode;

import java.sql.*;

public class App {

    public static void main(String[] args) throws SQLException {
        Connection connection = null;

        try {
            String url = System.getenv("APP_URL");
            String username = System.getenv("APP_USERNAME");
            String password = System.getenv("APP_PASSWORD");
            connection = DriverManager.getConnection(url, username, password);

            Statement statement = connection.createStatement();
            ResultSet resultSet = statement.executeQuery("SELECT `id`, `ship_name`, `order_date` FROM `orders`");
            System.out.printf(
                    "%s\t%-10s\t%s%n",
                    "ID",
                    "Data",
                    "Nome"
            );

            while (resultSet.next()) {
                Date orderDate = resultSet.getDate("order_date");
                System.out.printf(
                        "%d\t%-10s\t%s\n",
                        resultSet.getInt("id"),
                        (orderDate == null) ? "-" : orderDate.toString(),
                        resultSet.getString("ship_name")
                );
            }

        } catch (SQLException e) {
            System.out.println("Erro de SQL:" + e.getMessage());
            e.printStackTrace();
        } finally {
            if (connection != null) {
                try {
                    connection.close();
                } catch (SQLException e) {
                    System.out.println("Erro ao fechar conexão com o DB:" + e.getMessage());
                    e.printStackTrace();
                }
            }
        }
    }

}
