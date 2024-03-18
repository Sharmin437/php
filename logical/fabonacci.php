<?php
function fibonacci($n) {
    if ($n == 0) {
        return 0;
    } elseif ($n == 1) {
        return 1;
    } else {
        return fibonacci($n - 1) + fibonacci($n - 2);
    }
}

if (isset($_POST['submit'])) {
    $number = $_POST['number'];
    $fib_series = array();
    for ($i = 0; $i < $number; $i++) {
        $fib_series[] = fibonacci($i);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 100px;
        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        input, button {
            margin: 10px;
            padding: 5px;
            font-size: 16px;
        }
    </style>
    <title>Fibonacci Series Calculator</title>
</head>
<body>
    <div class="container">
        <h2>Fibonacci Series Calculator</h2>
        <form method="post" action="">
            <label for="number">Enter the number of terms:</label>
            <input type="number" name="number" required>
            <button type="submit" name="submit">Calculate Fibonacci Series</button>
        </form>
        <?php
        if (isset($fib_series)) {
            echo "<p>Fibonacci Series:</p>";
            echo "<p>";
            foreach ($fib_series as $term) {
                echo "$term ";
            }
            echo "</p>";
        }
        ?>
    </div>
</body>
</html>
