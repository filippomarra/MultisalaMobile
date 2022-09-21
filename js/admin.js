function openQRCamera(node) {
  var reader = new FileReader();
  reader.onload = function() {
    node.value = "";
    qrcode.callback = function(res) {
      alert(res);
      node.parentNode.previousElementSibling.value = res;
    }
    qrcode.decode(reader.result);
  }
  reader.readAsDataURL(node.files[0]);
}
