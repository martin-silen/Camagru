<header>
    <div class="headercontainer">
      <div class="title">Camagru</a></div>
      <nav>
        <? if ($_SESSION['logged_user'] !== null): ?>
          <a id="" href="webcam.php">Photobooth</a>
          <a id="" href="mygallery.php">My Gallery</a>
          <a id="" href="gallery.php?page=1">Gallery</a>
          <a id="" href="logout.php">Logout</a>
        <? else: ?>
          <a id="" href="home.php">Log in</a>
        <? endif; ?>
      </nav>
    </div>
</header>
