<?php

$jsonFilePath = './report.json';

$jsonData = file_get_contents($jsonFilePath);

$json = json_decode($jsonData);

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new Exception(json_last_error_msg());
}

?>

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

<?php foreach ($json->categories as $categoryName => $category) : ?>
    <?php foreach ($category->items as $item) : ?>

        <?php
        switch($item->severity) {
            case 1:
                $severityIcon = 'exclamation-sign';
                $severityIconColour = '#c9302c';
                break;
            case 2:
                $severityIcon = 'remove-circle';
                $severityIconColour = '#f0ad4e';
                break;
            case 3:
                $severityIcon = 'ok-circle';
                $severityIconColour = '#5cb85c';
                break;
            default:
                $severityIcon = 'minus';
                $severityIconColour = '#000000';
                break;
        }
        ?>
                <tr class="table-danger">
                    <td><span class="glyphicon glyphicon-<?= $severityIcon; ?>" style="color: <?= $severityIconColour; ?>;"></span></td>
                    <td><?= ucwords($categoryName); ?></td>
                    <td><?= $item->name; ?></td>
                    <td><?= htmlentities($item->notes); ?></td>
                </tr>
    <?php endforeach; ?>
<?php endforeach; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>

</body>
</html>
