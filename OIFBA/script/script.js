const header = document.querySelector('.header');

window.addEventListener('scroll', () => {
    if (window.scrollY > 400) { // When scrolled more than 50px
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});

const forms = document.querySelector(".forms"),
  pwShowHide = document.querySelectorAll(".eye-icon"),
  links = document.querySelectorAll(".link");

// Add click event listener to each eye icon for toggling password visibility
pwShowHide.forEach(eyeIcon => {
  eyeIcon.addEventListener("click", () => {
    let pwFields = eyeIcon.parentElement.parentElement.querySelectorAll(".password");

    pwFields.forEach(password => {
      if (password.type === "password") { // If password is hidden
        password.type = "text"; // Show password
        eyeIcon.classList.replace("bx-hide", "bx-show"); // Change icon to show state
        return;
      }
      password.type = "password"; // Hide password
      eyeIcon.classList.replace("bx-show", "bx-hide"); // Change icon to hide state
    });

  });
});

// Add click event listener to each link to toggle between forms
links.forEach(link => {
  link.addEventListener("click", e => {
    e.preventDefault(); // Prevent default link behavior
    forms.classList.toggle("show-signup");
  });
});


document.querySelector(".signup form").addEventListener("submit", function (e) {
  e.preventDefault(); // Prevent form submission for validation

  const password = document.getElementById("inputPassword").value.trim(); // Remove spaces
  const confirmPassword = document.getElementById("confirmPassword").value.trim(); // Remove spaces
  const errorElement = document.getElementById("passwordError");

  if (password !== confirmPassword) {
      errorElement.style.display = "block"; // Show error message
      errorElement.textContent = "Passwords do not match.";
  } else {
      errorElement.style.display = "none"; // Hide error message
      this.submit(); // Submit form if passwords match
  }
});







// // Real-time validation as the user types in the "Confirm Password" field
// document.getElementById("confirmPassword").addEventListener("input", function () {
//     const password = document.getElementById("password").value;
//     const confirmPassword = this.value;
//     const errorElement = document.getElementById("passwordError");

//     if (password !== confirmPassword) {
//         errorElement.style.display = "block";
//     } else {
//         errorElement.style.display = "none";
//     }
// });



// Fetch product list on page load
document.addEventListener("DOMContentLoaded", () => {
  fetch("/OIFBA/html/seller/manage-product.php")
      .then(response => response.text())
      .then(data => {
          document.getElementById("product-list").innerHTML = data;
      });
});

// Edit product
function editProduct(id) {
  window.location.href = `/html/edit-product.html?id=${id}`;
}

// Delete product
function deleteProduct(id) {
  if (confirm("Are you sure you want to delete this product?")) {
      fetch(`/OIFBA/html/seller/delete-product.php?id=${id}`, {
          method: "POST"
      })
      .then(response => response.text())
      .then(data => {
          alert(data);
          location.reload(); // Reload the page after deletion
      });
  }
}




//Sum the total in the cart
document.addEventListener("DOMContentLoaded", () => {
    const cartTable = document.querySelector(".cart-page table");
    const rows = cartTable.querySelectorAll("tbody tr");
    const totalCell = cartTable.querySelector("tfoot td:last-child");

    // Update subtotal for each product
    function updateSubtotal() {
        let total = 0;

        rows.forEach(row => {
            const priceElement = row.querySelector(".cart-info small");
            const quantityInput = row.querySelector("input[type='number']");
            const subtotalCell = row.querySelector("td:last-child");

            const price = parseFloat(priceElement.textContent.replace("Price: Php", "").trim());
            const quantity = parseInt(quantityInput.value, 10);
            const subtotal = price * quantity;

            subtotalCell.textContent = `Php ${subtotal.toFixed(2)}`;
            total += subtotal;
        });

        // Update total
        totalCell.textContent = `Php ${total.toFixed(2)}`;
    }

    // Add event listener to quantity inputs
    rows.forEach(row => {
        const quantityInput = row.querySelector("input[type='number']");
        quantityInput.addEventListener("input", updateSubtotal);
    });

    // Initial calculation on page load
    updateSubtotal();
});
