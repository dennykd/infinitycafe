<?php
  $_pages = isset($_REQUEST['page']) ? $_REQUEST['page'] : '';
  switch ($_pages) {
    case "default":
      include('pages/default.php');
      break;
    case "aboutus":
      include('pages/aboutus.php');
      break;
    case "menu":
      include('pages/menu.php');
      break;
    case "reservation":
      include('pages/reservation.php');
      break;
    case "galeri":
      include('pages/gallery.php');
      break;
    case "contact":
      include('pages/contact.php');
      break;
    case "history":
      include('pages/history.php');
      break;
    case "batal":
      include('pages/batal-pesanan.php');
      break;
    default:
      include('pages/default.php');
  }
?>