<?php

if ( isset($_POST["komen"])) {

      if( komen($_POST) > 0) {
        echo "<script>
              alert('Message sent successfully!');
              document.location.href = '';
              </script>"; 
      } else {
        echo "<script>
              alert('Message to send!');
              document.location.href = '';
              </script>"; 
      }
  }
?>

<div class="banner-image w-100 d-flex justify-content-center align-items-center">
      <div class="content mt-5 text-center">
        <h1 class="text-white text-3">CONTACT</h1>
        <p class="text-2 text-white">Contact us below!, we're happy to respond</p>
      </div>
</div>
<div class="contact">
    <div class="row m-5 row-cols-1 row-cols-sm-1 row-cols-md-2">
        <div class="col bg-dark">
            <div class="row m-5">
                <div class="col text-white">
                    <div><i class="fas fa-map-marker-alt"></i></div>
                    <h5>Address</h5>
                    <p>Kampus Bukit, Jimbaran, South Kuta, Badung Regency, Bali 80364</p>
                </div>
                <div class="col text-white">
                    <div><i class="fas fa-phone-alt"></i></div>
                    <h5>Phone</h5>
                    <p>+61 85 339 985 655</p>
                </div>
                <div class="col text-white">
                    <div><i class="fas fa-envelope"></i></div>
                    <h5>Email</h5>
                    <p>infintycafe@gmail.com</p>
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3942.861126562478!2d115.1594973140835!3d-8.79911519368053!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd244c13ee9d753%3A0x6c05042449b50f81!2sPoliteknik%20Negeri%20Bali!5e0!3m2!1sid!2sid!4v1642384018849!5m2!1sid!2sid" 
                  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
            </div>
        </div>
        <div class="col bg-light">
        <div class="container mt-5">
        <h1>Send Message</h1>
        <form class="row g-3" method="post">
          <div class="col-md-6">
            <label for="firstName" class="form-label">First Name</label>
            <input type="text" class="form-control" name="first_name" autocomplete="off" required>
          </div>
          <div class="col-md-6">
            <label for="lastName" class="form-label">Last Name</label>
            <input type="text" class="form-control" name="last_name" autocomplete="off" required>
          </div>
          <div class="col-md-8">
            <label for="emailInfo" class="form-label">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="email@gmail.com" autocomplete="off" required>
          </div>
          <div class="col-md-4">
            <label for="phoneNumber" class="form-label">Phone Number</label>
            <input type="text" class="form-control" name="no_telp" placeholder="+62 8888 xxxx" autocomplete="off">
          </div>
          <div class="col-md-12">
            <label for="comments" class="form-label">Comments or questions below</label>
            <textarea class="form-control" name="komentar" rows="3" autocomplete="off" required></textarea>
          </div>
          <div class="col-md-12">
            <button type="submit" name="komen" class="btn btn-dark">Submit</button>
          </div>
        </form>
    </div>

        </div>
    </div>
</div>