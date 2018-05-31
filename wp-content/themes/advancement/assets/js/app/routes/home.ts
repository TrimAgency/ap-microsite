import 'jquery';
// import 'googlemaps';
// import 'waypoints';
// import { TimelineMax, TweenMax, TweenLite, TweenConfig, Linear } from 'gsap';

// import _assaults_2010_2013  from '../assault-data/2010-2013';

// declare var Waypoint;
declare global {
  interface Window {
    initMap: any;
  }
}

// allow additional wp_post data to be added to map markers
interface MarkerOptions { 
  postData?: {
    postId?:      number;
    postCity?:    string;
    postState?:   string;
    postLink?:    string;
    postSummary?: string;
  };
}

declare var AssaultMapData:AssaultMapData; // wp_localize_script
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
  assaults: assault[]
}

export function home() {
  const assaults  = AssaultMapData.assaults; // get map data

  // returns map data from by year/range
  function assaultsRange(yearStart:number, yearEnd:number = null) {
    let yearRange;
    if (typeof(yearEnd) === 'number') {
        yearRange = assaults.filter(assault => (assault.year >= yearStart 
                                            &&  assault.year <= yearEnd));
    } else {
        yearRange = assaults.filter(assault => (assault.year === yearStart));
    } return yearRange;
  }
  
  // -------- start google maps -------- //
  var assaultMap;

  window.initMap = function() {
    assaultMap = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 37.09024, lng: -95.712891},
      zoom: 4.9
    });
    

    // var markers = assaults.map(function(assault, i) {
    var markers = assaultsRange(2015).map(function(assault, i) {
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

  } // end initMap()

  window.initMap();

  console.log("AssaultMapData: ", AssaultMapData);

  // -------- end google maps -------- //

  let allScenes   = document.getElementsByClassName('scene');

  let homeContent = jQuery('.home-content');
  let titleBlock  = jQuery('#animation__title');
  let hiddenScene = jQuery('.scene.hidden-scene');
  let scene1      = jQuery('#scene-1');
  let scene2      = jQuery('#scene-2');
  let scene3      = jQuery('#scene-3');

  // -------- Waypoints -------- //
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
      // scene2.addClass('js-fade-in');
      homeContent.addClass('background-2')
    } else {
      // scene2.removeClass('js-fade-in');
      homeContent.removeClass('background-2')
    }
  }, { offset: '50%' })

  scene3.waypoint(function(direction) {

    let fade = homeContent.addClass;
    // if(direction !== "down") fade = homeContent.removeClass
    // fade('background-3');
    console.log('triggered');
    
    
    if (direction === "down")  {
      homeContent.addClass('background-3');
    } else {
      homeContent.removeClass('background-3');
    }
  }, { offset: '20%' })
  




  // jQuery( document ).ready(function() {
  //     // Init Controller
  //     var scrollMagicController = new ScrollMagic();
      
  //     // Duration ignored / replaced by scene duration now
  //     var tween = TweenMax.to('#animation__policing-timeline', 0.5, {
  //       backgroundColor: 'rgb(151, 239, 203)',
  //       scale: 1.5,
  //       rotation: 360
  //     });
  
  //     var scene = new ScrollScene({
  //       triggerElement: '#scene-2',
  //       duration: 300 /* How many pixels to scroll / animate */
  //     })
  //     .setTween(tween)
  //     .addTo(scrollMagicController);
  // });





}