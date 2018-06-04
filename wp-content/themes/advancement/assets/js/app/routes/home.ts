import 'jquery';
// import 'googlemaps';
// import 'waypoints';

// declare var Waypoint;

declare var google;

// attach initMap() to window object 
declare global {
  interface Window {
    initMap: any;
  }
}

declare var AssaultMapData:AssaultMapData; // wp_localize_script()
  interface assault { // define shape of AssaultMapData
  id:       number;
  hashtag:  string;
  month:    string;
  year:     number;
  city:     string;
  state:    string;
  article:  string;
  summary:  string;
  location: { 
    lat:    number;
    lng:    number;
  }
}
interface AssaultMapData { 
  assaults: assault[];
}

export function home() {
  const assaults = AssaultMapData.assaults; // get map data

  // returns map data from by year/range
  function assaultsRange(yearStart:number, yearEnd:number):assault[] {
    const yearRange = assaults.filter(assault => (assault.year >= yearStart 
                                              &&  assault.year <= yearEnd));
    
    return yearRange;
  }

  function getHighlightDate($el){
    let highlightDate = $el.data('highlight-year');
    console.log("highlightDate: ", highlightDate);
  }

  function addMarkers(endYear) { 
    const assaults = assaultsRange(2010, endYear)
    
    assaults.map((assault, i) => {
      // console.log(assaultsAt);
      
      return new google.maps.Marker({
        position: assault.location,
        map: assaultMap,
        // icon: '/wp-content/themes/dpz/assets/images/marker.png',
        title: assault.hashtag,
        postData: { 
          postId:       assault.id,
          postCity:     assault.city,
          postState:    assault.state,
          postLink:     assault.article,
          postSummary:  assault.summary
        }
      });

    });
  }

  /////////////////////////////////////////
  // -------- start google maps -------- //
  /////////////////////////////////////////
  var assaultMap;

  window.initMap = function() {
    assaultMap = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 37.09024, lng: -95.712891},
      zoom: 4.9
    });
    // things a bottom of filer were here //
    addMarkers(2013);
  } // end initMap()

  window.initMap();

  // console.log("AssaultMapData: ", AssaultMapData);

  // -------- end google maps -------- //

  let allScenes   = document.getElementsByClassName('scene');

  let homeContent = jQuery('.home-content');
  let titleBlock  = jQuery('#animation__title');
  let hiddenScene = jQuery('.scene.hidden-scene');
  let highlights  = jQuery('.assault-highlight');
  let scene1      = jQuery('#scene-1');
  let scene2      = jQuery('#scene-2');
  let scene3      = jQuery('#scene-3');
  
  /////////////////////////////////
  // -------- Waypoints -------- //
  /////////////////////////////////
  // fade scenes in at offset when scrolling down
  hiddenScene.each(function( index ) {
    let currentScene = jQuery(this);
    currentScene.waypoint(function(direction) {
      // console.log(index, ": ", currentScene);
      if (direction === "down")  {
        currentScene.addClass('js-fade-in');
      } else {
        currentScene.removeClass('js-fade-in');
      }
    }, { offset: '50%' });
  });

  scene2.waypoint(function(direction) {
    if (direction === "down")  {
      homeContent.addClass('background-2')
    } else {
      homeContent.removeClass('background-2')
    }
  }, { offset: '50%' })

  scene3.waypoint(function(direction) {

    let fade = homeContent.addClass;
  
    if (direction === "down")  {
      homeContent.addClass('background-3');
    } else {
      homeContent.removeClass('background-3');
    }
  }, { offset: '20%' })


  // addMarkers(2013);
  // getHighlightDate(jQuery('.assault-highlight'));
  highlights.each(function( index, value ) {
    let currentHighlight = jQuery(this);
    
    currentHighlight.waypoint(function(direction) {
      if (direction === "down") {
        getHighlightDate(currentHighlight)
        currentHighlight.addClass('js-show-markers');
        console.log(currentHighlight);

      } else {
        currentHighlight.removeClass('js-show-markers');
      }
    }, { offset: '80%' });
  });
  
}


    // -- THINGS AT BOTTOM OF FILE -- //
    // function markersToShow(date) {
    //   let markersShown = []

    //    if (date >= 2010 && date <= 2013) {
    //      markersShown.push( assaultsRange(2010,2013) );
    //   } 
    //   // else {
    //   //  markersShown.push( assaultsRange(date) );
    //   // }

    //   // console.log(markersShown);
      
    // }



   
    
    // // var markers = assaults.map(function(assault, i) {
    // var markers = assaultsRange(2010,2013).map(function(assault, i) {
    //   // console.log(assaultsAt);
      
    //   return new google.maps.Marker({
    //     position: assault.location,
    //     map: assaultMap,
    //     // icon: '/wp-content/themes/dpz/assets/images/marker.png',
    //     title: assault.hashtag,
    //     postData: { 
    //       postId:       assault.id,
    //       postCity:     assault.city,
    //       postState:    assault.state,
    //       postLink:     assault.article,
    //       postSummary:  assault.summary
    //     }
    //   });

    // });