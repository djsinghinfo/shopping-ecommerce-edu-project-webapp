function searchVal() {
  var inputVal = document.getElementById("in").value;
  // window.location.pathname = `/${inputVal}.html`;
  var input = inputVal.toLowerCase();
  if (
    // input == "shirt" ||
    // input == "sweater" ||
    // input == "turtle" ||
    // input == "footwear"
    input != ""
  ) {
    // location.href = `${input}.html`;
    location.href = "search.php?search=" + input;
  } else alert("no product found!");

  //  var url = `${inputVal}.html`;
  // var http = new XMLHttpRequest();
  //         http.open('HEAD', url, false);
  //         http.send();
  //         if (http.status === 200) {
  // location.href = `${inputVal}.html`;
  // } else {
  //     alert("no product found");
  // }
}

function sortpr() {
  location.reload();
  window.location.href = "az.html";
}

var itemValue = document.getElementById("price").innerText;
var price = itemValue.replace("CDN$ ", " ");

function getprice() {
  var items = document.getElementById("quantity").value;
  var final = price * items;
  var k = document.getElementById("k");
  document.getElementById("price").style.display = "none";
  k.innerHTML = `CDN$ ${final}`;
}

function filtering() {
  var checkBox1 = document.getElementById("one");
  var checkBox2 = document.getElementById("two");
  var checkBox3 = document.getElementById("three");
  var checkBox4 = document.getElementById("four");
  var checkBox5 = document.getElementById("five");
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  if (checkBox1.checked == true) {
    div2.style.display = "none";
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "none";
    div7.style.display = "none";
    div8.style.display = "none";
    div9.style.display = "none";
  } else {
    div2.style.display = "block";
    div3.style.display = "block";
    div4.style.display = "block";
    div5.style.display = "block";
    div6.style.display = "block";
    div7.style.display = "block";
    div8.style.display = "block";
    div9.style.display = "block";
  }
  if (checkBox2.checked == true) {
    div3.style.display = "none";
    div4.style.display = "none";
    div5.style.display = "none";
    div6.style.display = "none";
    div7.style.display = "none";
    div8.style.display = "none";
    div9.style.display = "none";
  }
  if (checkBox3.checked == true) {
    div7.style.display = "none";
    div8.style.display = "none";
    div9.style.display = "none";
  }
  if (checkBox4.checked == true) {
    div9.style.display = "none";
  }
}

// document.getElementById("onerating").onclick(function () {
//     alert("kjh");
//      div2.style.display = "none"; div3.style.display = "none"; div4.style.display = "none"; div5.style.display = "none"; div1.style.display = "none"; div7.style.display = "none"; div8.style.display = "none"; div9.style.display = "none";
// })

// document.getElementById("onerating").addEventListener("click", myFunction);
// div2.style.display = "block";
// div1.style.display = "block";
// div3.style.display = "block";
// div4.style.display = "block";
// div5.style.display = "block";
// div6.style.display = "block";
// div7.style.display = "block";
// div8.style.display = "block";
// div9.style.display = "block";
function onerating() {
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  div2.style.display = "block";
  div1.style.display = "block";
  div3.style.display = "block";
  div4.style.display = "block";
  div5.style.display = "block";
  div6.style.display = "block";
  div7.style.display = "block";
  div8.style.display = "block";
  div9.style.display = "block";
  div2.style.display = "none";
  div3.style.display = "none";
  div4.style.display = "none";
  div5.style.display = "none";
  div1.style.display = "none";
  div7.style.display = "none";
  div8.style.display = "none";
  div9.style.display = "none";
}
function tworating() {
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  div2.style.display = "block";
  div1.style.display = "block";
  div3.style.display = "block";
  div4.style.display = "block";
  div5.style.display = "block";
  div6.style.display = "block";
  div7.style.display = "block";
  div8.style.display = "block";
  div9.style.display = "block";
  div2.style.display = "none";
  div3.style.display = "none";
  div4.style.display = "none";
  div6.style.display = "none";
  div1.style.display = "none";
  div7.style.display = "none";
  div8.style.display = "none";
}
function threerating() {
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  div2.style.display = "block";
  div1.style.display = "block";
  div3.style.display = "block";
  div4.style.display = "block";
  div5.style.display = "block";
  div6.style.display = "block";
  div7.style.display = "block";
  div8.style.display = "block";
  div9.style.display = "block";
  div5.style.display = "none";
  div3.style.display = "none";
  div4.style.display = "none";
  div6.style.display = "none";
  div1.style.display = "none";
  div7.style.display = "none";
  div8.style.display = "none";
  div9.style.display = "none";
}
function fourrating() {
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  div2.style.display = "block";
  div1.style.display = "block";
  div3.style.display = "block";
  div4.style.display = "block";
  div5.style.display = "block";
  div6.style.display = "block";
  div7.style.display = "block";
  div8.style.display = "block";
  div9.style.display = "block";
  div5.style.display = "none";
  div2.style.display = "none";
  div4.style.display = "none";
  div6.style.display = "none";
  div7.style.display = "none";
  div9.style.display = "none";
}
function fiverating() {
  var div1 = document.getElementById("img1");
  var div2 = document.getElementById("img2");
  var div3 = document.getElementById("img3");
  var div4 = document.getElementById("img4");
  var div5 = document.getElementById("img5");
  var div6 = document.getElementById("img6");
  var div7 = document.getElementById("img7");
  var div8 = document.getElementById("img8");
  var div9 = document.getElementById("img9");
  div2.style.display = "block";
  div1.style.display = "block";
  div3.style.display = "block";
  div4.style.display = "block";
  div5.style.display = "block";
  div6.style.display = "block";
  div7.style.display = "block";
  div8.style.display = "block";
  div9.style.display = "block";
  div5.style.display = "none";
  div2.style.display = "none";
  div8.style.display = "none";
  div3.style.display = "none";
  div6.style.display = "none";
  div1.style.display = "none";
  div9.style.display = "none";
}
