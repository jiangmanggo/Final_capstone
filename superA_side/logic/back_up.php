<?php
require('../../logic/db_connection.php');
$tables = array();

try {
    $result = mysqli_query($connect, "SHOW TABLES");

    if (!$result) {
        throw new Exception("Error in SHOW TABLES query: " . mysqli_error($connect));
    }

    while ($row = mysqli_fetch_row($result)) {
        $tables[] = $row[0];
    }

    $sqlScript = "-- DATABASE NAME: bcaaoms\n";

    foreach ($tables as $table) {
        $query = "SHOW CREATE TABLE `$table`"; 
        $result = mysqli_query($connect, $query);

        if (!$result) {
            throw new Exception("Error in SHOW CREATE TABLE query for table $table: " . mysqli_error($connect));
        }

        $row = mysqli_fetch_row($result);

        $sqlScript .= "\n\n" . $row[1] . ";\n\n";

        $query = "SELECT * FROM `$table`"; 
        $result = mysqli_query($connect, $query);

        if (!$result) {
            throw new Exception("Error in SELECT query for table $table: " . mysqli_error($connect));
        }

        while ($row = mysqli_fetch_assoc($result)) {
            $sqlScript .= "INSERT INTO `$table` VALUES(";
            $values = array_map(function ($value) use ($connect) {
                return "'" . mysqli_real_escape_string($connect, $value) . "'";
            }, $row);

            $sqlScript .= implode(', ', $values);
            $sqlScript .= ");\n";
        }

        $sqlScript .= "\n";
    }

    if (!empty($sqlScript)) {
        $backup_file_name = 'bcaaoms.sql';
        $fileHandler = fopen($backup_file_name, 'w+');
        $number_of_lines = fwrite($fileHandler, $sqlScript);
        fclose($fileHandler);

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($backup_file_name));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($backup_file_name));
        ob_clean();
        flush();
        readfile($backup_file_name);
        unlink($backup_file_name); 
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}

mysqli_close($connect);
?>
