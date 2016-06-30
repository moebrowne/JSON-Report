<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">

    <div class="page-header">
        <h1>Security Audit
            <small><?= date('F Y'); ?></small>
        </h1>
    </div>

    <div class="progress">
        <div class="progress-bar progress-bar-danger" style="width: <?= ($stats->totalItemsBySeverity[1] / $stats->totalItems) * 100; ?>%">
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-warning" style="width: <?= ($stats->totalItemsBySeverity[2] / $stats->totalItems) * 100; ?>%">
            <span class="sr-only"></span>
        </div>
        <div class="progress-bar progress-bar-success" style="width: <?= ($stats->totalItemsBySeverity[3] / $stats->totalItems) * 100; ?>%">
            <span class="sr-only"></span>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">

            <table class="table">
                <thead>
                <tr>
                    <th style="width: 50px;">&nbsp;</th>
                    <th style="width: 150px;">Category</th>
                    <th>Issue</th>
                    <th>Notes</th>
                </tr>
                </thead>
                <tbody>
                <?= $itemRowsHTML; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>