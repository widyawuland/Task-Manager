<?php
//print_r($dataku);
//echo ($dataku->title);
//echo ($dataku);
//print($dataku);

// Contoh objek data pengguna
$dataku = (object) [
    "id" => 3,
    "name" => "Widyaa",
    "email" => "widyaa@gmail.com",
    "email_verified_at" => null,
    "created_at" => "2024-10-14T07:01:47.000000Z",
    "updated_at" => "2024-10-14T07:01:47.000000Z"
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Pengguna</title>
    <!-- Tambahkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .profile-card {
            max-width: 2000px; /* Meningkatkan lebar kotak */
            border-radius: 20px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            background-color: #f8f9fa;
            padding: 40px;
            margin-top: 50px;
            margin-bottom: 50px;
        }
        .profile-card h2 {
            margin-bottom: 30px;
        }
    </style>
</head>
<body>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="profile-card">
        <h2 class="text-center">Profil Pengguna</h2>

        <!-- Tampilkan data pengguna dalam format yang rapi -->
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>ID:</strong></div>
            <div class="col-8"><?php echo htmlspecialchars($dataku->id); ?></div>
        </div>
        
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>Nama:</strong></div>
            <div class="col-8"><?php echo htmlspecialchars($dataku->name); ?></div>
        </div>
        
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>Email:</strong></div>
            <div class="col-8"><?php echo htmlspecialchars($dataku->email); ?></div>
        </div>
        
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>Verifikasi Email:</strong></div>
            <div class="col-8">
                <?php echo $dataku->email_verified_at ? "Sudah diverifikasi" : "Belum diverifikasi"; ?>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>Dibuat pada:</strong></div>
            <div class="col-8"><?php echo htmlspecialchars(date("d-m-Y H:i:s", strtotime($dataku->created_at))); ?></div>
        </div>
        
        <div class="row mb-3">
            <div class="col-4 text-end"><strong>Diperbarui pada:</strong></div>
            <div class="col-8"><?php echo htmlspecialchars(date("d-m-Y H:i:s", strtotime($dataku->updated_at))); ?></div>
        </div>
    </div>
</div>

<!-- Tambahkan Bootstrap JS (opsional untuk interaktivitas) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
