<?php
include 'controller/core/init.php';
include 'controller/includes/overall/header.php'; ?>
    <h1>Home</h1>
    <p>Just a template.</p>

<?php
if (isset($_SESSION['user_id'])) {
    echo 'Logged in.';
}
?>
<?php include 'controller/includes/overall/footer.php'; ?>
