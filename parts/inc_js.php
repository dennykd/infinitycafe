<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
<script>
  $(document).ready(function() {
    // $('#tabel-user').DataTable();
  });
</script>

<!-- JS NAVBAR -->
   <script type="text/javascript">
      const nav = document.querySelector('.nav-index');
      const navbrand = document.querySelector('.nav-brand');
      const navtext = document.querySelector(".text-nav");
      window.addEventListener('scroll', function () {
        if (window.pageYOffset > 50) {
          nav.classList.add('bg-dark', 'shadow');
        } else {
          nav.classList.remove('bg-dark', 'shadow');
        }
      });
    </script>

<!-- JS GALLERY -->
<script type="text/javascript">
		document.addEventListener("click",function (e){
		  if(e.target.classList.contains("gallery-item")){
		  	  const src = e.target.getAttribute("src");
		  	  document.querySelector(".modal-img").src = src;
		  	  const myModal = new bootstrap.Modal(document.getElementById('gallery-popup'));
		  	  myModal.show();
		  }
		})
</script>

<!-- JS ADMIN -->
<script type="text/javascript">
  var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>

<!-- JS TOGGLE TOP -->
<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript">
    var $backToTop = $(".topcontrol");
    $backToTop.hide();
    $(window).on('scroll', function() {
      if ($(this).scrollTop() > 100) {
        $backToTop.fadeIn();
      } else {
        $backToTop.fadeOut();
      }
    });



    $backToTop.on('click', function(e) {
      $("html, body").animate({scrollTop: 0}, 500);
    });
</script>
