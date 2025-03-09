<!DOCTYPE html>

<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Results</title>
    </head>

    <body>
        <?php
            function getDataFromDatabase(){
                require('dbconfig.php');
                $db = connectDB();
                $select_prepared_statement = $db->prepare("SELECT * FROM pepsi_survey;");
                $select_prepared_statement->execute();
                $rows = $select_prepared_statement->fetchAll();
                
                foreach ($rows as $row){
                    
                }
            }

            getDataFromDatabase();
        ?>
    </body>
</html>