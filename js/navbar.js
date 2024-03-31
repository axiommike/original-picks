$(document).ready(function(){
  // Toggle dropdowns on click
  $('.dropdown').on('click', function() {
      // Close other dropdowns
      $('.dropdown').not(this).removeClass('active');
      // Toggle the clicked dropdown
      $(this).toggleClass('active');

      // Highlight the active tab button
      $('.dropdown .dropbtn').removeClass('active-tab');
      $(this).find('.dropbtn').toggleClass('active-tab');
  });

  // Close dropdowns when clicking outside
  $(document).on('click', function(e) {
      if (!$(e.target).closest('.dropdown').length) {
          $('.dropdown').removeClass('active');
          $('.dropdown .dropbtn').removeClass('active-tab');
      }
  });
});

/* Toggle between adding and removing the "responsive" class to topnav when the user clicks on the icon */
function myFunction() {
  var x = document.getElementById("myNavbar");
  if (x.className === "navbar") {
    x.className += " responsive";
  } else {
    x.className = "navbar";
  }
}

function toggleDropdown(dropdown) {
  dropdown.classList.toggle("active");
}

document.addEventListener("DOMContentLoaded", function() {
  function sortNHLDropdown() {
    var windowWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

    if (windowWidth <= 986) {
      var nhlDropdown = document.querySelector('.navbar.responsive .dropdown-content.nhl');
      var nhlLinks = Array.from(nhlDropdown.querySelectorAll('a'));

      // Sort the links alphabetically based on their text content
      nhlLinks.sort(function(a, b) {
        return a.textContent.localeCompare(b.textContent);
      });

      // Remove existing links and append them in the sorted order
      nhlDropdown.innerHTML = '';
      nhlLinks.forEach(function(link) {
        nhlDropdown.appendChild(link);
      });
    }
  }

  // Run initially and listen for window resize events
  sortNHLDropdown();
  window.addEventListener('resize', sortNHLDropdown);
});