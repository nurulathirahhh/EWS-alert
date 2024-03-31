<!DOCTYPE html>
<html>
<?php include('components/header.inc.php'); ?>
<?php include('components/navbar.inc.php'); ?>
<head>
<link rel="stylesheet" href="css/templatemo-style.css">
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style type="text/css">
		body{
			background-color: #C1E1C1;
			font-family: Arial, sans-serif;
			margin-left: 50px ;
			margin-right: 50px;
			font-size: 15px;
			padding: 0;
		}
		.data-container{
			display: flex;
			justify-content: normal;
			width: 90%;
			margin: 50px auto;
			padding: 20px;
			background-color: #C1E1C1;
			border-radius: 10px;
		}

		.data-item{
			text-align: center;
		}

		.data-item h2{
			font-size: 24px;
			font-weight: bold;
			margin-bottom: 10px;
		}

		.data-item p{
			font-size: 48px;
			font-weight: bold;
			color: #6EB7FF;
		}

		.data-head{
			margin: auto;
			width: 50%;
			text-align: center;
			font-size: 45px;
			font-weight: bold;
			margin: 50px auto;
			padding: 20px;
			background-color: #FFF;
			box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
			border-radius: 20px;
		}
	</style>

<script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/8.6.5/firebase-database.js"></script>
 
</head>

<body>
	<br>
	
	<div style="margin-top: 80px;"></div>

	<div class="col-12 tm-block-col">
                    <div class=" tm-block tm-block-taller tm-block-scroll">
                        
<table class="table table-bordered table-striped mb-0">
		<thead>
			<tr>
		<th scope="col">Timestamp</th>
		<p class="value" id="timestamp"></p>	
        <th scope="col">Temperature &#8451;</th>
		<p class="value" id="temperature"> </p>
        <th scope="col">Humidity</th>
		<p class="value" id="humidity"></p>
		<th scope="col">Water level</th>
		<p class="value" id="lvl"></p>
			</tr>
</thead>
<!--TRY -->
<tbody id= "tbody1"></tbody>
	</table>
	

	<script type="module">
//FILLING THE TABLE

		var tbody = document.getElementById('tbody1');

		function AddItemToTable(ts, humid, temp, wlvl){
			let trow = document.createElement("tr");
			let td1 = document.createElement('td');
			let td2 = document.createElement('td');
			let td3 = document.createElement('td');
			let td4 = document.createElement('td');

			td1.innerHTML = ts;
			td2.innerHTML = humid;
			td3.innerHTML = temp;
			td4.innerHTML = wlvl;

			trow.appendChild(td1);
			trow.appendChild(td2);
			trow.appendChild(td3);
			trow.appendChild(td4);

			tbody.appendChild(trow);
		}

		function AddAllItemsToTable(records){
			tbody.innerHTML = "";
			records.forEach(element => {
				AddItemToTable(element.timestamp, element.humidity, element.temperature, element.waterlevel)
			});
		}

		  // Import the functions you need from the SDKs you need
		  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDdmwj8Yi5yWVI",
    authDomain: "ewsystem-35c0c.firebaseapp.com",
    databaseURL: "https://ewsystem-35c0c-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "ewsystem-35c0c",
    storageBucket: "ewsystem-35c0c.appspot.com",
    messagingSenderId: "690157144360",
    appId: "1:690157144360:web:05d50187e1e7fa4daa281d"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

  import {getDatabase, ref, child, onValue, get}
  from "https://www.gstatic.com/firebasejs/9.22.1/firebase-database.js";

  var database = firebase.database();

		function GetAllDataRealtime(){
			const dbRef = ref(database, "UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings");

			onValue(dbRef, (snapshot) =>{
				var time = [];

				snapshot.forEach(childSnapshot => {
					time.push(childSnapshot.val());
				});
				AddAllItemsToTable(time);


			})
			
		}
		

		window.onload = GetAllDataRealtime;
		
	</script>
	
	</div>
</div>
<!--END TRY -->
<!--
<tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
      <tr>
        <th scope="row">4</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">5</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">6</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
</table>

END	-->


<!-- the scripts for products you want to access must be added-->

<!-- ARCHIVE JAP..

<script type="module">
  // Import the functions you need from the SDKs you need
  import { initializeApp } from "https://www.gstatic.com/firebasejs/9.22.1/firebase-app.js";
  // TODO: Add SDKs for Firebase products that you want to use
  // https://firebase.google.com/docs/web/setup#available-libraries

  // Your web app's Firebase configuration
  const firebaseConfig = {
    apiKey: "AIzaSyDdmwj8Yi5yWYv8ik9pqQBtXaTyVBu6gVI",
    authDomain: "ewsystem-35c0c.firebaseapp.com",
    databaseURL: "https://ewsystem-35c0c-default-rtdb.asia-southeast1.firebasedatabase.app",
    projectId: "ewsystem-35c0c",
    storageBucket: "ewsystem-35c0c.appspot.com",
    messagingSenderId: "690157144360",
    appId: "1:690157144360:web:05d50187e1e7fa4daa281d"
  };

  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);

	//  firebase.database().ref("UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings/1683303833/humidity").on("value", (snapshot) => {
      //    console.log(snapshot.val());
        //});

	// getting reference to the database
	var database = firebase.database();

	//getting reference to the data we want
	var dataRef1 = database.ref('UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings/1683303833/humidity');
	var dataRef2 = database.ref('UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings/1683303833/temperature');
	var dataRef3 = database.ref('UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings/1683303833/timestamp');
	var dataRef4 = database.ref('UsersData/u96EY02d3OO2u8vlo72cgjQr5Pu2/readings/1683303833/waterlevel');

	//fetch the data
	dataRef1.on('value', function(getdata1){
		var humi = getdata1.val();
		document.getElementById('humidity').innerHTML = humi + "%";
	})

 	dataRef2.on('value', function(getdata2){
		var temp = getdata2.val();
		document.getElementById('temperature').innerHTML = temp + "&#8451;";
	})

	dataRef3.on('value', function(getdata3){
		var timestamp = getdata3.val();
		document.getElementById('timestamp').innerHTML = timestamp + "s";
	})

	dataRef4.on('value', function(getdata4){
		var lvl = getdata4.val();
		document.getElementById('lvl').innerHTML = lvl + "m";
	})

</script>

ARCHIVE JAP END-->


	</body>
	
</html>
