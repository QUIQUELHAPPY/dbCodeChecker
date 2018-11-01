function setupComplete() {
    $.get("call/setupComplete/", function (data, status) {
        $result = JSON.parse(data)
        if (!$result["done"]) {
            return false
        } else {
            return true
        }
    });
}

function setupDatabase($conn, $admin) {
    if ($conn.length != 4) {
        return "No se han enviado las credenciales necesarias para iniciar una conexión con la base de datos"
    }

    if ($admin.length != 2) {
        return "No se han enviado las credenciales necesarias para crear un usuario de administración"
    }

    $servername = $conn[0]
    $username = $conn[1]
    $password = $conn[2]
    $database = $conn[3]

    $adminusername = $admin[0]
    $adminpassword = $admin[1]

    $.post("call/checkCredentials/", { servername: $servername, username: $username, password: $password, database: $database, adminusername: $adminusername, adminpassword: $adminpassword}).done(function (data) {
        $json=JSON.parse(data)
        if(!$json["done"]){
            setupDatabaseResponse(false, $json["error"])
        } else {
            setupDatabaseResponse(true)
        }
    });
}