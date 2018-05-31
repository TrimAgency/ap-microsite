declare var AssaultMapData;
var _assaults_2010_2013;

export function assaults_2010_2013() {

  let   assaults  = AssaultMapData.assaults
  const _assaults_2010_2013 = assaults.filter(assault => (assault.year >= 2010 &&  assault.year <= 2013));
  
  // console.log("assaults_2010_2013: ", assaults_2010_2013);
} export default _assaults_2010_2013;
  
  
  
  
    // let assaultsAt_2010_2013 = [
      //   { 
        //     hashtag:  "AssaultAtNorthSide",
        //     year:     "2010",
        //     month:    "November",
        //     city:     "#AssaultAtNorthSide ",
        //     state:    "TX",
        //     location: { lat: 29.4241219, lng: -98.49362819999999 },
        //     url:      "https://www.mysanantonio.com/news/article/Officer-who-shot-student-had-history-of-not-1388322.php",
        //     summary:  "Responding to minor assault and told to stay with the victim and not search for the suspect by his supervisor, the school resource officer disobeyed the order and ran into the backyard of a Northwest Side home with his gun drawn. Moments later, the officer fired his weapon, killing an unarmed 14-year-old Latinx North Side student."
        //   },
        //   { hashtag:  "AssaultAtSkylineHigh",
        //     year:     "2011",
        //     month:    "January",
        //     city:     "Oakland",
        //     state:    "CA",
        //     location: { lat: 37.8043637, lng: -122.2711137 },
        //     url:      "http://sfbayview.com/2013/04/superintendent-implicated-in-cover-up-of-oakland-school-police-killing-of-raheim-brown/",
        //     summary:  "20-year-old Raheim Brown Jr. was beaten, shot, and killed outside a school dance near Skyline High School by Oakland School Police Department Sergeant Barhin Bhatt."
        //   },
        // ]