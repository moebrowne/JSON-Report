<?php

$jsonFilePath = './report.json';

$jsonData = file_get_contents($jsonFilePath);

$json = json_decode($jsonData);

if (json_last_error() !== JSON_ERROR_NONE) {
    throw new Exception(json_last_error_msg());
}

$stats = new stdClass();
$stats->totalItems = 0;
$stats->totalItemsBySeverity = [];

foreach ($json->categories as $categoryName => $category) {
    foreach ($category->items as $item) {

        $stats->totalItems++;
        $stats->totalItemsBySeverity[$item->severity]++;

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

        $categoryName = ucwords($categoryName);

        $itemToolTip = (empty($item->description) === false) ? ' <span class="glyphicon glyphicon-question-sign" data-toggle="tooltip" title="'.$item->description.'"></span>':'';
        $severityText = (empty($item->severity) === false) ? '<span class="glyphicon glyphicon-'.$severityIcon.'" style="color: '.$severityIconColour.';"></span>':'<small>N/A</small>';

        $itemRowsHTML .= <<<HTML
        <tr class="table-danger">
            <td data-sort="{$item->severity}">{$severityText}</td>
            <td>{$categoryName}</td>
            <td>
                {$item->name}
                {$itemToolTip}
            </td>
            <td>{$item->notes}</td>
        </tr>
HTML;
    }
}

require 'template.php';
