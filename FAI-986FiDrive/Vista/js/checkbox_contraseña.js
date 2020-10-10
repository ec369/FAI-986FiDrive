
      function showContent() {
        element = document.getElementById("content");
        element2 = document.getElementById("content2");

        check = document.getElementById("check");
        if (check.checked) {
          element.style.display = 'block';
          element2.style.display = 'block';
        } else {
          element.style.display = 'none';
          element2.style.display = 'none';
        }
      }
