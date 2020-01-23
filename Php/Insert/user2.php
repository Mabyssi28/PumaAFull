<?php

require_once '../createsend-php-master/csrest_subscribers.php';
require_once '../createsend-php-master/csrest_transactional_smartemail.php';

$auth = array('api_key' => '09b9Jut9CTu2PbKqUXNuWXuGslGbrR1+CodQiy1kucMN12aOg/Xs4EjDVZKn3LmmvpcVqWzahpwIQ0sNH/7UvgpErEFM3v9wRN5Z0Go5PSi50hi+ochDPHg0/CCvAT/PnKX4jOeaNWfZAwsrYTfBlg==');
$wrap = new CS_REST_Subscribers('2060fdb70331950fca305d0267e22765', $auth);
$result = $wrap->add(array(
    'EmailAddress' => $_POST["cm-guiudj-guiudj"],
    'Name' => $_POST["cm-name"] . " " . $_POST["cm-f-yuhdyky"],
    'CustomFields' => array(
        array(
            'Key' => 'fieldyuhdykt',
            'Value' => $_POST["cm-f-yuhdykt"]
        )
    ),
    'ConsentToTrack' => 'yes',
    'Resubscribe' => true
));

// echo "Result of POST /api/v3.1/subscribers/{list id}.{format}\n<br />";
if($result->was_successful()) {
    # Authenticate with your API key
    $auth = array('api_key' => '09b9Jut9CTu2PbKqUXNuWXuGslGbrR1+CodQiy1kucMN12aOg/Xs4EjDVZKn3LmmvpcVqWzahpwIQ0sNH/7UvgpErEFM3v9wRN5Z0Go5PSi50hi+ochDPHg0/CCvAT/PnKX4jOeaNWfZAwsrYTfBlg==');

    # The unique identifier for this smart email
    $smart_email_id = 'd4aac871-9c46-4d4d-9b11-5226cf3754ff';

    # Create a new mailer and define your message
    $wrap = new CS_REST_Transactional_SmartEmail($smart_email_id, $auth);
    $message = array(
        "To" => 'Intaface Services <nabila.diaz@ddblatinapr.com>',
        "Data" => array(
            'x-apple-data-detectors' => 'x-apple-data-detectorsTestValue',
            'style*="font-size:1px"' => 'style*="font-size:1px"TestValue',
            'expiry_date' => 'expiry_dateTestValue',
            'referal_code' => 'referal_codeTestValue',
        ),
    );

    # Add consent to track value
    $consent_to_track = 'no'; # Valid: 'yes', 'no', 'unchanged'

    # Send the message and save the response
    $result = $wrap->send($message, $consent_to_track);

    header('Location: ../../thank_you.php?C=' . $_POST["code_send"]);
} else {
    echo 'Failed with code '.$result->http_status_code."\n<br /><pre>";
    var_dump($result->response);
    echo '</pre>';
}

?>