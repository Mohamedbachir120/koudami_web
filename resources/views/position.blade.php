
<!DOCTYPE html>
<html>
  <head>
    <title>Koudami</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD5P4Qoazx4exckOl4UIvTXppNeKmSqn8c&callback=initMap"
    type="text/javascript"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  </head>
  <body>
    <h3>Koudami Users Map</h3>
    <!--The div element for the map -->
    <div id="map"></div>
    <div id="content"></div>
 
  </body>
 <style type="text/css">
      /* Set the size of the div element that contains the map */
      #map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}

/* The popup bubble styling. */
.popup-bubble {
  /* Position the bubble centred-above its parent. */
  position: absolute;
  top: 0;
  left: 0;
  transform: translate(-50%, -100%);
  /* Style the bubble. */
  background-color: white;
  padding: 5px;
  border-radius: 5px;
  font-family: sans-serif;
  overflow-y: auto;
  max-height: 60px;
  box-shadow: 0px 2px 10px 1px rgba(0, 0, 0, 0.5);
}

/* The parent of the bubble. A zero-height div at the top of the tip. */
.popup-bubble-anchor {
  /* Position the div a fixed distance above the tip. */
  position: absolute;
  width: 100%;
  bottom: 8px;
  left: 0;
}

/* This element draws the tip. */
.popup-bubble-anchor::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  /* Center the tip horizontally. */
  transform: translate(-50%, 0);
  /* The tip is a https://css-tricks.com/snippets/css/css-triangle/ */
  width: 0;
  height: 0;
  /* The tip is 8px high, and 12px wide. */
  border-left: 6px solid transparent;
  border-right: 6px solid transparent;
  border-top: 8px solid white;
}

/* JavaScript will position this div at the bottom of the popup tip. */
.popup-container {
  cursor: auto;
  height: 0;
  position: absolute;
  /* The max width of the info window. */
  width: 200px;
}
    </style>


<script>
      document.getElementById("content").innerHTML='<img src="/css/avatar.png"  width="50px" height="20px"></img> <strong>{{ $user->name }}'+' '+'{{ $user->prenom }}</strong><br>'+'{{ $user->function }}';
 
       var pos1=parseFloat('{{ $user->pos1 }}');
        var pos2=parseFloat(' {{ $user->pos2 }}');
        
        if(pos1 == null){
          alert("l'utilisateur n'as pas précisé sa position");
        }

      // Initialize and add the map
      let map, popup, Popup;

/** Initializes the map and the custom popup. */
function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: pos1, lng: pos2 },
    zoom: 10,
  });

  /**
   * A customized popup on the map.
   */
  class Popup extends google.maps.OverlayView {
    constructor(position, content) {
      super();
      this.position = position;
      content.classList.add("popup-bubble");
      // This zero-height div is positioned at the bottom of the bubble.
      const bubbleAnchor = document.createElement("div");
      bubbleAnchor.classList.add("popup-bubble-anchor");
      bubbleAnchor.appendChild(content);
      // This zero-height div is positioned at the bottom of the tip.
      this.containerDiv = document.createElement("div");
      this.containerDiv.classList.add("popup-container");
      this.containerDiv.appendChild(bubbleAnchor);
      // Optionally stop clicks, etc., from bubbling up to the map.
      Popup.preventMapHitsAndGesturesFrom(this.containerDiv);
    }
    /** Called when the popup is added to the map. */
    onAdd() {
      this.getPanes().floatPane.appendChild(this.containerDiv);
    }
    /** Called when the popup is removed from the map. */
    onRemove() {
      if (this.containerDiv.parentElement) {
        this.containerDiv.parentElement.removeChild(this.containerDiv);
      }
    }
    /** Called each frame when the popup needs to draw itself. */
    draw() {
      const divPosition = this.getProjection().fromLatLngToDivPixel(
        this.position
      );
      // Hide the popup when it is far out of view.
      const display =
        Math.abs(divPosition.x) < 4000 && Math.abs(divPosition.y) < 4000
          ? "block"
          : "none";

      if (display === "block") {
        this.containerDiv.style.left = divPosition.x + "px";
        this.containerDiv.style.top = divPosition.y + "px";
      }

      if (this.containerDiv.style.display !== display) {
        this.containerDiv.style.display = display;
      }
    }
  }
  popup = new Popup(
    new google.maps.LatLng(pos1, pos2),
    document.getElementById("content")
  );
  popup.setMap(map);
}
    </script>
 
</html>