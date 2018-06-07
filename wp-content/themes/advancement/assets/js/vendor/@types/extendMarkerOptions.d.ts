// THIS FILE ISN'T DOING ANTHING RIGHT NOW
/// <reference types="googlemaps" />

// allow additional wp_post data to be added to map markers
declare namespace google.maps {

  export interface MarkerOptions { 
    postData: any
  }
  
}
