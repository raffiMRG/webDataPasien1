<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dropdown Autocomplete</title>
  <style>
    .autocomplete {
      position: relative;
      display: inline-block;
      width: 100%;
    }

    /* Style input field */
    input {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
    }

    /* Style dropdown container */
    .autocomplete-items {
      position: absolute;
      border: 1px solid #d4d4d4;
      border-bottom: none;
      border-top: none;
      z-index: 99;
      top: 100%;
      left: 0;
      right: 0;
    }

    /* Dropdown item */
    .autocomplete-items div {
      padding: 10px;
      cursor: pointer;
      background-color: #fff;
      border-bottom: 1px solid #d4d4d4;
    }

    /* Hover effect */
    .autocomplete-items div:hover {
      background-color: #e9e9e9;
    }

    /* Highlight selected item */
    .autocomplete-active {
      background-color: #007BFF !important;
      color: #ffffff;
    }
  </style>
</head>

<body>

  <h2>Dropdown Autocomplete Input</h2>

  <form action="/your_server_side_script.php" method="post" autocomplete="off">
    <!-- Autocomplete wrapper -->
    <div class="autocomplete">
      <label for="myInput">Search:</label>
      <input id="myInput" type="text" name="myCountry" placeholder="Start typing...">
    </div>
    <input type="submit">
  </form>

  <script>
    // Daftar data yang akan digunakan dalam dropdown
    const countries = ["Afghanistan", "Albania", "Algeria", "Andorra", "Angola", "Argentina",
      "Armenia", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain",
      "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin",
      "Bhutan", "Bolivia", "Bosnia", "Botswana", "Brazil", "Brunei",
      "Bulgaria", "Burkina Faso", "Burundi"
    ];

    function autocomplete(input, array) {
      let currentFocus;

      input.addEventListener("input", function() {
        let listDiv, itemDiv, i, val = this.value;

        // Tutup semua dropdown terbuka sebelumnya
        closeAllLists();
        if (!val) {
          return false;
        }
        currentFocus = -1;

        // Buat div baru untuk menampung daftar dropdown
        listDiv = document.createElement("div");
        listDiv.setAttribute("id", this.id + "autocomplete-list");
        listDiv.setAttribute("class", "autocomplete-items");
        this.parentNode.appendChild(listDiv);

        // Looping melalui array dan buat item untuk setiap match
        for (i = 0; i < array.length; i++) {
          if (array[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
            itemDiv = document.createElement("div");

            // Highlight matching bagian dari string
            itemDiv.innerHTML = "<strong>" + array[i].substr(0, val.length) + "</strong>";
            itemDiv.innerHTML += array[i].substr(val.length);

            // Masukkan nilai tersembunyi
            itemDiv.innerHTML += "<input type='hidden' value='" + array[i] + "'>";

            // Saat item diklik, masukkan nilai ke input field
            itemDiv.addEventListener("click", function() {
              input.value = this.getElementsByTagName("input")[0].value;
              closeAllLists();
            });

            listDiv.appendChild(itemDiv);
          }
        }
      });

      // Event listener untuk navigasi keyboard
      input.addEventListener("keydown", function(e) {
        let list = document.getElementById(this.id + "autocomplete-list");
        if (list) list = list.getElementsByTagName("div");

        if (e.keyCode == 40) {
          currentFocus++;
          addActive(list);
        } else if (e.keyCode == 38) { // Up
          currentFocus--;
          addActive(list);
        } else if (e.keyCode == 13) { // Enter
          e.preventDefault();
          if (currentFocus > -1) {
            if (list) list[currentFocus].click();
          }
        }
      });

      function addActive(list) {
        if (!list) return false;
        removeActive(list);
        if (currentFocus >= list.length) currentFocus = 0;
        if (currentFocus < 0) currentFocus = (list.length - 1);
        list[currentFocus].classList.add("autocomplete-active");
      }

      function removeActive(list) {
        for (let i = 0; i < list.length; i++) {
          list[i].classList.remove("autocomplete-active");
        }
      }

      function closeAllLists(elmnt) {
        let items = document.getElementsByClassName("autocomplete-items");
        for (let i = 0; i < items.length; i++) {
          if (elmnt != items[i] && elmnt != input) {
            items[i].parentNode.removeChild(items[i]);
          }
        }
      }

      document.addEventListener("click", function(e) {
        closeAllLists(e.target);
      });
    }

    // Panggil fungsi autocomplete
    autocomplete(document.getElementById("myInput"), countries);
  </script>

</body>

</html>