<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Payment Form</title>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
  }

  form {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    max-width: 400px;
    width: 100%;
    box-sizing: border-box;
  }

  label {
    display: block;
    margin-bottom: 8px;
  }

  input {
    width: 100%;
    padding: 10px;
    margin-bottom: 16px;
    box-sizing: border-box;
    border: 1px solid #ccc;
    border-radius: 4px;
  }

  button {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
  }
  .overlay {
    display: flex;
    justify-content: center;
    align-items: center;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black overlay */
    color: red;
    font-size: 24px;
    z-index: 999; /* Ensure it's above other elements */
}

/* Style for the message box */
.message-box {
    padding: 20px;
    background-color: #fff;
    text-align: center;
    border-radius: 10px;
}
</style>

</head>
<body>

  <form id="paymentForm">
    <img src="images/upi.jpg" alt="Logo" style="max-width: 50%; height: auto; margin-bottom: 20px; ">

    <label for="cardNumber">Card Number or Up_id:</label>
    <input type="text" id="cardNumber" name="cardNumber" placeholder="1234 5678 9012 3456" required>

    <label for="cardHolder">Card Holder Name:</label>
    <input type="text" id="cardHolder" name="cardHolder" placeholder="John Doe" required>

    <label for="expiryDate">Expiry Date:</label>
    <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>

    <label for="cvv">CVV:</label>
    <input type="text" id="cvv" name="cvv" placeholder="123" required>

    <button type="button" onclick="validateAndProcessPayment()">Submit Payment</button>
  </form>

  <script>
    function validateAndProcessPayment() {
      // Get input values
      var cardNumber = document.getElementById("cardNumber").value;
      var cardHolder = document.getElementById("cardHolder").value;
      var expiryDate = document.getElementById("expiryDate").value;
      var cvv = document.getElementById("cvv").value;

      // Validate UPI number (simple check for digits)
      var upiRegex = /^\d{12}$/;
      if (!upiRegex.test(cardNumber)) {
        alert("Invalid UPI number. Please enter a valid 12-digit UPI number.");
        return;
      }

      // Validate expiration date (simple check for MM/YY format)
      var expiryRegex = /^(0[1-9]|1[0-2])\/\d{2}$/;
      if (!expiryRegex.test(expiryDate)) {
        alert("Invalid expiration date. Please enter a valid MM/YY date format.");
        return;
      }

      // Validate CVV (simple check for 3 digits)
      var cvvRegex = /^\d{3}$/;
      if (!cvvRegex.test(cvv)) {
        alert("Invalid CVV. Please enter a valid 3-digit CVV.");
        return;
      }

      // If all validations pass, process the payment
      processPayment();
    }

    function processPayment() {
      // Add your payment processing logic here
      
  
    document.write("<div class='overlay'><div class='message-box'>Payment successfully processed!</div></div>");
  

      // In a real scenario, you would send the data to a server for processing
    }
  </script>

</body>
</html>
