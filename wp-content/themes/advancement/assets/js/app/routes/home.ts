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
    setMap(map: google.maps.Map | null): void;
}
interface AssaultMapData { 
  assaults: assault[];
}

export function home() {
  const assaults = AssaultMapData.assaults; // get map data
  let allMarkers:assault[] = [];

  // returns map data from by year/range
  function assaultsRange(yearStart:number, yearEnd:number):assault[] {
    const yearRange = assaults.filter(assault => (assault.year >= yearStart 
                                              &&  assault.year <= yearEnd));
    
    return yearRange;
  }

  function getHighlightYear($el){
    let highlightYear = $el.data('highlight-year');
    
    console.log("highlightYear: ", highlightYear);
    
    return highlightYear;
  }

  function addMarkers(endYear) { 
    const assaults = assaultsRange(2010, endYear)
    
    assaults.map((assault, i) => {
      // console.log(assaultsAt);
      let markers = new google.maps.Marker({
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

      allMarkers.push(markers);
      
      return markers;

    });
  }

  // function removeMarkers(endYear) { 
  //   const assaults = assaultsRange(2010, endYear)
    
  //   assaults.map((assault, i) => {
  //     // console.log(assaultsAt);
      
  //     return new google.maps.Marker({
  //       position: assault.location,
  //       map: assaultMap,
  //       // icon: '/wp-content/themes/dpz/assets/images/marker.png',
  //       title: assault.hashtag,
  //       postData: { 
  //         postId:       assault.id,
  //         postCity:     assault.city,
  //         postState:    assault.state,
  //         postLink:     assault.article,
  //         postSummary:  assault.summary
  //       }
  //     });

  //   });
  // }

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

  let homeContent     = jQuery('.home-content');
  let introScene      = jQuery('#intro');
  let mainTitle       = jQuery('#article-header-content');
  let thesisStatments = jQuery('#thesis-statments-container');
  let timelineScene   = jQuery('#timeline-container');
  let hiddenScene     = jQuery('.scene.hidden-scene');
  let highlights      = jQuery('.assault-highlight');
  let scene1          = jQuery('#scene-1');
  let scene2          = jQuery('#scene-2');
  let scene3          = jQuery('#scene-3');
  

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

  // fade main title in on load
  jQuery(document).ready(function() {
    // mainTitle.removeClass('article-header__content--init').addClass('fade-in');
    mainTitle.removeClass('article-header__content--init');
  })

  // thesis satments trigger fading main title out 
  thesisStatments.waypoint(function(direction) {
    if (direction === "down")  {
      mainTitle.addClass('fadeable intro-complete fade-out');
    } else {
      mainTitle.removeClass('fade-out');
    }
  }, { offset: '90%' })


  scene2.waypoint(function(direction) {
    if (direction === "down")  {
      // homeContent.addClass('background-2');
      timelineScene.addClass('active');
      introScene.removeClass('active');
    } else {
      // homeContent.removeClass('background-2');
      introScene.addClass('active')
      timelineScene.removeClass('active')
    }
  }, { offset: '0%' })

  scene3.waypoint(function(direction) {

    let fade = homeContent.addClass;
  
    if (direction === "down")  {
      // homeContent.addClass('background-3');
      timelineScene.removeClass('active')

    } else {
      // homeContent.removeClass('background-3');
      timelineScene.addClass('active');

    }
  }, { offset: '20%' })


  function removeMarkers(highlightYear){
    let myMarkers 
    
    if (highlightYear < 2013) {
      myMarkers = assaultsRange(2010, 2013);
    } else {
      myMarkers = assaultsRange(highlightYear, highlightYear);
    }

    allMarkers.forEach(function (value) {
      // This right here!
      (value as assault).setMap(null);
    }); 
  }


  // addMarkers(2013);
  // getHighlightYear(jQuery('.assault-highlight'));
  highlights.each(function( index, value ) {
    let currentHighlight = jQuery(this);
    
    currentHighlight.waypoint(function(direction) {
      if (direction === "down") {

        let highlightYear = getHighlightYear(currentHighlight);
        console.log(highlightYear);
        
        addMarkers(highlightYear);
        currentHighlight.addClass('js-show-markers');
        
      } else {
        let highlightYear = getHighlightYear(currentHighlight);
        currentHighlight.removeClass('js-show-markers');

        if(highlightYear > 2013) {
          removeMarkers(highlightYear);  
          addMarkers((highlightYear-1));
        }
        // allMarkers.setMap(null); ???????????????????????????????????????????????????????????????????????????????????????????
      }
    }, { offset: '50%' });
  });
  
}