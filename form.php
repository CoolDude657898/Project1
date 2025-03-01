<!DOCTYPE html>
<html>
    <head>
        <title>Pepsi Customer Survey</title>
        <link rel="stylesheet" href="form.css">
    </head>
    <body>
    <form action="submitted.php" method="post" class="survey">
        <label for="email">Enter your email: </label>
        <input type="email" name="email" id="email">

        <label for="password">Enter your password: </label>
        <input type="password" name="password" id="password">

        <fieldset>
            <legend>What age are you? </legend>
            <input type="radio" name="age" id="0-12" value="0-12">
            <label for="0-12">0-12 </label>
            <input type="radio" name="age" id="13-17" value="13-17">
            <label for="13-17">13-17 </label>
            <input type="radio" name="age" id="18-22" value="18-22">
            <label for="18-22">18-22 </label>
            <input type="radio" name="age" id="23-27" value="23-27">
            <label for="23-27">23-27 </label>
            <input type="radio" name="age" id="28-32" value="28-32">
            <label for="28-32">28-32 </label>
            <input type="radio" name="age" id="33-37" value="33-37">
            <label for="33-37">33-37 </label>
            <input type="radio" name="age" id="38-42" value="38-42">
            <label for="38-42">38-42 </label>
            <input type="radio" name="age" id="43-47" value="43-47">
            <label for="43-47">43-47 </label>
            <input type="radio" name="age" id="48-52" value="48-52">
            <label for="48-52">48-52 </label>
            <input type="radio" name="age" id="53-57" value="53-57">
            <label for="53-57">53-57 </label>
            <input type="radio" name="age" id="58-62" value="58-62">
            <label for="58-62">58-62 </label>
            <input type="radio" name="age" id="63-67" value="63-67">
            <label for="63-67">63-67 </label>
            <input type="radio" name="age" id="68+" value="68+">
            <label for="68+">68+ </label>
        </fieldset>

        <label for="gender">What is your gender?</label>
        <select name="gender" id="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="nonbinary">Nonbinary</option>
            <option value="genderfluid">Genderfluid</option>
            <option value="agender">Agender</option>
            <option value="other">Choose not to say/Other</option>
        </select>

        <label for="times-purchased">How many times would you estimate you have purchased a pepsi product in the last 6 months? Enter a number.</label>
        <input type="number" name="times-purchased" id="times-purchased">

        <label for="feedback">Give additional feedback here.</label>
        <textarea name="feedback" id="feedback"></textarea>

        <fieldset>
            <legend>How likely are you to reccomend Pepsi products to family and friends?</legend>
            <input type="radio" name="recommendation" id="very-unlikely" value="very-unlikely">
            <label for="very-unlikely">Very Unlikely</label>
            <input type="radio" name="recommendation" id="unlikely" value="unlikely">
            <label for="unlikely">Unlikely</label>
            <input type="radio" name="recommendation" id="unsure" value="unsure">
            <label for="unsure">Unsure</label>
            <input type="radio" name="recommendation" id="likely" value="likely">
            <label for="likely">Likely</label>
            <input type="radio" name="recommendation" id="very-likely" value="very-likely">
            <label for="very-likely">Very Likely</label>
        </fieldset>

        <button type="submit">Submit Form</button>
    </form>

    <?php
        include "validation.php";
    ?>
    </body>
</html>