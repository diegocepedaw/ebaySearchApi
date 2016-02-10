
<html>
<head>
<title>eBay Search Results</title>
<style type="text/css">body { font-family: arial,sans-serif;} </style>
</head>
<body>


<h1 >eBay Search Results</h1>
<h3>This site displays auctions on eBay that have zero bids and are close to ending so you can get the lowest price possible on what you're looking for!</h3>

<form action="ebayAPI.php" method="post">
Search: <input type="text" name="searchBar" >
<select name="categoryMenu">
  <option>Antiques</option>
  <option>Art</option>
  <option>Baby</option>
  <option>Books</option>
  <option>Business and Industrial</option>
  <option>Cameras and Photo</option>
  <option>Cell Phones and Accessories</option>
  <option>Clothing, Shoes and Accessories</option>
  <option>Coins and Paper Money</option>
  <option>Computers/Tablets and Networking</option>
  <option>Consumer Electronics</option>
  <option>Crafts</option>
  <option>Dolls and Bears</option>
  <option>DVDs and Movies</option>
  <option>Entertainment Memorabilia</option>
  <option>Gift Cards and Coupons</option>
  <option>Health and Beauty</option>
  <option>Home and Garden</option>
  <option>Jewelry and Watches</option>
  <option>Music</option>
  <option>Musical Instruments and Gear</option>
  <option>Pet Supplies</option>
  <option>Pottery and Glass</option>
  <option>Real Estate</option>
  <option>Specialty Services</option>
  <option>Sporting Goods</option>
  <option>Sports Mem, Cards and Fan Shop</option>
  <option>Stamps</option>
  <option>Tickets and Experiences</option>
  <option>Toys and Hobbies</option>
  <option>Travel</option>
  <option>Video Games and Consoles</option>
</select>
<input type="submit" value="Submit" >
<br/>
</form>



<div id="results"></div>
<script>
//Parse the response and build an HTML table to display search results
function _cb_findItemsAdvanced(root) {

      var items = root.findItemsAdvancedResponse[0].searchResult[0].item || [];
      var html = [];
      html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
      for (var i = 0; i < items.length; ++i) {
        var item     = items[i];
        var title    = item.title;
        var pic      = item.galleryURL;
        var viewitem = item.viewItemURL;
        var price    = item.sellingStatus[0].currentPrice[0].__value__;

        if (null != title && null != viewitem) {
          html.push('<tr><td>' + '<img src="' + pic + '" border="0">' + '</td>' +
          '<td><a href="' + viewitem + '" target="_blank">' + title + '</a></td>'+ '<td>' + price + "$" + '</td></tr>');
        }
      }
      html.push('</tbody></table>');
      document.getElementById("results").innerHTML = html.join("");

}  // End _cb_findItemsByKeywords() function
//get category #
<?php $string1 = htmlspecialchars($_POST["categoryMenu"]); 
  switch($string1){
	  case "Antiques" :
		echo 'var category = "20081";';
		break;
	  case "Art" :
	  echo 'var category = "550";';
		break;
	  case "Baby" :
	  echo 'var category = "2984";';
		break;
	  case "Books" :
	  echo 'var category = "267";';
		break;
		echo 'var category = "12576";';
		break;
	  case "Cameras and Photo" :
	  echo 'var category = "625";';
		break;
	  case "Cell Phones and Accessories" :
	  echo 'var category = "15032";';
		break;
	  case "Clothing, Shoes and Accessories" :
	  echo 'var category = "11450";';
		break;
	  case "Coins and Paper Money" :
	  echo 'var category = "11116";';
		break;
	  case "Computers/Tablets and Networking" :
	  echo 'var category = "58058";';
		break;
	  case "Consumer Electronics" :
	  echo 'var category = "293";';
		break;
	  case "Crafts" :
	  echo 'var category = "14339";';
		break;
	  case "Dolls and Bears" :
	  echo 'var category = "237";';
		break;
	  case "DVDs and Movies" :
	  echo 'var category = "11232";';
		break;
	  case "Entertainment Memorabilia" :
	  echo 'var category = "45100";';
		break;
	  case "Gift Cards and Coupons" :
	  echo 'var category = "172008";';
		break;
	  case "Health and Beauty" :
	  echo 'var category = "26395";';
		break;
	  case "Home and Garden" :
	  echo 'var category = "11700";';
		break;
	  case "Jewelry and Watches" :
	  echo 'var category = "281";';
		break;
	  case "Music" :
	  echo 'var category = "11233";';
		break;
	  case "Musical Instruments and Gear" :
	  echo 'var category = "619";';
		break;
	  case "Pet Supplies" :
	  echo 'var category = "1281";';
		break;
	  case "Pottery and Glass" :
	  echo 'var category = "870";';
		break;
	  case "Real Estate" :
	  echo 'var category = "10542";';
		break;
	  case "Specialty Services" :
	  echo 'var category = "316";';
		break;
	  case "Sporting Goods" :
	  echo 'var category = "888";';
		break;
	  case "Sports Mem, Cards and Fan Shop" :
	  echo 'var category = "64482";';
		break;
	  case "Stamps" :
	  echo 'var category = "260";';
		break;
	  case "Tickets and Experiences" :
	  echo 'var category = "1305";';
		break;
	  case "Toys and Hobbies" :
	  echo 'var category = "220";';
		break;
	  case "Travel" :
	  echo 'var category = "3252";';
		break;
	  case "Video Games and Consoles" :
	  echo 'var category = "1249";';
		break;
	  }
?>
var categorySearch = "&categoryId=" + category;
//Construct the request
var searchTerm  = "&keywords=" + <?php $string = $_POST["searchBar"]; echo '"'; echo htmlspecialchars($string); echo '"';?>;
var url = "http://svcs.ebay.com/services/search/FindingService/v1";
 url += "?OPERATION-NAME=findItemsAdvanced";
 url += "&SERVICE-VERSION=1.0.0";
 url += "&SECURITY-APPNAME=RPIfef9ff-5c9d-444a-9c33-a4c6a3736da";
 url += "&GLOBAL-ID=EBAY-US";
 url += "&RESPONSE-DATA-FORMAT=JSON";
 url += "&callback=_cb_findItemsAdvanced";
 url += "&REST-PAYLOAD";
 url += "&itemFilter(0).name=MaxBids&itemFilter(0).value=0";
 url += categorySearch; // video game  
 url += searchTerm; // change value to game title 
 url += "&paginationInput.entriesPerPage=6"; 

//Submit the request
 s=document.createElement('script'); // create script element
 s.src= url;
 document.body.appendChild(s);
</script>

</body>
</html>
