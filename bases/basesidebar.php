<?php

$sql = "SELECT * FROM bases WHERE base_id = '{$_SESSION['base_id']}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// output data of each row
    $row = $result->fetch_assoc();

    $base_id = $row["base_id"];
    $baseno = $row["baseno"];
    $base_commander = $row["base_commander"];
    $base_location = $row["base_location"];
    $base_name = $row["base_name"];
}
?>

<nav class="sidebar sidebar-offcanvas" id="sidebar">

    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
        <h4 class="text-center">Air Force Zimbabwe
            <br> <small><?php echo $base_commander ?></small> </h4>
    </div>
    <ul class="nav">
        <li class="nav-item profile text-center">
            <img src="../airforce.png" height="150" width="200" alt="logo" /></a>
            <div class="profile-desc">
        </li>
        <li class="nav-item nav-category">
            <span class="nav-link">Navigation</span>
        </li>
        <li class="nav-item menu-items">
            <a class="nav-link" href="home.php">
              <span class="menu-icon">
                <i class="mdi mdi-speedometer"></i>
              </span>
                <span class="menu-title">Profile</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="fileshared.php">
              <span class="menu-icon">
                <i class="mdi mdi-playlist-play"></i>
              </span>
                <span class="menu-title">Files Shared</span>
            </a>
        </li>

        <li class="nav-item menu-items">
            <a class="nav-link" href="index.php">
              <span class="menu-icon">
                <i class="mdi mdi-lock-open"></i>
              </span>
                <span class="menu-title">Logout</span>
            </a>
        </li>
    </ul>
</nav>