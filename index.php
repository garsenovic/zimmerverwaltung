<?php
include 'controller/core/init.php';
include 'view/includes/overall/header.php'; ?>
    <h1>Leider...</h1>
    <p>...funktionierts nicht so wie ich wollte...</p>
    <p>...es hat mich auch erwischt (schon wieder) und ich bin mit nichts fertig geworden...</p>
    <p>...trotzdem hoffe ich, dass sich ein 2er in der gesamtwertung ausgeht...</p>
    <p>...die visualisierung (chart) hab ich mir vom simon abgeschaut...</p>

    <?php include 'view/crud/create.php'; ?>

<?php
if (isset($_SESSION['user_id'])) {
    echo 'Logged in. Hello Admin.';
    include 'view/crud/list.php';
}
?>
<?php include 'view/includes/overall/footer.php'; ?>
