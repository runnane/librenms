<?php

$no_refresh = true;

if (! Auth::user()->hasGlobalAdmin()) {
    include 'includes/html/error-no-perm.inc.php';

    return;
}

$servicesform = '';
$devicesform = '';
$updated = false;
$message_break = '';
$message = '';

if (! empty($vars['addsrv'])) {
    if (Auth::user()->hasGlobalAdmin()) {
        $updated = true;

        $service_id = add_service($vars['device'], $vars['type'], strip_tags($vars['descr']), $vars['ip'], $vars['params'], $vars['ignore'] ?? 0, $vars['disabled'] ?? 0, 0, strip_tags($vars['name']));
        if ($service_id) {
            $message .= $message_break . 'Service added (' . $service_id . ')!';
            $message_break .= '<br />';
        }
    }
}
foreach (list_available_services() as $current_service) {
    $servicesform .= "<option value='$current_service'>$current_service</option>";
}

foreach (dbFetchRows('SELECT * FROM `devices` ORDER BY `hostname`') as $device) {
    $devicesform .= "<option value='" . $device['device_id'] . "'>" . htmlentities(format_hostname($device)) . '</option>';
}

if ($updated) {
    print_message('Device Settings Saved');
}

$pagetitle[] = 'Add service';

echo "<div class='row'>
    <div class='col-sm-3'>
    </div>
    <div class='col-sm-6'>";

include_once 'includes/html/print-service-add.inc.php';

echo '</div>
    </div>';
