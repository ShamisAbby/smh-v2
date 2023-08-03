<script src="../assets/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/myScript.js"></script>
<script src="../assets/js/formValidation.js"></script>

<script>
  // const btn1 = document.getElementById('btn1');
  // const btn2 = document.getElementById('btn2');
  // const btn3 = document.getElementById('btn3');

  const content1 = document.getElementById('content1');
  const content2 = document.getElementById('content2');
  const content3 = document.getElementById('content3');

  function showContent1() {
    content1.style.display = 'block';
    content2.style.display = 'none';
    content3.style.display = 'none';
  }


  function showContent2() {
    content1.style.display = 'none';
    content2.style.display = 'block';
    content3.style.display = 'none';
  }

  function showContent3() {
    content1.style.display = 'none';
    content2.style.display = 'none';
    content3.style.display = 'block';
  }



  // ================> javaScript for review Question --------------

  function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace("active", " ");
    }

    if (evt.currentTarget.className === "active") {

      document.getElementById(tabName).style.display = "none";
      evt.currentTarget.className.replace("active", " ");


    } else {
      document.getElementById(tabName).style.display = "block";
      evt.currentTarget.className += " active";
    }
  }


  function openTab2(evt2, tabName2) {
    var e, tabcontent2, tablinks2;
    tabcontent2 = document.getElementsByClassName("tabcontent2");
    for (e = 0; e < tabcontent2.length; e++) {
      tabcontent2[e].style.display = "none";
    }
    tablinks2 = document.getElementsByClassName("tablinks2");
    for (e = 0; e < tablinks2.length; e++) {
      tablinks2[e].className = tablinks2[e].className.replace("active", " ");
    }

    if (evt2.currentTarget.className === "active") {

      document.getElementById(tabName2).style.display = "none";
      evt2.currentTarget.className.replace("active", " ");


    } else {
      document.getElementById(tabName2).style.display = "block";
      evt2.currentTarget.className += " active";
    }
  }



  // const statusButton = document.getElementById('status');
  // const statusContent = document.getElementById('statusContent');

  // statusButton.addEventListener('click', function() {
  //   if (statusContent.style.display === 'none') {
  //     statusContent.style.display = 'block';
  //   } else {
  //     content.style.display = 'none';
  //   }
  // });
</script>
</body>

</html>