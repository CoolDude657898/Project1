<!DOCTYPE html>

<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Data Results</title>
    </head>

    <body>
        <?php
            function displayGenderTotals($gender_array){
                $male_total = 0;
                $female_total = 0;
                $nonbinary_total = 0;
                $genderfluid_total = 0;
                $agender_total = 0;
                $other_total = 0;

                foreach($gender_array as $gender_chosen){
                    if($gender_chosen == "male"){
                        $male_total++;
                    }
                    if($gender_chosen == "female"){
                        $female_total++;
                    }
                    if($gender_chosen == "nonbinary"){
                        $nonbinary_total++;
                    }
                    if($gender_chosen == "genderfluid"){
                        $genderfluid_total++;
                    }
                    if($gender_chosen == "agender"){
                        $agender_total++;
                    }
                    if($gender_chosen == "other"){
                        $other_total++;
                    }   
                }
                
                echo "<p>Gender totals:</p>\n";
                echo "<p>Male: $male_total</p>\n";
                echo "<p>Female: $female_total</p>\n";
                echo "<p>Nonbinary: $nonbinary_total</p>\n";
                echo "<p>Genderfluid: $genderfluid_total</p>\n";
                echo "<p>Agender: $agender_total</p>\n";
                echo "<p>Other: $other_total</p>\n";
            }

            function displayAgeTotals($age_array){
                $age_group_totals_array = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

                foreach($age_array as $age_chosen){
                    switch($age_chosen){
                        case "0-12": $age_group_totals_array[0]++; break;
                        case "13-17": $age_group_totals_array[1]++; break;
                        case "18-22": $age_group_totals_array[2]++; break;
                        case "23-27": $age_group_totals_array[3]++; break;
                        case "28-32": $age_group_totals_array[4]++; break;
                        case "33-37": $age_group_totals_array[5]++; break;
                        case "38-42": $age_group_totals_array[6]++; break;
                        case "43-47": $age_group_totals_array[7]++; break;
                        case "48-52": $age_group_totals_array[8]++; break;
                        case "53-57": $age_group_totals_array[9]++; break;
                        case "58-62": $age_group_totals_array[10]++; break; 
                        case "63-67": $age_group_totals_array[11]++; break;
                        case "68+": $age_group_totals_array[12]++; break;
                    }
                }

                echo "<p>Age Group Totals:</p>\n";

                for($i = 0; $i < 13; $i++){
                    switch($i){
                        case 0: echo "<p>0-12: $age_group_totals_array[0]</p>\n"; break;
                        case 1: echo "<p>13-17: $age_group_totals_array[1]</p>\n"; break;
                        case 2: echo "<p>18-22: $age_group_totals_array[2]</p>\n"; break;
                        case 3: echo "<p>23-27: $age_group_totals_array[3]</p>\n"; break;
                        case 4: echo "<p>28-32: $age_group_totals_array[4]</p>\n"; break;
                        case 5: echo "<p>33-37: $age_group_totals_array[5]</p>\n"; break;
                        case 6: echo "<p>38-42: $age_group_totals_array[6]</p>\n"; break;
                        case 7: echo "<p>43-47: $age_group_totals_array[7]</p>\n"; break;
                        case 8: echo "<p>48-52: $age_group_totals_array[8]</p>\n"; break;
                        case 9: echo "<p>53-57: $age_group_totals_array[9]</p>\n"; break;
                        case 10: echo "<p>58-62: $age_group_totals_array[10]</p>\n"; break;
                        case 11: echo "<p>63-67: $age_group_totals_array[11]</p>\n"; break;
                        case 12: echo "<p>68+: $age_group_totals_array[12]</p>\n"; break;
                    }
                }
            }

            function displayAverageTimesPurchased($times_purchased_array){
                $total_times_purchased = 0;
                $amount_of_data = count($times_purchased_array);

                foreach($times_purchased_array as $times_purchased){
                    if($times_purchased < 100){
                        $total_times_purchased = $total_times_purchased + $times_purchased;
                    }
                }

                $average_times_purchased = $total_times_purchased / $amount_of_data;
                echo "<p>Average times purchased within last 6 months: $average_times_purchased</p>";
            }

            function displayRecommendationTotals($recommendation_array){
                echo "<p>Recommendation totals:\n";
                $recommendation_totals_array = array(0, 0, 0, 0, 0);

                foreach($recommendation_array as $recommendation){
                    switch($recommendation){
                        case "very-unlikely": $recommendation_totals_array[0]++; break;
                        case "unlikely": $recommendation_totals_array[1]++; break;
                        case "unsure": $recommendation_totals_array[2]++; break;
                        case "likely": $recommendation_totals_array[3]++; break;
                        case "very-likely": $recommendation_totals_array[4]++; break;
                    }
                }

                for($i = 0; $i < 5; $i++){
                    switch($i){
                        case 0: echo "<p>Very unlikely: $recommendation_totals_array[0]\n</p>"; break;
                        case 1: echo "<p>Unlikely: $recommendation_totals_array[1]\n</p>"; break;
                        case 2: echo "<p>Unsure: $recommendation_totals_array[2]\n</p>"; break;
                        case 3: echo "<p>Likely: $recommendation_totals_array[3]\n</p>"; break;
                        case 4: echo "<p>Very likely: $recommendation_totals_array[4]\n</p>"; break;
                    }
                }
            }

            function displayRandomFeedback($feedback_array){
                if(count($feedback_array) <= 3){
                    echo "<p>Additional feedback: </p>";
                    foreach($feedback_array as $feedback){
                        echo "<p>$feedback\n</p>";
                    }
                } else {
                    echo "<p>Some additional feedback given: </p>";
                    $random_feedback_indices = array_rand($feedback_array, 3);
                    $feedback_one = $feedback_array[$random_feedback_indices[0]];
                    $feedback_two = $feedback_array[$random_feedback_indices[1]];
                    $feedback_three = $feedback_array[$random_feedback_indices[2]];
                    echo "<p>$feedback_one\n</p>";
                    echo "<p>$feedback_two\n</p>";
                    echo "<p>$feedback_three\n</p>";
                }
            }

            function displayRandomEmails($email_array){
                if(count($email_array) <= 3){
                    echo "<p>Emails used in survey: </p>";
                    foreach($email_array as $email){
                        echo "<p>$email\n</p>";
                    }
                } else {
                    echo "<p>Some of the emails used in the survey: </p>";
                    $random_email_indices = array_rand($email_array, 3);
                    $email_one = $email_array[$random_email_indices[0]];
                    $email_two = $email_array[$random_email_indices[1]];
                    $email_three = $email_array[$random_email_indices[2]];
                    echo "<p>$email_one\n</p>";
                    echo "<p>$email_two\n</p>";
                    echo "<p>$email_three\n</p>";
                }
            }

            function displayData(){
                require('dbconfig.php');
                $db = connectDB();
                $select_prepared_statement = $db->prepare("SELECT * FROM pepsi_survey;");
                $select_prepared_statement->execute();
                $rows = $select_prepared_statement->fetchAll();

                $email_array = array();
                $age_array = array();
                $gender_array = array();
                $times_purchased_array = array();
                $feedback_array = array();
                $recommendation_array = array();
                
                foreach ($rows as $row){
                    if($row["email"] != NULL){
                        array_push($email_array, $row["email"]);
                    }

                    if($row["age"] != NULL){
                        array_push($age_array, $row["age"]);
                    }

                    if($row["gender"] != NULL){
                        array_push($gender_array, $row["gender"]);
                    }

                    if($row["times_purchased" != NULL]){
                        array_push($times_purchased_array, $row["times_purchased"]);
                    }

                    if($row["feedback"] != NULL){
                        array_push($feedback_array, $row["feedback"]);
                    }

                    if($row["recommendation"] != NULL){
                        array_push($recommendation_array, $row["recommendation"]);
                    }
                }

                displayAgeTotals($age_array);
                displayGenderTotals($gender_array);
                displayAverageTimesPurchased($times_purchased_array);
                displayRecommendationTotals($recommendation_array);
                displayRandomFeedback($feedback_array);
                displayRandomEmails($email_array);
            }

            displayData();
        ?>
    </body>
</html>