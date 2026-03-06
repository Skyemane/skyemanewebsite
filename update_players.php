<?php

$secret_key = "SECRET_KEY_123"; // Must match the API_KEY in Lua


$data = json_decode(file_get_contents('php://input'), true);


if ($data && $data['key'] === $secret_key) {

    // Save the online count to a small local file

    file_put_contents('online_players.json', json_encode([

        'online' => $data['online'],

        'last_update' => time()

    ]));

    echo "Success";

} else {

    http_response_code(403);

    echo "Invalid Key";

}

?>
