<?php
global $pdo;
include 'db.php';
include 'header.php';

$id = $_GET['id'] ?? null;
if (!$id) {
    die('Event not found.');
}

$stmt = $pdo->prepare('SELECT * FROM events WHERE id = :id');
$stmt->execute(['id' => $id]);
$event = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$event) {
    die('Event not found.');
}
?>
<div class="container my-5">
    <h2><?php echo htmlspecialchars($event['name']); ?></h2>
    <p>Date: <?php echo $event['date']; ?></p>
    <p>Time: <?php echo $event['time']; ?></p>
    <p>Location: <?php echo htmlspecialchars($event['location']); ?></p>
    <p>Description: <?php echo htmlspecialchars($event['description']); ?></p>
    <a href="register.php?id=<?php echo $event['id']; ?>" class="btn btn-primary">Register Now</a>
</div>
<?php include 'footer.php'; ?>