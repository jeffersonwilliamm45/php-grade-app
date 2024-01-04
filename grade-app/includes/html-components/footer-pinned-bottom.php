<footer class="container-fluid fixed-bottom footer">
  <hr class="footer-horizontal-line"> 
    <p class="text-center text-body-secondary">
        &copy;<span id="year-placeholder"></span>
          <script>
            function getCurrentYear()   {  return new Date().getFullYear();  }

            function updateYear() 
            {
              var yearElement = document.getElementById('year-placeholder');
              if (yearElement) { yearElement.textContent = getCurrentYear();  }
            } 
            updateYear();
          </script> 
          bogus-app from Jfrsn Inc.
    </p>
</footer>