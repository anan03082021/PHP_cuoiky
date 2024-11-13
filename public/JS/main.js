if (document.readyState == "loading") {
  document.addEventListener("DOMContentLoaded", ready);
} else {
  ready();
}

function ready() {
  var removeItem = document.getElementsByClassName("delbtn");
  console.log(removeItem);
  for (var i = 0; i < removeItem.length; i++) {
    var btn = removeItem[i];
    btn.addEventListener("click", removeCartItem);
  }

  var quantiInp = document.getElementsByClassName("quanti");
  for (var i = 0; i < quantiInp.length; i++) {
    var inp = quantiInp[i];
    inp.addEventListener("change", quantiChanged);
  }

  var addCartBtn = document.getElementsByClassName("addbtn");
  for (var i = 0; i < addCartBtn.length; i++) {
    var btn = addCartBtn[i];
    btn.addEventListener("click", addCartClicked);
  }

  document
    .getElementsByClassName("ord")[0]
    .addEventListener("click", ordClicked);
}

function addCartClicked(event) {
  var btn = event.target;
  var item = btn.parentElement.parentElement;
  var name = item.getElementsByClassName("sp-name")[0].innerText;
  var price = item.getElementsByClassName("price")[0].innerText;
  var img = item.getElementsByClassName("sp-img")[0].src;
  addItem(name, price, img);
  updateCart();
}

function addItem(name, price, img) {
  var cartRow = document.createElement("div");
  var carRowContent = `
  <div class="item">
    <div class="imn item-col">
      <img src="${img}">
      <span class="item-name">${name}</span>
    </div>
      <span class="price item-col">${price}</span>
    <div class="item-col">
        <input class="quanti" type="number" value="1">
        <button class="delbtn">Xóa</button>
    </div>
  </div>`;
  cartRow.innerHTML = carRowContent;
  var items = document.getElementsByClassName("items")[0];
  var itemName = items.getElementsByClassName("item-name");
  for (var i = 0; i < itemName.length; i++) {
    if (itemName[i].innerText == name) {
      alert("Vật phẩm này đã có trong giỏ hàng.");
      return;
    }
  }
  items.append(cartRow);
  cartRow
    .getElementsByClassName("delbtn")[0]
    .addEventListener("click", removeCartItem);
  cartRow
    .getElementsByClassName("quanti")[0]
    .addEventListener("change", quantiChanged);
}

function removeCartItem(event) {
  var btn_remove = event.target;
  btn_remove.parentElement.parentElement.remove();
  updateCart();
}

function quantiChanged(event) {
  var inp = event.target;
  if (isNaN(inp.value) || inp.value <= 0) {
    inp.value = 1;
  }
  updateCart();
}

function ordClicked() {
  alert("Cảm ơn bạn đã thanh toán đơn hàng!");
  var items = document.getElementsByClassName("items")[0];
  while (items.hasChildNodes()) {
    items.removeChild(items.firstChild);
  }
  updateCart();
}

function updateCart() {
  var itemContainer = document.getElementsByClassName("items")[0];
  var cartRows = itemContainer.getElementsByClassName("item");
  var total = 0;
  for (var i = 0; i < cartRows.length; i++) {
    var cartRow = cartRows[i];
    var priceEl = cartRow.getElementsByClassName("price")[0];
    var quantiEl = cartRow.getElementsByClassName("quanti")[0];
    var price = parseFloat(priceEl.innerText.replace(".000 VNĐ", ""));
    var quanti = quantiEl.value;
    total = total + price * quanti;
    console.log(total);
  }
  document.getElementsByClassName("total-price")[0].innerText = total + ".000 VNĐ";
}

function display() {
  var modal = document.getElementById("basket");
  modal.style.display = "block";
}

function close_m() {
  var modal = document.getElementById("basket");
  modal.style.display = "none";
}

function filter(name) {
  const e = document.querySelectorAll("#vpp,#art,#pen,#souv");
  for (var i = 0; i < e.length; i++) {
    e[i].style.display = "inline-block";
    if (name == "all") {
      e[i].style.display = "inline-block";
    } else {
      if (e[i].id != name) {
        e[i].style.display = "none";
      }
    }
  }
}
