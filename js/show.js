document.addEventListener("DOMContentLoaded", function(){
  let showButton = document.getElementById("show");
  let container = document.getElementById("container");
  let result = document.getElementById("result");
  const queryString = window.location.search;
  const urlParams = new URLSearchParams(queryString);
  showButton.addEventListener("click", function(e){
    e.preventDefault();
    let formData = new FormData(document.getElementById("form"));
    const xhr = new XMLHttpRequest();
    formData.append("id", urlParams.get("id"));
    formData.append("key", urlParams.get("key"));
    xhr.open("post", "show_", true);
    xhr.send(formData);

    xhr.onreadystatechange = function() {
      if(xhr.readyState == 4) {
        container.style.display = "none";
        let key = location.hash.substring(1);
        result.innerHTML = xhr.responseText;
        let encrypted = document.getElementById("encoded").textContent;
        let decrypted = CryptoJS.AES.decrypt(encrypted, key);
        decrypted = decrypted.toString(CryptoJS.enc.Utf8);
        //decrypted = decrypted.replace(/(<([^>]+)>)/ig,"");
        document.getElementById("result2").innerHTML = decrypted;
        document.getElementById("encoded").style.display = "none";
      }
    }
	});
});