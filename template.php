<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Report</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="node_modules/datatables/media/css/jquery.dataTables.min.css">
    <script src="node_modules/jquery/dist/jquery.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/datatables/media/js/jquery.dataTables.min.js"></script>
</head>
<body>

<div class="container">

    <div class="page-header">
        <h1><?= $json->title; ?>
            <small><?= date('F Y', $json->date); ?></small>
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

            <table id="report" class="table">
                <thead>
                <tr>
                    <th style="width: 50px;">&nbsp;</th>
                    <th style="width: 150px;">Category</th>
                    <th data-orderable="false">Issue</th>
                    <th data-orderable="false">Notes</th>
                </tr>
                </thead>
                <tbody>
                <?= $itemRowsHTML; ?>
                </tbody>
            </table>
            <script>
                $(document).ready(function() {
                    var table = $('#report').DataTable({
                        "paging":   false,
                        "filter":   false,
                        "info":   false
                    });
                });
            </script>

        </div>
    </div>
</div>

</body>
</html>