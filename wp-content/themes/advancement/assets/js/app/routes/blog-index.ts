import 'gsap'; // greensock TweenMax library

export function blogIndex() {
 let max;

 // default options for the loadMorePosts function
  const loadMoreOptions = {
      loadCount: 1,
      fetchCount: 3 
  };
  
 // start spinner until server responds with posts
 function startSpin(): void {
   $('body').addClass('no-scroll');
   $('#spinner').removeClass('hidden');
 }

 function stopSpin(): void {
   $('body').removeClass('no-scroll');
   $('#spinner').addClass('hidden');
 }

 // AJAX for infinite scroll pagination
 function loadMorePosts(pageNumber, postsPerPage): void {
      var query = 'action=infinite_scroll&page_no=' + pageNumber + 
          '&loop_file=loop&posts_per_page=' + postsPerPage;

      $.ajax({
          url: '/wp-admin/admin-ajax.php',
          type: 'post',
          data: query,
          success: function(response){
              if ( response === 'max' ) {
                max = true; // reached max pagination
                $('#max-blog-posts').removeClass('hidden');
                stopSpin();
              } else {
                $('#blog-index').append(response);
                stopSpin();
              }
          }
      });
  }

  // on init load posts
  function onInit() {
      startSpin();
      loadMorePosts(loadMoreOptions.loadCount, loadMoreOptions.fetchCount);
      loadMoreOptions.loadCount+=1;
  }
   
  $(window).on('scroll', function(){ 
    let scrollHeight = $(window).scrollTop();
    let windowHeight = $(window).height();
    let docHeight = $(document).height();

    if ( !max && (scrollHeight + windowHeight) === docHeight ) {
      startSpin();
      loadMorePosts(loadMoreOptions.loadCount, loadMoreOptions.fetchCount);
      loadMoreOptions.loadCount+=1;
    }
  });

  onInit();

}