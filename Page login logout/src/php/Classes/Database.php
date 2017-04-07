<?php
/**
 * ETML
 * Author: Ruben Dos Santos
 * Date: 28.02.2017
 * Summary:
 */

class Database
{
    function connect()
    {
        $dataBaseName = "db_nickname";
        $serverName = "localhost";
        $username = "root";
        $password = "";

        // Tries to connect to database
        try {
            $conn = new PDO("mysql:host=$serverName;dbname=$dataBaseName", $username, $password);
            // Set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            $conn = null;
            echo "$e";
        }

        return $conn;
    }

    function disconnect()
    {
        $conn = null;
    }

    function sendQuery($request)
    {
        // Connect to database
        $conn = $this->connect();

        if ($conn != null)
        {
            // Prepares the query and executes it
            $stmt = $conn->prepare($request);
            $stmt->execute();

            // Gets data from the executed query and stocks it into an array
            $stmt->setFetchMode(PDO::FETCH_NUM);
            $allInfo = $stmt->fetchAll();

            // Disconnect from the database
            $this->disconnect();

            // Returns the data
            return $allInfo;
        }
    }

    function getUsers()
    {
        // Gets all teachers
        $request = ("SELECT * FROM t_user");

        $array = $this->sendQuery($request);

        return $array;
    }
}