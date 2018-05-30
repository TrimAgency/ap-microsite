<section id="scene-1" class="scene-1 scene">
  <div id="animation__title" class="temp-card">

    <h1 class="title">We Came to Learn</h1>
    <p>
      2 - 3 Thesis statements
      Background: Static Image - Title page from report
    </p>
  </div>
</section>


<!-- TODO: move to partial files -->
<section id="scene-2" class="scene scene-2 hidden-scene">
  <div id="animation__policing-timeline" class="temp-card">

    
    <h1>Policing Timeline</h1>
    <ul>
      <li>Date 1</li>
      <li>Date 2</li>
      <li>Date 3</li>
      <li>Date 4</li>
      <li>Date 5</li>
      <li>Date 6</li>
      <li>Date 7</li>
      <li>Date 8</li>
      <li>Date 9</li>
      <li>Date 10</li>
    </ul>
  </div>
</section>


<!-- TODO: move to partial files -->
<section class="scene scene-3 hidden-scene">

<?php // Assualt Article URLs
  $assaultsAt = array(
    "skylineHigh" => array(
      "hashtag" =>  "AssaultAtSkylineHigh",
      "date"    =>  "January 2011",
      "city"    =>  "Oakland, CA",
      "url"     =>  "http://sfbayview.com/2013/04/superintendent-implicated-in-cover-up-of-oakland-school-police-killing-of-raheim-brown/",
      "summary" =>  "20-year-old Raheim Brown Jr. was beaten, shot, and killed outside a school dance near Skyline High School by Oakland School Police Department Sergeant Barhin Bhatt."
    ),
    "southHoustonHigh"  => array(
      "hashtag" =>  "AssaultAtSouthHoustonHigh",
      "date"    =>  "May 2014",
      "city"    =>  "Houston, TX",
      "url"     =>  "https://www.houstonchronicle.com/news/houston-texas/houston/article/Pasadena-family-accuses-school-officer-of-brutal-6064567.php",
      "summary" =>  "A student was struck 18 times by a metal nightstick administered by a district school officer. The student had become upset that the district officials would not return a confiscated cell phone and used a profane word before being assaulted. He was later taken by his parents to a medical clinic for extensive bruises and bleeding on his arm, back and neck."
    ),
    "springValley"  => array(
      "hashtag" =>  "AssaultAtSpringValley",
      "date"    =>  "October 2015",
      "city"    =>  "Columbia, SC",
      "url"     =>  "https://www.vibe.com/2015/10/spring-valley-high-school-assault-facts/",
      "summary" =>  "14 year old, Black girl was asked to leave a classroom after using her phone during a math class. She refused, and was later confronted by School Resource Officer Be, who asked her to leave, and then proceeded to attack her. He grabbed her by the neck, slammed her desk to the floor and then dragged her out of the desk. He also arrested another Black girl who spoke up and attempted to deescalate the situation."
    ),
    "benFranklin" => array(
      "hashtag" =>  "AssaultAtBenFranklin",
      "date"    =>  "March 2016",
      "city"    =>  "Philadelphia, PA",
      "url"     =>  "https://www.phillymag.com/news/2016/05/10/video-ben-franklin-high-school-cop/",
      "summary" =>  "A Black senior wanted to use the bathroom but didn’t have a pass, School Resource Officer told him he couldn’t enter the bathroom.  In a moment of frustration, an argument ensued and Brian threw an orange against the wall. The cop retaliated by punching him twice in the face, slamming him down and choking him. Another student while recording the video was told to delete the footage or be at risk of arrest, the phone was taken from him by the school resource officer, who deleted the footage attempting to erase the documentation of the incident."
    ),
    "woodlandHills" => array(
      "hashtag" =>  "AssaultAtWoodlandHills",
      "date"    =>  "April 2017",
      "city"    =>  "Woodland Hills ,PA",
      "url"     =>  "http://www.post-gazette.com/news/education/2017/08/23/Woodland-Hills-lawsuit-student-abuse-Shaulis-Murray-Johnson-Churchill-officers/stories/201708220140",
      "summary" =>  "Woodland Hills outside of Pittsburgh, PA 
      On April 3, Steve Shaulis, a Churchill police officer at Woodland Hills High School assaulted and injured Que’Chawn Wade, a 14-year old student, after publicly using expletives and derogatory slurs towards him. The offending officer body slammed and repeatedly punched Wade in the head, causing him to lose two teeth and sustain bruises and multiple lacerations to his face and neck."
    )
  );
?>



<?php function display_assault_highlights($assaults) {
  foreach ($assaults as $assault): ?>
    <div class="temp-card assault-highlights bg-white-5">
      
      <div>
        <h3>2010 - 2013</h3>
        <a  id="<?php echo $assault['hashtag']; ?>" 
            href="<?php echo $assault['url']; ?>"
            target="_blank"
            rel="nofollow">
            <?php echo "#", ($assault['hashtag']); ?>
          </a> – <?php echo $assault['city']; ?>
          <p><?php echo $assault['summary']; ?></p>
        </div>
      </div>
      <?php endforeach;
} ?>
  <h1>#AssaultAt Map</h1>

  <?php 	$assaults	= get_posts(array('post_type'				=> 'assaults',
															'post_status'			=> 'publish',
                              'posts_per_page'  => '-1'));
                              var_dump($assaults);
                              
  get_template_part( 'page-templates/template-parts/home/google', 'map' ); ?>

  <?php display_assault_highlights($assaultsAt); ?>

</section>


<!-- TODO: move to partial files -->
<section class="scene scene-4 hidden-scene">
  <div class="temp-card">
    <h1>Infographics</h1>

    <div class="infographic-1"></div>
    <div class="infographic-2"></div>
    <div class="infographic-3"></div>

  </div>
</section>