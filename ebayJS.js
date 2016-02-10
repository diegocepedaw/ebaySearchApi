	// Parse the response and build an HTML table to display search results
	function _cb_findItemsByKeywords(root) {
	  var items = root.findItemsByKeywordsResponse[0].searchResult[0].item || [];
	  var html = [];
	  html.push('<table width="100%" border="0" cellspacing="0" cellpadding="3"><tbody>');
	  for (var i = 0; i < items.length; ++i) {
			var item     = items[i];
			var title    = item.title;
			var pic      = item.galleryURL;
			var viewitem = item.viewItemURL;
			if (null != title && null != viewitem) {
			  html.push('<tr><td>' + '<img src="' + pic + '" border="0">' + '</td>' +
			  '<td><a href="' + viewitem + '" target="_blank">' + title + '</a></td></tr>');
		}
  }
  html.push('</tbody></table>');
  document.getElementById("results").innerHTML = html.join("");
	}  // End _cb_findItemsByKeywords() function
	
	// Replace MyAppID with your Production AppID
	var searchTerm  = "&keywords=" + <?php $string = $_POST["searchBar"]; echo htmlspecialchars($string)?>;
	var url = "http://svcs.ebay.com/services/search/FindingService/v1";
		url += "?OPERATION-NAME=findItemsByKeywords";
		url += "&SERVICE-VERSION=1.0.0";
		url += "&SECURITY-APPNAME=RPIfef9ff-5c9d-444a-9c33-a4c6a3736da";
		url += "&GLOBAL-ID=EBAY-US";
		url += "&RESPONSE-DATA-FORMAT=JSON";
		url += "&callback=_cb_findItemsByKeywords";
		url += "&REST-PAYLOAD";
		url += "&paginationInput.entriesPerPage=3";
		
		// Submit the request
		
			s=document.createElement('script'); // create script element
			s.src= url;
			s.id="apiurl";
			document.body.appendChild(s);
			
		
