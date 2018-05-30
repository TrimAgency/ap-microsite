import 'jquery';
// import 'googlemaps';
// import 'waypoints';

// import 'Waypoint';
// import { TimelineMax, TweenMax, TweenLite, TweenConfig, Linear } from 'gsap';
// declare var ScrollMagic, ScrollScene;
// import 'imports?define=>false!scrollmagic/scrollmagic/uncompressed/plugins/animation.gsap';

import { assaults2010_2013 } from '../assault-data/2010-2013';
declare var Waypoint;
declare var AssaultMapData;

declare global {
  interface Window {
    initMap: any;
  }
}

export function home() {

  jQuery( document ).ready(function() {
    // -------- start google maps -------- //
    var assaultMap;

    window.initMap = function() {
      assaultMap = new google.maps.Map(document.getElementById('map'), {
        center: {lat: 37.09024, lng: -95.712891},
        zoom: 4.9
      });
    
  
      var assaultsAt = [
        { hashtag:  "AssaultAtNorthSide",
          year:     "2010",
          month:     "November",
          city:     "San Antonio",
          state:    "TX",
          location: { lat: 29.4241219, lng: -98.49362819999999 },
          url:      "https://www.mysanantonio.com/news/article/Officer-who-shot-student-had-history-of-not-1388322.php",
          summary:  "Responding to minor assault and told to stay with the victim and not search for the suspect by his supervisor, the school resource officer disobeyed the order and ran into the backyard of a Northwest Side home with his gun drawn. Moments later, the officer fired his weapon, killing an unarmed 14-year-old Latinx North Side student."
        },
        { hashtag:  "AssaultAtSkylineHigh",
          year:     "2011",
          month:     "January",
          city:     "Oakland",
          state:    "CA",
          location: { lat: 37.8043637, lng: -122.2711137 },
          url:      "http://sfbayview.com/2013/04/superintendent-implicated-in-cover-up-of-oakland-school-police-killing-of-raheim-brown/",
          summary:  "20-year-old Raheim Brown Jr. was beaten, shot, and killed outside a school dance near Skyline High School by Oakland School Police Department Sergeant Barhin Bhatt."
        },
      ];
  
      var markers = assaultsAt.map(function(assault, i) {
        // console.log(assaultsAt);
        
        return new google.maps.Marker({
          position: assault.location,
          map: assaultMap,
          // icon: '/wp-content/themes/dpz/assets/images/marker.png',
          title: assault.hashtag
        });
      });
  
    } // end initMap()

    window.initMap();

    // console.log("AssaultMapData: ", AssaultMapData);

    // -------- end google maps -------- //
  });

  let allScenes   = document.getElementsByClassName('scene');

  let homeContent = jQuery('.home-content');
  let titleBlock  = jQuery('#animation__title');
  let hiddenScene = jQuery('.scene.hidden-scene');
  let scene1      = jQuery('#scene-1');
  let scene2      = jQuery('#scene-2');
  let scene3      = jQuery('#scene-3');


  // function sceneHandler(direction) {
  //   // let currentScene = this;
  //   if (this !== this.group.first())  {
  //     if (direction === "down") 
  //     console.log("this: ", this);
  //     {
  //       this.element.classList.add('js-fade-in');
  //       // currentScene.addClass('js-fade-in');
  //     } else {
  //       this.element.classList.remove('js-fade-in');
  //       // currentScene.removeClass('js-fade-in');
  //     }
  //   }
  // }

  // const allScenesArray = Array.from(allScenes);
  // console.log(allScenes);

  // allScenesArray.forEach(function(element:HTMLElement) {
  //   new Waypoint({
  //     element: element,
  //     handler: sceneHandler,
  //     offset: '80%',
  //     group: 'scenes'
  //   })
  // });


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
    
    if(direction === "down")  {
      // scene2.addClass('js-fade-in');
      homeContent.addClass('background-2')
    } else {
      // scene2.removeClass('js-fade-in');
      homeContent.removeClass('background-2')
    }
  }, { offset: '50%' })

  scene3.waypoint(function(direction) {

    // let fade = homeContent.addClass;
    // if(direction !== "down") fade = homeContent.removeClass
    // fade('background-3');
    
    if(direction === "down")  {
      // scene2.addClass('js-fade-in');
      homeContent.addClass('background-3')
    } else {
      // scene2.removeClass('js-fade-in');
      homeContent.removeClass('background-3')
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