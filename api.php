<?php
header('Content-Type: application/json');
$host = 'localhost';
$dbname = 'medicare_db';
$username = 'root';
$password = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(["error" => "Database connection failed: " . $e->getMessage()]);
    exit;
}

$action = $_GET['action'] ?? '';

switch ($action) {
    case 'get_doctors':
        $stmt = $pdo->query("SELECT * FROM doctors");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'get_appointments':
        $stmt = $pdo->query("SELECT * FROM appointments ORDER BY appointment_date DESC");
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
        break;

    case 'book_appointment':
        $data = json_decode(file_get_contents('php://input'), true);
        if (!$data) {
            echo json_encode(["success" => false]);
            exit;
        }
        $id = "APT-" . rand(1000, 9999);
        $sql = "INSERT INTO appointments (id, patient_name, phone, email, age_gender, department, doctor, appointment_date, time_slot, symptoms, diagnosis, status) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 'Pending')";
        $stmt = $pdo->prepare($sql);
        $success = $stmt->execute([
            $id,
            $data['patientName'],
            $data['phone'],
            $data['email'],
            $data['ageGender'],
            $data['department'],
            $data['doctor'],
            $data['date'],
            $data['time'],
            $data['symptoms'],
            'Pending consultation and examination.'
        ]);
        echo json_encode(["success" => $success, "id" => $id]);
        break;

    case 'update_status':
        $data = json_decode(file_get_contents('php://input'), true);
        $id = $data['id'] ?? '';
        $status = $data['status'] ?? '';
        $diagnosis = ($status === 'Completed') ? "Consulted successfully. Treatment plan and prescription provided." : "Pending consultation and examination.";

        $stmt = $pdo->prepare("UPDATE appointments SET status = ?, diagnosis = ? WHERE id = ?");
        $success = $stmt->execute([$status, $diagnosis, $id]);
        echo json_encode(["success" => $success]);
        break;

    default:
        echo json_encode(["error" => "Invalid endpoint"]);
        break;
}
?>