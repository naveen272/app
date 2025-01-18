<?php
// Initialize the session
session_start();

// Check if the user is logged in, if not then redirect him to the login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index");
    exit;
}

// Handle search query and date range
if (isset($_POST['searchbtn'])) {
    $_SESSION['search_query'] = $_POST['search'];
    $_SESSION['start_date'] = $_POST['start_date'];
    $_SESSION['end_date'] = $_POST['end_date'];
} elseif (isset($_POST['clearbtn'])) {
    unset($_SESSION['search_query']);
    unset($_SESSION['start_date']);
    unset($_SESSION['end_date']);
}

$search_query = isset($_SESSION['search_query']) ? $_SESSION['search_query'] : '';
$start_date = isset($_SESSION['start_date']) ? $_SESSION['start_date'] : '';
$end_date = isset($_SESSION['end_date']) ? $_SESSION['end_date'] : '';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        .container {
            padding: 2px;
            line-height: 1.42857143;
            vertical-align: top;
            border-top: 1px solid;
            color: #333;
        }
        .btn {
            display: inline-block;
            padding: 5px 15px;
            margin-bottom: 0;
            font-size: 100%;
            font-weight: normal;
            line-height: 1.5;
            border: 1% solid transparent;
            border-radius: 150px;
        }
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 11px;
            line-height: 1.42857143;
            color: #333;
            background-color: #fff;
        }
        body {
            font: 12px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="bg-img">
    <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Welcome.</h1>
    <?php $today = date("d/m/Y"); echo $today; ?>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-26">
                <form method="post">
                    <label>Search</label>
                    <input type="text" class="btn btn-default" id="search" name="search"
                           value="<?php echo htmlspecialchars($search_query); ?>">

                    <label>Start Date</label>
                    <input type="date" class="btn btn-default" id="start_date" name="start_date"
                           value="<?php echo isset($_SESSION['start_date']) ? htmlspecialchars($_SESSION['start_date']) : ''; ?>">

                    <label>End Date</label>
                    <input type="date" class="btn btn-default" id="end_date" name="end_date"
                           value="<?php echo isset($_SESSION['end_date']) ? htmlspecialchars($_SESSION['end_date']) : ''; ?>">

                    <input class="btn btn-success" type="submit" name="searchbtn" value="Search">
                    <button class="btn btn-warning" type="submit" name="clearbtn">Clear</button>
                    <a href="welcome.php" class="btn btn-primary">Cancel</a>
                </form>
                <?php
                // Include config file
                require_once "config.php";

                if (!empty($search_query) || !empty($start_date) || !empty($end_date)) {
                    $sql_conditions = [];
                    if (!empty($search_query)) {
                        $sql_conditions[] = "(name LIKE '%$search_query%' OR 
                                              amount LIKE '%$search_query%' OR 
                                              uname LIKE '%$search_query%' OR 
                                              file_path LIKE '%$search_query%' OR 
                                              date LIKE '%$search_query%')";
                    }
                    if (!empty($start_date)) {
                        $sql_conditions[] = "date >= '$start_date'";
                    }
                    if (!empty($end_date)) {
                        $sql_conditions[] = "date <= '$end_date'";
                    }

                    $sql_condition_string = implode(" AND ", $sql_conditions);

                    if ($_SESSION["role"] == "admin") {
                        $sql = "SELECT * FROM employees WHERE $sql_condition_string";
                    } else {
                        $sql = "SELECT * FROM employees WHERE uname='" . $_SESSION["username"] . "' AND $sql_condition_string";
                    }

                    if ($result = mysqli_query($link, $sql)) {
                        if (mysqli_num_rows($result) > 0) {
                            echo '<table class="table table-bordered table-striped">';
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>SrNo</th>";
                            echo "<th>Name</th>";
                            echo "<th>Date</th>";
                            echo "<th>Amount</th>";
                            echo "<th>Created By</th>";
                            echo "<th>Action</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            $i = 1;
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $row['name'] . "</td>";
                                echo "<td>" . $row['date'] . "</td>";
                                echo "<td>" . $row['amount'] . "</td>";
                                echo "<td>" . $row['uname'] . "</td>";
                                echo "<td>";
                                echo "<a href='read-search.php?id=" . $row['id'] . "' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                echo "<a href='searchupdate.php?id=" . $row['id'] . "' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                echo "<a href='delete-search.php?id=" . $row['id'] . "' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                echo "<a href='generate_pdf.php?id=" . $row['id'] . "' title='Download' data-toggle='tooltip'><span class='glyphicon glyphicon-download'></span></a>";
                                echo "</td>";
                                echo "</tr>";
                                $i++;
                            }
                            echo "</tbody>";
                            echo "</table>";
                            mysqli_free_result($result);
                        } else {
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }

                // Close connection
                mysqli_close($link);
                ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
