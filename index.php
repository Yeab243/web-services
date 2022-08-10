<html>
<head>
<title>Ballon d’Or Winners</title>
<style>
	.club{
    border:1px solid #E77DC2;
    border-radius: 5px;
    padding: 5px;
    margin-bottom:5px;
    position:relative;  
    
  }
   html{background-color:#3FFF33;}
  .pic{
    position:absolute;
    right:10px;
    top:10px;
  }
  .pic img{
  	max-width:50px;
    }

</style>

  
<script src="https://code.jquery.com/jquery-latest.js"></script>

<script type="text/javascript">
/* 
 
				"Year":2010,
				"Nationality":"Argentina",
				"Club":"FC Barcelona",
				"Height": 5′ 7″,
				"Age":23,
				"Player":"Lionel Messi",
				"Image":"dr-no.jpg"
			


*/

function clubTemplate (club){
  return `
   <div class="club">
            <b>Year</b>: ${club.Year}<br />
            <b>Nationality</b>: ${club.Nationality}<br />
            <b>Club</b>: ${club.Club}<br />
            <b>Height</b>: ${club.Height}<br />
            <b>Age</b>: ${club.Age}<br />
            <b>Player</b>: ${club.Player}<br />
            <div class = "pic"><img src="thumbnails/${club.Image}" /> </div>  
            </div>
  `;
}
$(document).ready(function() { 
 
 $('.category').click(function(e){
   e.preventDefault(); //stop default action of the link
   cat = $(this).attr("href");  //get category from URL
  
   var request = $.ajax({
     url: "api.php?cat=" + cat,
     method: "GET",
     dataType: "json"
   });
   request.done(function( data ) {
     console.log(data);


     //place data.title on page
     $("#clubtitle").html(data.title);

     //clear previous films
    $("#clubs").html("");
     
    //loop through data.films and place on page
     $.each(data.clubs, function(i,item){
      let myData = clubTemplate(item);
      $("<div> </div>").html(myData).appendTo("#clubs");
   });
     /*
     let myData = JSON.stringify(data, null, 4);
     myData = "<pre>" + myData + "</pre>";
     $("#output").html(myData);
*/
     
   });
   request.fail(function(xhr, status, error ) {
alert('Error - ' + xhr.status + ': ' + xhr.statusText);
   });
 
  });
  
});
  

</script>
</head>
	<body>
	<h1>Ballon d’Or Winners</h1>
    <p> I built and consumed a JSON-based web service about the Ballon d'Or winners since 2010. I used a JSON data and created HTML to store  info. I used the HTML to build a template function to allow my data to integrate HTML/CSS and the image. The web service has 10 items, 6 properties, 2 files, sorted in different ways with each one having an image.

</p>
		<a href="club" class="category">Ballon d’Or Winners by Clubs</a><br />
		<a href="year" class="category">Ballon d’Or Winners by Year</a>
		<h3 id="clubtitle">Ballon d’Or Winners</h3>
		<div id="clubs">
      <!--
      <div class="film">
            <b>Film</b>: 1<br />
            <b>Title</b>: Dr. No<br />
            <b>Year</b>: 1962<br />
            <b>Director</b>: Terence Young<br />
            <b>Producers</b>: Harry Saltzman and Albert R. Broccoli<br />
            <b>Writers</b>: Richard Maibaum, Johanna Harwood and Berkely Mather<br />
            <b>Composer</b>: Monty Norman<br />
            <b>Bond</b>: Sean Connery<br />
            <b>Budget</b>: $1,000,000.00<br />
            <b>BoxOffice</b>: $59,567,035.00<br />
            <div class = "pic"><img src="thumbnails/dr-no.jpg" /></div>
-->
      </div>
<!-- 			<p>Films will go here</p>
		</div> -->
<!-- 		<div id="output">Results go here</div>
	</body> -->
</html>
