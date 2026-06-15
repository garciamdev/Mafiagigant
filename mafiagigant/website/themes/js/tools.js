 
function countdown(tijd, id, url) {
 
   

  if (tijd >= 0) {
 

    // Calculate days, hours, minutes, and seconds
    dagen = Math.floor(tijd / 3600 / 24);
    uren = Math.floor((tijd - dagen * 3600 * 24) / 3600);
    minuten = Math.floor((tijd - dagen * 3600 * 24 - uren * 3600) / 60);
    seconden = Math.floor(tijd - dagen * 3600 * 24 - uren * 3600 - minuten * 60);

    // Format seconds, minutes, hours, and days as needed
    if (seconden > 0 && seconden < 10) {
      seconden = "0" + seconden;
    } else if (seconden > 9 && seconden < 60) {
      seconden = seconden;
    } else {
      seconden = "00";
    }

    if (minuten > 0 && minuten < 10) {
      minuten = "0" + minuten + ":";
    } else if (minuten > 9 && minuten < 60) {
      minuten = minuten + ":";
    } else if (uren > 0 || dagen > 0) {
      minuten = "00:";
    } else {
      minuten = "00:";
    }

    if (uren > 0 && uren < 10) {
      uren = "0" + uren + ":";
    } else if (uren > 9 && uren < 60) {
      uren = uren + ":";
    } else if (dagen > 0) {
      uren = "00:";
    } else {
      uren = "";
    }

    if (dagen > 0 && dagen < 10) {
      dagen = "0" + dagen + ":";
    } else if (dagen > 9) {
      dagen = dagen + ":";
    } else {
      dagen = "";
    }

    // Construct the formatted countdown time
    var zichttijd = dagen + uren + minuten + seconden;
    document.getElementById(id).innerHTML = zichttijd;

    tijd = tijd - 1;

    // Set a new countdown timer only if the time is greater than 0
      if (tijd >= 0) {
      countdownTimer = setTimeout(function() {
        countdown(tijd, id, url);
      }, 1000);
    } else if (url !== '') {
      // Redirect to the provided URL if the time has reached zero and a URL is provided
     setTimeout(function() {
      document.location.href = url;
  }, 1000);
  
    }

  } else {
    // Update the countdown timer if no URL is provided
    document.getElementById(id).innerHTML = "00:00";
  }
}

