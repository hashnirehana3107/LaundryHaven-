function validateForm() {
  let pickupDate = document.getElementById("pickupDate").value;
  let pickupTime = document.getElementById("pickupTime").value;
  let dropOffDate = document.getElementById("dropOffDate").value;
  let dropOffTime = document.getElementById("dropOffTime").value;
  let deliveryDate = document.getElementById("deliveryDate").value;
  let addressLine1 = document.getElementById("addressLine1").value;
  let city = document.getElementById("city").value;
  let deliveryService = document.getElementById("deliveryService").value;

  if (!pickupDate || !pickupTime || !dropOffDate || !dropOffTime || !deliveryDate || !addressLine1 || !city || !deliveryService) {
      alert("Please fill out all required fields.");
      return false;
  }

  return true;
}
