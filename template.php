<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
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