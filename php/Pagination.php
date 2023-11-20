<div class="pagination">
    <?php
     if ($current_page > 3) {
          $first_page = 1;?>
    <button class="page-item side"><a href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">Đầu</a></button>
    <?php }
     if ($current_page > 1) {
          $prev_page = $current_page - 1; ?>
    <button class="page-item side"><a href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">Trước</a></button>
    <?php } ?>

    <?php for ($num = 1; $num <= $total_page; $num++){ ?>
    <?php if($num != $current_page) {?>
    <button class="page-item"><a href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a></button>
    <?php } else { ?>
    <button class="page-item current"><strong><?= $num ?></strong></button>
    <?php } ?>
    <?php } ?>
    <?php 
     if ($current_page < $total_page - 1) {
          $next_page = $current_page + 1;?>
    <button class="page-item side"><a href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">Sau</a></button>
    <?php } 
     if($current_page < $total_page - 3) {
          $end_page = $total_page; ?>
    <button class="page-item side"><a href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Cuối</a></button>
    <?php } ?>
</div>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/pagination.css">
</head>

<body>

</body>

</html>