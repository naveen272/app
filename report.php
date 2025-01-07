<html>
<head>
    <title>Export Data</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="css/jquery-ui.js"></script>
    <link rel="stylesheet" href="css/jquery-ui.css">

    <style>
        /* Base Styling */
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        /* Modal and Content */
        .modal-dialog {
            max-width: 100%;
            margin: 0 15px;
        }

        .modal-content {
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            padding: 30px;
        }

        .modal-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            padding: 20px 15px;
        }

        .modal-header h4 {
            font-size: 2rem;
            margin: 0;
        }

        /* Form Controls */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group input[type="date"] {
            width: 100%;
            padding: 20px;
            font-size: 1.8rem; /* Increased font size for better readability */
            border: 1px solid #ccc;
            border-radius: 8px;
            background-color: #f1f1f1;
            margin-bottom: 20px;
        }

        .form-group input[type="submit"] {
            width: 100%;
            padding: 16px;
            font-size: 1.6rem;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group input[type="submit"]:hover {
            background-color: #218838;
        }

        .form-group a {
            display: block;
            text-align: center;
            font-size: 1.6rem;
            color: #007bff;
            text-decoration: none;
            margin-top: 20px;
        }

        .form-group a:hover {
            text-decoration: underline;
        }

        /* Mobile First Design */
        @media (max-width: 768px) {
            .modal-content {
                padding: 25px;
            }

            .modal-header h4 {
                font-size: 1.8rem;
            }

            .form-group input[type="submit"] {
                font-size: 1.5rem;
                padding: 14px;
            }

            .form-group input[type="date"] {
                font-size: 1.7rem; /* Larger font size for date inputs on mobile */
                padding: 18px; /* Adjusted padding for touch-friendly size */
            }

            .form-group a {
                font-size: 1.5rem;
            }
        }

        /* Very Small Screen Adjustments */
        @media (max-width: 480px) {
            .modal-dialog {
                margin: 10px;
                max-width: 100%;
            }

            .modal-header h4 {
                font-size: 1.6rem;
            }

            .form-group input[type="submit"] {
                font-size: 1.4rem;
                padding: 12px;
            }

            .form-group input[type="date"] {
                font-size: 1.6rem; /* Ensuring the date input is big enough on very small screens */
                padding: 16px; /* Larger padding for better touch targets */
            }

            .form-group a {
                font-size: 1.4rem;
            }
        }

    </style>
</head>

<body>
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4>Export Data</h4>
            </div>
            <div class="modal-body">
                <form method="post" action="download.php">
                    <div class="form-group">
                        <!-- Datepicker -->
                        <input type="date" class="datepicker" name="from_date" id="from_date" placeholder="From date" readonly>
                    </div>
                    <div class="form-group">
                        <input type="date" class="datepicker" name="to_date" id="to_date" placeholder="To date" readonly>
                    </div>
                    <div class="form-group">
                        <!-- Export button -->
                        <input type="submit" value="Export" name="Export">
                    </div>
                    <div class="form-group">
                        <a href="welcome.php">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            // From datepicker
            $("#from_date").datepicker({
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() + 1);
                    $("#to_date").datepicker("option", "minDate", dt);
                }
            });

            // To datepicker
            $("#to_date").datepicker({
                dateFormat: 'yy-mm-dd',
                changeYear: true,
                onSelect: function(selected) {
                    var dt = new Date(selected);
                    dt.setDate(dt.getDate() - 1);
                    $("#from_date").datepicker("option", "maxDate", dt);
                }
            });
        });
    </script>
</body>
</html>
