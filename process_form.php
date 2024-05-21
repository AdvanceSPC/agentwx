<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar los datos del formulario
    $nombre = htmlspecialchars($_POST['nombre']);
    $apellido = htmlspecialchars($_POST['apellido']);
    $correo = htmlspecialchars($_POST['correo']);
    $telefono = htmlspecialchars($_POST['telefono']);

    // Obtener la fecha y hora actual en el formato requerido
    $fecha_actual = date("YmdHis");

    // Formatear los datos para el payload de la API
    $payload = json_encode([[
        "customer_name" => $nombre,
        "customer_last_name" => $apellido,
        "id_type" => "CC",
        "customer_id" => "1721" . $fecha_actual,
        "age" => "",
        "gender" => "",
        "country" => "",
        "state" => "",
        "city" => "",
        "zone" => "",
        "address" => "",
        "opt1" => "",
        "opt2" => "",
        "opt3" => "",
        "opt4" => "",
        "opt5" => "",
        "opt6" => "",
        "opt7" => "",
        "opt8" => "",
        "opt9" => "",
        "opt10" => "",
        "opt11" => "",
        "opt12" => "",
        "tel1" => "9" . $telefono,
        "tel2" => "",
        "tel3" => "",
        "tel4" => "",
        "tel5" => "",
        "tel6" => "",
        "tel7" => "",
        "tel8" => "",
        "tel9" => "",
        "tel10" => "",
        "tel_extra" => "",
        "email" => "$correo",
        "recall_date" => "",
        "recall_telephone" => ""
    ]]);

    // Configurar los encabezados de la solicitud
    $headers = [
        'wolkvox-token: 7b69645f6469737472697d2d3230323430353231313032313232',
        'Content-Type: application/json'
    ];

    // URL de la API
    $url = "https://wv0100.wolkvox.com/api/v2/campaign.php?api=add_record&type_campaign=predictive&campaign_id=5549&campaign_status=start";

    // Inicializar cURL
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);
    curl_close($ch);

    // Mostrar la respuesta
    echo $response;
}
?>
