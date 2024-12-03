<?php include 'header.php'; ?>
<div class="container my-5">
    <h2 class="mb-4">Upcoming Events</h2>
    <div class="list-group">
        <?php
        include 'db.php';
        $stmt = $pdo->query('SELECT * FROM events ORDER BY date ASC');
        while ($event = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
        <a href='event-details.php?id={$event['id']}' class='list-group-item list-group-item-action'>
          <h5 class='mb-1'>{$event['name']}</h5>
          <p class='mb-1'>" . htmlspecialchars($event['description']) . "</p>
          <small>Location: {$event['location']}</small>
        </a>";
        }
        ?>
    </div>
</div>
<?php include 'footer.php'; ?>
