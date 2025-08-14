const items_container = document.getElementById("top-card");

setInterval(() => {
  const xhr = new XMLHttpRequest();
  xhr.open("POST", "php/fetch-a1.php", true);

  xhr.onload = () => {
    if (xhr.status === 200) {
      /* items_container.innerHTML = xhr.responseText; */
    }
  };

  xhr.onerror = () => {
    console.error("Request failed");
  };

  xhr.send();
}, 2000); // refresh every 2 seconds
